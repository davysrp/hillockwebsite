<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Http\Request;
use Exception;

class ProductFeaturesController extends Controller
{

    /**
     * Display a listing of the product features.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productFeatures = ProductFeature::with('product','feature')->paginate(25);

        return view('product_features.index', compact('productFeatures'));
    }

    /**
     * Show the form for creating a new product feature.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $products = Product::pluck('name','id')->all();
$features = Feature::pluck('name','id')->all();
        
        return view('product_features.create', compact('products','features'));
    }

    /**
     * Store a new product feature in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ProductFeature::create($data);

            return redirect()->route('product_features.product_feature.index')
                ->with('success_message', 'Product Feature was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product feature.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productFeature = ProductFeature::with('product','feature')->findOrFail($id);

        return view('product_features.show', compact('productFeature'));
    }

    /**
     * Show the form for editing the specified product feature.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productFeature = ProductFeature::findOrFail($id);
        $products = Product::pluck('name','id')->all();
$features = Feature::pluck('name','id')->all();

        return view('product_features.edit', compact('productFeature','products','features'));
    }

    /**
     * Update the specified product feature in the storage.
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
            
            $productFeature = ProductFeature::findOrFail($id);
            $productFeature->update($data);

            return redirect()->route('product_features.product_feature.index')
                ->with('success_message', 'Product Feature was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified product feature from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productFeature = ProductFeature::findOrFail($id);
            $productFeature->delete();

            return redirect()->route('product_features.product_feature.index')
                ->with('success_message', 'Product Feature was successfully deleted.');
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
            'feature_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
