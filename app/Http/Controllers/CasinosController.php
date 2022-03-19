<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Casino;
use Illuminate\Http\Request;
use Exception;

class CasinosController extends Controller
{

    /**
     * Display a listing of the casinos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $casinos = Casino::paginate(25);

        return view('casinos.index', compact('casinos'));
    }

    /**
     * Show the form for creating a new casino.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('casinos.create');
    }

    /**
     * Store a new casino in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Casino::create($data);

            return redirect()->route('casinos.casino.index')
                ->with('success_message', 'Casino was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified casino.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $casino = Casino::findOrFail($id);

        return view('casinos.show', compact('casino'));
    }

    /**
     * Show the form for editing the specified casino.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $casino = Casino::findOrFail($id);
        

        return view('casinos.edit', compact('casino'));
    }

    /**
     * Update the specified casino in the storage.
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
            
            $casino = Casino::findOrFail($id);
            $casino->update($data);

            return redirect()->route('casinos.casino.index')
                ->with('success_message', 'Casino was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified casino from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $casino = Casino::findOrFail($id);
            $casino->delete();

            return redirect()->route('casinos.casino.index')
                ->with('success_message', 'Casino was successfully deleted.');
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
            'name' => 'nullable|string|min:0|max:255',
            'status' => 'nullable',
            'description' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
