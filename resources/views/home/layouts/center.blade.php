<div class="height-50px line-height-50 bg-bright-grey text-center margin-bottom-50">
    <a href="{{URL::asset('center/generate')}}">
        <div class="col-xs-4 col-sm-4 {{$subsection=='generate'?'nav-active':''}}">
            生成记录
        </div>
    </a>
    <a href="{{URL::asset('center/consumption')}}">
        <div class="col-xs-4 col-sm-4 {{$subsection=='consumption'?'nav-active':''}}">
            消费记录
        </div>
    </a>
    <a href="{{URL::asset('center')}}">
        <div class="col-xs-4 col-sm-4 {{$subsection=='personal'?'nav-active':''}}">
            个人资料
        </div>
    </a>
</div>