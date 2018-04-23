@extends('home.layouts.free')

@section('content')
    @if($result)
        <div hidden>
            <audio controls="controls" loop id="player" hidden></audio>
        </div>
        <div hidden>
            <audio controls="controls" loop id="audio" src="{{$subscenes['scene']['audios'][0]['audio']}}" hidden></audio>
        </div>
        @if($subscenes['count']>0)
            <div id="data">
                <div class="aui-margin-b-10">
                    <a href="javacript:" onclick="playAudio()">
                        <div class="style-position-relative">
                            <img src="{{$subscenes['scene']['image']}}" class="style-width-100" style="height:170px;" />
                            <img src="{{URL::asset('img/spot_player.png')}}" class="style-play-header-icon" />
                            <div class="aui-padded-5 aui-padded-r-15 style-child-spot-count" style="height:25px;line-height:25px;font-size: 12px;">{{$subscenes['count']}}处介绍</div>
                            <div class="aui-padded-5 aui-padded-l-15 style-child-spot-title" id="subscenes-title" style="height:25px;line-height:25px;font-size: 12px;">{{$subscenes['scene']['name']}}</div>
                        </div>
                    </a>
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
    $(function(){
        {{--$('#header-title').text('{{$name?$name:'魔法行程单'}}')--}}
        $("title").text('{{$name?$name:'魔法行程单'}}');
    })
    function playMusic(audio,id){
        $("#audio")[0].pause();/*暂停*/
        $(".style-play-header-icon").attr("src","{{URL::asset('img/spot_player.png')}}")


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
    function playAudio(){
        $("#player")[0].pause();/*暂停*/
        $(".style-play-icon").attr("src","{{URL::asset('img/child_player.png')}}")

        var player = $("#audio")[0]; /*jquery对象转换成js对象*/
        if (player.paused){ /*如果已经暂停*/
            player.play(); /*播放*/
            $(".style-play-header-icon").attr("src","{{URL::asset('img/spot_stop.png')}}")
        }else {
            player.pause();/*暂停*/
            $(".style-play-header-icon").attr("src","{{URL::asset('img/spot_player.png')}}")
        }
    }
</script>
@endsection