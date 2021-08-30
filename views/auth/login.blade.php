@extends('layouts.auth')

@section('content')
    <div class="d-flex justify-content-center text-center">
        <form class="form-signin w-25" action="/login/authenticate" method="post">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            @include('partials.alerts')

            <div class="row mb-2">
                <label for="email" class="sr-only">Email address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
            </div>
            <div class="row mb-2">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            </div>

            <button class="btn btn-lg btn-primary btn-block mt-3 mb-2" type="submit" name="signin" value="true">Sign in</button>
            <a href="/register">Create account</a>
            <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
        </form>
    </div>
@endsection