@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <form method="POST" action="{{ url('ad') }}">
                @csrf
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your ad</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Ad:</h6>
                            <input name="title" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="Ad title go There">
                            <h6 class="font-weight-bold pt-4 pb-1">Health:</h6>
                            <input type="range" name="health" step="10" min="0" max="100"
                                class="border w-100 p-2 bg-white text-capitalize">

                            <h6 class="font-weight-bold pt-4 pb-1">Brand:</h6>
                            <input name="brand" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="Brand Name go There">
                            <h6 class="font-weight-bold pt-4 pb-1">Condition:</h6>
                            <div class="row px-3">
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white">
                                    <input type="radio" name="condition" value="1" id="personal">
                                    <label for="personal" class="py-2">Fresh</label>
                                </div>
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white ">
                                    <input type="radio" name="condition" value="0" id="business">
                                    <label for="business" class="py-2">Used</label>
                                </div>
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" id="" class="border p-3 w-100" rows="7"
                                placeholder="Write details about your product"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Select Ad Category:</h6>
                            <select name="category_id" id="inputGroupSelect" class="w-100" style="display: none;">
                                <option value="1">Select category</option>
                                @foreach (\App\Models\Category::all() as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                            <div class="nice-select w-100" tabindex="0"><span class="current">Select category</span>
                                <ul class="list {{ $count = 0 }} {{ $next = 1 }}">
                                    <li data-value="1" class="option selected">Select category</li>

                                    @foreach (\App\Models\Category::all() as $category)
                                        <li data-value="{{ $category['id'] }}" class="option {{ $count++ }}">
                                            @if ($count == $next)
                                                <b style="color: red"
                                                    class="{{ $next += 5 }}">{{ $category['name'] }}</b>
                                            @else
                                                {{ $category['name'] }}
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="price">
                                <h6 class="font-weight-bold pt-4 pb-1">Model:</h6>
                                <input name="model" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="Build Model">
                                <h6 class="font-weight-bold pt-4 pb-1">Specifications:</h6>
                                <input name="specifications" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="Ad Specifications">
                                <h6 class="font-weight-bold pt-4 pb-1">Location:</h6>
                                <input name="location" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="Ad Location">

                                <h6 class="font-weight-bold pt-4 pb-1">Item Price (Rs. PKR):</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="price" class="border-0 py-2 w-100 price"
                                            placeholder="Price" id="price">
                                    </div>
                                    <div class="col-lg-4 mrx-4 rounded bg-white my-2 ">
                                        <input type="checkbox" name="is_negotiable" value="1" id="Negotiable">
                                        <label for="Negotiable" class="py-2">Negotiable</label>
                                    </div>
                                </div>
                            </div>
                            <div class="choose-file text-center my-4 py-4 rounded">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                                    <span class="d-block">or</span>
                                    <span class="d-block btn bg-primary text-white my-3 select-files">Select files</span>
                                    <input type="file" multiple class="form-control-file d-none" id="file-upload"
                                        name="images">
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Post Your ad end -->

                <!-- submit button -->
                <div class="checkbox d-inline-flex">
                    <input type="checkbox" id="terms-&amp;-condition" class="mt-1">
                    <label for="terms-&amp;-condition" class="ml-2">By click you must agree with our
                        <span> <a class="text-success" href="#">Terms &amp; Condition and Posting Rules.</a></span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary d-block mt-2">Post Your Ad</button>
            </form>
        </div>
    </section>
    <br />
@endsection
