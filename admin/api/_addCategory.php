<?php
    include_once '../../config.php';
    include_once '../../getData.php';

    // 验证有没有重复的名字
    $name = $_POST['name'];
    $sql = "select count(id) as count from categories where `name` = '{$name}'";
    $reslut = getData($sql);
    if($reslut[0]['count'] >= 1){
        $response = ['code'=>0,'msg'=>'操作失败'];
    }else {
        // $key = array_keys($_POST);
        // $values = array_values($_POST);
        // $sqlAdd = "insert into categories(" . implode(",", $key ). ") values('" . implode("','" , $values) . "')";
        // $reslut1 = getData($sqlAdd);
        // $response['code'] = 1;
        // $response['msg'] = '操作成功';
        $res = insert("categories",$_POST);
        if($res){
            $response['code'] = 1;
            $response['msg'] = '操作成功';
            // var_dump($res);
            $response['id'] = $res[0]['id'];
        }
    }
    header('content-type:application/json;charset=utf-8');
    echo json_encode($response); 
?>