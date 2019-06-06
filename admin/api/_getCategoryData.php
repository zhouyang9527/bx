<?php
    include_once '../../config.php';
    include_once '../../getData.php';

    $sql = "select * from categories";
    $result = getData($sql);
    $response = ['code'=>0,'msg'=>'操作失败'];
    if($result){
        $response['code'] =1;
        $response['msg'] = '操作成功';
        $response['data'] = $result;
    }
    header("content-type:application/json;charset:uft-8");
    echo json_encode($response);
?>