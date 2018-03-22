@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        @include('home.layouts.banner')
        <div class="middle">
            @include('home.layouts.edition')
        </div>
        @include('home.layouts.choice')
    </div>
@endsection
@section('script')
    <script>
    </script>
@endsection