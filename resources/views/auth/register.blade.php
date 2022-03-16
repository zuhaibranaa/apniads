@extends('layouts.app')


@section('content')


<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <fieldset class="p-4">
                                <input type="text" placeholder="Name*" class="border p-3 w-100 my-2 @error('name') is-invalid @enderror" id="name" name="name" required autofocus>
                                <input type="email" id="email" name="email" required placeholder="Email*" class="border p-3 w-100 my-2 @error('email') is-invalid @enderror">
                                <input type="text" id="phone" name="phone" required placeholder="Phone*" class="border p-3 w-100 my-2">
                                Image : <input type="file" id="image" value='Image' name="image" required class="border p-3 w-100 my-2">
                                <input type="password" id="password" name="password" placeholder="Password*" class="border p-3 w-100 my-2 @error('password') is-invalid @enderror" required>
                                <input type="password" placeholder="Confirm Password*" name="password_confirmation" id="password-confirm" required class="border p-3 w-100 my-2">
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <input type="checkbox" id="registering" class="mt-1">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="#">Terms & Conditions</a></label>
                                </div>
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Register Now</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>


@endsection
