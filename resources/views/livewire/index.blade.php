<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Buy & Sell Near You </h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around the
                        world</p>
                    <div class="short-popular-category-list text-center">
                        <h2>Popular Category</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ url('ad') }}"><i class="fa fa-bed"></i> Hotel</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ url('ad') }}"><i class="fa fa-grav"></i> Fitness</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ url('ad') }}"><i class="fa fa-car"></i> Cars</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ url('ad') }}"><i class="fa fa-cutlery"></i> Restaurants</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ url('ad') }}"><i class="fa fa-coffee"></i> Cafe</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                                                placeholder="What are you looking for">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select onchange="location.href='category/'+this.value"
                                                class="w-100 form-control mt-lg-1 mt-md-2">
                                                <option>Category</option>
                                                @foreach (\App\Models\Category::all() as $category)
                                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4"
                                                placeholder="Location">
                                        </div>
                                        <div class="form-group col-md-2 align-self-center">
                                            <button type="submit" class="btn btn-primary">Search Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Latest Ads</h2>
                    <p>Latest Ads Published Just Now.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- offer 01 -->
            <div class="col-lg-12">
                <div class="trending-ads-slide">
                    @foreach ($ads as $ad)
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="{{ url('ad/' . $ad['id']) }}">
                                            @php
                                                $arr = trim($ad['images'], '[');
                                                $arr = trim($arr, ']');
                                                $r = explode(',', $arr);
                                            @endphp
                                            <img class="card-img-top img-fluid"
                                                src="images/{{ Str::substr($r[0], 1, -1) }}" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a
                                                href="{{ url('ad/' . $ad['id']) }}">{{ $ad['title'] }}</a></h4>
                                        <span class="bg-warning text-white">Rs. {{ $ad['price'] }}</span>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="{{ url('ad/' . $ad['id']) }}"><i
                                                        class="fa fa-folder-open-o"></i>{{ App\Models\Category::find($ad['category_id'])['name'] }}</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ url('ad/' . $ad['id']) }}"><i
                                                        class="fa fa-calendar"></i>{{ $ad['created_at'] }}</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">{{ $ad['description'] }}</p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
</section>

<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Latest Jobs</h2>
                    <p>Latest Job Postings.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- offer 01 -->
            <div class="col-lg-12">
                <div class="trending-ads-slide">
                    @foreach ($jobs as $ad)
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="{{ url('job/' . $ad['id']) }}">
                                            @php
                                                $arr = trim($ad['images'], '[');
                                                $arr = trim($arr, ']');
                                                $r = explode(',', $arr);
                                            @endphp
                                            <img class="card-img-top img-fluid"
                                                src="images/{{ Str::substr($r[0], 1, -1) }}" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a
                                                href="{{ url('job/' . $ad['id']) }}">{{ $ad['title'] }}</a></h4>
                                        <span class="bg-warning text-white">Rs. {{ $ad['salary'] }}</span>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="{{ url('job/' . $ad['id']) }}"><i
                                                        class="fa fa-folder-open-o"></i>{{ App\Models\Category::find($ad['category_id'])['name'] }}</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ url('job/' . $ad['id']) }}"><i
                                                        class="fa fa-calendar"></i>{{ $ad['created_at'] }}</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">{{ $ad['description'] }}</p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
</section>
<section class=" section">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section title -->
                <div class="section-title">
                    <h2>All Categories</h2>
                    <p>All Supported Ad Categories and Their Counts</p>
                </div>
                <div class="row">
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-laptop icon-bg-1"></i>
                                <h4>Electronics
                                    <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '1')) }}</span>
                                </h4>
                            </div>
                            <ul class="category-list">
                                <li><a href="{{ url('category/2') }}">Laptops
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '2')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/3') }}">Mobiles
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '3')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/4') }}">Tablets
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '4')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/5') }}">Other Electronics
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '5')) }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-apple icon-bg-2"></i>
                                <h4>Restaurants
                                    <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '6')) }}</span>
                                </h4>
                            </div>
                            <ul class="category-list">
                                <li><a href="{{ url('category/7') }}">Cafe
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '7')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/8') }}">Fast food
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '8')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/9') }}">Restaurants
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '9')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/10') }}">Food
                                        Track<span>{{ count(App\Models\Ad::all()->where('category_id', '=', '10')) }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-home icon-bg-3"></i>
                                <h4>Real Estate
                                    <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '11')) }}</span>
                                </h4>
                            </div>
                            <ul class="category-list">
                                <li><a href="{{ url('category/12') }}">Farms
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '12')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/13') }}">Gym
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '13')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/14') }}">Hospitals
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '14')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/15') }}">Parolurs
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '15')) }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-shopping-basket icon-bg-4"></i>
                                <h4>Apparels & Clothing
                                    <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '16')) }}</span>
                                </h4>
                            </div>
                            <ul class="category-list">
                                <li><a href="{{ url('category/17') }}">Mens Wears
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '17')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/18') }}">Accessories
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '18')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/19') }}">Kids Wears
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '19')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/20') }}">Womens Wear
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '20')) }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-briefcase icon-bg-5"></i>
                                <h4>Jobs
                                    <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '21')) }}</span>
                                </h4>
                            </div>
                            <ul class="category-list">
                                <li><a href="{{ url('category/22') }}">It Jobs
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '22')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/23') }}">Cleaning & Washing
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '23')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/24') }}">Management
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '24')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/25') }}">Voluntary Works
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '25')) }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-car icon-bg-6"></i>
                                <h4>Vehicles
                                    <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '26')) }}</span>
                                </h4>
                            </div>
                            <ul class="category-list">
                                <li><a href="{{ url('category/27') }}">Buses
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '27')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/28') }}">Cars
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '28')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/29') }}">Motobikes
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '29')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/30') }}">Other Vehicles
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '30')) }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-paw icon-bg-7"></i>
                                <h4>Pets
                                    <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '31')) }}</span>
                                </h4>
                            </div>
                            <ul class="category-list">
                                <li><a href="{{ url('category/32') }}">Cats
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '32')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/33') }}">Dogs
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '33')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/34') }}">Birds
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '34')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/35') }}">Others
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '35')) }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">

                            <div class="header">
                                <i class="fa fa-laptop icon-bg-8"></i>
                                <h4>Services
                                    <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '36')) }}</span>
                                </h4>
                            </div>
                            <ul class="category-list">
                                <li><a href="{{ url('category/37') }}">Cleaning
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '37')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/38') }}">Car Washing
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '38')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/39') }}">Clothing
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '39')) }}</span></a>
                                </li>
                                <li><a href="{{ url('category/40') }}">Business
                                        <span>{{ count(App\Models\Ad::all()->where('category_id', '=', '40')) }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->


                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<section class="call-to-action overly bg-3 section-sm">
    <!-- Container Start -->
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-md-8">
                <div class="content-holder">
                    <h2>Start today to get more exposure and
                        grow your business</h2>
                    <ul class="list-inline mt-30">
                        <li class="list-inline-item"><a class="btn btn-main" href="{{ url('ad/create') }}">Add
                                Listing</a></li>
                        <li class="list-inline-item"><a class="btn btn-secondary" href="{{ url('ad') }}">Browser
                                Listing</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
