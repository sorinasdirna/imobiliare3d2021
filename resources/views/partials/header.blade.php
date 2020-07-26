<div class="panel panel--header">
    <div class="grid grid_align-middle">
        <div class="nav-logo grid_col grid_col--1-of-8 grid_col--lc-1-of-2 grid_col--md-1-of-2 grid_col--sm-1-of-2">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Imobiliare 3D Logo">
            </a>
        </div>
        <div class="header-nav grid_col grid_col--5-of-8 grid_col--lc-1-of-2 grid_col--md-1-of-2 grid_col--sm-1-of-2">
            <nav class="nav nav--main">
                <div class="nav-toggle text-right">
                    <button type="button" id="nav-toggle" data-toggle="collapse" data-target="#nav" aria-expanded="false" aria-controls="nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar icon-bar--1"></span>
                        <span class="icon-bar icon-bar--2"></span>
                        <span class="icon-bar icon-bar--3"></span>
                    </button>
                </div>
                <div id="nav" class="nav-collapse">
                    <ul class="level1">
                        <li class="{{$menu_active==1? ' active':''}}"><a href="{{ url('/') }}">Acasa</a></li>
                        <li class="{{$menu_active==2? ' active':''}}"><a href="{{ url('anunturi') }}">Anunturi</a></li>
                        <li class="{{$menu_active==3? ' active':''}}"><a href="{{ url('contact') }}">Contact</a></li>
                        <li class="{{$menu_active==4? ' active':''}}"><a href="{{ url('despre') }}">Despre noi</a></li>
                        <li class="mobile--only">
                            <div class="nav-right text-right">
                                <ul>
                                    <li><a href="tel:0000-0000-000"><i class="fa fa-phone"></i> 0000 0000 000</a></li>
                                </ul>
                            </div>
                        </li> 
                    </ul>
                </div>
            </nav>
        </div>
        <div class="nav-right grid_col grid_col--2-of-8 desktop--only text-right">
            <ul>
                <li><a href="tel:0000-0000-000"><i class="fa fa-phone"></i> 0000 0000 000</a></li>
            </ul>
        </div> 
    </div>
</div>