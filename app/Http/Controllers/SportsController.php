<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;
use Exception;

class SportsController extends Controller
{

    /**
     * Display a listing of the sports.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $sports = Sport::paginate(25);

        return view('sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new sport.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('sports.create');
    }

    /**
     * Store a new sport in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Sport::create($data);

            return redirect()->route('sports.sport.index')
                ->with('success_message', 'Sport was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified sport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $sport = Sport::findOrFail($id);

        return view('sports.show', compact('sport'));
    }

    /**
     * Show the form for editing the specified sport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $sport = Sport::findOrFail($id);
        

        return view('sports.edit', compact('sport'));
    }

    /**
     * Update the specified sport in the storage.
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
            
            $sport = Sport::findOrFail($id);
            $sport->update($data);

            return redirect()->route('sports.sport.index')
                ->with('success_message', 'Sport was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified sport from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $sport = Sport::findOrFail($id);
            $sport->delete();

            return redirect()->route('sports.sport.index')
                ->with('success_message', 'Sport was successfully deleted.');
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
