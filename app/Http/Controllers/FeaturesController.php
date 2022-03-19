<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Exception;

class FeaturesController extends Controller
{

    /**
     * Display a listing of the features.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $features = Feature::paginate(25);

        return view('features.index', compact('features'));
    }

    /**
     * Show the form for creating a new feature.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('features.create');
    }

    /**
     * Store a new feature in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Feature::create($data);

            return redirect()->route('features.feature.index')
                ->with('success_message', 'Feature was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified feature.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $feature = Feature::findOrFail($id);

        return view('features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified feature.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        

        return view('features.edit', compact('feature'));
    }

    /**
     * Update the specified feature in the storage.
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
            
            $feature = Feature::findOrFail($id);
            $feature->update($data);

            return redirect()->route('features.feature.index')
                ->with('success_message', 'Feature was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified feature from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $feature = Feature::findOrFail($id);
            $feature->delete();

            return redirect()->route('features.feature.index')
                ->with('success_message', 'Feature was successfully deleted.');
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
