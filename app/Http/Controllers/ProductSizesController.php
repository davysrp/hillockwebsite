<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Exception;

class ProductSizesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the product sizes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productSizes = ProductSize::with('product')->paginate(25);

        return view('product_sizes.index', compact('productSizes'));
    }

    /**
     * Show the form for creating a new product size.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $products = Product::pluck('name','id')->all();

        return view('product_sizes.create', compact('products'));
    }

    /**
     * Store a new product size in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductSize::create($data);

            return redirect()->route('product_sizes.product_size.index')
                ->with('success_message', 'Product Size was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product size.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productSize = ProductSize::with('product')->findOrFail($id);

        return view('product_sizes.show', compact('productSize'));
    }

    /**
     * Show the form for editing the specified product size.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productSize = ProductSize::findOrFail($id);
        $products = Product::pluck('name','id')->all();

        return view('product_sizes.edit', compact('productSize','products'));
    }

    /**
     * Update the specified product size in the storage.
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

            $productSize = ProductSize::findOrFail($id);
            $productSize->update($data);

            return redirect()->route('product_sizes.product_size.index')
                ->with('success_message', 'Product Size was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product size from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productSize = ProductSize::findOrFail($id);
            $productSize->delete();

            return redirect()->route('product_sizes.product_size.index')
                ->with('success_message', 'Product Size was successfully deleted.');
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
                'size' => 'nullable|string|min:0|max:255',
            'product_id' => 'nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
