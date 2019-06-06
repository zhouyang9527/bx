<?php
    include_once '../../config.php';
    include_once '../../getData.php';

    $currentPage = 1;
    $pageSize = $_POST['pageSize'];
    $currentPage = $_POST['currentPage'];
    $status = $_POST['status'];
    $categoryId = $_POST['categoryId'];
    $offset = ($currentPage - 1) * $pageSize;
    $where = "where 1=1 ";
    if($status != 'all'){
        $where .= " and p.`status` = '{$status}'";
    }
    if($categoryId != 'all'){
        $where .= "and p.category_id = {$categoryId}";
    }
    $sql = "SELECT p.id,p.title,p.category_id,p.`status`,p.created,u.nickname,c.`name` from posts p
            LEFT JOIN users u on u.id = p.user_id 
            LEFT JOIN categories c on c.id = p.category_id
            ". $where ."
            LIMIT {$offset},{$pageSize} ";
    $result = getData($sql);
    $sql1 = "select count(id) count from posts p ".$where;
    $result1 = getData($sql1);
    $response = ["code"=>0,"msg" => "操作失败"];
    if($result){
        $response["code"] = 1;
        $response["msg"] = "操作成功";
        $response["data"] = $result;
    }
    if($result1){
        $response["totle"] = $result1[0]['count'];
    }
    header("content-type:application/json;charset:utf-8");
    echo json_encode($response); 
?>