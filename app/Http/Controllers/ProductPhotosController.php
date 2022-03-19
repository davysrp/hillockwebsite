<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Exception;

class ProductPhotosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the product photos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productPhotos = ProductPhoto::with('product')->paginate(25);

        return view('product_photos.index', compact('productPhotos'));
    }

    /**
     * Show the form for creating a new product photo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $products = Product::pluck('name','id')->all();

        return view('product_photos.create', compact('products'));
    }

    /**
     * Store a new product photo in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductPhoto::create($data);

            return redirect()->route('product_photos.product_photo.index')
                ->with('success_message', 'Product Photo was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product photo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productPhoto = ProductPhoto::with('product')->findOrFail($id);

        return view('product_photos.show', compact('productPhoto'));
    }

    /**
     * Show the form for editing the specified product photo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productPhoto = ProductPhoto::findOrFail($id);
        $products = Product::pluck('name','id')->all();

        return view('product_photos.edit', compact('productPhoto','products'));
    }

    /**
     * Update the specified product photo in the storage.
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

            $productPhoto = ProductPhoto::findOrFail($id);
            $productPhoto->update($data);

            return redirect()->route('product_photos.product_photo.index')
                ->with('success_message', 'Product Photo was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product photo from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productPhoto = ProductPhoto::findOrFail($id);
            $productPhoto->delete();

            return redirect()->route('product_photos.product_photo.index')
                ->with('success_message', 'Product Photo was successfully deleted.');
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
            'photo' => 'nullable|file|string|min:0|max:255',
            'status' => 'nullable|string|min:0|max:255',
            'description' => 'nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
