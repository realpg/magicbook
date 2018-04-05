//初始化body的高度
$(function () {
    var winHeight=$(window).height();
    $('#main-body').css('min-height',winHeight-45);
    $('#main-body').css('border-bottom','#06131B 3px solid');
});

// 接口部分
//基本的ajax访问后端接口类
function ajaxRequest(url, param, method, callBack) {
    console.log("url:" + url + " method:" + method + " param:" + JSON.stringify(param));
    $.ajax({
        type: method,  //提交方式
        url: url,//路径
        data: param,//数据，这里使用的是Json格式进行传输
        contentType: "application/json", //必须有
        dataType: "json",
        success: function (ret) {//返回数据根据结果进行相应的处理
            console.log("ret:" + JSON.stringify(ret));
            callBack(ret)
        },
        error: function (err) {
            console.log(JSON.stringify(err));
            console.log("responseText:" + err.responseText);
            callBack(err)
        }
    });
}

//+++++++++++++++++++++++++后台+++++++++++++++++++++++++++++++++//

//批量导出用户
function exportMemberInfo(url, param, callBack) {
    ajaxRequest(url + "admin/member/export", param, "GET", callBack);
}
//选择国家
function getChainCountries(url, param, callBack) {
    ajaxRequest(url + "admin/city/country", param, "GET", callBack);
}

//选择城市
function getChainCities(url, param, callBack) {
    ajaxRequest(url + "admin/city/city", param, "GET", callBack);
}

//添加城市
function addCity(url, param, callBack) {
    $.post(url + "admin/city/add",param,callBack);
}

//删除城市
function delCity(url, param, callBack) {
    ajaxRequest(url + "admin/city/del", param, "GET", callBack);
}

//++++++++++++++++++++++++++前台+++++++++++++++++++++++++++++++++//

//选择国家
function getCountries(url, param, callBack) {
    ajaxRequest(url + "region/country", param, "GET", callBack);
}

//选择城市
function getCities(url, param, callBack) {
    ajaxRequest(url + "region/city", param, "GET", callBack);
}

function submitFree(url, param, callBack) {
    $.post(url + "audition/free/do",param,callBack);
}

function prepay(url, param, callBack) {
    $.post(url + "audition/prepay/do",param,callBack);
}

//查询支付二维码状态接口
function getQrcodeState(url, param, callBack) {
    $.post(url + "audition/getQrcodeState",param,callBack);
}

//下载试听二维码
function downloadQrcodeDo(url, param, callBack) {
    ajaxRequest(url + "center/downloadQrcode", param, "GET", callBack);
}

//批量删除试听记录接口
function delMorePurchase(url, param, callBack) {
    $.post(url + "center/bulkDeletePurchase",param,callBack);
}
//////////////////////////////////////////////////////////////////////////////////////////////////


/*
 * 校验手机号js
 *
 * By TerryQi
 */

function isPoneAvailable(phone_num) {
    var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
    if (!myreg.test(phone_num)) {
        return false;
    } else {
        return true;
    }
}

/*
 * 校验邮箱js
 *
 * By zm
 */

function isEmail(email) {
    var myreg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    if (!myreg.test(email)) {
        return false;
    } else {
        return true;
    }
}

/*
 * 校验电话号码（包括手机，固定电话，带区号，不带区号）js
 *
 * By zm
 */

function isPhone(phone) {
    var myreg = /(^[0-9]{3,4}\-[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/;
    if (!myreg.test(phone)) {
        return false;
    } else {
        return true;
    }
}

// 判断参数是否为空
function judgeIsNullStr(val) {
    if (val == null || val == "" || val == undefined || val == "未设置") {
        return true
    }
    return false
}

// 判断参数是否为空
function judgeIsAnyNullStr() {
    if (arguments.length > 0) {
        for (var i = 0; i < arguments.length; i++) {
            if (!isArray(arguments[i])) {
                if (arguments[i] == null || arguments[i] == "" || arguments[i] == undefined || arguments[i] == "未设置" || arguments[i] == "undefined") {
                    return true
                }
            }
        }
    }
    return false
}

// 判断数组时候为空, 服务于 judgeIsAnyNullStr 方法
function isArray(object) {
    return Object.prototype.toString.call(object) == '[object Array]';
}


// 七牛云图片裁剪
function qiniuUrlTool(img_url, type) {
    //如果不是七牛的头像，则直接返回图片
    //consoledebug.log("img_url:" + img_url + " indexOf('isart.me'):" + img_url.indexOf('isart.me'));
    if (img_url.indexOf('7xku37.com') < 0 && img_url.indexOf('isart.me') < 0) {
        return img_url;
    }
    //七牛链接
    var qn_img_url;
    const size_w_500_h_200 = '?imageView2/2/w/500/h/200/interlace/1/q/75|imageslim'
    const size_w_200_h_200 = '?imageView2/2/w/200/h/200/interlace/1/q/75|imageslim'
    const size_w_500_h_300 = '?imageView2/2/w/500/h/300/interlace/1/q/75|imageslim'
    const size_w_500_h_250 = '?imageView2/2/w/500/h/250/interlace/1/q/75|imageslim'

    const size_w_500 = '?imageView1/1/w/500/interlace/1/q/75'

    //除去参数
    if (img_url.indexOf("?") >= 0) {
        img_url = img_url.split('?')[0]
    }
    //封装七牛链接
    switch (type) {
        case "ad":  //广告图片
            qn_img_url = img_url + size_w_500_h_300
            break
        case "folder_list":  //作品列表图片样式
            qn_img_url = img_url + size_w_500_h_200
            break
        case  'head_icon':      //头像信息
            qn_img_url = img_url + size_w_200_h_200
            break
        case  'work_detail':      //作品详情的图片信息
            qn_img_url = img_url + size_w_500
            break
        default:
            qn_img_url = img_url
            break
    }
    return qn_img_url
}


// 文字转html，主要是进行换行转换
function Text2Html(str) {
    if (str == null) {
        return "";
    } else if (str.length == 0) {
        return "";
    }
    str = str.replace(/\r\n/g, "<br>")
    str = str.replace(/\n/g, "<br>");
    return str;
}

//null变为空str
function nullToEmptyStr(str) {
    if (judgeIsNullStr(str)) {
        str = "";
    }
    return str;
}


/*
 * 获取url中get的参数
 *
 * By TerryQi
 *
 * 2017-12-23
 *
 */
function getQueryString(name) {
    var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
    var r = window.location.search.substr(1).match(reg);
    if (r != null) {
        return unescape(r[2]);
    }
    return null;
}