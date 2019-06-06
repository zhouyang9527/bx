<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>Sign in &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
</head>

<body>
    <div class="login">
        <form class="login-wrap">
            <img class="avatar" src="../static/assets/img/default.png">
            <!-- 有错误信息时展示 -->
            <div class="alert alert-danger">
                <strong>错误！</strong> 用户名或密码错误！
            </div>
            <div class="form-group">
                <label for="email" class="sr-only">邮箱</label>
                <input id="email" type="email" class="form-control" placeholder="邮箱" autofocus>
            </div>
            <div class="form-group">
                <label for="password" class="sr-only">密码</label>
                <input id="password" type="password" class="form-control" placeholder="密码">
            </div>
            <a id="btn-login" class="btn btn-primary btn-block" href="javascript:;">登 录</a>
        </form>
    </div>
    <script src="../static/assets/vendors/jquery/jquery.js"></script>
    <script>
        $(function(){
            $('#btn-login').on('click',function () {
                var email = $('#email').val();
                var password = $('#password').val();
                var reg = /\w+[@]\w+[.]\w+/;
                var regpwd = /^[0-9a-zA-Z]{6,10}$/;
                if(!reg.test($.trim(email))){
                    $('.alert').text('您输入的邮箱有误，请重新输入');
                    $('.alert').show();
                    return;
                }
                if(!regpwd.test($.trim(password))){
                    $('.alert').text('您输入的密码有误，请重新输入');
                    $('.alert').show();
                    return;
                }
                $.ajax({
                    type: "post",
                    url: "api/_userLogin.php",
                    data: {
                        email: email,
                        password:password
                    },
                    success: function (res) {
                        if(res.code==1){
                            location.href = 'index.php';
                        }else {
                             $('.alert').text('您输入的邮箱或密码有误');
                             $('.alert').show();
                        }
                        
                    }
                });
              });
        });
    </script>
</body>

</html>