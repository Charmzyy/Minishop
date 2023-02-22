@extends('layouts.main')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
          <h1 class="mb-0 bread">My Wishlist</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-cart">
          <div class="container">
              <div class="row">
              <div class="col-md-12 ftco-animate">
                  <div class="cart-list">
                    @if(session()->has('success'))
<div class="alert alert-warning" role="alert">
    {{ session()->get('success') }}
  </div>


@endif
                      <table class="table">
                          <thead class="thead-primary">
                            <tr class="text-center">
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>Product</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $total =0?>

                              @if(session('cart'))
                              @foreach (session('cart') as $id=>$details)
                              <?php $total += $details['price']*$details['quantity']?>

                              <tr class="text-center">
                          <td class="product-remove">
                              
                                 
                                    
                                <form action="{{ route('removeitem', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>
                                
                          
                          </td>
                          <td class="image-prod"><div class="img"> 
                        

                            {{-- /* <img src={{ asset('images/'.$details['image_path'])}}> */ --}}
                        </div>
                    </td>                                       
                                  {{-- Debug message to check if $details is populated correctly --}}
 
                                  
                                  <td class="product-name">
                                    {{-- Debug message to check if $details is populated correctly --}}
                                    {{-- {{ dd($details) }} --}}
                                    {{ $details['name'] }}
                                  </td>
                  
                                  
                                  <td class="price">{{ $details['price'] }}</td>
                                  
                                  <td class="quantity">
                                    <div class="input-group mb-3">
                                        @if (array_key_exists('quantity', $details))
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="{{ $details['quantity'] }}" min="1" max="100">
                                        @else
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                        @endif
                                    </div>
                                </td>
                                  
                                  <td class="total">{{ $details['quantity']* $details['price'] }}</td>
                                </tr><!-- END TR-->
                              @endforeach
                              @endif
                          </tbody>
                        </table>
                    </div>
              </div>
          </div>
          <div class="row justify-content-start">
              <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Cart Totals</h3>
                      <p class="d-flex">
                          <span>Subtotal</span>
                          <span>${{ $total }}</span>
                      </p>
                      <p class="d-flex">
                          <span>Delivery</span>
                          <span>free</span>
                      </p>
                      <p class="d-flex">
                          <span>Discount</span>
                          <span>no dicount</span>
                      </p>
                      <hr>
                      <p class="d-flex total-price">
                          <span>Total</span>
                          <span>{{ $total }}</span>
                      </p>
                  </div>
                  <p class="text-center"><a href="{{ Route('checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
              </div>
          </div>
          </div>
      </section>
      
@endsection