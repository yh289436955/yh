$(function () {
    //全选和反选
    $(".table_user th input").on('change',function () {
        if ($(this).is(":checked")) {
            $(".table_user input[name='user_id']").attr('checked');
            $(".table_user input[name='user_id']").prop('checked',true);
        } else {
            $(".table_user input[name='user_id']").removeAttr('checked');
            $(".table_user input[name='user_id']").prop('checked',false);
        }
    })
})

//新增和修改用户
function myUser(id) {
    var user_id = "";
    var act = "";
    //判断是新增还是修改
    if (id) {
        act = 'modify';
        user_id = id;
    } else {
        act = 'add';
        user_id = "";
    }
    request_post('user.php',{
        'act' : act,
        'user_id' : user_id
    },function (data) {
        //判断是新增还是修改
        if (act == 'modify') {
            $("#myUser .modal-title").text('修改用户');
            $("#myUser input[name='act']").val('mdf');
        } else {
            $("#myUser .modal-title").text('新增用户');
            $("#myUser input[name='act']").val('new');
        }

        $("#myUser .modal-body").empty().append(data.data);
        $("#myUser").modal('show');

    })
}

//删除
function userDel(is,id) {
    var arr = [];
    if (is == 'row') {
        arr.push(id)
    }
    else {
        $(is).find("input[name='user_id']").each(function () {
            if ($(this).is(":checked")) {
                arr.push($(this).val());
            }
        })
    }
    if(arr.length < 1) {
        alert("请选择要删除用户");
        return false;
    }
    $("#delete .confirm").off("click").on("click",function () {
        request_post('user.php',{
            'act' : 'del',
            'user_id' : arr
        },function (data) {
            window.location.reload();
        })
    });
    $("#delete").modal('show');

}