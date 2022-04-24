@extends('layouts.app')
@section('content')
    <section class="page-search">
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-sidebar">
                        <div class="widget category-list">
                            <h4 class="widget-header">All Category</h4>
                            <ul class="category-list">
                                @foreach (\App\Models\Category::all() as $category)
                                    <li><a href="{{ url('category/' . $category['id']) }}">{{ $category['name'] }}
                                            <span>{{ count(\App\Models\Ad::all()->where('category_id', '=', $category['id'])) }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="widget category-list">
	<h4 class="widget-header">Nearby</h4>
	<ul class="category-list">
		<li><a href="category.html">New York <span>93</span></a></li>
	</ul>
</div> --}}

                        {{-- <div class="widget filter">
	<h4 class="widget-header">Show Produts</h4>
	<select>
		<option>Popularity</option>
		<option value="1">Top rated</option>
		<option value="2">Lowest Price</option>
		<option value="4">Highest Price</option>
	</select>
</div> --}}

                        <div class="widget price-range w-100">
                            <h4 class="widget-header">Price Range</h4>
                            <div class="block">
                                <input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000"
                                    data-slider-step="5" data-slider-value="[0,5000]">
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="value">Rs. 0 - 5000</span>
                                </div>
                            </div>
                        </div>

                        <div class="widget product-shorting">
                            <h4 class="widget-header">By Condition</h4>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="new" type="checkbox" value="">
                                    New
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="used" type="checkbox" value="">
                                    Used
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                    {{-- <div class="category-search-filter">
					<div class="row">
						<div class="col-md-12">
							<strong>Sort</strong>
							<select>
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
					</div>
				</div> --}}
                    <div class="product-grid-list">
                        <div class="row mt-30">
                            @foreach ($ads as $ad)
                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <!-- product card -->
                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="thumb-content">
                                                <!-- <div class="price">$200</div> -->
                                                <a href="{{ url('ad/' . $ad['id']) }}">
                                                    <img class="card-img-top img-fluid"
                                                        src="{{ asset('images/' . $ad['images']) }}" alt="Card image cap">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><a
                                                        href="{{ url('ad/' . $ad['id']) }}">{{ $ad['title'] }}</a></h4>
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
        </div>
        </div>
    </section>
@endsection
