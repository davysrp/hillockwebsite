<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApproveBy;
use App\Models\Balance;
use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class BalancesController extends Controller
{

    /**
     * Display a listing of the balances.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $balances = Balance::with('approveby','bank')->paginate(25);

        return view('balances.index', compact('balances'));
    }

    /**
     * Show the form for creating a new balance.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $approveBies = User::where('type','admin')->pluck('name','id')->all();
$banks = Bank::pluck('name','id')->all();

        return view('balances.create', compact('approveBies','banks'));
    }

    /**
     * Store a new balance in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Balance::create($data);

            return redirect()->route('balances.balance.index')
                ->with('success_message', 'Balance was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified balance.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $balance = Balance::with('approveby','bank')->findOrFail($id);

        return view('balances.show', compact('balance'));
    }

    /**
     * Show the form for editing the specified balance.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $balance = Balance::findOrFail($id);
        $approveBies = ApproveBy::pluck('id','id')->all();
$banks = Bank::pluck('name','id')->all();

        return view('balances.edit', compact('balance','approveBies','banks'));
    }

    /**
     * Update the specified balance in the storage.
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

            $balance = Balance::findOrFail($id);
            $balance->update($data);

            return redirect()->route('balances.balance.index')
                ->with('success_message', 'Balance was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified balance from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $balance = Balance::findOrFail($id);
            $balance->delete();

            return redirect()->route('balances.balance.index')
                ->with('success_message', 'Balance was successfully deleted.');
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
                'ipaddress' => 'nullable|string|min:0|max:255',
            'topup_date' => 'nullable|string|min:0',
            'approve_date' => 'nullable|string|min:0',
            'approve_by' => 'nullable',
            'bank_id' => 'nullable',
            'bank_name' => 'nullable|string|min:0|max:255',
            'bank_number' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'amount' => 'nullable|numeric|min:-9|max:9',
            'remark' => 'nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
