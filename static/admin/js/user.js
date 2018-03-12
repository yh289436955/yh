//新增和修改用户
function myUser(id) {
    var user_id = "";
    var act = "";
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
        debugger
    })
}