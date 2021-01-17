<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;
use App\User;

//- проба залить 

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
    	$products = Product::with('category')->where('recommended', 1)->paginate(8);
        $reviews = Review::orderBy('created_at', 'DESC')->paginate(5);
    	return view('main.index', compact('categories', 'products', 'reviews'));
    }
    public function category(string $slug)
    {
    	$category = Category::firstWhere('slug', $slug);
    	$products = Product::where('category_id', $category->id)->paginate(8);
    	return view('shop.category', compact('category', 'products'));
    }

    public function contacts()
    {
        $title = 'Contacts';        
        return view('main.contacts', compact('title'));  
    }  

    public function product(string $slug)
    {
        $product = Product::firstWhere('slug', $slug);
        $productName = $product->name;
        $title = $productName; 
        $reviewsProduct = Review::orderBy('created_at', 'DESC')->where('product_id', $product->id)->get();       
        return view('shop.product', compact('title', 'product', 'reviewsProduct'));  
    }
    public function getReview(Request $request)
    {
        $review = new Review();
        $review->review = $request->comment;
        $review->user_id = $request->user;
        $review->product_id = $request->product;
        $review->save(); 
        return back();    
    }

    function test()
    {
        # code...
    }
    
}



