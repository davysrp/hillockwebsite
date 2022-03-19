<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LotteryPrize;
use Illuminate\Http\Request;
use Exception;

class LotteryPrizesController extends Controller
{

    /**
     * Display a listing of the lottery prizes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $lotteryPrizes = LotteryPrize::paginate(25);

        return view('lottery_prizes.index', compact('lotteryPrizes'));
    }

    /**
     * Show the form for creating a new lottery prize.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('lottery_prizes.create');
    }

    /**
     * Store a new lottery prize in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            LotteryPrize::create($data);

            return redirect()->route('lottery_prizes.lottery_prize.index')
                ->with('success_message', 'Lottery Prize was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified lottery prize.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $lotteryPrize = LotteryPrize::findOrFail($id);

        return view('lottery_prizes.show', compact('lotteryPrize'));
    }

    /**
     * Show the form for editing the specified lottery prize.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $lotteryPrize = LotteryPrize::findOrFail($id);
        

        return view('lottery_prizes.edit', compact('lotteryPrize'));
    }

    /**
     * Update the specified lottery prize in the storage.
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
            
            $lotteryPrize = LotteryPrize::findOrFail($id);
            $lotteryPrize->update($data);

            return redirect()->route('lottery_prizes.lottery_prize.index')
                ->with('success_message', 'Lottery Prize was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified lottery prize from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $lotteryPrize = LotteryPrize::findOrFail($id);
            $lotteryPrize->delete();

            return redirect()->route('lottery_prizes.lottery_prize.index')
                ->with('success_message', 'Lottery Prize was successfully deleted.');
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
                'digit' => 'nullable|string|min:0|max:255',
            'prize' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'wine' => 'nullable|numeric|min:-2147483648|max:2147483647', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
