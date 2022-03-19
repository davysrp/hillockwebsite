<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MenuBar;
use App\Models\MenuBarGallery;
use Illuminate\Http\Request;
use Exception;

class MenuBarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the menu bars.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $menuBars = MenuBar::paginate(25);

        return view('menu_bars.index', compact('menuBars'));
    }

    /**
     * Show the form for creating a new menu bar.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('menu_bars.create');
    }

    /**
     * Store a new menu bar in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            MenuBar::create($data);

            return redirect()->route('menu_bars.menu_bar.index')
                ->with('success_message', 'Menu Bar was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified menu bar.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $menuBarGalleries = MenuBarGallery::where('menu_bar_id',$id)->with('menubar')->paginate(25);

        return view('menu_bars.show', compact('menuBarGalleries'));
    }

    /**
     * Show the form for editing the specified menu bar.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $menuBar = MenuBar::findOrFail($id);


        return view('menu_bars.edit', compact('menuBar'));
    }

    /**
     * Update the specified menu bar in the storage.
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

            $menuBar = MenuBar::findOrFail($id);
            $menuBar->update($data);


            $destinationPath = 'image/menu/';

            $images = $request->file('photo_gallery');
            if ($request->hasFile('photo_gallery')) :
                foreach ($images as $file):
                    $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath,$profileImage);
                    MenuBarGallery::create([
                        'menu_bar_id'=>$id,
                        'name'=>$menuBar->name,
                        'photo'=>$profileImage
                    ]);

                endforeach;
            endif;


            return redirect()->route('menu_bars.menu_bar.index')
                ->with('success_message', 'Menu Bar was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }



    }

    /**
     * Remove the specified menu bar from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $menuBar = MenuBar::findOrFail($id);
            $menuBar->delete();

            return redirect()->route('menu_bars.menu_bar.index')
                ->with('success_message', 'Menu Bar was successfully deleted.');
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
            'slug' => 'nullable|string|min:0|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'view' => 'nullable|string|min:0|max:255',
            'status' => 'nullable|string|min:0|max:255',
        ];

        $data = $request->validate($rules);
        if ($image = $request->file('photo')) {
            $destinationPath = 'image/menu/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }
        if ($image = $request->file('feature_photo')) {
            $destinationPath = 'image/menu/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['feature_photo'] = "$profileImage";
        } else {
            unset($data['feature_photo']);
        }
        return $data;
    }

}
