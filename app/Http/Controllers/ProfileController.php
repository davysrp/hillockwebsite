<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Product;
use App\Models\ProductAmenity;
use App\Models\ProductFeature;
use App\Models\ProductPhoto;
use App\Models\ProductSecurity;
use App\Models\ProductView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:member');
    }

    //
    public function userprofile()
    {
        return view('userprofile.userprofile');
    }

    public function dashboard()
    {
        return view('userprofile.dashboard');
    }

    public function useredit()
    {
        return view('userprofile.edituser');
    }

    public function wishlist()
    {
        return view('userprofile.wishlist');
    }

    public function review()
    {
        return view('userprofile.productreview');
    }

    public function order()
    {
        return view('userprofile.order');
    }

    public function checkout()
    {
        return view('userprofile.checkout ');
    }

    public function checkoutpay()
    {
        return view('userprofile.checkout-pay ');
    }

    public function addcart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updatecard(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removecard(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function logout()
    {
        if (Auth::guard('member')->check()) {
            Auth::guard('member')->logout();
            return redirect()->route('home');
        }

    }

    public function userproperty()
    {
        return view('userprofile.property');
    }

    public function addproperty()
    {
        return view('userprofile.add');
    }

    public function saveProperty(Request $request)
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
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
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



            return redirect()->back()
                ->with('success_message', 'ព័ត៌មានត្រូវបានបង្កើត');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function editproperty($id)
    {

        $product = Product::find($id);
        $amenity = ProductAmenity::where('product_id',$id)->get();

        return view('userprofile.edit',compact('product','amenity'));

    }


    public function updateproperty($id, Request $request)
    {
        try {

            $data = $this->getDataUpdate($request);

            $product = Product::findOrFail($id);
             if ($request->photo != '') {
                 $path = public_path()."/image/product/".$product->photo;
                 unlink($path);
             }
            $product->update($data);

            $amenity = $request->input('amenity');
            $security = $request->input('security');
            $view = $request->input('view');
            $feature = $request->input('feature');


            ProductFeature::where('product_id',$id)->delete();
            ProductView::where('product_id',$id)->delete();
            ProductFeature::where('product_id',$id)->delete();
            ProductAmenity::where('product_id',$id)->delete();

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

            return redirect()->back()
                ->with('success_message', 'ព័ត៌មានត្រូវបានកែប្រែ');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

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

        $data = $request->validate($rules,$customMessages);

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

        $data = $request->validate($rules,$customMessages);

        if ($image = $request->file('photo')) {
            $destinationPath = 'image/product/';
            $profileImage =rand(0, 99999).date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }


        return $data;
    }

    public function removeProperty($id)
    {
        try {
            $product = Product::findOrFail($id);
            $path = public_path() . "/image/product/" . $product->photo;
            if (file_exists($path)) {
                unlink($path);
            }
            $product->delete();

            return redirect()->back()
                ->with('success_message', 'ត្រូវបានលុប');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
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

    public function updateuserprofile($id,Request $request)
    {
        $member = Member::find($id);
        $member->update($request->all());
        return Redirect::back();

    }
    public function updatepassword($id,Request $request)
    {
        $member = Member::find($id);
        $member->update([
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);
        return Redirect::back();
    }

}
