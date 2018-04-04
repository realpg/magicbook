@extends('admin.layouts.app')

@section('content')
    <div class="page-container">
        <form class="form form-horizontal" method="post" id="form-edit">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>内容：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea  id="content" name="content" wrap="\n\r" class="textarea" style="resize:vertical;height:450px;" placeholder="请填写内容" dragonfly="true" nullmsg="内容不能为空！">{{ isset($data['content']) ? $data['content'] : '' }}</textarea>
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
        //编辑网站基本信息
        $("#form-edit").validate({
            rules: {
                content: {
                    required: true,
                },
            },
            onkeyup: false,
            focusCleanup: false,
            success: "valid",
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    type: 'POST',
                    url: "{{ URL::asset('/admin/service/edit')}}",
                    success: function (ret) {
                        console.log(JSON.stringify(ret));
                        if (ret.result) {
                            layer.msg('编辑成功', {icon: 1, time: 2000});
                        } else {
                            layer.msg(ret.message, {icon: 2, time: 2000});
                        }
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