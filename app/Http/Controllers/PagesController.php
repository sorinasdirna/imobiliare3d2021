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
    
    public function anunturi() {
        $menu_active=2;
        $products=ProductModel::all();
        return view('anunturi',compact('menu_active','products'));
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
    
    public function categorii($id){
        $menu_active=0;
        $products=ProductModel::where('categories_id',$id)->get();
        $category=CategoryModel::select('name')->where('id',$id)->first();
        return view('categorii',compact('products','category','menu_active'));
    }
}
