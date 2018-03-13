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