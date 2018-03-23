@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        <div class="container padding-top-40 padding-bottom-40" id="service">
            @if($service)
                {!! $service['content'] !!}
            @endif
        </div>
    </div>
@endsection
@section('script')
@endsection