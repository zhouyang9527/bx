<?php
    include_once '../config.php';
    include_once '../getData.php';

    checkLogin();
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>Categories &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
    <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>

<body>
    <script>
        NProgress.start()
    </script>

    <div class="main">
        <!-- <nav class="navbar">
            <button class="btn btn-default navbar-btn fa fa-bars"></button>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
                <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
            </ul>
        </nav> -->
        <?php
            include_once 'public/_navbar.php';
        ?>
        <div class="container-fluid">
            <div class="page-title">
                <h1>分类目录</h1>
            </div>
            <!-- 有错误信息时展示 -->
            <div class="alert alert-danger" style="display:none">
                <strong>错误！</strong>发生XXX错误
            </div>
            <div class="row">
                <div class="col-md-4">
                    <form id="data">
                        <h2>添加新分类目录</h2>
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
                        </div>
                        <div class="form-group">
                            <label for="slug">别名</label>
                            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
                            <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
                        </div>
                        <div class="form-group">
                            <label for="slug">类名</label>
                            <input id="classname" class="form-control" name="classname" type="text" placeholder="类名">
                            <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
                        </div>
                        <div class="form-group">
                            <!-- <button class="btn btn-primary" type="submit">添加</button> -->
                           <input id="btn-add" type="button" value="添加" class="btn btn-primary">
                           <input style="display:none;" id="editdown" type="button" value="编辑完成" class="btn btn-primary">
                           <input style="display:none;" id="deledit" type="button" value="取消编辑" class="btn btn-primary">
                        </div>
                        <input id="id" style="display:none;" name="id" value="">
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="page-action">
                        <!-- show when multiple checked -->
                        <a id="deleteAll" class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="40"><input type="checkbox"></th>
                                <th>名称</th>
                                <th>Slug</th>
                                <th>类名</th>
                                <th class="text-center" width="100">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td>未分类</td>
                                <td>uncategorized</td>
                                <td>fa-glass</td>
                                <td class="text-center">
                                    <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td>未分类</td>
                                <td>uncategorized</td>
                                <td>fa-glass</td>
                                <td class="text-center">
                                    <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td>未分类</td>
                                <td>uncategorized</td>
                                <td>fa-glass</td>
                                <td class="text-center">
                                    <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

     <?php
        $current_page = 'categories';
        include_once './public/_aside.php';
    ?>
    <!-- <div class="aside">
        <div class="profile">
            <img class="avatar" src="../static/uploads/avatar.jpg">
            <h3 class="name">布头儿</h3>
        </div>
        <ul class="nav">
            <li>
                <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
            </li>
            <li class="active">
                <a href="#menu-posts" data-toggle="collapse">
                    <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
                </a>
                <ul id="menu-posts" class="collapse in">
                    <li><a href="posts.php">所有文章</a></li>
                    <li><a href="post-add.php">写文章</a></li>
                    <li class="active"><a href="categories.php">分类目录</a></li>
                </ul>
            </li>
            <li>
                <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
            </li>
            <li>
                <a href="users.php"><i class="fa fa-users"></i>用户</a>
            </li>
            <li>
                <a href="#menu-settings" class="collapsed" data-toggle="collapse">
                    <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
                </a>
                <ul id="menu-settings" class="collapse">
                    <li><a href="nav-menus.php">导航菜单</a></li>
                    <li><a href="slides.php">图片轮播</a></li>
                    <li><a href="settings.php">网站设置</a></li>
                </ul>
            </li>
        </ul>
    </div> -->

    <script src="../static/assets/vendors/jquery/jquery.js"></script>
    <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
    <script>
        NProgress.done()
    </script>
    <script>
        $(function () {
            $.ajax({
                type: "post",
                url: "api/_getCategoryData.php",
                success: function (res) {
                    // 请求成功后，动态渲染出网页
                    if(res.code==1){
                        // console.log(res);
                        $.each(res.data, function (i, v) { 
                            $str = ' <tr index="'+v.id+'">\
                                <td class="text-center"><input type="checkbox"></td>\
                                <td>'+v.name+'</td>\
                                <td>'+v.slug+'</td>\
                                <td>'+v.classname+'</td>\
                                <td class="text-center">\
                                    <a href="javascript:;" class="btn btn-info btn-xs edit">编辑</a>\
                                    <a href="javascript:;" class="btn btn-danger btn-xs delete">删除</a>\
                                </td>\
                            </tr>';
                             $('tbody').append($str);
                        });
                       
                    }
                }
            });

            // 点击按钮，添加
            $('#btn-add').on('click',function () {
                var name = $.trim($('#name').val());
                var slug = $.trim($('#slug').val());
                var classname = $.trim($('#classname').val());
                // 提示用户分类的名称不能为空
                if(name==""){
                    $('#msg').text("分类的名称不能为空");
                    $('.alert').show();
                    return;
                }
                // 提示用户分类的别名不能为空
                if(slug==""){
                    $('#msg').text("分类的别名不能为空");
                    $('.alert').show();
                    return;
                }
                // 提示用户分类的图标样式不能为空
                if(classname==""){
                    $('#msg').text("分类的图标样式不能为空");
                    $('.alert').show();
                    return;
                }
                $.ajax({
                    type: "post",
                    url: "api/_addCategory.php",
                    data: $('#data').serialize(),
                    success: function (res) {
                        if(res.code==1){
                             $str = ' <tr index='+res.id+'>\
                                <td class="text-center"><input type="checkbox"></td>\
                                <td>'+name+'</td>\
                                <td>'+slug+'</td>\
                                <td>'+classname+'</td>\
                                <td class="text-center">\
                                    <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>\
                                    <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\
                                </td>\
                            </tr>';
                            $('tbody').append($str);
                            // 添加成功后，清空输入框
                            $('#name').val("");
                            $('#slug').val("");
                            $('#classname').val("");
                        }
                    }
                });
            });
            var currentRow;
            $('tbody').on('click','.edit',function () {
                currentRow = $(this).parents('tr');
                $('#btn-add').hide();
                $('#editdown').show();
                $('#deledit').show();
                $('#name').val($(this).parents('tr').children().eq(1).html());
                $('#slug').val($(this).parents('tr').children().eq(2).html());
                $('#classname').val($(this).parents('tr').children().eq(3).html());
                $('#id').val($(this).parents('tr').attr('index'));
                // console.log($(this).parents('tr').attr('index'));
                
              });
            $('#editdown').on('click',function () {
                $.ajax({
                    type: "post",
                    url: "api/_updateCategory.php",
                    data: $('#data').serialize(),
                    success: function (res) {
                       if(res.code==1){
                        //   将数据更新到右边
                        $('#btn-add').show();
                        $('#editdown').hide();
                        $('#deledit').hide();
                        var name = $('#name').val();
                        var slug = $('#slug').val();
                        var classname = $('#classname').val();
                        $('#name').val("");
                        $('#slug').val("");
                        $('#classname').val("");
                        $(currentRow).children().eq(1).html(name);
                        $(currentRow).children().eq(2).html(slug);
                        $(currentRow).children().eq(3).html(classname);
                       }
                        
                    }
                });
            });
            $('#deledit').on('click',function () {
                $('#btn-add').show();
                $('#editdown').hide();
                $('#deledit').hide();
                $('#name').val("");
                $('#slug').val("");
                $('#classname').val("");
            });

            /* 
            点击删除按钮，删除数据
             */
            $('tbody').on('click','.delete',function () {
                var row = $(this).parents('tr');
                // 点击删除按钮，删除这一行，并在数据库中删除对应的数据
                var id = row.attr('index');
                $.ajax({
                    type: "post",
                    url: "api/_deleteData.php",
                    data: {id:id},
                    success: function (res) {
                        if(res.code ==1){
                            row.remove();
                        }
                    }
                });
            });
            /* 
                全选功能的实现
             */
             $("thead input").on('click',function () {
                 var status = $(this).prop('checked');
                 $("tbody input").prop("checked",status);
                 if($(this).prop('checked')){
                     $('#deleteAll').show();
                 }else {
                      $('#deleteAll').hide();
                 }
            });
            /* 
            设置点击委托事件，当全部选中，则全选框打钩，否则，不打钩
             */
            $('tbody').on('click','input',function () {
                var all = $('thead input');
                var cks = $('tbody input');
                all.prop("checked",cks.size()==$('tbody input:checked').size());
                if($('tbody input:checked').size() >= 2){
                    $('#deleteAll').show();
                }else {
                    $('#deleteAll').hide();
                }
            });
            /* 
            批量删除
             */
             $('#deleteAll').on('click',function () {
                //  收集所有选中的id，然后发送到服务器进行数据的删除
                var cks = $("tbody input:checked");
                var ids=[];
                cks.each(function (i, v) { 
                     var id = $(v).parents('tr').attr('index');
                     ids.push(id);
                });
                $.ajax({
                    type: "post",
                    url: "api/_deleteCategories.php",
                    data: {ids:ids},
                    success: function (res) {
                        if(res.code ==1){
                            cks.parents('tr').remove();
                             $('#deleteAll').hide();
                        }
                    }
                });
               });
        });
    </script>
</body>

</html>