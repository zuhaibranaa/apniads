@extends('layouts.app')
@section('content')
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form>
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What are you looking for">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control my-2 my-lg-0" id="inputCategory4" placeholder="Category">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Location">
							</div>
							<div class="form-group col-md-2">

								<button type="submit" class="btn btn-primary">Search Now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
	<h4 class="widget-header">All Category</h4>
	<ul class="category-list">
		<li><a href="category.html">Laptops <span>93</span></a></li>
		<li><a href="category.html">Iphone <span>233</span></a></li>
		<li><a href="category.html">Microsoft  <span>183</span></a></li>
		<li><a href="category.html">Monitors <span>343</span></a></li>
	</ul>
</div>

<div class="widget category-list">
	<h4 class="widget-header">Nearby</h4>
	<ul class="category-list">
		<li><a href="category.html">New York <span>93</span></a></li>
		<li><a href="category.html">New Jersy <span>233</span></a></li>
		<li><a href="category.html">Florida  <span>183</span></a></li>
		<li><a href="category.html">California <span>120</span></a></li>
		<li><a href="category.html">Texas <span>40</span></a></li>
		<li><a href="category.html">Alaska <span>81</span></a></li>
	</ul>
</div>

<div class="widget filter">
	<h4 class="widget-header">Show Produts</h4>
	<select>
		<option>Popularity</option>
		<option value="1">Top rated</option>
		<option value="2">Lowest Price</option>
		<option value="4">Highest Price</option>
	</select>
</div>

<div class="widget price-range w-100">
	<h4 class="widget-header">Price Range</h4>
	<div class="block">
						<input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5"
						data-slider-value="[0,5000]">
				<div class="d-flex justify-content-between mt-2">
						<span class="value">$10 - $5000</span>
				</div>
	</div>
</div>

<div class="widget product-shorting">
	<h4 class="widget-header">By Condition</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Used
	  </label>
	</div>
</div>

				</div>
			</div>
			<div class="col-md-9">
				<div class="category-search-filter">
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
				</div>
<div class="product-grid-list">
	<div class="row mt-30">
		@foreach ($ads as $ad)
        <div class="col-sm-12 col-lg-4 col-md-6">
            <!-- product card -->
<div class="product-item bg-light">
<div class="card">
    <div class="thumb-content">
<!-- <div class="price">$200</div> -->
<a href="single.html">
<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">
</a>
</div>
<div class="card-body">
<h4 class="card-title"><a href="{{url('ad/'.$ad['id'])}}">{{$ad['title']}}</a></h4>
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
		</div>
	</div>
</section>
@endsection
