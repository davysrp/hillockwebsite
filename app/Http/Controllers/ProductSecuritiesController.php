<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSecurity;
use App\Models\Security;
use Illuminate\Http\Request;
use Exception;

class ProductSecuritiesController extends Controller
{

    /**
     * Display a listing of the product securities.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productSecurities = ProductSecurity::with('product','security')->paginate(25);

        return view('product_securities.index', compact('productSecurities'));
    }

    /**
     * Show the form for creating a new product security.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $products = Product::pluck('name','id')->all();
$securities = Security::pluck('name','id')->all();
        
        return view('product_securities.create', compact('products','securities'));
    }

    /**
     * Store a new product security in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ProductSecurity::create($data);

            return redirect()->route('product_securities.product_security.index')
                ->with('success_message', 'Product Security was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product security.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productSecurity = ProductSecurity::with('product','security')->findOrFail($id);

        return view('product_securities.show', compact('productSecurity'));
    }

    /**
     * Show the form for editing the specified product security.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productSecurity = ProductSecurity::findOrFail($id);
        $products = Product::pluck('name','id')->all();
$securities = Security::pluck('name','id')->all();

        return view('product_securities.edit', compact('productSecurity','products','securities'));
    }

    /**
     * Update the specified product security in the storage.
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
            
            $productSecurity = ProductSecurity::findOrFail($id);
            $productSecurity->update($data);

            return redirect()->route('product_securities.product_security.index')
                ->with('success_message', 'Product Security was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified product security from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productSecurity = ProductSecurity::findOrFail($id);
            $productSecurity->delete();

            return redirect()->route('product_securities.product_security.index')
                ->with('success_message', 'Product Security was successfully deleted.');
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
            'security_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
