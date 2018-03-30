@extends('home.layouts.free')

@section('content')
    @if($result)
    <div id="data">
        <div class="aui-margin-b-10">
            <div class="style-position-relative">
                <img src="{{URL::asset('img/example.jpg')}}" class="style-width-100" />
                <img src="{{URL::asset('img/spot_player.png')}}" class="style-play-icon" />
                <div class="aui-padded-5 aui-padded-r-15 style-child-spot-count" >14处介绍</div>
                <div class="aui-padded-5 aui-padded-l-15 style-child-spot-title" >威尼斯广场</div>
            </div>
        </div>
        <div class="aui-row style-child-padding">
            <div class="aui-col-xs-4 style-child-padding style-child-width">
                <div class="style-position-relative">
                    <img src="{{URL::asset('img/example.jpg')}}" class="style-ul-child-image" />
                    <img src="{{URL::asset('img/child_player.png')}}" class="style-play-icon" />
                </div>
                <div class="style-width-100 style-display-table">
                    <div class="style-ul-child-title style-vertical-align-middle style-display-table-cell">
                        <div class="aui-ellipsis-2">
                            意大利简介
                        </div>
                    </div>
                </div>
            </div>
            <div class="aui-col-xs-4 style-child-padding style-child-width">
                <div class="style-position-relative">
                    <img src="{{URL::asset('img/example.jpg')}}" class="style-ul-child-image" />
                    <img src="{{URL::asset('img/child_player.png')}}" class="style-play-icon" />
                </div>
                <div class="style-width-100 style-display-table">
                    <div class="style-ul-child-title style-vertical-align-middle style-display-table-cell">
                        <div class="aui-ellipsis-2">
                            意大利简介
                        </div>
                    </div>
                </div>
            </div>
            <div class="aui-col-xs-4 style-child-padding style-child-width">
                <div class="style-position-relative">
                    <img src="{{URL::asset('img/example.jpg')}}" class="style-ul-child-image" />
                    <img src="{{URL::asset('img/child_player.png')}}" class="style-play-icon" />
                </div>
                <div class="style-width-100 style-display-table">
                    <div class="style-ul-child-title style-vertical-align-middle style-display-table-cell">
                        <div class="aui-ellipsis-2">
                        意大利简介意大利简介意大利简介意大利简介意大利简介意大利简介
                        </div>
                    </div>
                </div>
            </div>
            <div class="aui-col-xs-4 style-child-padding style-child-width">
                <div class="style-position-relative">
                    <img src="{{URL::asset('img/example.jpg')}}" class="style-ul-child-image" />
                    <img src="{{URL::asset('img/child_player.png')}}" class="style-play-icon" />
                </div>
                <div class="style-width-100 style-display-table">
                    <div class="style-ul-child-title style-vertical-align-middle style-display-table-cell">
                        <div class="aui-ellipsis-2">
                            意大利简介
                        </div>
                    </div>
                </div>
            </div>
            <div class="aui-col-xs-4 style-child-padding style-child-width">
                <div class="style-position-relative">
                    <img src="{{URL::asset('img/example.jpg')}}" class="style-ul-child-image" />
                    <img src="{{URL::asset('img/child_player.png')}}" class="style-play-icon" />
                </div>
                <div class="style-width-100 style-display-table">
                    <div class="style-ul-child-title style-vertical-align-middle style-display-table-cell">
                        <div class="aui-ellipsis-2">
                            意大利简介
                        </div>
                    </div>
                </div>
            </div>
            <div class="aui-col-xs-4 style-child-padding style-child-width">
                <div class="style-position-relative">
                    <img src="{{URL::asset('img/example.jpg')}}" class="style-ul-child-image" />
                    <img src="{{URL::asset('img/child_player.png')}}" class="style-play-icon" />
                </div>
                <div class="style-width-100 style-display-table">
                    <div class="style-ul-child-title style-vertical-align-middle style-display-table-cell">
                        <div class="aui-ellipsis-2">
                            意大利简介意大利简介意大利简介意大利简介意大利简介意大利简介
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="style-text-center aui-margin-t-15">
            {{$msg}}
        </div>
    @endif
@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection