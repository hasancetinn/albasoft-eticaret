<?php

use App\Http\Controllers\BasketController;

$total = BasketController::cartItem();
?>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">
                Logo
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('basket')}}">
                        <i class="fa fa-shopping-cart"></i>
                        Sepet({{$total}})
                        {{--                        <span class="badge badge-theme">{{Cart::count()}}</span>--}}
                    </a>
                </li>

                <li>
                    @if(\Illuminate\Support\Facades\Auth::user()->user_role == 1)
                        <a href="{{route('/dashboard')}}">Kontrol Paneli</a>
                    @endif
                </li>


                {{--! Guest komutu kullanıcıların oturum açmamış olan sayflarını gösterir !--}}
                @guest
                    <li><a href="{{route('login')}}">Oturum Aç</a></li>
                    <li><a href="{{route('register')}}">Kaydol</a></li>
                @endguest

                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"> Profil <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Siparişlerim</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Çıkış</a>
                                <form id="logout-form" action="{{route('logout')}}" method="post"
                                      style="display: none">
                                    {{csrf_field()}}
                                </form>
                            </li>


                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>