<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\cart;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\product_sold;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        $categories = Categories::all();
        return view('product.products',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image_name = time(). '.' .$request->image->getClientOriginalExtension();

        $products = new products;
        $products->name = request('name');
        $products->description = request('description');
        $products->price =  request('price');
        $products->image = $image_name;
        $products->status = "Not sold";
        $products->categories_id = request('category');
        $products->save();

        $request->image->move(public_path('uploads'),$image_name);

        return back()->with("success" , "product has been added successfully");
        // return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    public function shop(request $request)
    {
        $products = Products::all();
        $categories = Categories::all();
        return view('pages.shop',compact('categories','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::where('id',$id)->first();
        $categories = Categories::all();
        return view('product.edit',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        // $id = $request->id;
        $products = Products::find($request->id);
        
        $products->name = request('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->categories_id = $request->input('category');

        if($request->hasFile('image'))
        {
           
            $image_name = time(). '.' .$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$image_name);
            $products->image = $image_name;
        }
        $products->save();
        return redirect('/products')->with('success','product has been edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return back()->with('success','product has been deleted successfully');
    }

    public function addToCart(Products $products)
    {
        if(session()->has('cart')){
            $cart = new cart(session()->get('cart'));

        }else{
            $cart = new cart();
        }
        $cart->add($products);
        // dd($cart);
        session()->put('cart',$cart);
        return back()->with('success','product has been added');
    }

    public function update_cart(Request $request, Products $products)
    {
        $request->validate([
            'qty' => 'required|numeric|min:1',
        ]);

        $cart = new cart( session()->get('cart'));
        $cart->updateqty($products->id,$request->qty);
        session()->put('cart',$cart);
        return back()->with('success','product updated');
    }

    public function show_cart()
    {
        if(session()->has('cart')){
            $cart = new cart(session()->get('cart'));

        }else{
            $cart = null ;
        }
        return view('cart.show',compact('cart'));
    }

    public function cartproduct_delete(Products $products)
    {
        
        $cart = new cart( session()->get('cart') ); 
        $cart->remove($products->id);
         if($cart->totalqty <= 0)
         {
             session()->forget('cart');
         }else{
            session()->put('cart', $cart);
         }
         return back()->with('success','product has removed successfully');
    }

    public function checkout(Request $request, $amount)
    {
        return view('cart.checkout',compact('amount'));
    }
    public function charge(Request $request)
    {
        // dd($request->stripeToken);
        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'amount' => $request->amount,
            'description' => 'test from laravel new app'
        ]);

        $chargeID = $charge['id'];

        if($chargeID)
        {
            session()->forget('cart');

            $user = User::find(Auth::user()->id);
            $products = products::latest()->first();
            Notification::send($user, new \App\Notifications\product_sold($products));
            
            return redirect('/')->with('success','Payment completed successfully');
        }else{
            return back();
        }
    }

    public function sold_products()
    {
        // dd('samir');
        $products = Products::where('status', 'sold')->get();
        return view('product.sold_products',compact('products'));
    }

    public function not_sold_products()
    {
        // dd('samir');
        $products = Products::where('status', 'Not sold')->get();
        return view('product.not_sold_products',compact('products'));
    }

    public function status_edit(request $request)
    {
        $products = Products::find($request->id);

        if($request->status === "sold")
        {
            
            $products->status = "sold";
            $products->save();
        }
        elseif($request->status === "Not sold")
        {
            $products->status = "Not sold";
            $products->save();
        }
        return back()->with('success','status has changed');
    }

    public function MarkAsRead_all(request $request)
    {
        $userUnreadNotification = auth()->user()->UnreadNotifications;
        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }
    }

    public function discounts(Request $request , $id)
    {
       
        discounts::create([
            'discount' => $request->discount,
            'products_id' => $id,
           
        ]);
        session()->flash("success" , "Discount has been added");
        return back();
    }
}
