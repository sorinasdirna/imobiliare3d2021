<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\ProductModel;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=3;
        $i=0;
        $products=ProductModel::orderBy('created_at','desc')->get();
        return view('backEnd.products.index',compact('menu_active','products','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=3;
        $categories=CategoryModel::where('parent_id',0)->pluck('name','id')->all();
        return view('backEnd.products.create',compact('menu_active','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkProductCode(Request $request){
        $data=$request->all();
        $product_code=$data['p_code'];
        $ch_prod_code_atDB=ProductModel::select('p_code')->where('p_code',$product_code)->first();
        if($product_code==$ch_prod_code_atDB['p_code']){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'p_name'=>'required|min:3',
            'p_code'=>'required|max:255|unique:products,p_code',
            'image'=>'image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $formInput=$request->all();
        if(empty($formInput['p_status'])){
            $formInput['p_status']=0;
        }
        if(empty($formInput['p_negotiable'])){
            $formInput['p_negotiable']=0;
        }
        if(empty($formInput['p_cadastre'])){
            $formInput['p_cadastre']=0;
        }
        if(empty($formInput['p_tabulate'])){
            $formInput['p_tabulate']=0;
        }
        if($request->file('image')){
            $image=$request->file('image');
            if($image->isValid()){
                $fileName=time().'-'.str_slug($formInput['p_name'],"-").'.'.$image->getClientOriginalExtension();
                $large_image_path=public_path('products/'.$fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                $formInput['image']=$fileName;
            }
        }
        ProductModel::create($formInput);
        return redirect()->route('product.create')->with('message','Anuntul a fost creat cu succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active=3;
        $categories=CategoryModel::where('parent_id',0)->pluck('name','id')->all();
        $edit_product=ProductModel::findOrFail($id);
        $edit_category=CategoryModel::findOrFail($edit_product->categories_id);
        return view('backEnd.products.edit',compact('edit_product','menu_active','categories','edit_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_product=ProductModel::findOrFail($id);
        $this->validate($request,[
            'p_name'=>'required|min:3',
            'p_code'=>'required|max:255|unique:products,p_code,'.$update_product->id,
            'image'=>'image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $formInput=$request->all();
        if(empty($formInput['p_status'])){
            $formInput['p_status']=0;
        }
        if(empty($formInput['p_negotiable'])){
            $formInput['p_negotiable']=0;
        }
        if(empty($formInput['p_cadastre'])){
            $formInput['p_cadastre']=0;
        }
        if(empty($formInput['p_tabulate'])){
            $formInput['p_tabulate']=0;
        }
        if($update_product['image']==''){
            if($request->file('image')){
                $image=$request->file('image');
                if($image->isValid()){
                    $fileName=time().'-'.str_slug($formInput['p_name'],"-").'.'.$image->getClientOriginalExtension();
                    $large_image_path=public_path('products/'.$fileName);
                    //Resize Image
                    Image::make($image)->save($large_image_path);
                    $formInput['image']=$fileName;
                }
            }
        }else{
            $formInput['image']=$update_product['image'];
        }
        $update_product->update($formInput);
        return redirect()->route('product.index')->with('message','Anuntul a fost editat cu succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=ProductModel::findOrFail($id);
        $image_large=public_path().'/products/large/'.$delete->image;
        $image_medium=public_path().'/products/medium/'.$delete->image;
        $image_small=public_path().'/products/small/'.$delete->image;
        if($delete->delete()){
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        return redirect()->route('product.index')->with('message','Anuntul a fost sters cu succes');
    }
    public function deleteImage($id){
        //ProductModel::where(['id'=>$id])->update(['image'=>'']);
        $delete_image=ProductModel::findOrFail($id);
        $image_large=public_path().'/products/'.$delete_image->image;
        if($delete_image){
            $delete_image->image='';
            $delete_image->save();
            ////// delete image ///
            unlink($image_large);
        }
        return back();
    }
}
