@extends('backEnd.layouts.master')
@section('title','List Categories')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Mergi la prima pagina" class="tip-bottom"><i class="icon-home"></i> Acasa</a> <a href="{{route('category.index')}}" class="current">Categorii</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Categorii</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="table-wrap">
                  <table class="table table-bordered data-table">
                      <thead>
                      <tr>
                          <th>Nume categorie</th>
                          <th>Imagine</th>
                          <th>Parinte categorie</th>
                          <th>Data creare</th>
                          <th>Data ultima editare</th>
                          <th>Status</th>
                          <th>Actiuni</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach($categories as $category)
                              <?php
                                  $parent_cates = DB::table('categories')->select('name')->where('id',$category->parent_id)->get();
                              ?>
                              <tr class="gradeC">
                                  <td>{{$category->name}}</td>
                                  <td><img src="{{url('categories',$category->image)}}" alt="" width="50"></td>
                                  <td>
                                      @foreach($parent_cates as $parent_cate)
                                          {{$parent_cate->name}}
                                      @endforeach
                                  </td>
                                  <td>{{$category->created_at->diffForHumans()}}</td>
                                  <td>{{$category->updated_at->diffForHumans()}}</td>
                                  <td>{{($category->status==0)?' Inactiva':'Activa'}}</td>
                                  <td>
                                      <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-mini">Editeaza</a>
                                      <a href="javascript:" rel="{{$category->id}}" rel1="delete-category" class="btn btn-danger btn-mini deleteRecord">Sterge</a>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>  
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
           var id=$(this).attr('rel');
           var deleteFunction=$(this).attr('rel1');
           swal({
               title:'Esti sigur ca vrei sa stergi categoria?',
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