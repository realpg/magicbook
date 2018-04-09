@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        <div class="container package-card padding-top-150 padding-bottom-150 font-color-light-grey">
            <div class="card-div row border-radius-10px margin-left-10 margin-right-10">
                <div class="height-50px line-height-50 bg-grey-white">
                    <div class="col-xs-8 col-sm-8">登录</div>
                    <div class="col-xs-4 col-sm-4 text-right">立即登录</div>
                </div>
                <div>
                    <div class="col-xs-8 col-sm-8 padding-top-40 padding-bottom-40 padding-right-50 padding-left-50" style="border-right:1px #ccc solid;">
                        <form id="form-sign-in" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" name="mobile" id="mobile" required="required" class="form-control height-50px" placeholder="请输入手机号">
                            </div>
                            <div class="form-group margin-top-30">
                                <input type="password" name="password" id="password" required="required" class="form-control height-50px" placeholder="请输入密码">
                            </div>
                            <div class="margin-top-30">
                                <div class="col-xs-6 col-sm-6 padding-0">
                                    <input type="checkbox" id="remember" class="vertical-align-top">
                                    <span class="margin-left-5">记住密码</span>
                                </div>
                                {{--<div class="col-xs-6 col-sm-6 font-color-red padding-0 text-right">--}}
                                    {{--<a href="">--}}
                                        {{--忘记密码？--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            </div>
                            <div class="clear"></div>
                            <div class="margin-top-30">
                                <button type="submit" class="btn btn-danger bg-none bg-red border-color-red width-100 height-40px font-size-18 border-radius-0 height-50px">立 即 登 录</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-4 col-sm-4 text-center padding-top-40 padding-bottom-40">
                        <div class="width-200px text-algin-center margin-auto">
                            <div class="width-200px height-200px margin-bottom-20">
                                <img src="{{URL::asset('img/erweima_03.png')}}" class="width-100" />
                            </div>
                            <h4>扫描加魔法路书公众号</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            var oForm = $('#form-sign-in');
            var oMbl = $('#mobile');
            var oPswd = $('#password');
            var oRemember = $('#remember');
            //页面初始化时，如果帐号密码cookie存在则填充
            if(getCookie('mbl') && getCookie('pswd')){
                oMbl.val(getCookie('mbl'))
                oPswd.val(getCookie('pswd'))
                oRemember.attr('checked','checked')
            }
            //复选框勾选状态发生改变时，如果未勾选则清除cookie
            oRemember.onchange = function(){
                if(!this.checked){
                    delCookie('mbl');
                    delCookie('pswd');
                }
            };
            // //表单提交事件触发时，如果复选框是勾选状态则保存cookie
            // oForm.onsubmit = function(){
            //     if(remember.checked){
            //         setCookie('mbl',oMbl.value,7); //保存帐号到cookie，有效期7天
            //         setCookie('pswd',oPswd.value,7); //保存密码到cookie，有效期7天
            //     }
            // };
            $('#form-sign-in').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    mobile: {
                        validators: {
                            notEmpty: {
                                message: '手机号不能为空'
                            },
                            regexp: {
                                regexp: /^[1][3,4,5,7,8][0-9]{9}$/,
                                message: '请输入正确的手机号'
                            },
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: '密码不能为空'
                            }
                        }
                    },
                },
            }).on("success.form.bv",function(e){
                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post("{{ URL::asset('sign/in')}}", $form.serialize(), function(ret) {
                    console.log('sign in ret is :' + JSON.stringify(ret))
                    if(ret.result){
                        //表单提交事件触发时，如果复选框是勾选状态则保存cookie
                        if($('#remember').is(':checked')){
                            setCookie('mbl',$('#mobile').val(),7); //保存帐号到cookie，有效期7天
                            setCookie('pswd',$('#password').val(),7); //保存密码到cookie，有效期7天
                            console.log('cookie is : '+JSON.stringify(getCookie('cs')))
                            if(getCookie('mbl')&&getCookie('pswd')){
                                layer.msg('登录成功', {icon: 1, time: 3000});
                                window.location.href = "{{URL::asset('center')}}";
                            }
                        }
                        else{
                            layer.msg('登录成功', {icon: 1, time: 3000});
                            window.location.href = "{{URL::asset('center')}}";
                        }
                    }
                    else{
                        layer.msg(ret.message, {icon: 2, time: 3000});
                    }
                }, 'json');
            });
        })
        //设置cookie
        function setCookie(name,value,day){
            var date = new Date();
            date.setDate(date.getDate() + day);
            document.cookie = name + '=' + value + ';expires='+ date;

            // $.cookie(name, value);
        };
        //获取cookie
        function getCookie(name){
            var reg = RegExp(name+'=([^;]+)');
            var arr = document.cookie.match(reg);
            if(arr){
                return arr[1];
            }else{
                return '';
            }

            // $.cookie(name);
        };
        //删除cookie
        function delCookie(name){
            setCookie(name,null,-1);
            // $.cookie(name, null);
        };
    </script>
@endsection