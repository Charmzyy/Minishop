<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">

    
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    
							<span class="text"></span>
							
							
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                @auth()
							{{ Auth::user()->name}}
							
							<form id="logout-form" action="{{ route('logout') }}" method="POST">
								@csrf
								<button class="btn btn-primary ml-1 mr-1"type="submit">{{ __('Logout') }}</button>
							</form>
							@else
							<a  class="btn btn-primary ml-1 mr-1"href="{{ Route('login') }}">Login</a>
							<a class="btn btn-primary ml-1 mr-1"href="{{ Route('register') }}">Register</a>
							@endauth
							
							
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Minishop</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{ Route('product.index') }}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{ Route('all') }}">Shop</a>
               
                <a class="dropdown-item" href="{{ Route('cart') }}">Cart</a>
                <a class="dropdown-item" href="{{ Route('checkout') }}">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="{{ Route('about') }}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{ Route('blog') }}" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="{{ Route('contact') }}" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="{{ Route('cart') }}" class="nav-link"><span class="icon-shopping_cart">{{ count((array) session('cart')) }}</span></a></li>
            @auth
            <li class="nav-item"><a href="#" class="nav-link">{{ auth()->user()->name }}</a>
             
	        </ul>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            <button type="submit">  {{ __('Logout') }}</button>
        </form></li>
        @endauth
       
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    @yield('content')


     


    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                          <a href="#" class="mouse-icon">
                              <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                          </a>
                      </div>
            </div>
          <div class="row mb-5">
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Minishop</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Menu</h2>
                <ul class="list-unstyled">
                  <li><a href="{{ Route('all') }}" class="py-2 d-block">Shop</a></li>
                  <li><a href="{{ Route('about') }}" class="py-2 d-block">About</a></li>
                  
                  <li><a href="{{ Route('contact') }}" class="py-2 d-block">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
               <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Help</h2>
                <div class="d-flex">
                    <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                      <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                      <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                      <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                      <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                    </ul>
                    <ul class="list-unstyled">
                      <li><a href="#" class="py-2 d-block">FAQs</a></li>
                      <li><a href="#" class="py-2 d-block">Contact</a></li>
                    </ul>
                  </div>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Have a Questions?</h2>
                  <div class="block-23 mb-3">
                    <ul>
                      <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                      <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                      <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
  
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          </p>
            </div>
          </div>
        </div>
      </footer>
      
    
  
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  
    <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('js/google-map.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script> $('.ion-ios-star-outline').click(function(){
  var rating = $(this).data('rating');
  var product_id = $(this).data('product-id');

  $.ajax({
      url: '/save-rating',
      type: 'post',
      data: {
          rating: rating,
          product_id: product_id
      },
      success: function(response){
          // handle the response from the server
      }
  });
});
</script>
{{-- <script>
  $(document).ready(function(){
      $('.quantity-right-plus').click(function(e){
          e.preventDefault();
          var quantity = parseInt($('#quantity').val());
          $('#quantity').val(quantity + 1);

          $.ajax({
              url: '/update-quantity',
              type: 'POST',
              data: {
                  id: {{ $product->id }},
                  quantity: quantity + 1
              },
              success: function(response){
                  console.log('Quantity updated successfully');
              },
              error: function(){
                  console.log('Error updating quantity');
              }
          });
      });

      $('.quantity-left-minus').click(function(e){
          e.preventDefault();
          var quantity = parseInt($('#quantity').val());
          if(quantity > 1){
              $('#quantity').val(quantity - 1);

              $.ajax({
                  url: '/update-quantity',
                  type: 'POST',
                  data: {
                      id: {{ $product->id }},
                      quantity: quantity - 1
                  },
                  success: function(response){
                      console.log('Quantity updated successfully');
                  },
                  error: function(){
                      console.log('Error updating quantity');
                  }
              });
          }
      });
  });
</script> --}}
<script>
  $(document).ready(function(){

  var quantitiy=0;
     $('.quantity-right-plus').click(function(e){
          
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          var quantity = parseInt($('#quantity').val());
          
          // If is not undefined
              
              $('#quantity').val(quantity + 1);

            
              // Increment
          
      });

       $('.quantity-left-minus').click(function(e){
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          var quantity = parseInt($('#quantity').val());
          
          // If is not undefined
        
              // Increment
              if(quantity>0){
              $('#quantity').val(quantity - 1);
              }
      });
      
  });
</script>
  


      
    </body>
  </html>