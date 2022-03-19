<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAmenity;
use App\Models\ProductFeature;
use App\Models\ProductPhoto;
use App\Models\ProductSecurity;
use App\Models\ProductView;
use App\Models\Province;
use Illuminate\Http\Request;
use Exception;

class ProductsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the products.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with('category')->paginate(25);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $provinces = Province::pluck('name_kh', 'id')->all();
        return view('products.create', compact('categories', 'provinces'));
    }

    /**
     * Store a new product in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            $product = Product::create($data);

            $amenity = $request->input('amenity');
            $security = $request->input('security');
            $view = $request->input('view');
            $feature = $request->input('feature');

            if ($request->hasfile('photo_details')) {
                $images = $request->file('photo_details');

                foreach($images as $image) {

                    $destinationPath = 'image/product/';
                    $profileImage = rand(0, 99999).date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);

                    ProductPhoto::create([
                        'product_id'=>$product->id,
                        'photo'=>$profileImage,
                    ]);


                }
            }



            if ($amenity != null) {
                foreach ($amenity as $item) {
                    $count = ProductAmenity::where('amenity_id', $item)->where('product_id', $product->id)->count();
                    if ($count == 0) {
                        ProductAmenity::create([
                            'product_id' => $product->id,
                            'amenity_id' => $item
                        ]);
                    }
                }
            }
            if ($security != null) {
                foreach ($security as $item) {
                    $count = ProductSecurity::where('security_id', $item)->where('product_id', $product->id)->count();
                    if ($count == 0) {
                        ProductSecurity::create([
                            'product_id' => $product->id,
                            'security_id' => $item
                        ]);
                    }
                }
            }
            if ($view != null) {
                foreach ($view as $item) {
                    $count = ProductView::where('view_id', $item)->where('product_id', $product->id)->count();
                    if ($count == 0) {
                        ProductView::create([
                            'product_id' => $product->id,
                            'view_id' => $item
                        ]);
                    }
                }
            }
            if ($feature != null) {
                foreach ($feature as $item) {
                    $count = ProductFeature::where('feature_id', $item)->where('product_id', $product->id)->count();
                    if ($count == 0) {
                        ProductFeature::create([
                            'product_id' => $product->id,
                            'feature_id' => $item
                        ]);
                    }
                }
            }



            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        $provinces = Province::pluck('name_kh', 'id')->all();

        return view('products.edit', compact('product', 'categories', 'provinces'));
    }

    /**
     * Update the specified product in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getDataUpdate($request);

            $product = Product::findOrFail($id);
            if ($request->photo != '') {
                $path = public_path() . "/image/product/" . $product->photo;
                unlink($path);
            }
            $product->update($data);

            $amenity = $request->input('amenity');
            $security = $request->input('security');
            $view = $request->input('view');
            $feature = $request->input('feature');


            ProductFeature::where('product_id', $id)->delete();
            ProductView::where('product_id', $id)->delete();
            ProductFeature::where('product_id', $id)->delete();
            ProductAmenity::where('product_id', $id)->delete();

            if ($amenity != null) {
                foreach ($amenity as $item) {
                    $count = ProductAmenity::where('amenity_id', $item)->where('product_id', $product->id)->count();
                    if ($count == 0) {
                        ProductAmenity::create([
                            'product_id' => $product->id,
                            'amenity_id' => $item
                        ]);
                    }
                }
            }
            if ($security != null) {
                foreach ($security as $item) {
                    $count = ProductSecurity::where('security_id', $item)->where('product_id', $product->id)->count();
                    if ($count == 0) {
                        ProductSecurity::create([
                            'product_id' => $product->id,
                            'security_id' => $item
                        ]);
                    }
                }
            }
            if ($view != null) {
                foreach ($view as $item) {
                    $count = ProductView::where('view_id', $item)->where('product_id', $product->id)->count();
                    if ($count == 0) {
                        ProductView::create([
                            'product_id' => $product->id,
                            'view_id' => $item
                        ]);
                    }
                }
            }
            if ($feature != null) {
                foreach ($feature as $item) {
                    $count = ProductFeature::where('feature_id', $item)->where('product_id', $product->id)->count();
                    if ($count == 0) {
                        ProductFeature::create([
                            'product_id' => $product->id,
                            'feature_id' => $item
                        ]);
                    }
                }
            }


            if ($request->hasfile('photo_details')) {
                $images = $request->file('photo_details');

                foreach ($images as $image) {

                    $destinationPath = 'image/product/';
                    $profileImage = rand(0, 99999).date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);

                    ProductPhoto::create([
                        'product_id' => $product->id,
                        'photo' => $profileImage,
                    ]);


                }
            }

            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }

    }

    /**
     * Remove the specified product from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $path = public_path() . "/image/product/" . $product->photo;
            if (file_exists($path)) {
                unlink($path);
            }
            $product->delete();

            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully deleted.');
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
            'name_kh' => 'required|string|min:0|max:255',
            'category_id' => 'required|nullable',
            'province_id' => 'required|nullable',
            'type_id' => 'required|nullable',
            'bedroom' => 'nullable',
            'bath' => 'nullable',
            'livingroom' => 'nullable',
            'parking' => 'nullable',
            'land_area' => 'required|nullable',
            'remark' => 'nullable',
            'floor_number' => 'nullable',
            'district_id' => 'required|nullable',
            'commune_id' => 'required|nullable',
            'village_id' => 'required|nullable',
            'street' => 'required|nullable',
            'slug' => 'nullable|string|min:0|max:255',
            'code' => 'nullable|string|min:0|max:255',
            'price' => 'required|nullable|numeric',
            'description' => 'nullable|string',
            'map' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];


        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $data = $request->validate($rules, $customMessages);

        if ($image = $request->file('photo')) {
            $destinationPath = 'image/product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }


        return $data;
    }

    protected function getDataUpdate(Request $request)
    {
        $rules = [
            'name' => 'nullable|string|min:0|max:255',
            'name_kh' => 'required|string|min:0|max:255',
            'category_id' => 'required|nullable',
            'province_id' => 'required|nullable',
            'type_id' => 'required|nullable',
            'bedroom' => 'nullable',
            'bath' => 'nullable',
            'livingroom' => 'nullable',
            'parking' => 'nullable',
            'land_area' => 'required|nullable',
            'remark' => 'nullable',
            'floor_number' => 'nullable',
            'district_id' => 'required|nullable',
            'commune_id' => 'required|nullable',
            'village_id' => 'required|nullable',
            'street' => 'required|nullable',
            'slug' => 'nullable|string|min:0|max:255',
            'code' => 'nullable|string|min:0|max:255',
            'price' => 'required|nullable|numeric',
            'description' => 'nullable|string',
            'map' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];


        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $data = $request->validate($rules, $customMessages);

        if ($image = $request->file('photo')) {
            $destinationPath = 'image/product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }


        return $data;
    }
    public function removePhoto($id)
    {
        $product = ProductPhoto::findOrFail($id);
        $path = public_path() . "/image/product/" . $product->photo;
        if (file_exists($path)) {
            unlink($path);
        }
        $product->delete();

        return redirect()->back()
            ->with('success_message', 'ត្រូវបានលុប');
    }

}
