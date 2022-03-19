<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Http\Request;
use Exception;

class ViewsController extends Controller
{

    /**
     * Display a listing of the views.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $views = View::paginate(25);

        return view('views.index', compact('views'));
    }

    /**
     * Show the form for creating a new view.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('views.create');
    }

    /**
     * Store a new view in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            View::create($data);

            return redirect()->route('views.view.index')
                ->with('success_message', 'View was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified view.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $view = View::findOrFail($id);

        return view('views.show', compact('view'));
    }

    /**
     * Show the form for editing the specified view.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $view = View::findOrFail($id);
        

        return view('views.edit', compact('view'));
    }

    /**
     * Update the specified view in the storage.
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
            
            $view = View::findOrFail($id);
            $view->update($data);

            return redirect()->route('views.view.index')
                ->with('success_message', 'View was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified view from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $view = View::findOrFail($id);
            $view->delete();

            return redirect()->route('views.view.index')
                ->with('success_message', 'View was successfully deleted.');
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
