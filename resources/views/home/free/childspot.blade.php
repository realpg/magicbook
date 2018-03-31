@extends('home.layouts.free')

@section('content')
    @if($result)
        <div hidden>
            <audio controls="controls" loop id="player" hidden></audio>
        </div>
        @if($subscenes['count']>0)
            <div id="data">
                <div class="aui-margin-b-10">
                    <div class="style-position-relative">
                        {{--<div id="aui-slide">--}}
                            {{--<div class="aui-slide-wrap" >--}}
                                {{--@if($subscenes['results'][0]['images'])--}}
                                    {{--@foreach($subscenes['results'][0]['images'] as $image)--}}
                                    {{--<div class="aui-slide-node bg-dark">--}}
                                        {{----}}
                                    {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<div class="aui-slide-page-wrap"><!--分页容器--></div>--}}
                        {{--</div>--}}
                        <img src="{{URL::asset('img/example.jpg')}}" class="style-width-100" />
                        <img src="{{URL::asset('img/spot_player.png')}}" class="style-play-header-icon" />
                        <div class="aui-padded-5 aui-padded-r-15 style-child-spot-count">{{$subscenes['count']}}处介绍</div>
                        <div class="aui-padded-5 aui-padded-l-15 style-child-spot-title" id="subscenes-title">{{$subscenes['results'][0]['name']}}</div>
                    </div>
                </div>
                <div class="aui-row style-child-padding">
                    @foreach($subscenes['results'] as $k=>$subscene)
                        <a href="javacript:" onclick="playMusic('{{$subscene['audios'][0]['audio']}}','{{$subscene['id']}}')">
                            <div class="aui-col-xs-4 style-child-padding style-child-width">
                                <div class="style-position-relative">
                                    @if($subscene['image'])
                                        <img src="{{$subscene['image']}}" class="style-ul-child-image" />
                                    @endif
                                    <img src="{{URL::asset('img/child_player.png')}}" class="style-play-icon" id="play-{{$subscene['id']}}" />
                                </div>
                                <div class="style-width-100 style-display-table">
                                    <div class="style-ul-child-title style-vertical-align-middle style-display-table-cell">
                                        <div class="aui-ellipsis-2">
                                            {{$subscene['name']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    @else
        <div class="style-text-center aui-margin-t-15">
            {{$msg}}
        </div>
    @endif
@endsection
@section('script')
<script type="text/javascript" src="{{URL::asset('js/aui/aui-slide.js')}}"></script>
<script type="text/javascript">
    {{--$(function(){--}}
        {{--if('{{$result}}'){--}}
            {{--$('#header-title').text('{{$name}}')--}}
            {{--$("title").text('{{$name}}');--}}
        {{--}--}}
    {{--})--}}
    function playMusic(audio,id){
        var player = $("#player")[0]; /*jquery对象转换成js对象*/
        var player_src=$("#player").attr("src")  //正在播放的音频文件
        console.log("正在播放的音频文件 is : " + JSON.stringify(player_src)+" ; 要播放的音频文件 is : " + JSON.stringify(audio))
        if(player_src==audio){
            if (player.paused){ /*如果已经暂停*/
                player.play(); /*播放*/
                $("#play-"+id).attr("src","{{URL::asset('img/child_stop.png')}}")
            }else {
                player.pause();/*暂停*/
                $("#play-"+id).attr("src","{{URL::asset('img/child_player.png')}}")
            }
        }
        else{
            player.pause();/*暂停*/
            $("#player").attr("src",audio);
            var player = $("#player")[0]; /*jquery对象转换成js对象*/
            var player_src2=$("#player").attr("src")
            console.log("要更换的音频文件 is : " + JSON.stringify(player_src2))
            player.play(); /*播放*/
            $(".style-play-icon").attr("src","{{URL::asset('img/child_player.png')}}")
            $("#play-"+id).attr("src","{{URL::asset('img/child_stop.png')}}")
        }
    }
</script>
@endsection