@extends('admin.layouts.app')

@section('content')
    <div class="page-container">
        <form class="form form-horizontal" method="post" id="form-edit">
            {{csrf_field()}}
            <div class="row cl hidden">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>code：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input id="code" name="code" type="text" class="input-text"
                           value="{{ isset($data['code']) ? $data['code'] : '' }}" placeholder="编码" readonly>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>版本名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input id="name" name="name" type="text" class="input-text" value="{{ isset($data['name']) ? $data['name'] : '' }}" placeholder="请输入版本名称">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否支持试听页面：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <span class="select-box">
                        <select id="can_preview_page" name="can_preview_page" class="select">
                            <option value="true" {{$data['can_preview_page']?'selected':''}}>是</option>
                            <option value="false" {{!$data['can_preview_page']?'selected':''}}>否</option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否支持自定义城市：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <span class="select-box">
                        <select id="can_customize_city" name="can_customize_city" class="select">
                            <option value="true" {{$data['can_customize_city']?'selected':''}}>是</option>
                            <option value="false" {{!$data['can_customize_city']?'selected':''}}>否</option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否支持自定义Logo：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <span class="select-box">
                        <select id="can_customize_logo" name="can_customize_logo" class="select">
                            <option value="true" {{$data['can_customize_logo']?'selected':''}}>是</option>
                            <option value="false" {{!$data['can_customize_logo']?'selected':''}}>否</option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>有效天数：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input id="valid_days" name="valid_days" type="text" class="input-text" value="{{ isset($data['valid_days']) ? $data['valid_days'] : '' }}" placeholder="请输入有效天数">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价格：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input id="price" name="price" type="text" class="input-text" value="{{ isset($data['price']) ? $data['price'] : '' }}" placeholder="请输入价格">
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                    <button onClick="layer_close();" class="btn btn-default radius" type="button">取消</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $("#form-edit").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    valid_days: {
                        required: true,
                    },
                    price: {
                        required: true,
                    }
                },
                onkeyup: false,
                focusCleanup: false,
                success: "valid",
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: 'POST',
                        url: "{{ URL::asset('/admin/version/edit')}}",
                        success: function (ret) {
                            console.log(JSON.stringify(ret));
                            // if (ret.result) {
                            //     layer.msg(ret.msg, {icon: 1, time: 2000});
                            //     setTimeout(function () {
                            //         parent.$('.btn-refresh').click();
                            //     }, 1000)
                            // } else {
                            //     layer.msg(ret.msg, {icon: 2, time: 2000});
                            // }
                        },
                        error: function (XmlHttpRequest, textStatus, errorThrown) {
                            layer.msg('保存失败', {icon: 2, time: 2000});
                            console.log("XmlHttpRequest:" + JSON.stringify(XmlHttpRequest));
                            console.log("textStatus:" + textStatus);
                            console.log("errorThrown:" + errorThrown);
                        }
                    });
                }

            });
        });
    </script>
@endsection