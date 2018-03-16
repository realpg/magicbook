@extends('home.audition.show')

@section('select_content')
<div class="version_select container">
    <div class="row">
        <div class="select_list col-xs-12 col-sm-9">
            <input type="checkbox" value="" />
            <select name="" id="">
                <option value="">请选择大洲</option>
            </select>
            <select name="" id="">
                <option value="">请选择国家</option>
            </select>
            <select name="" id="">
                <option value="">请选择城市</option>
            </select>
        </div>
        <div class="select_make col-xs-12 col-sm-3">
            <button class="drift produce">生成</button>
        </div>
    </div>
    <div class="row">
        <div class="select_list col-xs-12 col-sm-9">
            <input type="checkbox" value="" />
            <select name="" id="">
                <option value="">请选择大洲</option>
            </select>
            <select name="" id="">
                <option value="">请选择国家</option>
            </select>
            <select name="" id="">
                <option value="">请选择城市</option>
            </select>
        </div>
        <div class="select_make col-xs-12 col-sm-3">
            <button class="drift produce">生成</button>
        </div>
    </div>
    <div class="row">
        <div class="select_list col-xs-12 col-sm-9">
            <input type="checkbox" value="" />
            <select name="" id="">
                <option value="">请选择大洲</option>
            </select>
            <select name="" id="">
                <option value="">请选择国家</option>
            </select>
            <select name="" id="">
                <option value="">请选择城市</option>
            </select>
        </div>
        <div class="select_make col-xs-12 col-sm-3">
            <button class="drift produce">生成</button>
        </div>
    </div>
    <div class="row">
        <div class="select_list col-xs-12 col-sm-9">
            <input type="checkbox" value="" />
            <select name="" id="">
                <option value="">请选择大洲</option>
            </select>
            <select name="" id="">
                <option value="">请选择国家</option>
            </select>
            <select name="" id="">
                <option value="">请选择城市</option>
            </select>
        </div>
        <div class="select_make col-xs-12 col-sm-3">
            <button class="drift produce">生成</button>
        </div>
    </div>
    <div class="row">
        <div class="select_list col-xs-12 col-sm-9">
            <input type="checkbox" value="" />
            <select name="" id="">
                <option value="">请选择大洲</option>
            </select>
            <select name="" id="">
                <option value="">请选择国家</option>
            </select>
            <select name="" id="">
                <option value="">请选择城市</option>
            </select>
        </div>
        <div class="select_make col-xs-12 col-sm-3">
            <button class="drift produce">生成</button>
        </div>
    </div>
</div>
<div class="version_batch container">
    <div class="content row">
        <div class="col-xs-12 col-sm-9">
            <input type="checkbox" name="" value="">
            <span style="font-size:20px;color:#666;">全选</span>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="sc_button cs">批量生产</div>
        </div>
    </div>
</div>
<script src="{{URL::asset('js/jquery-1.8.3.min.js')}}"></script>
<script>
    $('.produce').click(function(){
        $('#pay_mask').css('display','block');
        $('.pay_ts').css('display','block');
    })
</script>
@endsection