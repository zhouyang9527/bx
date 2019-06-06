<?php
    require_once '../config.php';
    require_once '../getData.php';
    /* 
        根据文章的分类id对数据进行更多的获取
            1.获取分类的ID，第几次获取数据，一共要获取多少条数据
            2. 到数据库中查找对应的数据
     */
    $categoryID = $_POST['id'];
    $currentPage = $_POST['currentPage'];
    $pageSize = $_POST['pageSize'];
    $offset = ($currentPage -1) * $pageSize;

    // 连接数据库，并查询
    $sql = "SELECT p.id,p.title,p.content,p.created,p.feature,p.likes,p.views,u.nickname,c.`name`,
    (select count(id) from comments c where c.post_id = p.id ) as commentCount from posts p

    LEFT JOIN users u on u.id = p.user_id
    LEFT JOIN categories c on c.id = p.category_id

    where p.category_id = {$categoryID}
    LIMIT {$offset},{$pageSize}";
    $postArr = getData($sql);


    $sqlCount = "select count(id) as postCount from posts where category_id = {$categoryID}";
    $countArr = getData($sqlCount);
    $pageCount = $countArr[0]['postCount'];
    /* 

    
        一般在实际开发中，项目会约定好一个返回 的结构
        {
            
                "code" : 请求的状态 -  约定如果是某些特定的数字，就代表补丁的状态
                        比如： 0代表失败，1代表成功
                "msg"  : 想要返回给前台的一些信息
                "data" : 返回给前台的数据

        }

     */

    $response = ["code"=>0,"msg"=>"操作失败"];
    if($postArr){
        $response["code"] = 1;
        $response["msg"] = "操作成功";
        $response["data"] = $postArr;
        $response["pageCount"] = $pageCount;
    }
    header("content-type:application/json;charset=utf-8");
    echo json_encode($response);
?>