<?php

namespace App\Http\Controllers\front;

use App\Ad;
use App\Banner;
use App\Category;
use App\Helpers\cart;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchlist;
use App\Slider;
use App\User;
use App\Userlist;
use App\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $sliders = Slider::with('photo')->where('distribute', 'انتشار')->get();
        $banners = Banner::with('photo')->where('distribute', 'انتشار')->get();
        $products = Product::with('photos', 'attributevalus', 'categories')->where('distribute', 'انتشار')->get();
        $ads = Ad::with('photo')->where('distribute', 'انتشار')->get();
        return view('front.index', compact('navcategories', 'maincategories', 'subcategories', 'sliders', 'banners', 'products', 'ads'));
    }

    public function about()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        return view('front.about', compact('navcategories', 'maincategories', 'subcategories'));
    }

    public function cart()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return view('front.cart', compact('navcategories', 'maincategories', 'subcategories', 'cart'));
    }

    public function category($id, $sort = 0)
    {
        $categoryId = Category::where('title', $id)->first()->id;
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $categories = Category::with('products')->find($categoryId)->products->pluck('id')->toArray();
        $title = Category::find($categoryId);
        if ($sort == 2) {
            $products = Product::with('photos', 'categories')->whereIn('id', $categories)
                ->orderBy('price', 'asc')
                ->get();
        }
        if ($sort == 1) {
            $products = Product::with('photos', 'categories')->whereIn('id', $categories)
                ->orderBy('price', 'desc')
                ->get();
        }
        if ($sort == 3) {
            $products = Product::with('photos', 'categories')->whereIn('id', $categories)
                ->orderBy('exist', 'desc')
                ->get();
        }
        if ($sort == 0) {
            $products = Product::with('photos', 'categories')->whereIn('id', $categories)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('front.category', compact('navcategories', 'maincategories', 'subcategories', 'products', 'title', 'response'));
    }

    public function checkout()
    {
        if (!auth()->user())
            return redirect()->route('login');

        $user = User::find(auth()->user()->id);
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return view('front.checkout', compact('navcategories', 'maincategories', 'subcategories', 'user', 'cart'));
    }

    public function contact()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        return view('front.contact', compact('navcategories', 'maincategories', 'subcategories'));
    }

    public function fag()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        return view('front.fag', compact('navcategories', 'maincategories', 'subcategories'));
    }

    public function product($slug)
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $product = Product::with('categories', 'photos', 'attributevalus')->where('slug', $slug)->first();
        $categoryIds = $product->categories->pluck('id')->toArray();
        $relatedProducts = Product::with('categories', 'photos')->whereHas('categories', function ($q) use ($categoryIds) {
            $q->whereIn('categories.id', $categoryIds);
        })->get();
        return view('front.product', compact('navcategories', 'maincategories', 'subcategories', 'product', 'relatedProducts'));
    }

    public function addcart(Request $request, $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new  cart($oldcart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return back();
    }

    public function removeproduct(Request $request, $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($cart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);
        unset($cart->items[$id]);
        return back();
    }

    public function addqty(Request $request, $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($cart);
        $cart->addnumber($product, $product->id, $request->quantity);
        $request->session()->put('cart', $cart);

        return back();
    }

    public function updateuser(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->save();

        $userlist = new Userlist();
        $userlist->user_id = auth()->user()->id;
        $userlist->factor = $this->factor();
        $userlist->totalprice = Session::get('cart')->totalPrice;
        $userlist->receiveprice = $request->send;
        $userlist->save();

        foreach (Session::get('cart')->items as $person) {
            $purchlist = Purchlist::create([
                'product_id' => $person['item']->id,
                'count' => $person['qty'],
                'price' => $person['price'],
            ]);
            $purchlist->factor_number = $userlist->id;
            $purchlist->save();
        }

        return redirect()->route('pay');
    }

    public function factor()
    {
        $number = rand(10000, 99999);
        if ($this->checkfactor($number)) {
            return $this->factor();
        }
        return $number;
    }

    public function checkfactor($number)
    {
        return Userlist::where('factor', $number)->exists();
    }

    public function profile()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        return view('front.profile', compact('navcategories', 'maincategories', 'subcategories'));
    }

    public function message(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha',
            'email' => 'required|email',
            'description' => 'required',
        ],[
            'g-recaptcha-response.required' => 'لطفا اعتبار سنجی کنید',
            'g-recaptcha-response.captcha' => 'مشکل در کپچرا.لطفا بعدا امتحان کنید.',
            'emai.required' => 'لطفا ایمیل خود را وارد کنید.',
            'emai.email' => 'لطفا ایمیل معتبر وارد کنید.',
            'description.required' => 'لطفا متن خود را وارد کنید.',
        ]);
        $validator->validate();

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->description = $request->description;
        $message->type = "get";
        $message->save();

        Session::flash('message', ' با تشکر از شما، نظر شما ارسال شد.');

        return back();
    }

    public function messageApi()
    {
        $message = Message::where('type','public')->latest('created_at');
        return response()->json($message, 200);
    }

}
