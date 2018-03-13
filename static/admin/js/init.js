//计算高度，设置页面高度
function setBodyHeight() {
    var H = document.body.clientHeight;
    $(".nav-left,.nav-right").css("height",H - 70 - 10+'px');
}

//所有AJAX请求函数
/*
* 参数解释：
* url : 请求地址
* postData : 请求参数（对象类型）
* callback : 回掉函数，请求成功执行的方法
* */
function request_post(url,postData,callback) {
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: postData,
        success: function (data) {
            if (data.status) {
                callback(data);
            } else {
                alert(data.msg);
            }
        },
        error : function (e) {
            console.log("请求错误，请刷新重新请求");
        }
    })
}
/*
 * 参数解释：
 * url : 请求地址
 * postData : 请求参数（对象类型）
 * callback : 回掉函数，请求成功执行的方法
 * */
function request_get(url,postData,callback) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: postData,
        success: function (data) {
            if (data.status) {
                callback(data);
            } else {
                alert(data.msg);
            }
        },
        error : function (e) {
            console.log("请求错误，请刷新重新请求");
        }
    })
}