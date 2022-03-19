<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Exception;

class AmenitiesController extends Controller
{

    /**
     * Display a listing of the amenities.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $amenities = Amenity::paginate(25);

        return view('amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new amenity.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('amenities.create');
    }

    /**
     * Store a new amenity in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Amenity::create($data);

            return redirect()->route('amenities.amenity.index')
                ->with('success_message', 'Amenity was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified amenity.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $amenity = Amenity::findOrFail($id);

        return view('amenities.show', compact('amenity'));
    }

    /**
     * Show the form for editing the specified amenity.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $amenity = Amenity::findOrFail($id);
        

        return view('amenities.edit', compact('amenity'));
    }

    /**
     * Update the specified amenity in the storage.
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
            
            $amenity = Amenity::findOrFail($id);
            $amenity->update($data);

            return redirect()->route('amenities.amenity.index')
                ->with('success_message', 'Amenity was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified amenity from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $amenity = Amenity::findOrFail($id);
            $amenity->delete();

            return redirect()->route('amenities.amenity.index')
                ->with('success_message', 'Amenity was successfully deleted.');
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
                'icon' => 'nullable|string|min:0|max:255',
            'name' => 'nullable|string|min:0|max:255',
            'name_kh' => 'nullable|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
