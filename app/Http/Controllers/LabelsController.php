<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;
use Exception;

class LabelsController extends Controller
{

    /**
     * Display a listing of the labels.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $labels = Label::paginate(25);

        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new label.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('labels.create');
    }

    /**
     * Store a new label in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Label::create($data);

            return redirect()->route('labels.label.index')
                ->with('success_message', 'Label was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified label.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $label = Label::findOrFail($id);

        return view('labels.show', compact('label'));
    }

    /**
     * Show the form for editing the specified label.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $label = Label::findOrFail($id);
        

        return view('labels.edit', compact('label'));
    }

    /**
     * Update the specified label in the storage.
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
            
            $label = Label::findOrFail($id);
            $label->update($data);

            return redirect()->route('labels.label.index')
                ->with('success_message', 'Label was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified label from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $label = Label::findOrFail($id);
            $label->delete();

            return redirect()->route('labels.label.index')
                ->with('success_message', 'Label was successfully deleted.');
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
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
