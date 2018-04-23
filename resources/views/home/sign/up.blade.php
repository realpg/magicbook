@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        <div class="container package-card padding-top-150 padding-bottom-150 font-color-light-grey">
            <div class="card-div row border-radius-10px margin-left-10 margin-right-10">
                <div class="height-50px line-height-50 bg-grey-white">
                    <div class="col-xs-8 col-sm-8">注册</div>
                    <div class="col-xs-4 col-sm-4 text-right">
                        <a href="{{URL::asset('sign/in')}}">
                            登录
                        </a>
                    </div>
                </div>
                <div>
                    <div class="col-xs-8 col-sm-8 padding-top-40 padding-bottom-40 padding-right-50 padding-left-50"
                         style="border-right:1px #ccc solid;">
                        <form id="form-sign-up" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" required="required" class="form-control height-50px" name="username"
                                       id="username" placeholder="请输入您的姓名">
                            </div>
                            <div class="form-group margin-top-30">
                                <input type="text" required="required" class="form-control height-50px" name="mobile"
                                       id="mobile" placeholder="请输入您的手机号">
                            </div>
                            <div class="form-group margin-top-30">
                                <input type="text" required="required" class="form-control height-50px" name="company"
                                       id="company" placeholder="请输入您的公司名称">
                            </div>
                            <div class="margin-top-30">
                                <div class="padding-0">
                                    <div class="float-left margin-right-10">
                                        业务类型<br/>
                                        <span class="font-size-10">（多选）</span>
                                    </div>
                                    <div class="float-left">
                                        @if($businesses)
                                            @foreach($businesses['results'] as $business)
                                                <label><input type="checkbox" name="businesses[]"
                                                              value="{{$business['code']}}" class="vertical-align-top"></label>
                                                {{$business['name']}}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="margin-top-30">
                                <div class="padding-0">
                                    <input type="radio" id="female" name="agreement_checked">
                                    <label for="female" class="font-color-red">
                                        <a href="{{URL::asset('service')}}">
                                            我已阅读并同意《魔法路书服务条款》
                                        </a>
                                    </label>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="margin-top-30">
                                <button type="submit" id="validateBtn"
                                        class="btn btn-danger bg-none bg-red border-color-red width-100 height-40px font-size-18 border-radius-0 height-50px">
                                    立 即 注 册
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="text-algin-center col-xs-4 col-sm-4 padding-top-40 padding-bottom-40 padding-right-40 padding-left-40">
                        <div class="text-left font-size-16"><b>注册魔法路书：</b></div>
                        <div class="margin-top-20 margin-bottom-20 padding-top-10 padding-bottom-10 font-size-16">
                            中文语音导游，让旅行更有内涵
                        </div>
                        <div class="width-200px margin-auto">
                            <img src="{{URL::asset('img/erweima_03.png')}}" class="width-100"/>
                        </div>
                        <div class="padding-top-10 padding-bottom-10 font-size-16">扫描加魔法路书公众号</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('#form-sign-up').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    username: {
                        // message: '用户名无效',
                        validators: {
                            notEmpty: {
                                message: '用户名不能为空'
                            },
                            stringLength: {//检测长度
                                min: 0,
                                max: 10,
                                message: '长度必须在0-10之间'
                            },
                            regexp: {
                                regexp: /^[\u4E00-\u9FA5a-zA-Z0-9_]*$/,
                                message: '只能输入中文、字母、数字、下划线'
                            },
                        }
                    },
                    mobile: {
                        validators: {
                            notEmpty: {
                                message: '手机号不能为空'
                            },
                            regexp: {
                                regexp: /^[1][3,4,5,6,7,8][0-9]{9}$/,
                                message: '请输入正确的手机号'
                            },
                        }
                    },
                    company: {
                        validators: {
                            notEmpty: {
                                message: '公司名称不能为空'
                            }
                        }
                    },
                    agreement_checked: {
                        validators: {
                            notEmpty: {
                                message: '请阅读并同意《魔法路书服务条款》'
                            }
                        }
                    },
                },
            }).on("success.form.bv", function (e) {
                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $("body").mLoading();
                $.post("{{ URL::asset('sign/up')}}", $form.serialize(), function (ret) {
                    $("body").mLoading("hide");
                    if (ret.result) {
                        window.location.href = "{{URL::asset('sign/success')}}";
                    }
                    else {
                        layer.msg(ret.message, {icon: 2, time: 3000});
                    }
                }, 'json');
            });
        })
    </script>
@endsection