@extends('backEnd.layouts.master')
@section('title','List Products')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Mergi la prima pagina" class="tip-bottom"><i class="icon-home"></i> Acasa</a> <a href="{{route('product.index')}}" class="current">Anunturi</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Anunturi</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cod intern</th>
                        <th>Imagine</th>
                        <th>Nume</th>
                        <th>Categorie</th>
                        <th>Pret</th>
                        <th>Data creare</td>
                        <th>Data ultima editare</th>
                        <th>Status</th>
                        <th>Galerie</th>
                        <th>Add Attribute</th>
                        <th>Actiuni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                            <td>{{$product->p_code}}</td>
                            <td><img src="{{url('products',$product->image)}}" alt="" width="50"></td>
                            <td>{{$product->p_name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->p_price}} {{$product->p_currency}}</td>
                            <td>{{$product->created_at->diffForHumans()}}</td>
                            <td>{{$product->updated_at->diffForHumans()}}</td>
                            <td>{{($product->p_status==0)?' Inactiv':'Activ'}}</td>
                            <td><a href="{{route('image-gallery.show',$product->id)}}" class="btn btn-default btn-mini">Adauga imagini</a></td>
                            <td><a href="" class="btn btn-success btn-mini">Adauga locatie</a></td>
                            <td>
                                <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-info btn-mini">Vezi</a>
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-mini">Editeaza</a>
                                <a href="javascript:" rel="{{$product->id}}" rel1="delete-product" class="btn btn-danger btn-mini deleteRecord">Sterge</a>
                            </td>
                        </tr>
                        {{--Pop Up Model for View Product--}}
                        <div id="myModal{{$product->id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>{{$product->p_name}}</h3>
                            </div>
                            <div class="modal-body">
                                <div><img src="{{url('products/small',$product->image)}}" width="100" alt="{{$product->p_code}}"></div>
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                        {{--Pop Up Model for View Product--}}
                    @endforeach
                    </tbody>
                </table>
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
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Esti sigur ca vrei sa stergi anuntul?',
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