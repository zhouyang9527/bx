<?php
    require_once 'config.php';
    // 连接服务器
    // 写sql查询语句
    // 执行查询语句
    // 断开服务器
    $categories = $_GET['id'];
    
    $sql="SELECT p.id,p.title,p.content,p.created,p.feature,p.likes,p.views,u.nickname,c.`name`,
    (select count(id) from comments c where c.post_id = p.id ) as commentCount from posts p

    LEFT JOIN users u on u.id = p.user_id
    LEFT JOIN categories c on c.id = p.category_id

    where p.category_id = {$categories}
    LIMIT 10";
    require_once 'getData.php';
    $arrPost = getData($sql);


?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>阿里百秀-发现生活，发现美!</title>
    <link rel="stylesheet" href="static/assets/css/style.css">
    <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
</head>

<body>
    <div class="wrapper">
        <div class="topnav">
            <ul>
                <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
                <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
                <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
                <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
            </ul>
        </div>
        <?php 
            include_once 'public/_header.php';
            include_once 'public/_aside.php';
         ?>
        <div class="content">
            <div class="panel new">
                <h3><?php echo $arrPost[0]['name']?></h3>
                <!-- <div class="entry">
                    <div class="head">
                        <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
                    </div>
                    <div class="main">
                        <p class="info">admin 发表于 2015-06-29</p>
                        <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
                        <p class="extra">
                            <span class="reading">阅读(3406)</span>
                            <span class="comment">评论(0)</span>
                            <a href="javascript:;" class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞(167)</span>
                            </a>
                            <a href="javascript:;" class="tags">
                                分类：<span>星球大战</span>
                            </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="static/uploads/hots_2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="entry">
                    <div class="head">
                        <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
                    </div>
                    <div class="main">
                        <p class="info">admin 发表于 2015-06-29</p>
                        <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
                        <p class="extra">
                            <span class="reading">阅读(3406)</span>
                            <span class="comment">评论(0)</span>
                            <a href="javascript:;" class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞(167)</span>
                            </a>
                            <a href="javascript:;" class="tags">
                                分类：<span>星球大战</span>
                            </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="static/uploads/hots_2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="entry">
                    <div class="head">
                        <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
                    </div>
                    <div class="main">
                        <p class="info">admin 发表于 2015-06-29</p>
                        <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
                        <p class="extra">
                            <span class="reading">阅读(3406)</span>
                            <span class="comment">评论(0)</span>
                            <a href="javascript:;" class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞(167)</span>
                            </a>
                            <a href="javascript:;" class="tags">
                                分类：<span>星球大战</span>
                            </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="static/uploads/hots_2.jpg" alt="">
                        </a>
                    </div>
                </div> -->
                <?php
                    foreach($arrPost as $value){ ?>
                        <div class="entry">
                            <div class="head">
                                <a href="./detail.php?postId=<?php echo $value['id']?>"><?php echo $value['title']?></a>
                            </div>
                            <div class="main">
                                <p class="info"><?php echo $value['nickname']?> 发表于 <?php echo $value['created']?></p>
                                <p class="brief"><?php echo $value['content']?></p>
                                <p class="extra">
                                    <span class="reading">阅读(<?php echo $value['views']?>)</span>
                                    <span class="comment">评论(<?php echo $value['commentCount']?>)</span>
                                    <a href="javascript:;" class="like">
                                        <i class="fa fa-thumbs-up"></i>
                                        <span>赞(<?php echo $value['likes']?>)</span>
                                    </a>
                                    <a href="javascript:;" class="tags">
                                        分类：<span><?php echo $value['name']?></span>
                                    </a>
                                </p>
                                <a href="javascript:;" class="thumb">
                                    <img src="<?php echo $value['feature']?>" alt="">
                                </a>
                            </div>
                        </div>
                  <?php  }
                ?>
                <!-- 加载更多的按钮功能 -->
                <div class="loadmore">
                    <span class="btn">加载更多</span>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
        </div>
    </div>
    <script src="static/assets/vendors/jquery/jquery.js"></script>
    <script>
        $(function () {  
            $currentPage =1;
            // 给加载更多的按钮注册点击事件
            $('.loadmore .btn').on('click',function () {
                // 每执行一次，当前页数+1
                $currentPage++;
                // 得到地址栏的id属性
                $id =location.search.split('=')[1];
                console.log(location.search.split('='));
                // 请求后台，加载更多的跟当前分类相关的数据
                $.ajax({
                    type: "post",
                    url: "api/_getMorePost.php",
                    data: {
                        id:$id,
                        currentPage:$currentPage,
                        pageSize:10
                    },
                    success: function (res) {
                        var data = res.data;
                        console.log(res);
                        
                        $.each(data, function (index, value) { 
                             var str = '<div class="entry">\
                                            <div class="head">\
                                                <a href="./detail.php?postId='+value['id']+'">'+value['title']+'</a>\
                                            </div>\
                                            <div class="main">\
                                                <p class="info">'+value['nickname']+' 发表于 '+value['created']+'</p>\
                                                <p class="brief">'+value['content']+'</p>\
                                                <p class="extra">\
                                                    <span class="reading">阅读('+value['views']+')</span>\
                                                    <span class="comment">评论('+value['commentCounts']+')</span>\
                                                    <a href="javascript:;" class="like">\
                                                        <i class="fa fa-thumbs-up"></i>\
                                                        <span>赞('+value['likes']+')</span>\
                                                    </a>\
                                                    <a href="javascript:;" class="tags">\
                                                        分类：<span>'+value['name']+'</span>\
                                                    </a>\
                                                </p>\
                                                <a href="javascript:;" class="thumb">\
                                                    <img src="'+value['feature']+'" alt="">\
                                                </a>\
                                            </div>\
                                        </div>';
                            $entry = $(str);
                            console.log($entry);
                            $entry.insertBefore('.loadmore');
                            
                        });
                        var maxPage = Math.ceil(res.pageCount / 10);
                        if($currentPage == maxPage){
                            $('.loadmore .btn').hide();
                        }

                    }
                });
            });
        });
    </script>
</body>

</html>