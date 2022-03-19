<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Security;
use Illuminate\Http\Request;
use Exception;

class SecuritiesController extends Controller
{

    /**
     * Display a listing of the securities.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $securities = Security::paginate(25);

        return view('securities.index', compact('securities'));
    }

    /**
     * Show the form for creating a new security.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('securities.create');
    }

    /**
     * Store a new security in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Security::create($data);

            return redirect()->route('securities.security.index')
                ->with('success_message', 'Security was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified security.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $security = Security::findOrFail($id);

        return view('securities.show', compact('security'));
    }

    /**
     * Show the form for editing the specified security.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $security = Security::findOrFail($id);
        

        return view('securities.edit', compact('security'));
    }

    /**
     * Update the specified security in the storage.
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
            
            $security = Security::findOrFail($id);
            $security->update($data);

            return redirect()->route('securities.security.index')
                ->with('success_message', 'Security was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified security from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $security = Security::findOrFail($id);
            $security->delete();

            return redirect()->route('securities.security.index')
                ->with('success_message', 'Security was successfully deleted.');
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
