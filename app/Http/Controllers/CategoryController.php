<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use foo\bar;
use Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=0;
        $categories=CategoryModel::all();
        return view('backEnd.category.index',compact('menu_active','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=2;
        $plucked=CategoryModel::where('parent_id',0)->pluck('name','id');
        $cate_levels=['0'=>'Main Category']+$plucked->all();
        return view('backEnd.category.create',compact('menu_active','cate_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkCateName(Request $request){
        $data=$request->all();
        $category_name=$data['name'];
        $ch_cate_name_atDB=CategoryModel::select('name')->where('name',$category_name)->first();
        if($category_name==$ch_cate_name_atDB['name']){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:categories,name',
            'image'=>'image|mimes:png,jpg,jpeg|max:1000'
        ]);
        $data=$request->all();
        if($request->file('image')){
            $image=$request->file('image');
            if($image->isValid()){
                $fileName=time().'-'.str_slug($data['name'],"-").'.'.$image->getClientOriginalExtension();
                $medium_image_path=public_path('categories/'.$fileName);
                //Resize Image
                Image::make($image)->resize(600,600)->save($medium_image_path);
                $data['image']=$fileName;
            }
        }
        CategoryModel::create($data);
        return redirect()->route('category.index')->with('message','Categoria a fost creata cu succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active=0;
        $plucked=CategoryModel::where('parent_id',0)->pluck('name','id');
        $cate_levels=['0'=>'Main Category']+$plucked->all();
        $edit_category=CategoryModel::findOrFail($id);
        return view('backEnd.category.edit',compact('edit_category','menu_active','cate_levels'));
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
        $update_categories=CategoryModel::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|max:255|unique:categories,name,'.$update_categories->id,
            'image'=>'image|mimes:png,jpg,jpeg|max:1000'
        ]);
        //dd($request->all());die();
        $input_data=$request->all();
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        if($update_categories['image']==''){
            if($request->file('image')){
                $image=$request->file('image');
                if($image->isValid()){
                    $fileName=time().'-'.str_slug($input_data['name'],"-").'.'.$image->getClientOriginalExtension();
                    $medium_image_path=public_path('categories/'.$fileName);
                    //Resize Image
                    Image::make($image)->resize(600,600)->save($medium_image_path);
                    $input_data['image']=$fileName;
                }
            }
        }else{
            $input_data['image']=$update_categories['image'];
        }
        $update_categories->update($input_data);
        return redirect()->route('category.index')->with('message','Categoria a fost editata cu succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=CategoryModel::findOrFail($id);
        $image_medium=public_path().'/categories/'.$delete->image;
        if($delete->delete()){
            unlink($image_medium);
        }
        return redirect()->route('category.index')->with('message','Categoria a fost stearsa cu sucess');
    }
    public function deleteImage($id){
        //ProductModel::where(['id'=>$id])->update(['image'=>'']);
        $delete_image=CategoryModel::findOrFail($id);
        $image_medium=public_path().'/categories/'.$delete_image->image;
        if($delete_image){
            $delete_image->image='';
            $delete_image->save();
            ////// delete image ///
            unlink($image_medium);
        }
        return back();
    }
}
