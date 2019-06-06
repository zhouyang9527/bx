<?php
    include_once '../../config.php';
    include_once '../../getData.php';
    session_start();
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users u where id = {$id}";
    $result = getData($sql);
    $response =['code'=>0,'msg'=>'请求失败'];
    if($result){
        $response['code']=1;
        $response['msg'] = "请求成功";
        $response['avatar'] = $result[0]['avatar'];
        $response['nickname'] = $result[0]['nickname'];
    }
    header('content-type:application/json;charset=utf-8');
    echo json_encode($result);

?>