<?php 
    include_once '../../config.php';
    include_once '../../getData.php';

    $slug = $_POST['slug'];
    $name = $_POST['name'];
    $classname = $_POST['classname'];
    $id = $_POST['id'];
    $sql = "update categories set slug = '{$slug}',`name` = '{$name}',classname = '{$classname}' where id = {$id}";
    $result = updateData($sql);
    $response = ["code"=>0,"msg"=>"操作失败"];
    if($result){
        $response['code'] = 1;
        $response['msg'] = "操作成功";
    }
    header("content-type:application/json;charset:utf-8");
    echo json_encode($response);
?>