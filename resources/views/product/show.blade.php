@extends('layouts.main')
@section('content')

 <section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <img class="img-fluid" src="{{ asset('images/'.$product->image_path)}}" alt="">
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{ $product->name }}</h3>
                <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            {{-- <span class="ion-ios-star-outline" data-rating="1" data-product-id={{ $product->id }}></span>
                            <span class="ion-ios-star-outline" data-rating="2" data-product-id={{ $product->id }}></span>
                            <span class="ion-ios-star-outline" data-rating="3" data-product-id={{ $product->id }}></span>
                            <span class="ion-ios-star-outline" data-rating="4" data-product-id={{ $product->id }}></span>
                            <span class="ion-ios-star-outline" data-rating="5" data-product-id={{ $product->id }}></span> --}}
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                <p class="price"><span>${{ $product->price }}</span></p>
                {!! $product->description !!}
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                 
                </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                 <span class="input-group-btn mr-2">
                    <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                   <i class="ion-ios-remove"></i>
                    </button>
                    </span>
                 <input type="text" id="quantity" name="" class="quantity form-control input-number" value="1" min="1" max="100">
                 <span class="input-group-btn ml-2">
                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                     <i class="ion-ios-add"></i>
                 </button>
                 </span>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12">
                  <p style="color: #000;">only {{ $product->quantity }} left</p>
              </div>
          </div>
          <p><a href="{{ Route('addtocart',$product->id) }}" class="btn btn-black py-3 px-5 mr-2">Add to Cart</a>
            <a href="{{ Route('buy',$product->id) }}" class="btn btn-primary py-3 px-5">Buy now</a>
            

        </p>
        
            </div>
        </div>




        <div class="row mt-5">
      <div class="col-md-12 nav-link-wrap">
        <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>

          <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>

          <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

        </div>
      </div>
      <div class="col-md-12 tab-wrap">
        
        <div class="tab-content bg-light" id="v-pills-tabContent">

          <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
              <div class="p-4">
                  <h3 class="mb-4">{{ $product->name }}</h3>
               {!! $product->description !!}
              </div>
          </div>

          <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
              <div class="p-4">
                  <h3 class="mb-4">Manufactured By {{ $product->manufacturer }}</h3>
                  
              </div>
          </div>
          <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
              <div class="row p-4">
                
 @foreach ($product->reviews as $review)
                  @if($review->parent_id == null)
                  <div class="col-md-7">
                    <h3 class="mb-4">{{ $review->count() }}</h3>
                    <div class="review">
                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                        <div class="desc">
                            <h4>
                                <span class="text-left">{{ $review->user->name }}</span>
                                <span class="text-right">{{ $review->created_at }}</span>
                            </h4>
                            <p class="star">
                                <span>
                                    <i class="ion-ios-star-outline"></i>
                                    <i class="ion-ios-star-outline"></i>
                                    <i class="ion-ios-star-outline"></i>
                                    <i class="ion-ios-star-outline"></i>
                                    <i class="ion-ios-star-outline"></i>
                                </span>
                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                            </p>
                            <p>{{ $review->review }}</p>
                        </div>
                    </div>
                    
                   
                </div>
                <div class="col-md-4">
                    <div class="rating-wrap">
                        <h3 class="mb-4">Give a Review</h3>
                        <p class="star">
                            <span>
                                <i class="ion-ios-star-outline"></i>
                                <i class="ion-ios-star-outline"></i>
                                <i class="ion-ios-star-outline"></i>
                                <i class="ion-ios-star-outline"></i>
                                <i class="ion-ios-star-outline"></i>
                                (98%)
                            </span>
                            <span>{{ $review->children->count() }}</span>
                        </p>
                        
                        
                        
                        
                    </div>
                             
                            @endif

                            @foreach ($product->reviews as $child)
                             @if($child->parent_id == $review->id)
                             <div class="col-md-7">
                                <h3 class="mb-4">{{ $review->count() }}</h3>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">{{ $review->user->name }}</span>
                                            <span class="text-right">{{ $review->created_at }}</span>
                                        </h4>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                            </span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <p>{{ $review->review }}</p>
                                    </div>
                                </div>
                                
                               
                            </div>
                            <div class="col-md-4">
                                <div class="rating-wrap">
                                    <h3 class="mb-4">Give a Review</h3>
                                    <p class="star">
                                        <span>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            (98%)
                                        </span>
                                        <span>20 Reviews</span>
                                    </p>
                                </div>
                              @endif
                                @endforeach
                            @endforeach
                               
                               
                               </div>
                           </div>
          </div>
        </div>
      </div>
    </div>
    </div>
{{-- </section>  --}}

@endsection