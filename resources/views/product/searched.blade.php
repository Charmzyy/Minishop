@extends('layouts.main')
@section('content')


<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ Route('product.index') }}">Home</a></span> <span>Shop</span></p>
          <h1 class="mb-0 bread">Shop</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-10 order-md-last">
                <div class="row">
                    @if($searched->count()>0)
                    @foreach ($searched as $product)
                    <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                        <div class="product d-flex flex-column">
                            <a href="{{ Route('product.show',$product->id) }}" class="img-prod"><img style="height:20px width:10px"class="img-fluid" src="{{ asset('images/'.$product->image_path) }}" alt="Colorlib Template">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3">
                                <div class="d-flex">
                                    <div class="cat">
                                        <span>{{ $product->category->name }}</span>
                                    </div>
                                    <div class="rating">
                                        {{-- <p class="text-right mb-0">
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        </p> --}}
                                    </div>
                                </div>
                                <h3><a href="{{ Route('product.show',$product->id) }}">{{ $product->name }}</a></h3>
                                <div class="pricing">
                                    <p class="price"><span>${{ $product->price }}</span></p>
                                </div>
                                <p class="bottom-area d-flex px-3">
                                    <a href="{{ Route('addtocart',$product->id) }}" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                  
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        
                    @else
                   
                    <div class="error-message">No products within this range/div>
                    
                    @endif
                    
                    
      


                </div>
                <div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
            </div>

            <div class="col-md-4 col-lg-2">
                <div class="sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading">Categories</h2>
                            <div class="fancy-collapse-panel">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingOne">
                         <h4 class="panel-title">
                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Men's Shoes
                             </a>
                         </h4>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                         <div class="panel-body">
                             <ul>
                              
                                {{-- <a href="{{ route('filter', ['category_id' => $category->id, 'type' => 'new_arrival']) }}">New Arrivals</a> --}}

                                 <li><a href="{{ Route('filter',['category_id'=>4,'type'=>'men']) }}">Sport</a>
                                 </li>
                                 <li><a href="{{ Route('filter',['category_id'=>6,'type'=>'men']) }}">Casual</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>7,'type'=>'men']) }}">Running</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>8,'type'=>'men']) }}">Jordan</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>9,'type'=>'men']) }}">Soccer</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>10,'type'=>'men']) }}">Football</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>5,'type'=>'men']) }}">Lifestyle</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingTwo">
                         <h4 class="panel-title">
                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Women's Shoes
                             </a>
                         </h4>
                     </div>
                     <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                         <div class="panel-body">
                            <ul>
                                <li><a href="{{ Route('filter',['category_id'=>4,'type'=>'women']) }}">Sport</a>
                                </li>
                                <li><a href="{{ Route('filter',['category_id'=>6,'type'=>'women']) }}">Casual</a></li>
                                <li><a href="{{ Route('filter',['category_id'=>7,'type'=>'women']) }}">Running</a></li>
                                <li><a href="{{ Route('filter',['category_id'=>8,'type'=>'women']) }}">Jordan</a></li>
                                <li><a href="{{ Route('filter',['category_id'=>9,'type'=>'women']) }}">Soccer</a></li>
                                <li><a href="{{ Route('filter',['category_id'=>10,'type'=>'women']) }}">Football</a></li>
                                <li><a href="{{ Route('filter',['category_id'=>5,'type'=>'women']) }}">Lifestyle</a></li>
                            </ul>
                         </div>
                     </div>
                 </div>
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingThree">
                         <h4 class="panel-title">
                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Accessories
                             </a>
                         </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                         <div class="panel-body">
                            <ul>
                                 <li><a href="{{ Route('filter',['category_id'=>11,'type' =>'watches']) }}">Watches</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>12,'type' =>'sunglasses']) }}">Sun glasses</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>13,'type' =>'belts']) }}">Belts</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>14,'type' =>'jewellery']) }}">Jewellery</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingFour">
                         <h4 class="panel-title">
                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Clothing
                             </a>
                         </h4>
                     </div>
                     <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                         <div class="panel-body">
                            <ul>
                                 <li><a href="{{ Route('filter',['category_id'=>15,'type' =>'jeans']) }}">Jeans</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>16,'type' =>'tshirt']) }}">T-Shirt</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>17,'type' =>'jacket']) }}">Jacket</a></li>
                                 <li><a href="{{ Route('filter',['category_id'=>18,'type' =>'track']) }}">Track suits</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
              </div>
           </div>
                        </div>
                        <div class="sidebar-box-2">
                            <h2 class="heading">Price Range</h2>
                            <form action="{{ Route('search') }}"method="POST"  class="colorlib-form-2">
                                @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="guests">Price from:</label>
                        <div class="form-field">
                          <i class="icon icon-arrow-down3"></i>
                          <select name="price_from" id="people" class="form-control">
                            <option value="1">1</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="1000">1000</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="guests">Price to:</label>
                        <div class="form-field">
                          <i class="icon icon-arrow-down3"></i>
                          <select name="price_to" id="people" class="form-control">
                            <option value="2000">2000</option>
                            <option value="4000">4000</option>
                            <option value="6000">6000</option>
                            <option value="8000">8000</option>
                            <option value="10000">10000</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit">Search</button>
                </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
      
      <section class="ftco-gallery">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8 heading-section text-center mb-4 ftco-animate">
          <h2 class="mb-4">Follow Us On Instagram</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
        </div>
          </div>
      </div>
      <div class="container-fluid px-0">
          <div class="row no-gutters">
                  <div class="col-md-4 col-lg-2 ftco-animate">
                      <a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
                          <div class="icon mb-4 d-flex align-items-center justify-content-center">
                          <span class="icon-instagram"></span>
                      </div>
                      </a>
                  </div>
                  <div class="col-md-4 col-lg-2 ftco-animate">
                      <a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
                          <div class="icon mb-4 d-flex align-items-center justify-content-center">
                          <span class="icon-instagram"></span>
                      </div>
                      </a>
                  </div>
                  <div class="col-md-4 col-lg-2 ftco-animate">
                      <a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
                          <div class="icon mb-4 d-flex align-items-center justify-content-center">
                          <span class="icon-instagram"></span>
                      </div>
                      </a>
                  </div>
                  <div class="col-md-4 col-lg-2 ftco-animate">
                      <a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
                          <div class="icon mb-4 d-flex align-items-center justify-content-center">
                          <span class="icon-instagram"></span>
                      </div>
                      </a>
                  </div>
                  <div class="col-md-4 col-lg-2 ftco-animate">
                      <a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-5.jpg);">
                          <div class="icon mb-4 d-flex align-items-center justify-content-center">
                          <span class="icon-instagram"></span>
                      </div>
                      </a>
                  </div>
                  <div class="col-md-4 col-lg-2 ftco-animate">
                      <a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-6.jpg);">
                          <div class="icon mb-4 d-flex align-items-center justify-content-center">
                          <span class="icon-instagram"></span>
                      </div>
                      </a>
                  </div>
      </div>
      </div>
  </section>
@endsection



