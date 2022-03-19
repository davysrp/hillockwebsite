<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackagePhoto;
use App\Models\RoomPhoto;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Exception;

class PackagesController extends Controller
{

    /**
     * Display a listing of the packages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $packages = Package::paginate(25);

        return view('packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new package.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('packages.create');
    }

    /**
     * Store a new package in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            $package=Package::create($data);

            $destinationPath = 'image/package/';

            $images = $request->file('photo_gallery');
            if ($request->hasFile('photo_gallery')) :
                foreach ($images as $file):
                    $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath,$profileImage);
                    PackagePhoto::create([
                        'package_id'=>$package->id,
                        'photo'=>$profileImage
                    ]);

                endforeach;
            endif;

            return redirect()->route('packages.package.index')
                ->with('success_message', 'Package was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified package.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {

        $packagePhotos = PackagePhoto::where('package_id',$id)->with('package')->paginate(25);

        return view('packages.show', compact('packagePhotos'));
    }

    /**
     * Show the form for editing the specified package.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);


        return view('packages.edit', compact('package'));
    }

    /**
     * Update the specified package in the storage.
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

            $package = Package::findOrFail($id);
            $package->update($data);


           $destinationPath = 'image/package/';

           $images = $request->file('photo_gallery');
           if ($request->hasFile('photo_gallery')) :
               foreach ($images as $file):
                   $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                   $file->move($destinationPath,$profileImage);
                   PackagePhoto::create([
                       'package_id'=>$id,
                       'photo'=>$profileImage
                   ]);

               endforeach;
           endif;


            return redirect()->route('packages.package.index')
                ->with('success_message', 'Package was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified package from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $package = Package::findOrFail($id);

            $destinationPath = 'image/gallery/';
            if(File::exists(public_path($destinationPath.$package->photo))){
                File::delete(public_path($destinationPath.$package->photo));
            }else{
                dd('File does not exists.');
            }
            $package->delete();

            return redirect()->route('packages.package.index')
                ->with('success_message', 'Package was successfully deleted.');
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
            'photo' => 'nullable|file',
            'price' => 'nullable|string|min:0|max:255',
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
