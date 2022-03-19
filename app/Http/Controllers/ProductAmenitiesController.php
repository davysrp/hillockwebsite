<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Product;
use App\Models\ProductAmenity;
use Illuminate\Http\Request;
use Exception;

class ProductAmenitiesController extends Controller
{

    /**
     * Display a listing of the product amenities.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productAmenities = ProductAmenity::with('product','amenity')->paginate(25);

        return view('product_amenities.index', compact('productAmenities'));
    }

    /**
     * Show the form for creating a new product amenity.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $products = Product::pluck('name','id')->all();
$amenities = Amenity::pluck('name','id')->all();
        
        return view('product_amenities.create', compact('products','amenities'));
    }

    /**
     * Store a new product amenity in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ProductAmenity::create($data);

            return redirect()->route('product_amenities.product_amenity.index')
                ->with('success_message', 'Product Amenity was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product amenity.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productAmenity = ProductAmenity::with('product','amenity')->findOrFail($id);

        return view('product_amenities.show', compact('productAmenity'));
    }

    /**
     * Show the form for editing the specified product amenity.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productAmenity = ProductAmenity::findOrFail($id);
        $products = Product::pluck('name','id')->all();
$amenities = Amenity::pluck('name','id')->all();

        return view('product_amenities.edit', compact('productAmenity','products','amenities'));
    }

    /**
     * Update the specified product amenity in the storage.
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
            
            $productAmenity = ProductAmenity::findOrFail($id);
            $productAmenity->update($data);

            return redirect()->route('product_amenities.product_amenity.index')
                ->with('success_message', 'Product Amenity was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified product amenity from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productAmenity = ProductAmenity::findOrFail($id);
            $productAmenity->delete();

            return redirect()->route('product_amenities.product_amenity.index')
                ->with('success_message', 'Product Amenity was successfully deleted.');
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
            'amenity_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
