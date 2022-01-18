<!doctype html>
<html class="no-js" lang="zxx">


@include('vistas-parciales.head')

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        @include('vistas-parciales.header')
        <!-- Uren's Header Main Area End Here -->

        <div class="uren-slider_area uren-slider_area-3">
            <div class="main-slider slider-navigation_style-2">
                <!-- Begin Single Slide Area -->
                <div class="single-slide animation-style-01 bg-5">
                    <div class="slider-content">
                        <span class="carlet-text_color">25 años de expieriencia a tu servicio</span>
                        <h3> Automotriz R.A.L.E</h3>
                        <p class="short-desc">Conoce más sobre nosotros.
                        </p>
                        <div class="uren-btn-ps_center slide-btn">
                            <a class="uren-btn" href="shop-left-sidebar.html">Aquí</a>
                        </div>
                    </div>
                </div>
                <!-- Single Slide Area End Here -->
                <!-- Begin Single Slide Area -->
                <div class="single-slide animation-style-02 bg-6">
                    <div class="slider-content slider-content-2">
                        <span class="carlet-text_color">A un click de distancia</span>
                        <h3>Lo mejor en linea de frenos</h3>
                        <p class="short-desc">Explora y conoce nuestros productos
                        </p>
                        <div class="uren-btn-ps_center slide-btn">
                            <a class="uren-btn" href="shop-left-sidebar.html">Aquí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" role="alert">
            <span aria-button="true">&times;</span>
        </button>
    </div>
    @endif
        

        <!-- Begin Featured Categories Area -->
        @include('vistas-parciales.nuevosproductos')
    </div>
    </div>
    <!-- Featured Categories Area End Here -->

    <!-- Begin Multiple Section Area -->
    {{-- <div class="multiple-section_area bg--white_smoke">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="special-product_wrap img-hover-effect_area-2">
                            <div class="section-title_area bg--white">
                                <span>Special Offer Limited Time</span>
                                <h3>Deal Of The Day</h3>
                            </div>
                            <div class="special-product_slider-2 uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                        "slidesToShow": 1,
                        "arrows" : true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                            {"breakpoint":992, "settings": {"slidesToShow": 2}},
                            {"breakpoint":768, "settings": {"slidesToShow": 1}},
                            {"breakpoint":576, "settings": {"slidesToShow": 1}}
                        ]'>
                                <div class="slide-item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img class="primary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="assets/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-33%</span>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <div class="uren-countdown_area">
                                                        <span class="product-offer">Hurry up! Offer ends in:</span>
                                                        <div class="countdown-wrap">
                                                            <div class="countdown item-4" data-countdown="2020/09/01" data-format="short">
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time daysLeft"></span>
                                                                    <span class="countdown__text daysText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time hoursLeft"></span>
                                                                    <span class="countdown__text hoursText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time minsLeft"></span>
                                                                    <span class="countdown__text minsText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time secsLeft"></span>
                                                                    <span class="countdown__text secsText"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="product-name"><a href="single-product.html">Veniam officiis
                                                            voluptates</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2">$98.00</span>
                                                        <span class="old-price">$146.00</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                            </li>
                                                            <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                class="ion-android-open"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img class="primary-img" src="assets/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="assets/images/product/medium-size/5-2.jpg" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-10%</span>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <div class="uren-countdown_area">
                                                        <span class="product-offer">Hurry up! Offer ends in:</span>
                                                        <div class="countdown-wrap">
                                                            <div class="countdown item-4" data-countdown="2020/07/01" data-format="short">
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time daysLeft"></span>
                                                                    <span class="countdown__text daysText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time hoursLeft"></span>
                                                                    <span class="countdown__text hoursText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time minsLeft"></span>
                                                                    <span class="countdown__text minsText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time secsLeft"></span>
                                                                    <span class="countdown__text secsText"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="product-name"><a href="single-product.html">Accusantium corporis
                                                            odio</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2">$110.00</span>
                                                        <span class="old-price">$122.00</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                            </li>
                                                            <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                class="ion-android-open"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img class="primary-img" src="assets/images/product/medium-size/6-1.jpg" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="assets/images/product/medium-size/6-2.jpg" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-15%</span>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <div class="uren-countdown_area">
                                                        <span class="product-offer">Hurry up! Offer ends in:</span>
                                                        <div class="countdown-wrap">
                                                            <div class="countdown item-4" data-countdown="2020/07/01" data-format="short">
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time daysLeft"></span>
                                                                    <span class="countdown__text daysText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time hoursLeft"></span>
                                                                    <span class="countdown__text hoursText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time minsLeft"></span>
                                                                    <span class="countdown__text minsText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time secsLeft"></span>
                                                                    <span class="countdown__text secsText"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="product-name"><a href="single-product.html">Accusantium corporis
                                                            odio</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2">$95.00</span>
                                                        <span class="old-price">$120.00</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                            </li>
                                                            <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                class="ion-android-open"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img class="primary-img" src="assets/images/product/medium-size/8-1.jpg" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="assets/images/product/medium-size/2-2.jpg" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-5%</span>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <div class="uren-countdown_area">
                                                        <span class="product-offer">Hurry up! Offer ends in:</span>
                                                        <div class="countdown-wrap">
                                                            <div class="countdown item-4" data-countdown="2020/05/01" data-format="short">
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time daysLeft"></span>
                                                                    <span class="countdown__text daysText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time hoursLeft"></span>
                                                                    <span class="countdown__text hoursText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time minsLeft"></span>
                                                                    <span class="countdown__text minsText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time secsLeft"></span>
                                                                    <span class="countdown__text secsText"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="product-name"><a href="single-product.html">Accusantium corporis
                                                            odio</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2">$75.00</span>
                                                        <span class="old-price">$80.00</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                            </li>
                                                            <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                class="ion-android-open"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img class="primary-img" src="assets/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="assets/images/product/medium-size/3-2.jpg" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-5%</span>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <div class="uren-countdown_area">
                                                        <span class="product-offer">Hurry up! Offer ends in:</span>
                                                        <div class="countdown-wrap">
                                                            <div class="countdown item-4" data-countdown="2020/09/01" data-format="short">
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time daysLeft"></span>
                                                                    <span class="countdown__text daysText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time hoursLeft"></span>
                                                                    <span class="countdown__text hoursText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time minsLeft"></span>
                                                                    <span class="countdown__text minsText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time secsLeft"></span>
                                                                    <span class="countdown__text secsText"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="product-name"><a href="single-product.html">Possimus accusantium
                                                            eius</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2">$65.00</span>
                                                        <span class="old-price">$75.00</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                            </li>
                                                            <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                class="ion-android-open"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img class="primary-img" src="assets/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="assets/images/product/medium-size/3-1.jpg" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-20%</span>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <div class="uren-countdown_area">
                                                        <span class="product-offer">Hurry up! Offer ends in:</span>
                                                        <div class="countdown-wrap">
                                                            <div class="countdown item-4" data-countdown="2020/04/01" data-format="short">
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time daysLeft"></span>
                                                                    <span class="countdown__text daysText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time hoursLeft"></span>
                                                                    <span class="countdown__text hoursText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time minsLeft"></span>
                                                                    <span class="countdown__text minsText"></span>
                                                                </div>
                                                                <div class="countdown__item">
                                                                    <span class="countdown__time secsLeft"></span>
                                                                    <span class="countdown__text secsText"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="product-name"><a href="single-product.html">Autem provident
                                                            consequatur</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2">$90.00</span>
                                                        <span class="old-price">$100.00</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                            </li>
                                                            <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                class="ion-android-open"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="list-product_wrap img-hover-effect_area-2 bg--white">
                                    <div class="section-title_area bg--white">
                                        <span>Top Featured On This Week</span>
                                        <h3>Featured Products</h3>
                                    </div>
                                    <div class="list-product_slider uren-slick-slider slider-navigation_style-1 section-space_mn-30 img-hover-effect_area" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows" : true,
                                "rows": 4
                               }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 1}},
                                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 1}}
                               ]'>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Nam vitae autem quo
                                                                perspiciatis magni</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$122.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/3-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quos iure similique
                                                                qui beatae</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$180.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Rem eveniet eum rerum
                                                                est veniam</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$116.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Nam vitae autem quo
                                                                perspiciatis magni</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$122.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/3-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quos iure similique
                                                                qui beatae</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$180.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Accusamus dicta odio
                                                                magni cumque</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$116.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Nam vitae autem quo
                                                                perspiciatis magni</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$122.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="list-product_wrap img-hover-effect_area-2 bg--white">
                                    <div class="section-title_area bg--white">
                                        <span>Most View On This Week</span>
                                        <h3>Most View Products</h3>
                                    </div>
                                    <div class="list-product_slider uren-slick-slider slider-navigation_style-1 section-space_mn-30 img-hover-effect_area" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows" : true,
                                "rows": 4
                               }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 1}},
                                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 1}}
                                                 ]'>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Nam vitae autem quo
                                                                perspiciatis magni</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$122.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/3-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quos iure similique
                                                                qui beatae</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$180.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Accusamus dicta odio
                                                                magni cumque</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$116.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Nam vitae autem quo
                                                                perspiciatis magni</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$122.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/3-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quos iure similique
                                                                qui beatae</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$180.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Rem eveniet eum rerum
                                                                est veniam</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$116.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/3-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quos iure similique
                                                                qui beatae</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$180.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="list-product_wrap img-hover-effect_area-2 bg--white">
                                    <div class="section-title_area bg--white">
                                        <span>On-Sale On This Week</span>
                                        <h3>On-Sale Products</h3>
                                    </div>
                                    <div class="list-product_slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows" : true,
                                "rows": 4
                               }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 1}},
                                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 1}}
                                                 ]'>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/3-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quos iure similique
                                                                qui beatae</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$180.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Accusamus dicta odio
                                                                magni cumque</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$116.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Nam vitae autem quo
                                                                perspiciatis magni</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$122.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Nam vitae autem quo
                                                                perspiciatis magni</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$122.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/3-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quos iure similique
                                                                qui beatae</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$180.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Rem eveniet eum rerum
                                                                est veniam</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$116.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/2-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quasi maxime pariatur
                                                                nisi non</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$150.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="shop-left-sidebar.html">
                                                            <img src="assets/images/product/medium-size/3-1.jpg" alt="Uren's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="shop-left-sidebar.html">Quos iure similique
                                                                qui beatae</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$180.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Multiple Section Area End Here -->

    <!-- Begin Uren's Banner Area -->
    {{-- <div class="uren-banner_area bg--white_smoke">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <div class="banner-img-1"></div>
                            <div class="banner-content">
                                <span class="offer">Get 20% off your order</span>
                                <h4>Car and Truck</h4>
                                <h3>Mercedes Benz</h3>
                                <p>Explore and immerse in exciting 360 content with
                                    Fulldive’s all-in-one virtual reality platform</p>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <div class="banner-img-1 banner-img-2"> </div>
                            <div class="banner-content">
                                <span class="offer">Save $120 when you buy</span>
                                <h4>Rotiform SFO </h4>
                                <h3>Custom Forged</h3>
                                <p>Explore and immerse in exciting 360 content with
                                    Fulldive’s all-in-one virtual reality platform</p>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Uren's Banner Area End Here -->

    <!-- Begin Uren's Product Area -->
    @include('vistas-parciales.productosdestacados')
    <!-- Uren's Product Area End Here -->

    <!-- Begin Uren's Testimonial Area -->
    {{-- <div class="testimonial-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial-slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 1,
                        "arrows" : true
                       }' data-slick-responsive='[
                                             {"breakpoint":768, "settings": {"slidesToShow": 1}},
                                             {"breakpoint":577, "settings": {"slidesToShow": 1}},
                                             {"breakpoint":481, "settings": {"slidesToShow": 1}},
                                             {"breakpoint":321, "settings": {"slidesToShow": 1}}
                                         ]'>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="single-slide">
                                        <div class="slide-content">
                                            <span class="primary-text_color">What’s Client Says</span>
                                            <h3 class="user-name">Rebecka Filson</h3>
                                            <div class="comment-box">
                                                <p class="user-feedback">“ Code, template and others are very good. The support has served me immediately and solved my problems when I need help. Are to be congratulated. Att Renan Andrade. ”</p>
                                            </div>
                                        </div>
                                        <div class="slide-image">
                                            <a href="javascript:void(0)">
                                                <img src="assets/images/testimonial/user/1.png" alt="Uren's Testimonial Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="single-slide">
                                        <div class="slide-content">
                                            <span class="primary-text_color">What’s Client Says</span>
                                            <h3 class="user-name">Amber Laha</h3>
                                            <div class="comment-box">
                                                <p class="user-feedback">“ When a beautiful design is combined with powerful
                                                    technology,
                                                    it truly is an artwork. I love how my website operates and looks with this
                                                    theme. Thank you for the awesome product. ”</p>
                                            </div>
                                        </div>
                                        <div class="slide-image">
                                            <a href="javascript:void(0)">
                                                <img src="assets/images/testimonial/user/2.png" alt="Uren's Testimonial Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="single-slide">
                                        <div class="slide-content">
                                            <span class="primary-text_color">What’s Client Says</span>
                                            <h3 class="user-name">Lindsy Neloms</h3>
                                            <div class="comment-box">
                                                <p class="user-feedback">“ Perfect Themes and the best of all that you have many options to choose! Best Support team ever!Very fast responding and experts on their fields! Thank you very much! ”</p>
                                            </div>
                                        </div>
                                        <div class="slide-image">
                                            <a href="javascript:void(0)">
                                                <img src="assets/images/testimonial/user/3.png" alt="Uren's Testimonial Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Uren's Testimonial Area End Here -->

    <!-- Begin Uren's Brand Area -->
    {{-- <div class="uren-brand_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                         
                            <h3>Comprar por marcas</h3>
                        </div>
                        <div class="brand-slider uren-slick-slider img-hover-effect_area" data-slick-options='{
                        "slidesToShow": 6
                        }' data-slick-responsive='[
                                                {"breakpoint":1200, "settings": {"slidesToShow": 5}},
                                                {"breakpoint":992, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":577, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":321, "settings": {"slidesToShow": 1}}
                                            ]'>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/1.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/2.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/3.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/4.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/5.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/6.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/1.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/7.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <img src="assets/images/brand/2.jpg" alt="Uren's Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Uren's Brand Area End Here -->

    <!-- Begin Uren's Blog Area -->
    {{-- <div class="uren-blog_area bg--white_smoke">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span>Our Recent Posts</span>
                            <h3>From Our Blogs</h3>
                        </div>
                        <div class="blog-slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 4,
                        "spaceBetween": 30,
                        "arrows" : true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                            {"breakpoint":992, "settings": {"slidesToShow": 2}},
                            {"breakpoint":768, "settings": {"slidesToShow": 2}},
                            {"breakpoint":576, "settings": {"slidesToShow": 1}}
                        ]'>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/1.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">12-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Quaerat eligendi dolores autem omnis sed</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/2.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">15-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Nulla voluptatum maiores dolorem nobis</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/3.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">19-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Laudantium minus excepturi expedita dolore</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/4.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">16-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Aliquam nihil dolorem beatae totam tempora</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/5.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">20-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Reprehenderit illum iusto sit asperiores</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/6.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">25-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Corrupti, dolore tempore totam voluptate</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Uren's Blog Area End Here -->

    <!-- Begin Uren's Footer Area -->
    @include('vistas-parciales.footer')
    <!-- Uren's Footer Area End Here -->
    <!-- Begin Uren's Modal Area -->
    <div class="modal fade modal-wrapper" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area sp-area row">
                        <div class="col-lg-5">
                            <div class="sp-img_area">
                                <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "fade": true,
                                    "draggable": false,
                                    "swipe": false,
                                    "asNavFor": ".sp-img_slider-nav"
                                    }'>
                                    <div class="single-slide red">
                                        <img src="assets/images/product/large-size/1.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide orange">
                                        <img src="assets/images/product/large-size/2.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide brown">
                                        <img src="assets/images/product/large-size/3.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide umber">
                                        <img src="assets/images/product/large-size/4.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide black">
                                        <img src="assets/images/product/large-size/5.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide golden">
                                        <img src="assets/images/product/large-size/6.jpg" alt="Uren's Product Image">
                                    </div>
                                </div>
                                <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3"
                                    data-slick-options='{
                                   "slidesToShow": 4,
                                    "asNavFor": ".sp-img_slider",
                                   "focusOnSelect": true,
                                   "arrows" : true,
                                   "spaceBetween": 30
                                  }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                ]'>
                                    <div class="single-slide red">
                                        <img src="assets/images/product/small-size/1.jpg" alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide orange">
                                        <img src="assets/images/product/small-size/2.jpg" alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide brown">
                                        <img src="assets/images/product/small-size/3.jpg" alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide umber">
                                        <img src="assets/images/product/small-size/4.jpg" alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide black">
                                        <img src="assets/images/product/small-size/5.jpg" alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide golden">
                                        <img src="assets/images/product/small-size/6.jpg" alt="Uren's Product Thumnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5><a href="#">Dolorem odio provident ut nihil</a></h5>
                                </div>
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price-box">
                                    <span class="new-price new-price-2">$194.00</span>
                                    <span class="old-price">$241.00</span>
                                </div>
                                <div class="sp-essential_stuff">
                                    <ul>
                                        <li>Brands <a href="javascript:void(0)">Buxton</a></li>
                                        <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                        <li>Reward Points: <a href="javascript:void(0)">100</a></li>
                                        <li>Availability: <a href="javascript:void(0)">In Stock</a></li>
                                        <li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li>
                                        <li>Price in reward points: <a href="javascript:void(0)">400</a></li>
                                    </ul>
                                </div>
                                <div class="color-list_area">
                                    <div class="color-list_heading">
                                        <h4>Available Options</h4>
                                    </div>
                                    <span class="sub-title">Color</span>
                                    <div class="color-list">
                                        <a href="javascript:void(0)" class="single-color active"
                                            data-swatch-color="red">
                                            <span class="bg-red_color"></span>
                                            <span class="color-text">Red (+$150)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                            <span class="burnt-orange_color"></span>
                                            <span class="color-text">Orange (+$170)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                            <span class="brown_color"></span>
                                            <span class="color-text">Brown (+$120)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                            <span class="raw-umber_color"></span>
                                            <span class="color-text">Umber (+$125)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="black">
                                            <span class="black_color"></span>
                                            <span class="color-text">Black (+$125)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="golden">
                                            <span class="golden_color"></span>
                                            <span class="color-text">Golden (+$125)</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <div class="uren-group_btn">
                                    <ul>
                                        <li><a href="cart.html" class="add-to_cart">Cart To Cart</a></li>
                                        <li><a href="cart.html"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="cart.html"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    </ul>
                                </div>
                                <div class="uren-tag-line">
                                    <h6>Tags:</h6>
                                    <a href="javascript:void(0)">Ring</a>,
                                    <a href="javascript:void(0)">Necklaces</a>,
                                    <a href="javascript:void(0)">Braid</a>
                                </div>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank"
                                                title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank"
                                                title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank"
                                                title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip"
                                                target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank"
                                                title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Uren's Modal Area End Here -->

    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Barrating JS -->
    <script src="assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="assets/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="assets/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="assets/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!-- jQuery Zoom JS -->
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>


</html>
