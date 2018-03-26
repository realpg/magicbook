@if($common['versions'])
<h2 class="font-color-grey text-center line-height-80 margin-bottom-50">选择套餐</h2>
<div class="container package-card padding-left-50 padding-right-50 margin-bottom-50">
    <ul class="height-457px">
        <li>
            <h2>版本对比</h2>
            <h3>试听页面</h3>
            <h3>自定义城市</h3>
            <h3>自定义logo</h3>
            <h3>有效时长</h3>
            <h3 style="border: 0;">价格</h3>
        </li>
        @foreach($common['versions'] as $k=>$version)
            <li class="hover-card-{{$k+1}}">
                <h2>{{$version['name']}}</h2>
                <h3>
                    @if($version['can_preview_page'])
                        <img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" />
                    @else
                        <img src="{{URL::asset('img/goucha_06.png')}}" class="height-28px" />
                    @endif
                </h3>
                <h3>
                    @if($version['can_customize_city'])
                        <img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" />
                    @else
                        <img src="{{URL::asset('img/goucha_06.png')}}" class="height-28px" />
                    @endif
                </h3>
                <h3>
                    @if($version['can_customize_logo'])
                        <img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" />
                    @else
                        <img src="{{URL::asset('img/goucha_06.png')}}" class="height-28px" />
                    @endif
                </h3>
                <h3>{{$version['valid_days']}}天</h3>
                <h3 style="border-bottom: 0;">
                    @if($version['price']==0)
                        免费
                    @else
                        {{$version['price']}}元/城市
                    @endif
                </h3>
                <h3 id="hover-card-button-{{$k+1}}" style="border-bottom: 0;border-top:1px solid #ccc;margin-top:10px;" hidden>
                    @if($version['code']=='free')
                    <a href="{{URL::asset('audition/free')}}#choice">
                    @elseif($version['code']=='mjtt')
                    <a href="{{URL::asset('audition/scenery')}}#choice">
                    @else
                    <a href="{{URL::asset('audition/customization')}}#choice">
                    @endif
                        <button type="button" class="btn btn-danger margin-top-25 bg-none bg-red border-color-red width-60 height-50px font-size-16  style-ellipsis-1 border-radius-0">立即购买</button>
                    </a>
                </h3>
            </li>
        @endforeach
    </ul>
</div>
<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content font-weight" style="max-width: 450px;">
            <div class="modal-header text-center border-0">
                <span id="myModalLabel" class="font-color-light-grey font-size-15">是否确定生成以下城市？生成后不可修改，不可撤销</span>
            </div>
            <div class="modal-body text-center padding-left-50 padding-right-50 font-color-red line-height-50" style="margin-top: -20px;">
                <div class="row font-size-15" id="city_names"></div>
            </div>
            <div class="modal-footer padding-0 line-height-50">
                <a href="" type="button" data-dismiss="modal" id="dismiss_modal">
                    <div class="col-xs-6 col-sm-6 text-center">
                        取消
                    </div>
                </a>
                <a href="javascript:" id="submitPayInfo">
                    <div class="col-xs-6 col-sm-6 bg-red text-center font-color-white">
                        <div class="col-xs-6 col-sm-6">
                            共计<span class="font-size-18" id="price">99</span>元
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            立即付款
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        var menu='{{$menu}}';
        if(menu=='audition'){
            var subsection='{{$subsection}}';
            if(subsection=='free'){
                $('.hover-card-1').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
                $('.hover-card-1').css('transform','scale(1.1)');
                $('.hover-card-1').css('-webkit-transform','scale(1.1)');
                $('.hover-card-1').css('background','#fff');
                $('.hover-card-1 h2').css('background','#E21B14');
                $('.hover-card-1 h2').css('color','#fff');
                $('.hover-card-1 h2').css('margin-top','0');
                $('.hover-card-1 h2').css('padding-top','20px');
                $('.hover-card-1 h3').css('background','#fff');
                $('.hover-card-1').css('border','1px solid #E21B14');
                $('#hover-card-button-1').show();
            }
            else if(subsection=='customization'){
                $('.hover-card-3').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
                $('.hover-card-3').css('transform','scale(1.1)');
                $('.hover-card-3').css('-webkit-transform','scale(1.1)');
                $('.hover-card-3').css('background','#fff');
                $('.hover-card-3 h2').css('background','#E21B14');
                $('.hover-card-3 h2').css('color','#fff');
                $('.hover-card-3 h2').css('margin-top','0');
                $('.hover-card-3 h2').css('padding-top','20px');
                $('.hover-card-3 h3').css('background','#fff');
                $('.hover-card-3').css('border','1px solid #E21B14');
                $('#hover-card-button-3').show();
            }
            else{
                $('.hover-card-2').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
                $('.hover-card-2').css('transform','scale(1.1)');
                $('.hover-card-2').css('-webkit-transform','scale(1.1)');
                $('.hover-card-2').css('background','#fff');
                $('.hover-card-2 h2').css('background','#E21B14');
                $('.hover-card-2 h2').css('color','#fff');
                $('.hover-card-2 h2').css('margin-top','0');
                $('.hover-card-2 h2').css('padding-top','20px');
                $('.hover-card-2 h3').css('background','#fff');
                $('.hover-card-2').css('border','1px solid #E21B14');
                $('#hover-card-button-2').show();
            }
        }
        else{
            $('.hover-card-2').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
            $('.hover-card-2').css('transform','scale(1.1)');
            $('.hover-card-2').css('-webkit-transform','scale(1.1)');
            $('.hover-card-2').css('background','#fff');
            $('.hover-card-2 h2').css('background','#E21B14');
            $('.hover-card-2 h2').css('color','#fff');
            $('.hover-card-2 h2').css('margin-top','0');
            $('.hover-card-2 h2').css('padding-top','20px');
            $('.hover-card-2 h3').css('background','#fff');
            $('.hover-card-2').css('border','1px solid #E21B14');
            $('#hover-card-button-2').show();
        }

        $('.hover-card-1').hover(function(){
            $('.hover-card-1').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
            $('.hover-card-1').css('transform','scale(1.1)');
            $('.hover-card-1').css('-webkit-transform','scale(1.1)');
            $('.hover-card-1').css('background','#fff');
            $('.hover-card-1 h2').css('background','#E21B14');
            $('.hover-card-1 h2').css('color','#fff');
            $('.hover-card-1 h2').css('margin-top','0');
            $('.hover-card-1 h2').css('padding-top','20px');
            $('.hover-card-1 h3').css('background','#fff');
            $('.hover-card-1').css('border','1px solid #E21B14');
            $('#hover-card-button-1').show();
            $('.hover-card-2').css('box-shadow','none');
            $('.hover-card-2').css('transform','none');
            $('.hover-card-2').css('-webkit-transform','none');
            $('.hover-card-2').css('background','#fff');
            $('.hover-card-2 h2').css('background','#fff');
            $('.hover-card-2 h2').css('color','#000');
            $('.hover-card-2 h2').css('margin-top','0');
            $('.hover-card-2 h2').css('padding-top','20px');
            $('.hover-card-2 h3').css('background','#fff');
            $('.hover-card-2').css('border','0');
            $('.hover-card-2').css('border-right','1px solid #ccc');
            $('#hover-card-button-2').hide();
            $('.hover-card-3').css('box-shadow','none');
            $('.hover-card-3').css('transform','none');
            $('.hover-card-3').css('-webkit-transform','none');
            $('.hover-card-3').css('background','#fff');
            $('.hover-card-3 h2').css('background','#fff');
            $('.hover-card-3 h2').css('color','#000');
            $('.hover-card-3 h2').css('margin-top','0');
            $('.hover-card-3 h2').css('padding-top','20px');
            $('.hover-card-3 h3').css('background','#fff');
            $('.hover-card-3').css('border','0');
            $('#hover-card-button-3').hide();
        });

        $('.hover-card-2').hover(function(){
            $('.hover-card-2').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
            $('.hover-card-2').css('transform','scale(1.1)');
            $('.hover-card-2').css('-webkit-transform','scale(1.1)');
            $('.hover-card-2').css('background','#fff');
            $('.hover-card-2 h2').css('background','#E21B14');
            $('.hover-card-2 h2').css('color','#fff');
            $('.hover-card-2 h2').css('margin-top','0');
            $('.hover-card-2 h2').css('padding-top','20px');
            $('.hover-card-2 h3').css('background','#fff');
            $('.hover-card-2').css('border','1px solid #E21B14');
            $('#hover-card-button-2').show();
            $('.hover-card-1').css('box-shadow','none');
            $('.hover-card-1').css('transform','none');
            $('.hover-card-1').css('-webkit-transform','none');
            $('.hover-card-1').css('background','#fff');
            $('.hover-card-1 h2').css('background','#fff');
            $('.hover-card-1 h2').css('color','#000');
            $('.hover-card-1 h2').css('margin-top','0');
            $('.hover-card-1 h2').css('padding-top','20px');
            $('.hover-card-1 h3').css('background','#fff');
            $('.hover-card-1').css('border','0');
            $('.hover-card-1').css('border-right','1px solid #ccc');
            $('#hover-card-button-1').hide();
            $('.hover-card-3').css('box-shadow','none');
            $('.hover-card-3').css('transform','none');
            $('.hover-card-3').css('-webkit-transform','none');
            $('.hover-card-3').css('background','#fff');
            $('.hover-card-3 h2').css('background','#fff');
            $('.hover-card-3 h2').css('color','#000');
            $('.hover-card-3 h2').css('margin-top','0');
            $('.hover-card-3 h2').css('padding-top','20px');
            $('.hover-card-3 h3').css('background','#fff');
            $('.hover-card-3').css('border','0');
            $('#hover-card-button-3').hide();
        });

        $('.hover-card-3').hover(function(){
            $('.hover-card-3').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
            $('.hover-card-3').css('transform','scale(1.1)');
            $('.hover-card-3').css('-webkit-transform','scale(1.1)');
            $('.hover-card-3').css('background','#fff');
            $('.hover-card-3 h2').css('background','#E21B14');
            $('.hover-card-3 h2').css('color','#fff');
            $('.hover-card-3 h2').css('margin-top','0');
            $('.hover-card-3 h2').css('padding-top','20px');
            $('.hover-card-3 h3').css('background','#fff');
            $('.hover-card-3').css('border','1px solid #E21B14');
            $('#hover-card-button-3').show();
            $('.hover-card-1').css('box-shadow','none');
            $('.hover-card-1').css('transform','none');
            $('.hover-card-1').css('-webkit-transform','none');
            $('.hover-card-1').css('background','#fff');
            $('.hover-card-1 h2').css('background','#fff');
            $('.hover-card-1 h2').css('color','#000');
            $('.hover-card-1 h2').css('margin-top','0');
            $('.hover-card-1 h2').css('padding-top','20px');
            $('.hover-card-1 h3').css('background','#fff');
            $('.hover-card-1').css('border','0');
            $('.hover-card-1').css('border-right','1px solid #ccc');
            $('#hover-card-button-1').hide();
            $('.hover-card-2').css('box-shadow','none');
            $('.hover-card-2').css('transform','none');
            $('.hover-card-2').css('-webkit-transform','none');
            $('.hover-card-2').css('background','#fff');
            $('.hover-card-2 h2').css('background','#fff');
            $('.hover-card-2 h2').css('color','#000');
            $('.hover-card-2 h2').css('margin-top','0');
            $('.hover-card-2 h2').css('padding-top','20px');
            $('.hover-card-2 h3').css('background','#fff');
            $('.hover-card-2').css('border','0');
            $('.hover-card-2').css('border-right','1px solid #ccc');
            $('#hover-card-button-2').hide();
        });

    })
</script>
@endif