<div class="uren-product_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    <span>Novedades destacadas de esta semana</span>
                    <h3>Nuevos productos</h3>
                </div>
                <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area"
                    data-slick-options='{
                    "slidesToShow": 6,
                    "arrows" : true
                    }' data-slick-responsive='[
                                            {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                                            {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                                            {"breakpoint":992, "settings": {"slidesToShow": 2}},
                                            {"breakpoint":767, "settings": {"slidesToShow": 1}},
                                            {"breakpoint":480, "settings": {"slidesToShow": 1}}
                                        ]'>
                    @foreach ($productos as $producto)
                        <div class="product-slide_item">
                            <div class="inner-slide">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('home.detalle',$producto)}}">

                                            @foreach ($producto->images->slice(0, 2) as $image)
                                                <img src="{{ $image->url }}"
                                                    class="{{ $loop->first ? 'primary-img' : 'secondary-img' }}"
                                                    alt="imagen del producto">
                                            @endforeach
                                        </a>
                                        {{-- <div class="sticker">
                                            <span class="sticker">Nuevo</span>
                                        </div> --}}
                                        <div class="add-actions">
                                            <ul>
                                                
                                                   
                                                    <li><a  onclick="event.preventDefault();
                                                        document.getElementById('addcar{{$producto->id}}').submit();" class="uren-add_cart"  data-toggle="tooltip"
                                                        data-placement="top" title="Agregar al carrito"><i
                                                            class="ion-bag"></i></a>
                                                </li>
                                                <form action="{{route('shopping_cart_details.store')}}" id="addcar{{$producto->id}}" method="POST"  class="d-none">
                                                   @csrf
                                                    <input type="hidden" name="cantidad" value="1" >
                                                    <input type="number" name="producto_id" value="{{$producto->id}}">
                                                </form>
                                               
                                              
                                                <li><a class="uren-wishlist" href="wishlist.html"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Agregar a deseados"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                               
                                                <li class="quick-view-btn" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Ver"><i class="ion-android-open"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                           
                                            <h6><a class="product-name"
                                                    href="single-product.html">{{ $producto->nombre }}</a></h6>
                                                    <p>Código: <a class="product-name"
                                                        href="single-product.html">{{ $producto->codigo }}</a></p>
                                            <div class="price-box">
                                                <span class="new-price">${{ $producto->precio }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addcar(){
        console.log("agregaste un producto al carrito");
    }
</script>