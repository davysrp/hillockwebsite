<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Exception;

class WithdrawsController extends Controller
{

    /**
     * Display a listing of the withdraws.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $withdraws = Withdraw::with('approveby','bank')->paginate(25);

        return view('withdraws.index', compact('withdraws'));
    }

    /**
     * Show the form for creating a new withdraw.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $approveBies = User::where('type','admin')->pluck('name','id')->all();
$banks = Bank::pluck('name','id')->all();

        return view('withdraws.create', compact('approveBies','banks'));
    }

    /**
     * Store a new withdraw in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Withdraw::create($data);

            return redirect()->route('withdraws.withdraw.index')
                ->with('success_message', 'Withdraw was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified withdraw.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $withdraw = Withdraw::with('approveby','bank')->findOrFail($id);

        return view('withdraws.show', compact('withdraw'));
    }

    /**
     * Show the form for editing the specified withdraw.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $approveBies = ApproveBy::pluck('id','id')->all();
$banks = Bank::pluck('name','id')->all();

        return view('withdraws.edit', compact('withdraw','approveBies','banks'));
    }

    /**
     * Update the specified withdraw in the storage.
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

            $withdraw = Withdraw::findOrFail($id);
            $withdraw->update($data);

            return redirect()->route('withdraws.withdraw.index')
                ->with('success_message', 'Withdraw was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified withdraw from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $withdraw = Withdraw::findOrFail($id);
            $withdraw->delete();

            return redirect()->route('withdraws.withdraw.index')
                ->with('success_message', 'Withdraw was successfully deleted.');
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
            'status' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
