<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Exception;

class DistrictsController extends Controller
{

    /**
     * Display a listing of the districts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $districts = District::with('province')->paginate(25);

        return view('districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new district.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Provinces = Province::pluck('name','id')->all();
        
        return view('districts.create', compact('Provinces'));
    }

    /**
     * Store a new district in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            District::create($data);

            return redirect()->route('districts.district.index')
                ->with('success_message', 'District was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified district.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $district = District::with('province')->findOrFail($id);

        return view('districts.show', compact('district'));
    }

    /**
     * Show the form for editing the specified district.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $district = District::findOrFail($id);
        $Provinces = Province::pluck('name','id')->all();

        return view('districts.edit', compact('district','Provinces'));
    }

    /**
     * Update the specified district in the storage.
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
            
            $district = District::findOrFail($id);
            $district->update($data);

            return redirect()->route('districts.district.index')
                ->with('success_message', 'District was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified district from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $district = District::findOrFail($id);
            $district->delete();

            return redirect()->route('districts.district.index')
                ->with('success_message', 'District was successfully deleted.');
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
                'name_kh' => 'nullable|string|min:0|max:255',
            'name' => 'nullable|string|min:0|max:255',
            'province_id' => 'nullable',
            'updatedat' => 'nullable|date_format:j/n/Y g:i A', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
