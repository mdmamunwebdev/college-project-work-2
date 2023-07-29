@extends('rioUser.auth.master')
@section('main-content')
    <form action="{{ route('login') }}" method="post">
        @csrf

        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        @if( Session::get('login_msg') )
            <div class="alert alert-danger alert-dismissible fade show" id="loginAlert" role="alert">
                <strong>OPPS !</strong> {{ Session::get('login_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                   required/>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                   required/>
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
    </form>
@endsection
@section('script')
    <script>

        function loginAlert() {
            const alert = bootstrap.Alert.getOrCreateInstance('#loginAlert')
            alert.close()
        }

        setTimeout(loginAlert, 20000)
    </script>
@endsection
