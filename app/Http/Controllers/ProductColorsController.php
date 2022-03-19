<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Exception;

class ProductColorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the product colors.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productColors = ProductColor::with('product')->paginate(25);

        return view('product_colors.index', compact('productColors'));
    }

    /**
     * Show the form for creating a new product color.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $products = Product::pluck('name','id')->all();

        return view('product_colors.create', compact('products'));
    }

    /**
     * Store a new product color in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductColor::create($data);

            return redirect()->route('product_colors.product_color.index')
                ->with('success_message', 'Product Color was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product color.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productColor = ProductColor::with('product')->findOrFail($id);

        return view('product_colors.show', compact('productColor'));
    }

    /**
     * Show the form for editing the specified product color.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productColor = ProductColor::findOrFail($id);
        $products = Product::pluck('name','id')->all();

        return view('product_colors.edit', compact('productColor','products'));
    }

    /**
     * Update the specified product color in the storage.
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

            $productColor = ProductColor::findOrFail($id);
            $productColor->update($data);

            return redirect()->route('product_colors.product_color.index')
                ->with('success_message', 'Product Color was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product color from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productColor = ProductColor::findOrFail($id);
            $productColor->delete();

            return redirect()->route('product_colors.product_color.index')
                ->with('success_message', 'Product Color was successfully deleted.');
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
                'color' => 'nullable|string|min:0|max:255',
            'product_id' => 'nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
