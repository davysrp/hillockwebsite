<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\File;
class GalleriesController extends Controller
{

    /**
     * Display a listing of the galleries.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $galleries = Gallery::paginate(25);

        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('galleries.create');
    }

    /**
     * Store a new gallery in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

//            $data = $this->getData($request);

//            Gallery::create($data);


            $destinationPath = 'image/gallery/';

            $images = $request->file('photos');
            if ($request->hasFile('photos')) :
                foreach ($images as $file):
                    $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath,$profileImage);
                    $data['photo'] = "$profileImage";
                    Gallery::create([
                        'name' => $request->name,
                        'photo' => $profileImage,

                    ]);
                endforeach;
            endif;






            return redirect()->route('galleries.gallery.index')
                ->with('success_message', 'Gallery was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }






    }

    /**
     * Display the specified gallery.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified gallery.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);


        return view('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery in the storage.
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

            $gallery = Gallery::findOrFail($id);
            $gallery->update($data);

            return redirect()->route('galleries.gallery.index')
                ->with('success_message', 'Gallery was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified gallery from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            $destinationPath = 'image/gallery/';
            if(File::exists(public_path($destinationPath.$gallery->photo))){
                File::delete(public_path($destinationPath.$gallery->photo));
            }else{
                dd('File does not exists.');
            }
            $gallery->delete();


            return redirect()->route('galleries.gallery.index')
                ->with('success_message', 'Gallery was successfully deleted.');
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
            'type' => 'nullable|string',
            'photo' => 'nullable|file',
        ];


        $data = $request->validate($rules);

/*        if ($image = $request->file('photo')) {
            $destinationPath = 'image/gallery/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }*/




        return $data;
    }

}
