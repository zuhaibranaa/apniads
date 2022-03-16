@extends('layouts.app')
@section('content')
<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user">
						<!-- User Image -->
						<div class="image d-flex justify-content-center">
							<img src="{{asset('images/'.auth()->user()->image)}}" alt="" class="">
						</div>
						<!-- User Name -->
						<h5 class="text-center">{{auth()->user()->name}}</h5>
						<p class="text-center">{{auth()->user()->email}}</p>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit profile</h2>
					{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p> --}}
				</div>
				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Edit Personal Information</h3>
							<form method="POST" action="{{url('profile/'.auth()->user()->id)}}">
                                @csrf
                                @method('PUT')
								<!-- First Name -->
								<div class="form-group">
									<label for="first-name">User Name</label>
									<input type="text" class="form-control" name="name" id="first-name" value="{{auth()->user()->name}}">
								</div>
                                <div class="form-group">
									<label for="first-name">Phone</label>
									<input type="text" name="phone" class="form-control" id="first-name" value="{{auth()->user()->phone}}">
								</div>
                                <br>

								<!-- File chooser -->
								<div class="form-group choose-file d-inline-flex">
									<i class="fa fa-user text-center px-3"></i>
									<input type="file" name="image" class="form-control-file mt-2 pt-1" id="input-file">
								 </div>
								<!-- Submit button -->
                                <br>
                                <br>

							{{-- </form> --}}
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Password</h3>
						{{-- <form action="#"> --}}
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-password">Current Password</label>
								<input type="password" name="current_password" class="form-control" id="current-password">
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" name="password"  class="form-control" id="new-password">
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Confirm New Password</label>
								<input type="password" name="password_confirmation" class="form-control" id="confirm-password">
							</div>
							<!-- Submit Button -->
                        </div>

                </div>
                <input style="align-content: center; margin-left: 20rem; margin-right: 20rem" type="submit" class="btn btn-transparent" value="Save My Changes"/>
            </form>
					<div class="col-lg-6 col-md-6">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
