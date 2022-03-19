<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\District;
use Illuminate\Http\Request;
use Exception;

class CommunesController extends Controller
{

    /**
     * Display a listing of the communes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $communes = Commune::with('district')->paginate(25);

        return view('communes.index', compact('communes'));
    }

    /**
     * Show the form for creating a new commune.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Districts = District::pluck('name','id')->all();
        
        return view('communes.create', compact('Districts'));
    }

    /**
     * Store a new commune in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Commune::create($data);

            return redirect()->route('communes.commune.index')
                ->with('success_message', 'Commune was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified commune.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $commune = Commune::with('district')->findOrFail($id);

        return view('communes.show', compact('commune'));
    }

    /**
     * Show the form for editing the specified commune.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $commune = Commune::findOrFail($id);
        $Districts = District::pluck('name','id')->all();

        return view('communes.edit', compact('commune','Districts'));
    }

    /**
     * Update the specified commune in the storage.
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
            
            $commune = Commune::findOrFail($id);
            $commune->update($data);

            return redirect()->route('communes.commune.index')
                ->with('success_message', 'Commune was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified commune from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $commune = Commune::findOrFail($id);
            $commune->delete();

            return redirect()->route('communes.commune.index')
                ->with('success_message', 'Commune was successfully deleted.');
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
            'district_id' => 'nullable',
            'status' => 'nullable|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
