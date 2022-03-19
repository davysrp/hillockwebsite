<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Village;
use Illuminate\Http\Request;
use Exception;

class VillagesController extends Controller
{

    /**
     * Display a listing of the villages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $villages = Village::with('commune')->paginate(25);

        return view('villages.index', compact('villages'));
    }

    /**
     * Show the form for creating a new village.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Communes = Commune::pluck('name','id')->all();
        
        return view('villages.create', compact('Communes'));
    }

    /**
     * Store a new village in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Village::create($data);

            return redirect()->route('villages.village.index')
                ->with('success_message', 'Village was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified village.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $village = Village::with('commune')->findOrFail($id);

        return view('villages.show', compact('village'));
    }

    /**
     * Show the form for editing the specified village.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $village = Village::findOrFail($id);
        $Communes = Commune::pluck('name','id')->all();

        return view('villages.edit', compact('village','Communes'));
    }

    /**
     * Update the specified village in the storage.
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
            
            $village = Village::findOrFail($id);
            $village->update($data);

            return redirect()->route('villages.village.index')
                ->with('success_message', 'Village was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified village from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $village = Village::findOrFail($id);
            $village->delete();

            return redirect()->route('villages.village.index')
                ->with('success_message', 'Village was successfully deleted.');
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
            'commune_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
