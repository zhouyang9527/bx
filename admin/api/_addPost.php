<?php
// inser into posts p values(null,slug,title,feature,created,content,views,likes,status,user_id,category_id);
    // print_r($_POST);
    // $slug = $_POST['slug'];
    // $title = $_POST['title'];
    // $feature = $_POST['feature'];
    // $created = $_POST['created'];
    // $status = $_POST['status'];
    include_once '../../config.php';
    include_once '../../getData.php';

    $_POST['views']=0;
    $_POST['likes']=0;
    session_start();
    $_POST['user_id'] = $_SESSION['id'];
    $result = insert('posts',$_POST);
    $response=['code'=>0,'msg'=>'操作失败'];
    if($result){
        $response['code'] =1;
        $response['msg'] = '操作成功';
    }
    header("content-type:application/json;charset:uft-8");
    echo json_encode($response);
?>