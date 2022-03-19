<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackagePhoto;
use Illuminate\Http\Request;
use Exception;

class PackagePhotosController extends Controller
{

    /**
     * Display a listing of the package photos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $packagePhotos = PackagePhoto::with('package')->paginate(25);

        return view('package_photos.index', compact('packagePhotos'));
    }

    /**
     * Show the form for creating a new package photo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $packages = Package::pluck('name','id')->all();
        
        return view('package_photos.create', compact('packages'));
    }

    /**
     * Store a new package photo in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            PackagePhoto::create($data);

            return redirect()->route('package_photos.package_photo.index')
                ->with('success_message', 'Package Photo was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified package photo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $packagePhoto = PackagePhoto::with('package')->findOrFail($id);

        return view('package_photos.show', compact('packagePhoto'));
    }

    /**
     * Show the form for editing the specified package photo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $packagePhoto = PackagePhoto::findOrFail($id);
        $packages = Package::pluck('name','id')->all();

        return view('package_photos.edit', compact('packagePhoto','packages'));
    }

    /**
     * Update the specified package photo in the storage.
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
            
            $packagePhoto = PackagePhoto::findOrFail($id);
            $packagePhoto->update($data);

            return redirect()->route('package_photos.package_photo.index')
                ->with('success_message', 'Package Photo was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified package photo from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $packagePhoto = PackagePhoto::findOrFail($id);
            $packagePhoto->delete();

            return redirect()->route('package_photos.package_photo.index')
                ->with('success_message', 'Package Photo was successfully deleted.');
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
                'photo' => 'nullable|file|string|min:0|max:255',
            'package_id' => 'nullable|numeric|min:0|max:4294967295', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
