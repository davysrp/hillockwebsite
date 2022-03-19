<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\View;
use Illuminate\Http\Request;
use Exception;

class ProductViewsController extends Controller
{

    /**
     * Display a listing of the product views.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productViews = ProductView::with('product','view')->paginate(25);

        return view('product_views.index', compact('productViews'));
    }

    /**
     * Show the form for creating a new product view.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Products = Product::pluck('name','id')->all();
$Views = View::pluck('name','id')->all();
        
        return view('product_views.create', compact('Products','Views'));
    }

    /**
     * Store a new product view in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ProductView::create($data);

            return redirect()->route('product_views.product_view.index')
                ->with('success_message', 'Product View was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product view.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productView = ProductView::with('product','view')->findOrFail($id);

        return view('product_views.show', compact('productView'));
    }

    /**
     * Show the form for editing the specified product view.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productView = ProductView::findOrFail($id);
        $Products = Product::pluck('name','id')->all();
$Views = View::pluck('name','id')->all();

        return view('product_views.edit', compact('productView','Products','Views'));
    }

    /**
     * Update the specified product view in the storage.
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
            
            $productView = ProductView::findOrFail($id);
            $productView->update($data);

            return redirect()->route('product_views.product_view.index')
                ->with('success_message', 'Product View was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified product view from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productView = ProductView::findOrFail($id);
            $productView->delete();

            return redirect()->route('product_views.product_view.index')
                ->with('success_message', 'Product View was successfully deleted.');
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
                'product_id' => 'nullable',
            'view_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
