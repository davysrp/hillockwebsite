<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Exception;

class CouponsController extends Controller
{

    /**
     * Display a listing of the coupons.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $coupons = Coupon::paginate(25);

        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new coupon.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        $categories = Category::pluck('name','id')->all();
        return view('coupons.create',compact('categories'));
    }

    /**
     * Store a new coupon in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Coupon::create($data);

            return redirect()->route('coupons.coupon.index')
                ->with('success_message', 'Coupon was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified coupon.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified coupon.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('coupons.edit', compact('coupon','categories'));
    }

    /**
     * Update the specified coupon in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
       /* try {

            $data = $this->getData($request);

            $coupon = Coupon::findOrFail($id);
            $coupon->update($data);

            return redirect()->route('coupons.coupon.index')
                ->with('success_message', 'Coupon was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }*/
        $data = $this->getData($request);

        $coupon = Coupon::findOrFail($id);
        $coupon->update($data);
        return redirect()->route('coupons.coupon.index')
            ->with('success_message', 'Coupon was successfully updated.');
    }

    /**
     * Remove the specified coupon from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();

            return redirect()->route('coupons.coupon.index')
                ->with('success_message', 'Coupon was successfully deleted.');
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
            'discount' => 'nullable|numeric|string|min:0|max:255',
            'status' => 'nullable|string|min:0|max:255',
            'end_date' => 'required',
            'start_date' => 'required',
            'category_id' => 'nullable',
            'type' => 'required',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
