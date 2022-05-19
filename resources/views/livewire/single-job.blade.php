@extends('layouts.app')
@section('css')
<style>
    body {
        background-color: #f7f6f6
    }

    .card {

        border: none;
        box-shadow: 5px 6px 6px 2px #e9ecef;
        border-radius: 4px;
    }


    .dots{

        height: 4px;
      width: 4px;
      margin-bottom: 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
    }

    .badge{

            padding: 7px;
            padding-right: 9px;
        padding-left: 16px;
        box-shadow: 5px 6px 6px 2px #e9ecef;
    }

    .user-img{

        margin-top: 4px;
    }

    .check-icon{

        font-size: 17px;
        color: #c3bfbf;
        top: 1px;
        position: relative;
        margin-left: 3px;
    }

    .form-check-input{
        margin-top: 6px;
        margin-left: -24px !important;
        cursor: pointer;
    }


    .form-check-input:focus{
        box-shadow: none;
    }


    .icons i{

        margin-left: 8px;
    }
    .reply{

        margin-left: 12px;
    }

    .reply small{

        color: #b7b4b4;

    }


    .reply small:hover{

        color: green;
        cursor: pointer;

    }
    </style>
@endsection
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
                            @php
                                $arr = trim($ad['images'], '["');
    $arr = trim($arr, '"]');
                                $r = explode('","', $arr);
                            @endphp
                            @foreach ($r as $image)
                                <div class="product-slider-item my-4" data-image="{{ asset('images/' . $image) }}">
                                    <img class="img-fluid w-100" src="{{ asset('images/' . $image) }}" alt="product-img">
                                </div>
                            @endforeach
                        </div>
                        <!-- product slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Details</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Job Description</h3>
                                    <p>{{ $ad['description'] }}</p>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <h3 class="tab-title">Job Details</h3>
                                    <table class="table table-bordered product-table">
                                        <tbody>
                                            <tr>
                                                <td>Added</td>
                                                <td>{{ $ad['created_at'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Location</td>
                                                <td>{{ $ad['location'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Qualifications</td>
                                                <td>{{ $ad['qualification'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Req. Experience</td>
                                                <td>
                                                    {{ $ad['required_experience'] }}
                                                </td>
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
                            <h4>Salary</h4>
                            <p>Rs. {{ $ad['salary'] }}</p>
                            <hr />
                            <pre><button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-secondary text-secondary"><i class="fa fa-list-alt text-secondary"></i>  Apply For This Job</button></pre>

                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5"
                                src="{{ asset('images/'.App\Models\User::find($ad['seller_id'])['image']) }}" alt="">
                            <h4><a href="">{{ App\Models\User::find($ad['seller_id'])['name'] }}</a></h4>
                            <p class="member-time">{{ App\Models\User::find($ad['seller_id'])['created_at'] }}</p>
                            <a href="{{ url('job') }}">See All Jobs</a>
                            @if (auth()->user()->id != $ad['seller_id'])
                            <ul class="list-inline mt-20">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createChat">
                                    Contact Employer
                                </button>
                            </ul>
                            @endif
                        </div>
                        <!-- Coupon Widget -->
                        <div class="widget coupon text-center">
                            <!-- Coupon description -->
                            <p>Have a great Job to post ? Share it with
                                your fellow users.
                            </p>
                            <!-- Submii button -->
                            <a href="{{ url('ad/create') }}" class="btn btn-transparent-white">Submit Listing</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Enter Your Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="ApplicationForm" action="{{ url('job-application') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="appliedby" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="jobid" value="{{ $ad->id }}">
                                <label for="contact">Enter Your Name : </label>
                                <input required class="form-control" type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="contact">Enter Your Phone : </label>
                                <input required class="form-control" type="text" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="contact">Enter Your Age : </label>
                                <input required class="form-control" type="text" name="age" id="age">
                            </div>
                            <div class="form-group">
                                <label for="contact">Enter Your Experience : </label>
                                <input required class="form-control" type="text" name="experience" id="experience">
                            </div>
                            <div class="form-group">
                                <label for="contact">Enter Your Availability : </label>
                                <input required class="form-control" type="date" name="availability" id="availability">
                            </div>
                            <div class="form-group">
                                <label for="contact">Upload Your CV / Resume : </label>
                                <input required class="form-control" type="file" name="cv" id="cv">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="document.getElementById('ApplicationForm').submit()"
                            class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="createChat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sendMessage" action="{{ url('chat') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="from_user" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="to_user" value="{{ $ad['seller_id'] }}">
                            <label for="message">Enter Your Message : </label>
                            <textarea name="messge" class="form-control" id="message" placeholder="Enter Text Here"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="document.getElementById('sendMessage').submit()"
                        class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">

        <div class="row  d-flex justify-content-center">

            <div class="col-md-8">

                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5>User Comments</h5>
                </div>
                @foreach ($comments as $comment)
                <div class="card p-3">

                    <div class="d-flex justify-content-between align-items-center">

                  <div class="user d-flex flex-row align-items-center">

                    <img src="{{asset('images/' . App\Models\User::find($comment['from'])['image'])}}" width="30" class="user-img rounded-circle mr-2">
                    <span><small class="font-weight-bold text-primary">{{(App\Models\User::find($comment['from'])['name'])}}</small> <small class="font-weight-bold">{{$comment['text']}}</small></span>

                  </div>


                  <small>@php $date = new DateTime($comment['created_at'])@endphp {{date_format($date,'l jS F Y \a\t g:i A' )}}</small>
                  </div>


                  <div class="action d-flex justify-content-between mt-2 align-items-center">
                    @if(auth()->user()->id == $comment['from'])
                    <div class="reply px-4">
                        <small>Remove</small>
                    </div>
                    @endif
                  </div>



                </div>
                @endforeach
                <form action="{{url('comment')}}" method="post">
                    @csrf
                    <div class="card p-3">
                        <div class="form-group">
                            <input type="hidden" name="is_ad" value="0">
                            <input type="hidden" name="listing_id" value="{{$ad['id']}}">
                           <textarea name="text" class="form-control" placeholder="Type Your Comment Here"></textarea>
                          </div>
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <br/>
@endsection
