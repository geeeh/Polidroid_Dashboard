@extends('layouts.main')
<div class="dash-nav">
    @include('partials.dashnav')
@section('content')
<div class="home">
    <div class="row">
        <div>
            @include('partials.sidebar')
        </div>
        <div class="content">
            @yield('pages')
        </div>
    </div>
</div>
</div>
@endsection
