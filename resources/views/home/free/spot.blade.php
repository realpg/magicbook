@extends('home.layouts.free')

@section('content')
    @if($result)
        <div hidden>
            <audio controls="controls" loop id="player" hidden></audio>
        </div>
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
                        @else
                        <a href="javascript:" onclick="playMusic('{{$scene['audios'][0]['audio']}}','{{$scene['id']}}')" >
                        @endif
                            <li class="{{$k%2==0?'style-ul-left':'style-ul-right'}}">
                                <div class="style-position-relative">
                                    <img src="{{$scene['image']}}" class="style-ul-image" />
                                    <img src="{{URL::asset('img/spot_player.png')}}" id="play-{{$scene['id']}}" class="style-play-icon" />
                                    @if($scene['subscenes']>0)
                                        <div class="aui-padded-5 aui-padded-r-15 style-child-count">{{$scene['subscenes']}}处介绍</div>
                                    @endif
                                </div>
                                <div class="style-width-100 style-display-table">
                                    <div class="style-ul-title style-vertical-align-middle style-display-table-cell">
                                        <div class="aui-ellipsis-2">
                                            {{$scene['name']}}
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
    <script>
        $(function(){
            if('{{$result}}'){
                $('#header-title').text('{{$name}}')
                $("title").text('{{$name}}');
            }
        })
        function playMusic(audio,id){
            var player = $("#player")[0]; /*jquery对象转换成js对象*/
            var player_src=$("#player").attr("src")  //正在播放的音频文件
            console.log("正在播放的音频文件 is : " + JSON.stringify(player_src)+" ; 要播放的音频文件 is : " + JSON.stringify(audio))
            if(player_src==audio){
                if (player.paused){ /*如果已经暂停*/
                    player.play(); /*播放*/
                    $("#play-"+id).attr("src","{{URL::asset('img/spot_stop.png')}}")
                }else {
                    player.pause();/*暂停*/
                    $("#play-"+id).attr("src","{{URL::asset('img/spot_player.png')}}")
                }
            }
            else{
                player.pause();/*暂停*/
                $("#player").attr("src",audio);
                var player = $("#player")[0]; /*jquery对象转换成js对象*/
                var player_src2=$("#player").attr("src")
                console.log("要更换的音频文件 is : " + JSON.stringify(player_src2))
                player.play(); /*播放*/
                $(".style-play-icon").attr("src","{{URL::asset('img/spot_player.png')}}")
                $("#play-"+id).attr("src","{{URL::asset('img/spot_stop.png')}}")
            }
        }
    </script>
@endsection