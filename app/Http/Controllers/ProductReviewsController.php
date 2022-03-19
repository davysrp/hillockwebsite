<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class ProductReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the product reviews.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productReviews = ProductReview::with('user','product')->paginate(25);

        return view('product_reviews.index', compact('productReviews'));
    }

    /**
     * Show the form for creating a new product review.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
$products = Product::pluck('name','id')->all();

        return view('product_reviews.create', compact('users','products'));
    }

    /**
     * Store a new product review in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductReview::create($data);

            return redirect()->route('product_reviews.product_review.index')
                ->with('success_message', 'Product Review was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product review.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productReview = ProductReview::with('user','product')->findOrFail($id);

        return view('product_reviews.show', compact('productReview'));
    }

    /**
     * Show the form for editing the specified product review.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productReview = ProductReview::findOrFail($id);
        $users = User::pluck('name','id')->all();
$products = Product::pluck('name','id')->all();

        return view('product_reviews.edit', compact('productReview','users','products'));
    }

    /**
     * Update the specified product review in the storage.
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

            $productReview = ProductReview::findOrFail($id);
            $productReview->update($data);

            return redirect()->route('product_reviews.product_review.index')
                ->with('success_message', 'Product Review was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product review from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productReview = ProductReview::findOrFail($id);
            $productReview->delete();

            return redirect()->route('product_reviews.product_review.index')
                ->with('success_message', 'Product Review was successfully deleted.');
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
                'star' => 'nullable|string|min:0|max:255',
            'user_id' => 'nullable',
            'product_id' => 'nullable',
            'comment' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
