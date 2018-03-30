@extends('home.layouts.free')

@section('content')
    @if($result)
        @if($subscenes['count']>0)
            <div id="data">
                <div class="aui-margin-b-10">
                    <div class="style-position-relative">
                        <div id="aui-slide">
                            <div class="aui-slide-wrap" id="subscenes-images" >
                                @if($subscenes['results'][0]['images'])
                                    @foreach($subscenes['results'][0]['images'] as $image)
                                    <div class="aui-slide-node bg-dark">
                                        <img src="{{$image['image']}}" />
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="aui-slide-page-wrap"><!--分页容器--></div>
                        </div>
                        <img src="{{URL::asset('img/spot_player.png')}}" class="style-play-icon" />
                        <div class="aui-padded-5 aui-padded-r-15 style-child-spot-count">{{$subscenes['count']}}处介绍</div>
                        <div class="aui-padded-5 aui-padded-l-15 style-child-spot-title" id="subscenes-title">{{$subscenes['results'][0]['name']}}</div>
                    </div>
                </div>
                <div class="aui-row style-child-padding">
                    @foreach($subscenes['results'] as $k=>$subscene)
                        <a href="javacript:" onclick="switchAaudio('{{$k}}')">
                            <div class="aui-col-xs-4 style-child-padding style-child-width">
                                <div class="style-position-relative">
                                    @if($subscene['image'])
                                        <img src="{{$subscene['image']}}" class="style-ul-child-image" />
                                    @endif
                                    <img src="{{URL::asset('img/child_player.png')}}" class="style-play-icon" />
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
<script id="subscenes-images-template" type="text/x-dot-template">
    @{{~ it.images:item:index }}
    <div class="aui-slide-node bg-dark">
        <img src="@{{=item.image}}" />
    </div>
    @{{~ }}
</script>
@endsection
@section('script')
<script type="text/javascript" src="{{URL::asset('js/aui/aui-slide.js')}}"></script>
<script type="text/javascript">
    var slide = new auiSlide({
        container:document.getElementById("aui-slide"),
        // "width":300,
        "height":260,
        "speed":300,
        "autoPlay": 3000, //自动播放
        "pageShow":true,
        "pageStyle":'dot',
        "loop":true,
        'dotPosition':'center',
        // currentPage:currentFun
    })

    // function currentFun(index) {
    //     console.log(index);
    // }

    if('{{$result}}'){
        var subscenes_array={!! $subscenes_array !!}
        // console.log("subscenes_array is :"+JSON.stringify(subscenes_array))
        // for(var i=0;i<subscenes_array.length;i++){
        //     console.log("subscenes_array['"+i+"'] is :"+JSON.stringify(subscenes_array[i]))
        // }
    }
    function switchAaudio(index){
        console.log("subscenes_array['"+index+"'] is :"+JSON.stringify(subscenes_array[index]))
        $('#subscenes-title').text(subscenes_array[index]['name'])
        var interText = doT.template($("#subscenes-images-template").text())
        $("#subscenes-images").html(interText(subscenes_array[index]))

        var slide_index = new auiSlide({
            container:document.getElementById("aui-slide"),
            // "width":300,
            "height":260,
            "speed":300,
            "autoPlay": 3000, //自动播放
            "pageShow":true,
            "pageStyle":'dot',
            "loop":true,
            'dotPosition':'center',
            // currentPage:currentFun
        })
    }
</script>
@endsection