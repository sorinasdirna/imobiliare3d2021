<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\ImageGalleryModel;
use App\ProductModel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $menu_active=1;
        $categories=CategoryModel::all();
        $products=ProductModel::orderBy('id','desc')->take(6)->get();
        return view('index',compact('menu_active','categories','products'));
    }
    
    public function anunturi(Request $request) {
        $menu_active=2;
        $categories=CategoryModel::all();

        $filters = [
            'address'    => $request->input('address'),
            'category'    => $request->input('category'),
            'type'    => $request->input('type'),
            'minprice' => $request->input('minprice'),
            'maxprice'    => $request->input('maxprice'),
        ];
     
        $products = ProductModel::where(function ($query) use ($filters) {
            $query->where('p_status', '=', 1);

            if ($filters['address']) {
                $query->where('p_address', 'like', "%".$filters['address']."%");
            }
            if ($filters['category']) {
                $query->where('categories_id', '=', $filters['category']);
            }
            if ($filters['type']) {
                $query->where('p_type', '=', $filters['type']);
            }
            if ($filters['minprice']) {
                $query->where('p_price', '>=', $filters['minprice']);
            }
             if ($filters['maxprice']) {
                $query->where('p_price', '<=', $filters['maxprice']);
            }
        })->get();

        return view('anunturi',compact('menu_active','products', 'categories'));
    }
   
    public function detalii($id){
        $menu_active=0;
        $product=ProductModel::findOrFail($id);
        $images=ImageGalleryModel::where('products_id',$id)->get();
        return view('detalii',compact('product','images','menu_active'));
    }

    public function contact() {
        $menu_active=3;
        return view('contact',compact('menu_active'));
    }

    public function despre() {
        $menu_active=4;
        return view('despre',compact('menu_active'));
    }
    
    public function politicaDeConfidentialitate() {
        $menu_active=0;
        return view('politica-de-confidentialitate',compact('menu_active'));
    }

    public function politicaDeCookies() {
        $menu_active=0;
        return view('politica-de-cookies',compact('menu_active'));
    }

    public function termeniSiConditii() {
        $menu_active=0;
        return view('termeni-si-conditii',compact('menu_active'));
    }

    public function categorii($id) {
        $menu_active=0;
        $products=ProductModel::where('categories_id',$id)->get();
        $category=CategoryModel::select('name')->where('id',$id)->first();
        return view('categorii',compact('products','category','menu_active'));
    }

    public function search(Request $request) {
        $menu_active=0;

        $address = $request->input('address');
        $category = $request->input('category');
        $type = $request->input('type');

        $products = ProductModel::select('*')
                            ->where('p_address', 'like', "%".$address."%")
                            ->where('categories_id','like', "%".$category."%")
                            ->where('p_type', 'like', "%".$type."%")
                            ->get();

        //dd($products);
        return view('search',compact('products','menu_active'));

    }

    public function advancedSearch(Request $request) {
        $menu_active=0;

        $address = $request->input('address');
        $category = $request->input('category');
        $type = $request->input('type');

        $products = ProductModel::select('*')
                            ->where('p_address', 'like', "%".$address."%")
                            ->where('categories_id','like', "%".$category."%")
                            ->where('p_type', 'like', "%".$type."%")
                            ->get();

        $categories=CategoryModel::all();    

        //dd($products);
        return view('search',compact('products','menu_active', 'categories'));

    }
}
