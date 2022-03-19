<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;
use Exception;

class SlotsController extends Controller
{

    /**
     * Display a listing of the slots.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $slots = Slot::paginate(25);

        return view('slots.index', compact('slots'));
    }

    /**
     * Show the form for creating a new slot.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('slots.create');
    }

    /**
     * Store a new slot in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Slot::create($data);

            return redirect()->route('slots.slot.index')
                ->with('success_message', 'Slot was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified slot.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $slot = Slot::findOrFail($id);

        return view('slots.show', compact('slot'));
    }

    /**
     * Show the form for editing the specified slot.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $slot = Slot::findOrFail($id);
        

        return view('slots.edit', compact('slot'));
    }

    /**
     * Update the specified slot in the storage.
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
            
            $slot = Slot::findOrFail($id);
            $slot->update($data);

            return redirect()->route('slots.slot.index')
                ->with('success_message', 'Slot was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified slot from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $slot = Slot::findOrFail($id);
            $slot->delete();

            return redirect()->route('slots.slot.index')
                ->with('success_message', 'Slot was successfully deleted.');
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
