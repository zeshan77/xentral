@extends('layouts.auth')

@section('content')

    <div class="d-flex justify-content-center text-center">
        <form class="form-signin w-25" action="/register/create" method="post">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

            @include('partials.alerts')

            <div class="row mb-2">
                <label for="name" class="sr-only">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="" autofocus="">
            </div>

            <div class="row mb-2">
                <label for="email" class="sr-only">Email address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
            </div>

            <div class="row mb-2">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
            </div>

            <div class="row mt-3">
                <button class="btn btn-lg btn-primary btn-block mb-2" type="submit" value="true" name="register">Sign up</button>
                Already have an account? <a href="/login">Login here</a>
                <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
            </div>
        </form>
    </div>

@endsection