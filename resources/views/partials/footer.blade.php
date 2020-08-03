<div class="panel panel--footer">   
    <div class="wrap">
        <div class="grid">
            <div class="footer-logo grid_col grid_col--1-of-4 grid_col--md-1-of-2">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Imobiliare 3D Logo">
                </a>
            </div>
            <div class="footer-contact grid_col grid_col--1-of-4 grid_col--md-1-of-2">
                <h4>Contact</h4>
                <ul>
                    <li><i class="fa fa-map-marker"></i> Adresa</li>
                    <li><a href="tel:0000-0000-000"><i class="fa fa-phone"></i> 0000 0000 000</a></li>
                    <li><a href="mailto:test@test.com"><i class="fa fa-envelope"></i> test@test.com</a></li>
                </ul>
            </div>
            <div class="footer-nav grid_col grid_col--1-of-4 grid_col--md-1-of-2">
                <h4>Linkuri Rapide</h4>
                <nav class="nav nav--footer">    
                    <ul class="level1 grid">
                        <li class="grid_col grid_col--1-of-1"><a href="{{ url('/') }}">Acasa</a></li>
                        <li class="grid_col grid_col--1-of-1"><a href="{{ url('anunturi?type=rent') }}">Inchirieri</a></li>
                        <li class="grid_col grid_col--1-of-1"><a href="{{ url('anunturi?type=sale') }}">Vanzari</a></li>
                        <li class="grid_col grid_col--1-of-1"><a href="{{ url('contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer-socials grid_col grid_col--1-of-4 grid_col--md-1-of-2">
                <h4>Urmareste-ne</h4>
                <ul>
                    <li><a href="" target="_blank"><i class="fa fa-facebook"></i> <span class="sr-only">Facebook(opens in new window)</span></a></li>
                    <li><a href="" target="_blank"><i class="fa fa-twitter"></i> <span class="sr-only">Twitter(opens in new window)</span></a></li>
                    <li><a href="" target="_blank"><i class="fa fa-youtube"></i> <span class="sr-only">Youtube(opens in new window)</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="panel panel--footer2">
    <div class="wrap">
        <div class="grid">
            <div class="footer-links grid_col grid_col--2-of-3 grid_col--md-1-of-1">
                <ul>
                    <li><a href="{{ url('politica-de-confidentialitate') }}">Politica de confidentialitate</a></li>
                    <li><a href="{{ url('politica-de-cookies') }}">Politica de cookies</a></li>
                    <li><a href="{{ url('termeni-si-conditii') }}">Termeni si conditii</a></li>
                </ul>
            </div>
            <div class="footer-copyright grid_col grid_col--1-of-3 grid_col--md-1-of-1 text-right">
                <p>© Copyright 2020 - Imobiliare 3D</p> 
            </div>
        </div>    
    </div>
</div>
<div class="panel panel--cookies dark" id="cookies">
    <p>Folosim cookie-uri pentru a oferi si imbunatati serviciile noastre. Prin utilizarea site-ului nostru, va dati acordul pentru <a class="cookies-more" href="{{ url('politica-de-cookies') }}">politica de cookie-uri</a>.</p>
    <a id="closeCookie" class="button button--accept" href="#">Accepta</a>
</div>