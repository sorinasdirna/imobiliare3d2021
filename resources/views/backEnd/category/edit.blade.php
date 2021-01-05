@extends('backEnd.layouts.master')
@section('title','Edit Category')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Mergi la prima pagina" class="tip-bottom"><i class="icon-home"></i> Acasa</a> <a href="{{route('category.index')}}">Categorii</a> <a href="#" class="current">Editeaza categorie</a> </div>
    <div class="container-fluid container-form">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Editeaza Categorie</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{route('category.update',$edit_category->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{method_field("PUT")}}
                            <div class="control-group{{$errors->has('name')?' has-error':''}}">
                                <label class="control-label">Nume categorie :</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" value="{{$edit_category->name}}" required class="form-control">
                                    <span class="text-danger" style="color: red;">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nivel :</label>
                                <div class="controls">
                                    <select name="parent_id" id="parent_id">
                                        {{--@foreach($cate_levels as $key=>$value)
                                            <option value="{{$key}}" {{($edit_category->parent_id==$key)?' selected':''}}>{{$value}}</option>
                                        @endforeach--}}

                                        @foreach($cate_levels as $key=>$value)
                                            <option value="{{$key}}"{{($edit_category->parent_id==$key)?' selected':''}}>{{$value}}</option>
                                            <?php
                                            if($key!=0){
                                                $subCategory=DB::table('categories')->select('id','name')->where('parent_id',$key)->get();
                                                if(count($subCategory)>0){
                                                    foreach ($subCategory as $subCate){
                                                        echo '<option value="'.$subCate->id.'">&nbsp;&nbsp;--'.$subCate->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Descriere :</label>
                                <div class="controls">
                                    <textarea name="description" id="description" rows="6">{{$edit_category->description}}</textarea>
                                </div>
                            </div>
                            <div class="control-check control-group">
                                <label class="control-label">Activa :</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" value="1" {{($edit_category->status==0)?'':'checked'}}>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Imagine: </label>
                                <div class="controls">
                                    <input type="file" name="image" id="image"/>
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                    @if($edit_category->image!='')
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:" rel="{{$edit_category->id}}" rel1="delete-catimage" class="btn btn-danger btn-mini deleteRecord">Sterge imaginea veche</a>
                                        <img src="{{url('categories/',$edit_category->image)}}" width="35" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="control-label"></label>
                                <div class="controls">
                                    <input type="submit" value="Editeaza" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('js/jquery.toggle.buttons.js')}}"></script>
    <script src="{{asset('js/masked.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <!-- <script src="{{asset('js/select2.min.js')}}"></script> -->
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.form_common.js')}}"></script>
    <script src="{{asset('js/jquery.peity.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Esti sigur ca vrei sa stergi imaginea?',
                text:"",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Da',
                cancelButtonText:'Nu',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
    </script>
@endsection