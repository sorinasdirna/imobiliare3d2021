<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Meniu</a>
    <ul>
        <li{{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Acasa</span></a> </li>
        <li class="submenu {{$menu_active==2? ' active':''}}"> <a href="#"><i class="icon icon-th-large"></i> <span>Categorii</span></a>
            <ul>
                <li><a href="{{url('/admin/category/create')}}">Adauga Categorie</a></li>
                <li><a href="{{route('category.index')}}">Vezi Toate Categoriile</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a href="#"><i class="icon icon-th"></i> <span>Anunturi</span></a>
            <ul>
                <li><a href="{{url('/admin/product/create')}}">Adauga Anunt</a></li>
                <li><a href="{{route('product.index')}}">Vezi Toate Anunturile</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->