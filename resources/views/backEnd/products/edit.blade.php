@extends('backEnd.layouts.master')
@section('title','Add Products Page')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Mergi la prima pagina" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Anunturi</a> <a href="#" class="current">Editeaza anunt</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Editeaza anunt</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{route('product.update',$edit_product->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field("PUT")}}
                    <div class="control-group">
                        <label for="p_name" class="control-label">Nume: </label>
                        <div class="controls{{$errors->has('p_name')?' has-error':''}}">
                            <input type="text" name="p_name" id="p_name" class="form-control" value="{{$edit_product->p_name}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_name')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_code" class="control-label">Cod intern: </label>
                        <div class="controls{{$errors->has('p_code')?' has-error':''}}">
                            <input type="text" name="p_code" id="p_code" class="form-control" value="{{$edit_product->p_code}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_code')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Selecteaza categoria: </label>
                        <div class="controls">
                            <select name="categories_id" style="width: 415px;">
                                @foreach($categories as $key=>$value)
                                    <option value="{{$key}}"{{$edit_category->id==$key?' selected':''}}>{{$value}}</option>
                                    <?php
                                    if($key!=0){
                                        $sub_categories=DB::table('categories')->select('id','name')->where('parent_id',$key)->get();
                                        if(count($sub_categories)>0){
                                            foreach ($sub_categories as $sub_category){?>
                                                <option value="{{$sub_category->id}}"{{$edit_category->id==$sub_category->id?' selected':''}}>&nbsp;&nbsp;--{{$sub_category->name}}</option>
                                           <?php }
                                        }
                                    }
                                    ?>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Selecteaza tipul: </label>
                        <div class="controls">
                            <select name="p_type" style="width: 415px;">
                                    <option value="sale" {{($edit_product->p_type=='rent')?'':'selected'}}>De vanzare</option>
                                    <option value="rent" {{($edit_product->p_type=='sale')?'':'selected'}}>De inchiriat</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group{{$errors->has('status')?' has-error':''}}">
                        <label class="control-label">Activ :</label>
                        <div class="controls">
                            <input type="checkbox" name="p_status" id="p_status" value="1" {{($edit_product->p_status==0)?'':'checked'}}>
                            <span class="text-danger">{{$errors->first('p_status')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Imagine: </label>
                        <div class="controls">
                            <input type="file" name="image" id="image"/>
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @if($edit_product->image!='')
                                &nbsp;&nbsp;&nbsp;
                                <a href="javascript:" rel="{{$edit_product->id}}" rel1="delete-image" class="btn btn-danger btn-mini deleteRecord">Sterge imaginea veche</a>
                                <img src="{{url('products/',$edit_product->image)}}" width="35" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="description" class="control-label">Descriere: </label>
                        <div class="controls{{$errors->has('description')?' has-error':''}}">
                            <textarea class="textarea_editor span12" name="description" id="description" rows="6" placeholder="Product Description" style="width: 580px;">{{$edit_product->description}}</textarea>
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_price" class="control-label">Pret: </label>
                        <div class="controls{{$errors->has('p_price')?' has-error':''}}">
                            <div class="input-prepend"> <span class="add-on">$</span>
                                <input type="number" name="p_price" id="p_price" class="" value="{{$edit_product->p_price}}" title="">
                                <span class="text-danger">{{$errors->first('p_price')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_pricemp2" class="control-label">Pret/mp<sup>2</sup>: </label>
                        <div class="controls{{$errors->has('p_pricemp2')?' has-error':''}}">
                            <div class="input-prepend"> <span class="add-on">$</span>
                                <input type="number" name="p_pricemp2" id="p_pricemp2" class="" value="{{$edit_product->p_pricemp2}}" title="">
                                <span class="text-danger">{{$errors->first('p_pricemp2')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Moneda: </label>
                        <div class="controls">
                            <select name="p_currency" style="width: 415px;">
                                    <option value="lei" {{($edit_product->p_currency=='euro')?'':'selected'}}>Lei</option>
                                    <option value="euro" {{($edit_product->p_currency=='lei')?'':'selected'}}>Euro</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group{{$errors->has('status')?' has-error':''}}">
                        <label class="control-label">Negociabil: </label>
                        <div class="controls">
                            <input type="checkbox" name="p_negotiable" id="p_negotiable" value="1" {{($edit_product->p_negotiable==0)?'':'checked'}}>
                            <span class="text-danger">{{$errors->first('p_negotiable')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_rooms" class="control-label">Numar camere: </label>
                        <div class="controls{{$errors->has('p_rooms')?' has-error':''}}">
                            <input type="number" name="p_rooms" id="p_rooms" class="form-control" value="{{$edit_product->p_rooms}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_rooms')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_baths" class="control-label">Numar bai: </label>
                        <div class="controls{{$errors->has('p_baths')?' has-error':''}}">
                            <input type="number" name="p_baths" id="p_baths" class="form-control" value="{{$edit_product->p_baths}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_baths')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_balconies" class="control-label">Numar balcoane: </label>
                        <div class="controls{{$errors->has('p_balconies')?' has-error':''}}">
                            <input type="number" name="p_balconies" id="p_balconies" class="form-control" value="{{$edit_product->p_balconies}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_balconies')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_hallways" class="control-label">Numar holuri: </label>
                        <div class="controls{{$errors->has('p_hallways')?' has-error':''}}">
                            <input type="number" name="p_hallways" id="p_hallways" class="form-control" value="{{$edit_product->p_hallways}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_hallways')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_typeof" class="control-label">Tip locuinta: </label>
                        <div class="controls{{$errors->has('p_typeof')?' has-error':''}}">
                            <input type="text" name="p_typeof" id="p_typeof" class="form-control" value="{{$edit_product->p_typeof}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_typeof')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_furniture" class="control-label">Mobila: </label>
                        <div class="controls{{$errors->has('p_furniture')?' has-error':''}}">
                            <input type="text" name="p_furniture" id="p_furniture" class="form-control" value="{{$edit_product->p_furniture}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_furniture')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_material" class="control-label">Material constructie: </label>
                        <div class="controls{{$errors->has('p_material')?' has-error':''}}">
                            <input type="text" name="p_material" id="p_material" class="form-control" value="{{$edit_product->p_material}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_material')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_floor" class="control-label">Etaj: </label>
                        <div class="controls{{$errors->has('p_floor')?' has-error':''}}">
                            <input type="text" name="p_floor" id="p_floor" class="form-control" value="{{$edit_product->p_floor}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_floor')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_totalfloors" class="control-label">Total etaje: </label>
                        <div class="controls{{$errors->has('p_totalfloors')?' has-error':''}}">
                            <input type="text" name="p_totalfloors" id="p_totalfloors" class="form-control" value="{{$edit_product->p_totalfloors}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_totalfloors')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_totalsurface" class="control-label">Suprafata totala: </label>
                        <div class="controls{{$errors->has('p_totalsurface')?' has-error':''}}">
                            <input type="text" name="p_totalsurface" id="p_totalsurface" class="form-control" value="{{$edit_product->p_totalsurface}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_totalsurface')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_usablesurface" class="control-label">Suprafata disponibila: </label>
                        <div class="controls{{$errors->has('p_usablesurface')?' has-error':''}}">
                            <input type="text" name="p_usablesurface" id="p_usablesurface" class="form-control" value="{{$edit_product->p_usablesurface}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_usablesurface')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_year" class="control-label">An constructie: </label>
                        <div class="controls{{$errors->has('p_year')?' has-error':''}}">
                            <input type="text" name="p_year" id="p_year" class="form-control" value="{{$edit_product->p_year}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_year')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_condition" class="control-label">Conditie constructie: </label>
                        <div class="controls{{$errors->has('p_condition')?' has-error':''}}">
                            <input type="text" name="p_condition" id="p_condition" class="form-control" value="{{$edit_product->p_condition}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_condition')}}</span>
                        </div>
                    </div>
                    <div class="control-group{{$errors->has('status')?' has-error':''}}">
                        <label class="control-label">Cadastru: </label>
                        <div class="controls">
                            <input type="checkbox" name="p_cadastre" id="p_cadastre" value="1" {{($edit_product->p_cadastre==0)?'':'checked'}}>
                            <span class="text-danger">{{$errors->first('p_cadastre')}}</span>
                        </div>
                    </div>
                    <div class="control-group{{$errors->has('status')?' has-error':''}}">
                        <label class="control-label">Intabulare:</label>
                        <div class="controls">
                            <input type="checkbox" name="p_tabulate" id="p_tabulate" value="1" {{($edit_product->p_tabulete==0)?'':'checked'}}>
                            <span class="text-danger">{{$errors->first('p_tabulate')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_address" class="control-label">Adresa: </label>
                        <div class="controls{{$errors->has('p_address')?' has-error':''}}">
                            <input type="text" name="p_address" id="p_address" class="form-control" value="{{$edit_product->p_address}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_address')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_addresslat" class="control-label">Latitudine: </label>
                        <div class="controls{{$errors->has('p_addresslat')?' has-error':''}}">
                            <input type="text" name="p_addresslat" id="p_addresslat" class="form-control" value="{{$edit_product->p_addresslat}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_addresslat')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_addresslon" class="control-label">Longitudine: </label>
                        <div class="controls{{$errors->has('p_addresslon')?' has-error':''}}">
                            <input type="text" name="p_addresslon" id="p_addresslon" class="form-control" value="{{$edit_product->p_addresslon}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_addresslon')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="p_neighborhood" class="control-label">Cartier: </label>
                        <div class="controls{{$errors->has('p_neighborhood')?' has-error':''}}">
                            <input type="text" name="p_neighborhood" id="p_neighborhood" class="form-control" value="{{$edit_product->p_neighborhood}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_neighborhood')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_seokeys" class="control-label">Cuvinte SEO (Ex: cuv1, cuv2...max10 cuvinte): </label>
                        <div class="controls{{$errors->has('p_seokeys')?' has-error':''}}">
                            <input type="text" name="p_seokeys" id="p_seokeys" class="form-control" value="{{$edit_product->p_seokeys}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_seokeys')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_seodescription" class="control-label">Descriere SEO: </label>
                        <div class="controls{{$errors->has('p_seodescription')?' has-error':''}}">
                            <textarea class="textarea_editor span12" name="p_seodescription" id="p_seodescription" rows="6" placeholder="" style="width: 580px;">{{$edit_product->p_seodescription}}</textarea>
                            <span class="text-danger">{{$errors->first('p_seodescription')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_clientname" class="control-label">Nume Client: </label>
                        <div class="controls{{$errors->has('p_clientname')?' has-error':''}}">
                            <input type="text" name="p_clientname" id="p_clientname" class="form-control" value="{{$edit_product->p_clientname}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_clientname')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_clientphone" class="control-label">Telefon client: </label>
                        <div class="controls{{$errors->has('p_clientphone')?' has-error':''}}">
                            <input type="text" name="p_clientphone" id="p_clientphone" class="form-control" value="{{$edit_product->p_clientphone}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_clientphone')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_clientaddress" class="control-label">Adresa client: </label>
                        <div class="controls{{$errors->has('p_clientaddress')?' has-error':''}}">
                            <input type="text" name="p_clientaddress" id="p_clientaddress" class="form-control" value="{{$edit_product->p_clientaddress}}" title="" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_clientaddress')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_clientdescription" class="control-label">Descriere client: </label>
                        <div class="controls{{$errors->has('p_clientdescription')?' has-error':''}}">
                            <textarea class="textarea_editor span12" name="p_clientdescription" id="p_clientdescription" rows="6" placeholder="" style="width: 580px;">{{$edit_product->p_clientdescription}}</textarea>
                            <span class="text-danger">{{$errors->first('p_clientdescription')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Editeaza</button>
                        </div>
                    </div>
                </form>
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
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.form_common.js')}}"></script>
    <script src="{{asset('js/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('js/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-wysihtml5.js')}}"></script>
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
        $('.textarea_editor').wysihtml5();
    </script>
@endsection