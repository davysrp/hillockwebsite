<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Member;
use App\Models\MenuBar;
use App\Models\Package;
use App\Models\Product;
use App\Models\ProductAmenity;
use App\Models\ProductFeature;
use App\Models\ProductSecurity;
use App\Models\Province;
use App\Models\Room;
use App\Models\Spa;
use App\Models\User;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\SEOMeta;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Utils;

class FrontEndController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:member');
    }
    //
    public function index()
    {


       /* if (\Request::get('category')) {
            $products = Product::where('category_id', \Request::get('category'))
                ->orWhere('province_id', \Request::get('province'))
                ->paginate(12);
        }else{
            $products = Product::paginate(2);
        }*/
        $rooms = Room::all();
        $packages = Package::take(4)->get();
        $spa = MenuBar::whereSlug('wellness-spa')->first();
        $home= MenuBar::whereSlug('home')->first();


        return view('home',compact('rooms','packages','spa','home'));
    }

    public function welcome(Request $request)
    {
        if ($request->slug == 'home') {
            return \redirect()->to(route('home'));
        }else{
            $page = MenuBar::where('slug',$request->slug)->first();
            return view($page->view,compact('page'));
        }


    }

    public function menu($menu,$id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id',$id)->get();

        if ($category->slug == 'home') {
            return Redirect::to(route('home'));
        } else {
            return view('category', compact('category','products'));
        }
    }

    public function room($slug)
    {
        $room = Room::whereSlug($slug)->first();
        return view('room_detail',compact('room'));
    }
    public function package($slug)
    {
        $room = Package::whereSlug($slug)->first();
        return view('package_detail',compact('room'));
    }

    public function contact()
    {
//        $email;$comment;$captcha;
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
        $captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
        if(!$captcha){
            echo '
Please check the the captcha form.
';
            exit;
        }
        $secretKey = "6Le-i40eAAAAAOiu6xkf22MsjCTSXI4WqBpfNtKu";
        $ip = $_SERVER['REMOTE_ADDR'];

        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $secretKey, 'response' => $captcha);

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response,true);
        header('Content-type: application/json');
        if($responseKeys["success"]) {
            echo json_encode(array('success' => 'true'));
        } else {
            echo json_encode(array('success' => 'false'));
        }
    }

    public function spa($slug)
    {
        $spa = Spa::find($slug);
        return view('spa_detail',compact('spa'));
    }
}
