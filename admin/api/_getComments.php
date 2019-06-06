<?php
    include_once '../../config.php';
    include_once '../../getData.php';

    $pageSize = $_POST['pageSize'];
    $currentPage = $_POST['currentPage'];
    $offset = ($currentPage - 1) * $pageSize;

    $sql = "select c.author,c.content,p.title,c.created,c.id,c.`status` from comments c 
    LEFT JOIN posts p on p.id = c.post_id
    LIMIT {$offset},{$pageSize}";

    $result = getData($sql);
    $sql1 = "select count(id) count from comments";
    $response = ['code'=>0,'msg'=>'操作失败'];
    $result1 = getData($sql1);
    $pageCount = ceil($result1[0]['count'] / $pageSize); 
    if($result){
        $response['code'] = 1;
        $response['msg'] = '操作成功';
        $response['data'] = $result;
        $response['pageCount'] =  $pageCount;
    }

    header('content-type:application/json;charset:utf-8');
    echo json_encode($response);
?>