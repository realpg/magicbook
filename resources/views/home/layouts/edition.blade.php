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
        <li class="hover-card-1">
            <h2>免费版</h2>
            <h3><img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" /></h3>
            <h3><img src="{{URL::asset('img/goucha_06.png')}}" class="height-28px" /></h3>
            <h3><img src="{{URL::asset('img/goucha_06.png')}}" class="height-28px" /></h3>
            <h3>30天</h3>
            <h3 style="border-bottom: 0;">免费</h3>
            <h3 id="hover-card-button-1" style="border-bottom: 0;border-top:1px solid #ccc;margin-top:10px;" hidden>
                <button type="button" class="btn btn-danger margin-top-25 bg-none bg-red border-color-red width-60 height-50px font-size-18 border-radius-0">立即购买</button>
            </h3>
        </li>
        <li class="hover-card-2">
            <h2>美景版</h2>
            <h3><img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" /></h3>
            <h3><img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" /></h3>
            <h3><img src="{{URL::asset('img/goucha_06.png')}}" class="height-28px" /></h3>
            <h3>30天</h3>
            <h3 style="border-bottom: 0;">2元/城市</h3>
            <h3 id="hover-card-button-2" style="border-bottom: 0;border-top:1px solid #ccc;margin-top:10px;" hidden>
                <button type="button" class="btn btn-danger margin-top-25 bg-none bg-red border-color-red width-60 height-50px font-size-18 border-radius-0">立即购买</button>
            </h3>
        </li>
        <li class="hover-card-3">
            <h2>定制版</h2>
            <h3><img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" /></h3>
            <h3><img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" /></h3>
            <h3><img src="{{URL::asset('img/goucha_03.png')}}" class="height-28px" /></h3>
            <h3>30天</h3>
            <h3 style="border-bottom: 0;">5元/城市</h3>
            <h3 id="hover-card-button-3" style="border-bottom: 0;border-top:1px solid #ccc;margin-top:10px;" hidden>
                <button type="button" class="btn btn-danger margin-top-25 bg-none bg-red border-color-red width-60 height-50px font-size-18 border-radius-0">立即购买</button>
            </h3>
        </li>
    </ul>
</div>
<script>
    // $(function(){
    //     $('.hover-card-2').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
    //     $('.hover-card-2').css('transform','scale(1.1)');
    //     $('.hover-card-2').css('-webkit-transform','scale(1.1)');
    //     $('.hover-card-2').css('background','#fff');
    //     $('.hover-card-2 h2').css('background','#E21B14');
    //     $('.hover-card-2 h2').css('color','#fff');
    //     $('.hover-card-2 h2').css('margin-top','0');
    //     $('.hover-card-2 h2').css('padding-top','20px');
    //     $('.hover-card-2 h3').css('background','#fff');
    //     $('.hover-card-2').css('border','1px solid #E21B14');
    //     $('#hover-card-button-2').show();
    //
    //     $('.hover-card-1').hover(function(){
    //         $('.hover-card-1').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
    //         $('.hover-card-1').css('transform','scale(1.1)');
    //         $('.hover-card-1').css('-webkit-transform','scale(1.1)');
    //         $('.hover-card-1').css('background','#fff');
    //         $('.hover-card-1 h2').css('background','#E21B14');
    //         $('.hover-card-1 h2').css('color','#fff');
    //         $('.hover-card-1 h2').css('margin-top','0');
    //         $('.hover-card-1 h2').css('padding-top','20px');
    //         $('.hover-card-1 h3').css('background','#fff');
    //         $('.hover-card-1').css('border','1px solid #E21B14');
    //         $('#hover-card-button-1').show();
    //     },function(){
    //         $('.hover-card-1').css('box-shadow','none');
    //         $('.hover-card-1').css('transform','none');
    //         $('.hover-card-1').css('-webkit-transform','none');
    //         $('.hover-card-1').css('background','#fff');
    //         $('.hover-card-1 h2').css('background','#fff');
    //         $('.hover-card-1 h2').css('color','#000');
    //         $('.hover-card-1 h2').css('margin-top','0');
    //         $('.hover-card-1 h2').css('padding-top','20px');
    //         $('.hover-card-1 h3').css('background','#fff');
    //         $('.hover-card-1').css('border','0');
    //         $('.hover-card-1').css('border-right','1px solid #ccc');
    //         $('#hover-card-button-1').hide();
    //     });
    //
    //     $('.hover-card-2').hover(function(){
    //         $('.hover-card-2').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
    //         $('.hover-card-2').css('transform','scale(1.1)');
    //         $('.hover-card-2').css('-webkit-transform','scale(1.1)');
    //         $('.hover-card-2').css('background','#fff');
    //         $('.hover-card-2 h2').css('background','#E21B14');
    //         $('.hover-card-2 h2').css('color','#fff');
    //         $('.hover-card-2 h2').css('margin-top','0');
    //         $('.hover-card-2 h2').css('padding-top','20px');
    //         $('.hover-card-2 h3').css('background','#fff');
    //         $('.hover-card-2').css('border','1px solid #E21B14');
    //         $('#hover-card-button-2').show();
    //     },function(){
    //         $('.hover-card-2').css('box-shadow','none');
    //         $('.hover-card-2').css('transform','none');
    //         $('.hover-card-2').css('-webkit-transform','none');
    //         $('.hover-card-2').css('background','#fff');
    //         $('.hover-card-2 h2').css('background','#fff');
    //         $('.hover-card-2 h2').css('color','#000');
    //         $('.hover-card-2 h2').css('margin-top','0');
    //         $('.hover-card-2 h2').css('padding-top','20px');
    //         $('.hover-card-2 h3').css('background','#fff');
    //         $('.hover-card-2').css('border','0');
    //         $('.hover-card-2').css('border-right','1px solid #ccc');
    //         $('#hover-card-button-2').hide();
    //     });
    //
    //     $('.hover-card-3').hover(function(){
    //         $('.hover-card-3').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
    //         $('.hover-card-3').css('transform','scale(1.1)');
    //         $('.hover-card-3').css('-webkit-transform','scale(1.1)');
    //         $('.hover-card-3').css('background','#fff');
    //         $('.hover-card-3 h2').css('background','#E21B14');
    //         $('.hover-card-3 h2').css('color','#fff');
    //         $('.hover-card-3 h2').css('margin-top','0');
    //         $('.hover-card-3 h2').css('padding-top','20px');
    //         $('.hover-card-3 h3').css('background','#fff');
    //         $('.hover-card-3').css('border','1px solid #E21B14');
    //         $('#hover-card-button-3').show();
    //     },function(){
    //         $('.hover-card-3').css('box-shadow','none');
    //         $('.hover-card-3').css('transform','none');
    //         $('.hover-card-3').css('-webkit-transform','none');
    //         $('.hover-card-3').css('background','#fff');
    //         $('.hover-card-3 h2').css('background','#fff');
    //         $('.hover-card-3 h2').css('color','#000');
    //         $('.hover-card-3 h2').css('margin-top','0');
    //         $('.hover-card-3 h2').css('padding-top','20px');
    //         $('.hover-card-3 h3').css('background','#fff');
    //         $('.hover-card-3').css('border','0');
    //         $('#hover-card-button-3').hide();
    //     });
    //
    // })
    $(function(){
        // $('.hover-card-2').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
        // $('.hover-card-2').css('transform','scale(1.1)');
        // $('.hover-card-2').css('-webkit-transform','scale(1.1)');
        // $('.hover-card-2').css('background','#fff');
        // $('.hover-card-2 h2').css('background','#E21B14');
        // $('.hover-card-2 h2').css('color','#fff');
        // $('.hover-card-2 h2').css('margin-top','0');
        // $('.hover-card-2 h2').css('padding-top','20px');
        // $('.hover-card-2 h3').css('background','#fff');
        // $('.hover-card-2').css('border','1px solid #E21B14');
        // $('#hover-card-button-2').show();
        var menu='{{$menu}}';
        if(menu=='audition'){
            var subsection='{{$subsection}}';
            if(subsection=='scenery'){
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
            else if(subsection=='free'){
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