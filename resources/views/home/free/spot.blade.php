@extends('home.layouts.free')

@section('content')
    @if($result)
        <div id="data">
            <div class="aui-row aui-padded-t-15  aui-padded-b-15">
                <div class="aui-col-xs-4">
                    <img src="{{URL::asset('img/spot_left.png')}}" class="style-spot-image" />
                </div>
                <div class="aui-col-xs-4 style-text-center">{{$scenes['count']}}个景点</div>
                <div class="aui-col-xs-4">
                    <img src="{{URL::asset('img/spot_right.png')}}" class="style-spot-image" />
                </div>
            </div>
            <div>
                <ul class="style-padding-l-20 style-padding-r-20">
                    @foreach($scenes['results'] as $k=>$scene)
                        @if($scene['subscenes']>0)
                        <a href="{{URL::asset('free/childspot')}}?code={{$code}}&scene_id={{$scene['id']}}" >
                        @endif
                            <li class="{{$k%2==0?'style-ul-left':'style-ul-right'}}">
                                <div class="style-position-relative">
                                    <img src="{{$scene['image']}}" class="style-ul-image" />
                                    <img src="{{URL::asset('img/spot_player.png')}}" class="style-play-icon" />
                                    @if($scene['subscenes']>0)
                                        <div class="aui-padded-5 aui-padded-r-15 style-child-count">{{$scene['subscenes']}}处介绍</div>
                                    @endif
                                </div>
                                <div class="style-width-100 style-display-table">
                                    <div class="style-ul-title style-vertical-align-middle style-display-table-cell">
                                        <div class="aui-ellipsis-2">
                                            意大利简介
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @if($scene['subscenes']>0)
                        </a>
                        @endif
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    @else
        <div class="style-text-center aui-margin-t-15">
            {{$msg}}
        </div>
    @endif
@endsection
@section('script')
@endsection