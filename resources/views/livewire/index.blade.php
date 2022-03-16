<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Buy & Sell Near You </h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
                    <div class="short-popular-category-list text-center">
                        <h2>Popular Category</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#"><i class="fa fa-bed"></i> Hotel</a></li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fa fa-grav"></i> Fitness</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fa fa-car"></i> Cars</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fa fa-cutlery"></i> Restaurants</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fa fa-coffee"></i> Cafe</a>
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
                                                    <input type="text" class="form-control my-2 my-lg-1" id="inputtext4" placeholder="What are you looking for">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <select class="w-100 form-control mt-lg-1 mt-md-2">
                                                        <option>Category</option>
                                                        <option value="1">Top rated</option>
                                                        <option value="2">Lowest Price</option>
                                                        <option value="4">Highest Price</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
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
            <a href="#">
                <img class="card-img-top img-fluid" src="images/{{$ad['images']}}" alt="Card image cap">
            </a>
        </div>
        <div class="card-body">
            <h4 class="card-title"><a href="single.html">{{$ad['title']}}</a></h4>
            <ul class="list-inline product-meta">
                <li class="list-inline-item">
                    <a href="single.html"><i class="fa fa-folder-open-o"></i>{{App\Models\Category::find($ad['category_id'])['name']}}</a>
                </li>
                <li class="list-inline-item">
                    <a href="#"><i class="fa fa-calendar"></i>{{$ad['created_at']}}</a>
                </li>
            </ul>
            <p class="card-text">{{$ad['description']}}</p>
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
                                <h4>Electronics <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '1'))}}</span></h4>
                            </div>
                            <ul class="category-list" >
                                <li><a href="#">Laptops <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '2'))}}</span></a></li>
                                <li><a href="#">Mobiles <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '3'))}}</span></a></li>
                                <li><a href="#">Tablets  <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '4'))}}</span></a></li>
                                <li><a href="#">Other Electronics <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '5'))}}</span></a></li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-apple icon-bg-2"></i>
                                <h4>Restaurants <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '6'))}}</span></h4>
                            </div>
                            <ul class="category-list" >
                                <li><a href="#">Cafe <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '7'))}}</span></a></li>
                                <li><a href="#">Fast food <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '8'))}}</span></a></li>
                                <li><a href="#">Restaurants  <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '9'))}}</span></a></li>
                                <li><a href="#">Food Track<span>{{count(App\Models\Ad::all()->where('category_id', '=' , '10'))}}</span></a></li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-home icon-bg-3"></i>
                                <h4>Real Estate <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '11'))}}</span></h4>
                            </div>
                            <ul class="category-list" >
                                <li><a href="#">Farms <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '12'))}}</span></a></li>
                                <li><a href="#">Gym <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '13'))}}</span></a></li>
                                <li><a href="#">Hospitals  <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '14'))}}</span></a></li>
                                <li><a href="#">Parolurs <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '15'))}}</span></a></li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-shopping-basket icon-bg-4"></i>
                                <h4>Apparels & Clothing <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '16'))}}</span></h4>
                            </div>
                            <ul class="category-list" >
                                <li><a href="#">Mens Wears <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '17'))}}</span></a></li>
                                <li><a href="#">Accessories <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '18'))}}</span></a></li>
                                <li><a href="#">Kids Wears <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '19'))}}</span></a></li>
                                <li><a href="#">Womens Wear <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '20'))}}</span></a></li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-briefcase icon-bg-5"></i>
                                <h4>Jobs <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '21'))}}</span></h4>
                            </div>
                            <ul class="category-list" >
                                <li><a href="#">It Jobs <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '22'))}}</span></a></li>
                                <li><a href="#">Cleaning & Washing <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '23'))}}</span></a></li>
                                <li><a href="#">Management  <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '24'))}}</span></a></li>
                                <li><a href="#">Voluntary Works <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '25'))}}</span></a></li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-car icon-bg-6"></i>
                                <h4>Vehicles <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '26'))}}</span></h4>
                            </div>
                            <ul class="category-list" >
                                <li><a href="#">Buses <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '27'))}}</span></a></li>
                                <li><a href="#">Cars <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '28'))}}</span></a></li>
                                <li><a href="#">Motobikes  <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '29'))}}</span></a></li>
                                <li><a href="#">Other Vehicles <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '30'))}}</span></a></li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i class="fa fa-paw icon-bg-7"></i>
                                <h4>Pets <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '31'))}}</span></h4>
                            </div>
                            <ul class="category-list" >
                                <li><a href="#">Cats <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '32'))}}</span></a></li>
                                <li><a href="#">Dogs <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '33'))}}</span></a></li>
                                <li><a href="#">Birds  <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '34'))}}</span></a></li>
                                <li><a href="#">Others <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '35'))}}</span></a></li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">

                            <div class="header">
                                <i class="fa fa-laptop icon-bg-8"></i>
                                <h4>Services <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '36'))}}</span></h4>
                            </div>
                            <ul class="category-list" >
                                <li><a href="#">Cleaning <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '37'))}}</span></a></li>
                                <li><a href="#">Car Washing <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '38'))}}</span></a></li>
                                <li><a href="#">Clothing  <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '39'))}}</span></a></li>
                                <li><a href="#">Business <span>{{count(App\Models\Ad::all()->where('category_id', '=' , '40'))}}</span></a></li>
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
                        <li class="list-inline-item"><a class="btn btn-main" href="ad-listing.html">Add Listing</a></li>
                        <li class="list-inline-item"><a class="btn btn-secondary" href="category.html">Browser Listing</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
