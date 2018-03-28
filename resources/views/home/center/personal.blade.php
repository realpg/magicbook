@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container margin-top-100">
        @include('home.layouts.center')
        <div class="table-responsive">
            <table class="table border-0 font-size-10">
                <thead>
                    <tr class=" bg-lime-grey">
                        <th class="text-center border-0" style="border:0;">ID号</th>
                        <th class="text-center" style="border:0;">姓名</th>
                        <th class="text-center" style="border:0;">公司</th>
                        <th class="text-center" style="border:0;">手机号</th>
                        <th class="text-center" style="border:0;">类型</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" style="border:0;">{{$common['user']['id']}}</td>
                        <td class="text-center" style="border:0;">{{$common['user']['username']}}</td>
                        <td class="text-center" style="border:0;">{{$common['user']['company']}}</td>
                        <td class="text-center" style="border:0;">{{$common['user']['mobile']}}</td>
                        <td class="text-center" style="border:0;">{{implode('，',$common['user']['businesses'])}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection