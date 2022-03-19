<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Models\Results;
use App\Models\Type;
use Illuminate\Http\Request;
use Exception;

class ResultsController extends Controller
{

    /**
     * Display a listing of the results.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $resultsObjects = Results::with('label','type')->paginate(25);

        return view('results.index', compact('resultsObjects'));
    }

    /**
     * Show the form for creating a new results.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $labels = Label::pluck('name','id')->all();
$types = Type::pluck('name','id')->all();
        
        return view('results.create', compact('labels','types'));
    }

    /**
     * Store a new results in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Results::create($data);

            return redirect()->route('results.results.index')
                ->with('success_message', 'Results was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified results.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $results = Results::with('label','type')->findOrFail($id);

        return view('results.show', compact('results'));
    }

    /**
     * Show the form for editing the specified results.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $results = Results::findOrFail($id);
        $labels = Label::pluck('name','id')->all();
$types = Type::pluck('name','id')->all();

        return view('results.edit', compact('results','labels','types'));
    }

    /**
     * Update the specified results in the storage.
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
            
            $results = Results::findOrFail($id);
            $results->update($data);

            return redirect()->route('results.results.index')
                ->with('success_message', 'Results was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified results from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $results = Results::findOrFail($id);
            $results->delete();

            return redirect()->route('results.results.index')
                ->with('success_message', 'Results was successfully deleted.');
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
                'label_id' => 'nullable',
            'type_id' => 'nullable',
            'dates' => 'nullable|string|min:0',
            'one_digit' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'two_digit' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'three_digit' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'status' => 'nullable|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
