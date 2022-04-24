@extends('layouts.app')
@section('content')
<section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
      <!-- Row Start -->
      <div class="row">
        <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
          <div class="sidebar">
            <!-- User Widget -->
            <div class="widget user-dashboard-profile">
              <!-- User Image -->
              <div class="profile-thumb">
                <img src={{asset('images/'.auth()->user()->image)}} alt="" class="rounded-circle">
              </div>
              <!-- User Name -->
              <h5 class="text-center">{{$user['name']}}</h5>
              <p>Joined {{$user['created_at']}}</p>
              <a href="{{url('profile/edit')}}" class="btn btn-main-sm">Edit Profile</a>
            </div>
            <!-- Dashboard Links -->
            <div class="widget user-dashboard-menu">
              <ul>
                <li class="{{Request::is('dashboard') ? 'active' : ''}}"><a href="{{url('dashboard')}}"><i class="fa fa-user"></i> My Ads</a></li>
                <li class="{{Request::is('dashboard') ? 'active' : ''}}"><a href="{{url('dashboard')}}"><i class="fa fa-shopping-basket"></i> My Orders</a></li>
                @if (auth()->user()->is_admin)
                    <li class="{{Request::is('dashboard/all-ads') ? 'active' : ''}}"><a href="{{url('dashboard/all-ads')}}"><i class="fa fa fa-check-square-o"></i> All Ads</a></li>
                    <li class="{{Request::is('dashboard/pending-ads') ? 'active' : ''}}"><a href="{{url('dashboard/pending-ads')}}"><i class="fa fa-bolt"></i> Pending Ads<span>{{$count}}</span></a></li>
                    <li class="{{Request::is('dashboard/pending-ads') ? 'active' : ''}}"><a href="{{url('dashboard/pending-ads')}}"><i class="fa fa-shopping-cart"></i> Active Orders<span>{{$count}}</span></a></li>
                    <li class="{{Request::is('dashboard/pending-ads') ? 'active' : ''}}"><a href="{{url('dashboard/pending-ads')}}"><i class="fa fa-check-square-o fa-shoping-cart"></i> Delivered Orders<span>{{$count}}</span></a></li>
                @endif
                <li><a href="#"><i class="fa fa-cog"></i> Logout</a></li>

                @if (!auth()->user()->is_admin)
                <li><a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete
                    Account</a></li>
                @endif
              </ul>
            </div>

            <!-- delete-account modal -->
                                      <!-- delete account popup modal start-->
                  <!-- Modal -->
                  <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                          <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                          <h6 class="py-2">Are you sure you want to delete your account?</h6>
                          <p>Do you really want to delete these records? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- delete account popup modal end-->
            <!-- delete-account modal -->

          </div>
        </div>
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
          <!-- Recently Favorited -->
          <div class="widget dashboard-container my-adslist">
            <h3 class="widget-header">My Ads</h3>
            <table class="table table-responsive product-dashboard-table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Product Title</th>
                  <th class="text-center">Category</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($ads as $ad)
                  <tr>

                    <td class="product-thumb">
                      <img width="80px" height="auto" src={{asset('images/'.$ad['images'])}} alt="image description"></td>
                    <td class="product-details">
                      <h3 class="title">{{$ad['title']}}</h3>
                      <span class="add-id"><strong>Ad ID:</strong> {{$ad['id']}}</span>
                      <span><strong>Posted on: </strong><time>{{$ad['created_at']}}</time> </span>
                      <span class="status active"><strong>Status</strong>{{$ad['status']}}</span>
                      <span class="location"><strong>Location</strong>{{$ad['location']}}</span>
                    </td>
                    <td class="product-category"><span class="categories">{{App\Models\Category::find($ad['category_id'])['name']}}</span></td>
                    <td class="action" data-title="Action">
                      <div class="">
                        <ul class="list-inline justify-content-center">
                          <li class="list-inline-item">
                            <a data-toggle="tooltip" data-placement="top" title="view" class="view" href="{{url('ad/'.$ad['id'])}}">
                              <i class="fa fa-eye"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="">
                              <i class="fa fa-pencil"></i>
                            </a>
                          </li>
                        <form id="delete-{{$ad['id']}}" action="{{url('ad/'.$ad['id'])}}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                          <li class="list-inline-item">
                            <a class="delete" onclick="document.getElementById('delete-{{$ad['id']}}').submit()" data-toggle="tooltip" data-placement="top" title="Delete">
                              <i class="fa fa-trash"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>

          </div>

        </div>
      </div>
      <!-- Row End -->
    </div>
    <!-- Container End -->
  </section>
@endsection
