<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Spa;
use App\Models\SpaPhoto;
use Illuminate\Http\Request;
use Exception;

class SpasController extends Controller
{

    /**
     * Display a listing of the spas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $spas = Spa::paginate(25);

        return view('spas.index', compact('spas'));
    }

    /**
     * Show the form for creating a new spa.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('spas.create');
    }

    /**
     * Store a new spa in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            $destinationPath = 'image/spa/';
           $spa= Spa::create($data);
            $images = $request->file('photo_gallery');
            if ($request->hasFile('photo_gallery')) :
                foreach ($images as $file):
                    $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath,$profileImage);
                    SpaPhoto::create([
                        'spa_id'=>$spa->id,
                        'photo'=>$profileImage
                    ]);

                endforeach;
            endif;
            return redirect()->route('spas.spa.index')
                ->with('success_message', 'Spa was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified spa.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $spa = Spa::findOrFail($id);

        $spaPhotos = SpaPhoto::where('spa_id',$id)->get();
        return view('spas.show', compact('spa','spaPhotos'));
    }

    /**
     * Show the form for editing the specified spa.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $spa = Spa::findOrFail($id);


        return view('spas.edit', compact('spa'));
    }

    /**
     * Update the specified spa in the storage.
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

            $spa = Spa::findOrFail($id);
            $spa->update($data);
            $destinationPath = 'image/spa/';

            $images = $request->file('photo_gallery');
            if ($request->hasFile('photo_gallery')) :
                foreach ($images as $file):
                    $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath,$profileImage);
                    SpaPhoto::create([
                        'spa_id'=>$id,
                        'photo'=>$profileImage
                    ]);
                endforeach;
            endif;
            return redirect()->route('spas.spa.index')
                ->with('success_message', 'Spa was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified spa from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $spa = Spa::findOrFail($id);
            $spa->delete();

            return redirect()->route('spas.spa.index')
                ->with('success_message', 'Spa was successfully deleted.');
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
            'short_desc' => 'nullable',
            'description' => 'nullable',
            'meta_keyword' => 'nullable|string|min:0|max:255',
            'meta_description' => 'nullable',
            'photo' => 'nullable|file|string|min:0|max:255',
            'price' => 'nullable|string|min:0|max:255',
            'slug' => 'nullable|string|min:0|max:255',
            'short_description' => 'nullable',
        ];


        $data = $request->validate($rules);

        if ($image = $request->file('photo')) {
            $destinationPath = 'image/package/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }


        return $data;
    }

}
