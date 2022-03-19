<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Exception;

class BanksController extends Controller
{

    /**
     * Display a listing of the banks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $banks = Bank::paginate(25);

        return view('banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new bank.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('banks.create');
    }

    /**
     * Store a new bank in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Bank::create($data);

            return redirect()->route('banks.bank.index')
                ->with('success_message', 'Bank was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified bank.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $bank = Bank::findOrFail($id);

        return view('banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified bank.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        

        return view('banks.edit', compact('bank'));
    }

    /**
     * Update the specified bank in the storage.
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
            
            $bank = Bank::findOrFail($id);
            $bank->update($data);

            return redirect()->route('banks.bank.index')
                ->with('success_message', 'Bank was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified bank from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bank = Bank::findOrFail($id);
            $bank->delete();

            return redirect()->route('banks.bank.index')
                ->with('success_message', 'Bank was successfully deleted.');
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
