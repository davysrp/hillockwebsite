<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MenuBar;
use App\Models\MenuBarGallery;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Exception;

class MenuBarGalleriesController extends Controller
{

    /**
     * Display a listing of the menu bar galleries.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $menuBarGalleries = MenuBarGallery::with('menubar')->paginate(25);

        return view('menu_bar_galleries.index', compact('menuBarGalleries'));
    }

    /**
     * Show the form for creating a new menu bar gallery.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $menuBars = MenuBar::pluck('name','id')->all();

        return view('menu_bar_galleries.create', compact('menuBars'));
    }

    /**
     * Store a new menu bar gallery in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            MenuBarGallery::create($data);

            return redirect()->route('menu_bar_galleries.menu_bar_gallery.index')
                ->with('success_message', 'Menu Bar Gallery was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified menu bar gallery.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $menuBarGallery = MenuBarGallery::with('menubar')->findOrFail($id);

        return view('menu_bar_galleries.show', compact('menuBarGallery'));
    }

    /**
     * Show the form for editing the specified menu bar gallery.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $menuBarGallery = MenuBarGallery::findOrFail($id);
        $menuBars = MenuBar::pluck('name','id')->all();

        return view('menu_bar_galleries.edit', compact('menuBarGallery','menuBars'));
    }

    /**
     * Update the specified menu bar gallery in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $menuBarGallery = MenuBarGallery::findOrFail($id);
            $menuBarGallery->update($data);

            return redirect()->route('menu_bar_galleries.menu_bar_gallery.index')
                ->with('success_message', 'Menu Bar Gallery was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified menu bar gallery from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $menuBarGallery = MenuBarGallery::findOrFail($id);

            $destinationPath = 'image/room/';
            if(File::exists(public_path($destinationPath.$menuBarGallery->photo))){
                File::delete(public_path($destinationPath.$menuBarGallery->photo));
            }else{
                dd('File does not exists.');
            }


            $menuBarGallery->delete();

            return redirect()->back()
                ->with('success_message', 'Menu Bar Gallery was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'nullable|string|min:0|max:255',
            'photo' => 'nullable|file|string|min:0|max:255',
            'menu_bar_id' => 'nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
