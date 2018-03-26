<a name="choice"></a>
<div class="package-card container padding-left-50 padding-right-50 font-size-18">
    <div class="card-div height-60px line-height-60 text-center">
        <div class="col-xs-3 col-sm-3 bg-grey-white style-ellipsis-1">选择生成类型</div>
        <a href="{{URL::asset('audition/scenery')}}#choice">
            <div class="col-xs-3 col-sm-3 bg-white {{$subsection=='scenery'?'font-color-red':''}}">美景版</div>
        </a>
        <a href="{{URL::asset('audition/customization')}}#choice">
            <div class="col-xs-3 col-sm-3 bg-white {{$subsection=='customization'?'font-color-red':''}}">定制版</div>
        </a>
        <a href="{{URL::asset('audition/free')}}#choice">
            <div class="col-xs-3 col-sm-3 bg-white {{$subsection=='free'?'font-color-red':''}}">免费版</div>
        </a>
        @if($subsection=='scenery')
            <div class="col-xs-3 col-sm-3 col-xs-offset-9 col-sm-offset-3" style="margin-top:-2px;">
                <img src="{{URL::asset('img/zhixiang_03.png')}}" class="vertical-align-top" />
            </div>
        @elseif($subsection=='customization')
            <div class="col-xs-3 col-sm-3 col-xs-offset-9 col-sm-offset-6" style="margin-top:-2px;">
                <img src="{{URL::asset('img/zhixiang_03.png')}}" class="vertical-align-top" />
            </div>
        @elseif($subsection=='free')
            <div class="col-xs-3 col-sm-3 col-xs-offset-9 col-sm-offset-9" style="margin-top:-2px;">
                <img src="{{URL::asset('img/zhixiang_03.png')}}" class="vertical-align-top" />
            </div>
        @endif
    </div>
</div>
