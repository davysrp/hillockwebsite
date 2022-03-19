<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Exception;

class TypesController extends Controller
{

    /**
     * Display a listing of the types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $types = Type::paginate(25);

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('types.create');
    }

    /**
     * Store a new type in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Type::create($data);

            return redirect()->route('types.type.index')
                ->with('success_message', 'Type was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $type = Type::findOrFail($id);

        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        

        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified type in the storage.
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
            
            $type = Type::findOrFail($id);
            $type->update($data);

            return redirect()->route('types.type.index')
                ->with('success_message', 'Type was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified type from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $type = Type::findOrFail($id);
            $type->delete();

            return redirect()->route('types.type.index')
                ->with('success_message', 'Type was successfully deleted.');
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
            'closing_time' => 'nullable|string|min:0',
            'code' => 'nullable|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
