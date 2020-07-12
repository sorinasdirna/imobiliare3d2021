<!--Header-part-->
<div id="header">
    <a href="{{ url('/') }}" target="_blank">
        <img src="{{ asset('img/logo2.png') }}" alt="Logo">
    </a>
    <h1>Imobiliare 3D Admin</h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class=""><a title="" href="{{url('/admin/settings')}}"><i class="icon icon-cog"></i> <span class="text">Setari cont</span></a></li>
        <li class="">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="icon icon-share-alt"></i>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </li>
    </ul>
</div>
<!--close-top-Header-menu-->