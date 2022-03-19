<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Exception;

class PaymentsController extends Controller
{

    /**
     * Display a listing of the payments.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $payments = Payment::paginate(25);

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('payments.create');
    }

    /**
     * Store a new payment in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Payment::create($data);

            return redirect()->route('payments.payment.index')
                ->with('success_message', 'Payment was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified payment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified payment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        

        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified payment in the storage.
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
            
            $payment = Payment::findOrFail($id);
            $payment->update($data);

            return redirect()->route('payments.payment.index')
                ->with('success_message', 'Payment was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified payment from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();

            return redirect()->route('payments.payment.index')
                ->with('success_message', 'Payment was successfully deleted.');
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
                'api_url' => 'nullable|string|min:0|max:255',
            'name' => 'nullable|string|min:0|max:255',
            'api' => 'nullable',
            'secret' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
