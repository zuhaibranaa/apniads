@extends('layouts.app')
@section('css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <button id="PostAd" class="btn btn-danger" style='border-radius: 9px 9px 0px 0px'>Post An Ad</button>
                    <button id="PostJob" class="btn btn-primary" style='border-radius: 9px 9px 0px 0px'>Post A Job</button>
                </div>
            </div>
            <div class="form">
            </div>

        </div>
    </section>
    <br />
    <script>
        AdForm = `
        <form method="POST" action="{{ url('ad') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Post Your ad start -->
                    <fieldset class="border border-gary p-4 mb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Post Your Ad</h3>
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
                                <select name="category_id" id="inputGroupSelect" class="w-100"
                                    style="display: none;">
                                    <option value="1">Select category</option>
                                    @foreach (\App\Models\Category::all() as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                                <div class="nice-select w-100" tabindex="0"><span class="current">Select
                                        category</span>
                                    <ul class="list {{ $count = 0 }} {{ $next = 1 }}">
                                        <li data-value="1" class="option selected">Select category</li>

                                        @foreach (\App\Models\Category::all() as $category)
                                            <li data-value="{{ $category['id'] }}" class="option {{ $count++ }}">
                                                @if ($count == $next)
                                                    <b style="color: red" class="{{ $next += 5 }}">{{ $category['name'] }}</b>
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
                                    <input name="specifications" type="text"
                                        class="border w-100 p-2 bg-white text-capitalize" placeholder="Ad Specifications">
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
                                        <span class="d-block font-weight-bold text-dark">Drop files anywhere to
                                            upload</span>
                                        <span class="d-block">or</span>
                                        <span class="d-block btn bg-primary text-white my-3 select-files">Select
                                            files</span>
                                        <input type="file" multiple class="form-control-file d-none" id="file-upload"
                                            name="images[]">
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
        `;
        jobForm = `
        <form method="POST" action="{{ url('job') }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="border border-gary p-4 mb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Post Your Job</h3>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="font-weight-bold pt-4 pb-1">Title Of Job:</h6>
                                <input name="title" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="Job title go There">
                                <h6 class="font-weight-bold pt-4 pb-1">Job Role:</h6>
                                <input name="role" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="Job Role go There">
                                <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                                <textarea name="description" id="" class="border p-3 w-100" rows="7"
                                    placeholder="Write details about your Job"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="font-weight-bold pt-4 pb-1">Select Ad Category:</h6>
                                <select name="category_id" id="inputGroupSelect" class="w-100"
                                    style="display: none;">
                                    <option value="1">Select category</option>
                                    @foreach (\App\Models\Category::all()->where('id', '>', 20)->where('id', '<', 26)
                                        as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                                <div class="nice-select w-100" tabindex="0"><span class="current">Select
                                        category</span>
                                    <ul class="list {{ $count = 0 }} {{ $next = 1 }}">
                                        <li data-value="1" class="option selected">Select category</li>

                                        @foreach (\App\Models\Category::all()->where('id', '>', 20)->where('id', '<', 26)
                                            as $category)
                                            <li data-value="{{ $category['id'] }}" class="option {{ $count++ }}">
                                                @if ($count == $next)
                                                    <b style="color: red" class="{{ $next += 5 }}">{{ $category['name'] }}</b>
                                                @else
                                                    {{ $category['name'] }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="price">
                                    <h6 class="font-weight-bold pt-4 pb-1">Required Experience :</h6>
                                    <input name="experience" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                        placeholder="Experience in Years">
                                    <h6 class="font-weight-bold pt-4 pb-1">Location:</h6>
                                    <input name="location" type="text" class="border w-100 p-2 bg-white text-capitalize"
                                        placeholder="Job Location">

                                    <h6 class="font-weight-bold pt-4 pb-1">Job Salary (Rs. PKR) & Required Qualification:</h6>
                                    <div class="row px-3">
                                        <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                            <input type="text" name="salary" class="border-0 py-2 w-100 price"
                                                placeholder="Salary" id="salary">
                                        </div>
                                        <div class="col-lg-6 mr-lg-6 rounded bg-white my-2 ">
                                            <input type="text" name="qualification" class="border-0 py-2 w-100 price"
                                                placeholder="Required Qualification" id="qualification">
                                        </div>
                                    </div>
                                    <div class="choose-file text-center my-4 py-4 rounded">
                                    <label for="file-upload">
                                        <span class="d-block font-weight-bold text-dark">Drop files anywhere to
                                            upload</span>
                                        <span class="d-block">or</span>
                                        <span class="d-block btn bg-primary text-white my-3 select-files">Select
                                            Images</span>
                                        <input type="file" multiple class="form-control-file d-none" id="file-upload"
                                            name="images[]">
                                    </label>
                                </div>
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
        `
        let buttonAd = document.querySelector('#PostAd');
        let buttonJob = document.querySelector('#PostJob');
        let form = document.querySelector('.form');
        form.innerHTML = AdForm;
        buttonAd.addEventListener('click', () => {
            buttonAd.className = 'btn btn-danger';
            buttonJob.className = 'btn btn-primary';
            form.innerHTML = AdForm;
        });
        buttonJob.addEventListener('click', () => {
            buttonJob.className = 'btn btn-danger';
            buttonAd.className = 'btn btn-primary';
            form.innerHTML = jobForm;
        });
    </script>
@endsection
