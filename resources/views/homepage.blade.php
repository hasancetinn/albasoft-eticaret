@extends('fronts.master')
@section('title', 'HomePage')
@section('content')
    <style>
        html {
            font-size: 16px;
        }

        :focus {
            outline: none;
        }

        body {
            font-family: Raleway, 'Segoe UI', Arial;
            font-size: 1rem;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
        }

        a {
            color: #333;
        }

        .navbar .submenu {
            opacity: 0;
            transition: opacity 5.5s ease-out;
            position: absolute;
            left: 0;
            background-color: #333;
            width: 100%;
            padding: 3rem;
            color: #fff;
            z-index: 100;
        }

        .navbar li.open .submenu {
            opacity: 1;
        }

        .navbar .nav > li.no-relative {
            position: initial;
        }

        .navbar .thumbnail {
            text-decoration: none;
            background-color: #555;
            border-color: #333;
            color: #ddd;
            padding: 10px;
        }

        .navbar a.thumbnail.active,
        .navbar a.thumbnail:focus,
        .navbar a.thumbnail:hover {
            border-color: #000;
        }

        #profile-page .img-profile {
            height: 260px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 6px;
        }

        #profile-page hgroup {
            margin: 18px 0;
        }

        #profile-page h1,
        #profile-page h2 {
            margin: 0.5rem 0;
        }

        #profile-page h1 {
            font-size: 1.4rem;
            font-weight: 600;
        }

        #profile-page h2 {
            font-size: 1rem;
            font-weight: 300;
            color: #666;
        }

        #profile-page .list-group-item {
            border: 0;
            padding-left: 0;
        }

        #profile-page .nav-tabs li a {
            border: 0;
            border-bottom: 3px solid transparent;
            padding: 1rem 2rem;
        }

        #profile-page .nav-tabs li.active a {
            border-bottom: 3px solid #ff6600;
        }

        #profile-page .tab-content .tab-pane {
            padding: 1rem 0;
        }

        #profile-page .progress {
            height: 34px;
        }

        #profile-page .progress .progress-bar {
            line-height: 34px;
        }

        #profile-page .small-course-info {
            font-size: 0.8rem;
            color: #aaa;
        }

        #last-activities,
        #courses-taken {
            padding: 10px 0;
        }

        #last-activities .course-list-item h4,
        #courses-taken .course-list-item h4 {
            margin: 0 !important;
        }

        /* GENERAL */
        .panel .list-group-item.active {
            background-color: initial;
            border: 0;
            color: inherit;
            border-left: 3px solid #ff6600;
        }

        .select2-selection__rendered,
        .select2-selection__arrow,
        .select2-selection--single {
            height: 34px !important;
            line-height: 34px !important;
        }

        #commerce {
            background-color: #f0f0f0;
        }

        #commerce h2 {
            font-weight: 600;
            font-size: 1.8rem;
        }

        #commerce h3 {
            font-size: 1.6rem;
        }

        #commerce h4 {
            font-size: 1.4rem;
            margin-bottom: 5px;
        }

        #commerce .navbar-brand {
            width: 270px;
        }

        #commerce .navbar-brand img {
            height: 30px;
            margin-top: -6px;
        }

        #commerce .panel-theme {
            border-color: #ddd;
        }

        #commerce .panel-theme .panel-heading {
            color: #333;
            font-weight: 600;
            border-color: #ddd;
            border-top: 2px solid #e52d04;
            background: linear-gradient(to bottom, #fff 0%, #dfdfdf 100%);
        }

        #commerce .panel-default h3 {
            font-size: 14px;
            font-weight: 600;
            margin: 0 10px 5px 10px;
        }

        #commerce .badge-theme {
            font-weight: 400;
            background-color: #e52d04;
            margin-top: -15px;
        }

        #commerce .btn-theme {
            background-color: #e52d04;
            color: #fff;
        }

        #commerce .btn-theme:hover {
            filter: contrast(90%);
        }

        #commerce #navbar-search {
            width: 400px;
        }

        #commerce .carousel {
            overflow: hidden;
        }

        #commerce .carousel .carousel-caption {
            right: 0%;
            left: 0;
            height: 50px;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        #commerce .carousel img {
            height: 356px !important;
        }

        #commerce #sidebar-product {
            height: 356px !important;
        }

        #commerce .list-group.categories {
            font-size: 0.8rem;
        }

        #commerce .bg-content {
            padding: 10px 15px;
            background-color: #fff;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        #commerce .products .product {
            text-align: center;
        }

        #commerce .products .product img {
            height: 200px;
            border-radius: 4px;
            margin-bottom: 5px;
            max-width: 100%;
        }

        #commerce .products .product .price {
            font-size: 20px;
            font-weight: 600;
        }

        #commerce .nav-tabs {
            padding-left: 6px;
        }

        #commerce .nav-tabs li.active a {
            font-weight: 600;
            border-bottom: inherit;
            margin-top: 1px;
            border-top: 2px solid #e52d04;
            background: linear-gradient(to top, #fff 0%, #dfdfdf 100%);
        }

        #commerce .tab-content {
            padding: 10px;
            border: 1px solid #ddd;
            margin-top: -1px;
        }

        #commerce .price {
            font-size: 24px;
            font-weight: 600;
        }

        #commerce .price small {
            font-size: 14px;
        }

        #commerce footer {
            background-color: #fff;
            padding: 50px;
        }


    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($categories as $category)
                            <a href="{{route('category-list', $category->slug)}}" class="list-group-item"><i
                                        class="fa fa-television"></i> {{$category->category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="http://lorempixel.com/640/400/food/1" alt="...">
                            <div class="carousel-caption">
                                Slide 1
                            </div>
                        </div>
                        <div class="item">
                            <img src="http://lorempixel.com/640/400/food/2" alt="...">
                            <div class="carousel-caption">
                                Slide 2
                            </div>
                        </div>
                        <div class="item">
                            <img src="http://lorempixel.com/640/400/food/3" alt="...">
                            <div class="carousel-caption">
                                Slide 3
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="#">
                            <img src="http://lorempixel.com/400/485/food/1" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3 product">
                                <a href="#"><img src="http://lorempixel.com/400/400/food/1"></a>
                                <p><a href="#">{{$product->product_name}}</a></p>
                                <p class="price">{{$product->price}} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection