@extends('layouts.app')
@section('content')
    <section class="page-search">
    </section>
    <!--===================================
    =            Store Section            =
    ====================================-->
    <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h1 class="product-title">{{ $ad['title'] }}</h1>
                        <div class="product-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a
                                        href="">{{ App\Models\User::find($ad['seller_id'])['name'] }}</a></li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a
                                        href="">{{ App\Models\Category::find($ad['category_id'])['name'] }}</a></li>
                                <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a
                                        href="">{{ $ad['location'] }}</a></li>
                            </ul>
                        </div>

                        <!-- product slider -->
                        <div class="product-slider">
                            <?php try{ ?>
                            @foreach ($ad['images'] as $image)
                                <div class="product-slider-item my-4" data-image="{{ asset('images/' . $image) }}">
                                    <img class="img-fluid w-100" src="{{ asset('images/' . $image) }}" alt="product-img">
                                </div>
                            @endforeach
                            <?php } catch (\Throwable $th) { ?>
                            <div class="product-slider-item my-4" data-image="{{ asset('images/' . $ad['images']) }}">
                                <img class="img-fluid w-100" src="{{ asset('images/' . $ad['images']) }}" alt="product-img">
                            </div>
                            <?php } ?>

                        </div>
                        <!-- product slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Specifications</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Product Description</h3>
                                    <p>{{ $ad['description'] }}</p>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <h3 class="tab-title">Product Specifications</h3>
                                    <table class="table table-bordered product-table">
                                        <tbody>
                                            <tr>
                                                <td>Seller Price</td>
                                                <td>Rs. {{ $ad['price'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Added</td>
                                                <td>{{ $ad['created_at'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Location</td>
                                                <td>{{ $ad['location'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Brand</td>
                                                <td>{{ $ad['brand'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Condition</td>
                                                <td>
                                                    @if ($ad['condition'] == 1)
                                                        New
                                                    @else
                                                        Used
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Model</td>
                                                <td>{{ $ad['model'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Health</td>
                                                <td>{{ $ad['health'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <br />
                            <h4>Price</h4>
                            <p>Rs. {{ $ad['price'] }}</p>
                            <hr />
                            <form action="{{ url('wishlist') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $ad['id'] }}" name="item_id">
                                <pre><button onclick="submit()" class="btn btn-secondary text-secondary"><i class="fa fa-list-alt text-secondary"></i>  Add To Wishlist</button></pre>
                            </form>
                            <p>
                                <hr />
                            </p>
                            <form action="{{ url('cart') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $ad['id'] }}" name="item_id">
                                <pre><button class="btn btn-success text-white"><i class="fa fa-shopping-cart"></i>  Add To Cart</button></pre>
                            </form>

                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5" src="{{ asset('images/user/user-thumb.jpg') }}"
                                alt="">
                            <h4><a href="">{{ App\Models\User::find($ad['seller_id'])['name'] }}</a></h4>
                            <p class="member-time">{{ App\Models\User::find($ad['seller_id'])['created_at'] }}</p>
                            <a href="{{ url('ad') }}">See all ads</a>
                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a href="{{ url('createchat/' . $ad['seller_id']) }}"
                                        class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Safety tips widget -->
                        <div class="widget disclaimer">
                            <h5 class="widget-header">Safety Tips</h5>
                            <ul>
                                <li>Meet seller at a public place</li>
                                <li>Check the item before you buy</li>
                                <li>Pay only after collecting the item</li>
                                <li>Pay only after collecting the item</li>
                            </ul>
                        </div>
                        <!-- Coupon Widget -->
                        <div class="widget coupon text-center">
                            <!-- Coupon description -->
                            <p>Have a great product to post ? Share it with
                                your fellow users.
                            </p>
                            <!-- Submii button -->
                            <a href="{{ url('ad/create') }}" class="btn btn-transparent-white">Submit Listing</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>
@endsection
