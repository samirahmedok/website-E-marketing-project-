@extends('layouts.master')

<div class="container">
    @section('content')
    <div class="page-holder">
        <!-- navbar-->
        
       
        
        <!-- HERO SECTION-->
        <div class="container">
          <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{asset('assets/img/hero-banner-alt.jpg')}})">
            <div class="container py-5">
              <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                  <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                  <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="shop.html">Browse collections</a>
                </div>
              </div>
            </div>
          </section>
          <!-- CATEGORIES SECTION-->
          <section class="pt-5">
            <header class="text-center">
              <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
              <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
            </header>
            <div class="row">
              @foreach ($categories as $category)
              <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href="{{route('boutique_cats',$category->id)}}"><img class="img-fluid" src="uploads/{{$category->image}}" alt=""><strong class="category-item-title">{{$category->cat_name}}</strong></a></div>
              {{-- <div class="col-md-4 mb-4 mb-md-0"><a class="category-item mb-4" href="shop.html"><img class="img-fluid" src="{{asset('assets/img/cat-img-2.jpg')}}" alt=""><strong class="category-item-title">Shoes</strong></a><a class="category-item" href="shop.html"><img class="img-fluid" src="{{asset('assets/img/cat-img-3.jpg')}}" alt=""><strong class="category-item-title">Watches</strong></a></div>
              <div class="col-md-4"><a class="category-item" href="shop.html"><img class="img-fluid" src="{{asset('assets/img/cat-img-4.jpg')}}" alt=""><strong class="category-item-title">Electronics</strong></a></div> --}}
              @endforeach
            </div>
          </section>
          <!-- TRENDING PRODUCTS-->
          <section class="py-5">
            <header>
              <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
              <h2 class="h5 text-uppercase mb-4">products</h2>
            </header>
            <div class="row">
              <!-- PRODUCT-->
              @foreach ($products as $product)
              <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="product text-center">
                  <div class="position-relative mb-3">
                    <div class="badge text-white badge-"></div><a class="d-block" href="{{route('product_details',$product->id)}}"><img class="img-fluid w-100" src="uploads/{{$product->image}}" alt="..."></a>
                    <div class="product-overlay">
                      <ul class="mb-0 list-inline">
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{route('add.cart',$product->id)}}">Add to cart</a></li>                        
                      </ul>
                    </div>
                  </div>
                  <h6> <a class="reset-anchor" href="#">{{$product->name}}</a></h6>
                  <p class="small text-muted">${{$product->price}}</p>
                </div>
              </div>
              @endforeach
            </div>
          </section>
          <!-- SERVICES-->
          <section class="py-5 bg-light">
            <div class="container">
              <div class="row text-center">
                <div class="col-lg-4 mb-3 mb-lg-0">
                  <div class="d-inline-block">
                    <div class="media align-items-end">
                      <svg class="svg-icon svg-icon-big svg-icon-light">
                        <use xlink:href="#delivery-time-1"> </use>
                      </svg>
                      <div class="media-body text-left ml-3">
                        <h6 class="text-uppercase mb-1">Free shipping</h6>
                        <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0">
                  <div class="d-inline-block">
                    <div class="media align-items-end">
                      <svg class="svg-icon svg-icon-big svg-icon-light">
                        <use xlink:href="#helpline-24h-1"> </use>
                      </svg>
                      <div class="media-body text-left ml-3">
                        <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                        <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="d-inline-block">
                    <div class="media align-items-end">
                      <svg class="svg-icon svg-icon-big svg-icon-light">
                        <use xlink:href="#label-tag-1"> </use>
                      </svg>
                      <div class="media-body text-left ml-3">
                        <h6 class="text-uppercase mb-1">Festival offer</h6>
                        <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- NEWSLETTER-->
          <section class="py-5">
            <div class="container p-0">
              <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                  <h5 class="text-uppercase">Let's be friends!</h5>
                  <p class="text-small text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
                </div>
                <div class="col-lg-6">
                  <form action="#">
                    <div class="input-group flex-column flex-sm-row mb-3">
                      <input class="form-control form-control-lg py-3" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-dark btn-block" id="button-addon2" type="submit">Subscribe</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
        
      </div>
    @endsection 
    
    
</div>

      @section('scripts')
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        

    $('#productView').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var name = button.data('name')
		var price = button.data('price')
    var description = button.data('description')
		var image = button.data('image')
		var modal = $(this)
    modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #name').val(name);
		modal.find('.modal-body #price').val(price);
    modal.find('.modal-body #description').val(description);
		modal.find('.modal-body #image').val(image);
	})
      </script>
      
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      @endsection
      
    

  