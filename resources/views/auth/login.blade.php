@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="container sign">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body row">
                <div class="col-md-7 colored"></div>
                <div class="col-md-5">
                <h4>SIGN IN</h4>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group">
                            <!-- <label for="email">{{ __('E-Mail') }}</label> -->
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="EMAIL" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label for="password">{{ __('Password') }}</label> -->
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="PASSWORD" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-8 login-btn">
                                <button type="submit" class="btn btn-primary">
                                    {{ __("Let's Go") }}
                                </button>
</div>
                        </div>
                        <!-- <div class="form-group">
                        <div class="col-md-8">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
</div>
                        </div> -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
