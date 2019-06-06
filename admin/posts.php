<?php
    include_once '../config.php';
    include_once '../getData.php';

    checkLogin();
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>Posts &laquo; Admin</title>
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
                <h1>所有文章</h1>
                <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
            </div>
            <!-- 有错误信息时展示 -->
            <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
            <div class="page-action">
                <!-- show when multiple checked -->
                <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
                <form class="form-inline">
                    <select id="categoryId" name="categoryId" class="form-control input-sm">
                        <option value="all">所有分类</option>
                        <!-- <option value="">未分类</option> -->
                    </select>
                    <select id="status" name="status" class="form-control input-sm">
                        <option value="all">所有状态</option>
                        <option value="drafted">草稿</option>
                        <option value="published">已发布</option>
                        <option value="trashed">已删除</option>
                    </select>
                    <input id="btn-filt" type="button" value="筛选" class="btn btn-default btn-sm">
                    <!-- <button class="btn btn-default btn-sm">筛选</button> -->
                </form>
                <ul class="pagination pagination-sm pull-right">
                    <!-- <li><a href="#">上一页</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">下一页</a></li> -->
                </ul>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center" width="40"><input type="checkbox"></th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>分类</th>
                        <th class="text-center">发表时间</th>
                        <th class="text-center">状态</th>
                        <th class="text-center" width="100">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>随便一个名称</td>
                        <td>小小</td>
                        <td>潮科技</td>
                        <td class="text-center">2016/10/07</td>
                        <td class="text-center">已发布</td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>随便一个名称</td>
                        <td>小小</td>
                        <td>潮科技</td>
                        <td class="text-center">2016/10/07</td>
                        <td class="text-center">已发布</td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>随便一个名称</td>
                        <td>小小</td>
                        <td>潮科技</td>
                        <td class="text-center">2016/10/07</td>
                        <td class="text-center">已发布</td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>

    <?php
        $current_page = 'posts';
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
                    <li class="active"><a href="posts.php">所有文章</a></li>
                    <li><a href="post-add.php">写文章</a></li>
                    <li><a href="categories.php">分类目录</a></li>
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
        var changeStatus = {
            drafted:'草稿',
            published:'已发布',
            trashed:'已作废'
        }


            // 动态生成分类栏
        var currentPage = 1;
        // 总页数 = Math.ceil(总条数 / 每页显示数);
        var pageCount;
        var pageSize = 20;


        $(function () {

        var status = 'all';
        var categoryId = 'all';
        
        
        function pageButton() {
            var start = currentPage -2;
            var end = currentPage + 2;
            if (currentPage==1){
                start = 1;
                end = currentPage + 4;
            }
            if(currentPage ==2){
                start = 1;
                end = currentPage + 3;
            }
            if(end > pageCount){
                end = pageCount;
            }
            var html = '';
            if(currentPage !=1){
                html +='<li class="item" data-page="'+(currentPage - 1)+'"><a href="javascript:;">上一页</a></li>';
            }
            
            for(var i =start;i<=end;i++){
                if(i==currentPage){
                    html+='<li class="item active" data-page="' + i + '"><a href="javascript:;">'+i+'</a></li>';
                }else{
                    html+='<li class="item" data-page="' + i + '"><a href="javascript:;">'+i+'</a></li>';
                }
            }
            if(currentPage !=end){
                html+='<li class="item" data-page="'+(currentPage + 1)+'"><a href="javascript:;">下一页</a></li>';
            }
            $('.pagination').html(html);
          }
       

        
        

        // 动态生成网页
        $.ajax({
            type: "post",
            url: "api/_getPost.php",
            data: {
                pageSize:pageSize,
                currentPage:currentPage,
                status:status,
                categoryId:categoryId
            },
            success: function(res) {
                if(res.code==1){
                   
                    pageCount = Math.ceil(res.totle/pageSize);
                    pageButton();
                    $.each(res.data, function (i, v) { 
                        var str = '<tr index= '+v.id+'>\
                        <td class="text-center"><input type="checkbox"></td>\
                        <td>'+v.title+'</td>\
                        <td>'+v.nickname+'</td>\
                        <td>'+v.name+'</td>\
                        <td class="text-center">'+v.created+'</td>\
                        <td class="text-center">'+changeStatus[v.status]+'</td>\
                        <td class="text-center">\
                            <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>\
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\
                        </td>\
                    </tr>';
                    //  $('tbody').append($str);
                    $(str).appendTo('tbody');
                    
                    });
                }
            }
        });
        $('.pagination').on('click','.item',function () {
            currentPage = parseInt($(this).attr('data-page'));
            $.ajax({
                type: "post",
                url: "api/_getPost.php",
                data: {
                    pageSize:pageSize,
                    currentPage:currentPage,
                    status:status,
                    categoryId:categoryId
                },
                success: function (res) {
                    if(res.code==1){
                        pageButton();
                        $('tbody').children().remove();
                        $.each(res.data, function (i, v) { 
                            var str = '<tr index= '+v.id+'>\
                            <td class="text-center"><input type="checkbox"></td>\
                            <td>'+v.title+'</td>\
                            <td>'+v.nickname+'</td>\
                            <td>'+v.name+'</td>\
                            <td class="text-center">'+v.created+'</td>\
                            <td class="text-center">'+changeStatus[v.status]+'</td>\
                            <td class="text-center">\
                                <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>\
                                <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\
                            </td>\
                        </tr>';
                        //  $('tbody').append($str);
                        $(str).appendTo('tbody');
                        });
                    }
                }
            });
        });

        /* 
        动态获得所有分类的数据
         */
        $.ajax({
            type: "post",
            url: "api/_getCategoryData.php",
            data: {},
            success: function (response) {
                // console.log(response);
                if(response.code == 1){
                    var str='';
                    $.each(response.data,function (i,v) {
                        str += '<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $("#categoryId").append(str);
                }
            }
        });

        /* 
        点击筛选按钮
         */
        var status = $('#status').val();
        var categoryId = $('#categoryId').val();
        $('#btn-filt').on('click',function () {
        status = $('#status').val();
        categoryId = $('#categoryId').val();
            $.ajax({
                type: "post",
                url: "api/_getPost.php",
                data: {
                    pageSize:pageSize,
                    currentPage:currentPage,
                    status:status,
                    categoryId:categoryId
                },
                success: function (res) {
                    console.log(res);
                    if(res.code==1){
                        $('.pagination').show();
                        $('tbody').children().remove();
                        $.each(res.data, function (i, v) { 
                            var str = '<tr index= '+v.id+'>\
                            <td class="text-center"><input type="checkbox"></td>\
                            <td>'+v.title+'</td>\
                            <td>'+v.nickname+'</td>\
                            <td>'+v.name+'</td>\
                            <td class="text-center">'+v.created+'</td>\
                            <td class="text-center">'+changeStatus[v.status]+'</td>\
                            <td class="text-center">\
                                <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>\
                                <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\
                            </td>\
                        </tr>';
                        //  $('tbody').append($str);
                        $(str).appendTo('tbody');
                        });
                        pageCount = Math.ceil(res.totle/pageSize);
                        pageButton();
                    }else {
                        $('tbody').children().remove();
                        $('tbody').html("<tr><td colspan=7>无记录</td></tr>");
                        $('.pagination').hide();
                    }
                    
                }
            });
            
        });
    });
    </script>
</body>

</html>