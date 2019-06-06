<?php
    // print_r($_FILES['myfile']);
    $ext = strrchr($_FILES['myfile']['name'],'.');
    $newFileName = time().rand(10000,99999).$ext;
    $bool = move_uploaded_file($_FILES['myfile']['tmp_name'],"../../static/uploads/".$newFileName);

    $response = ['code' => 0,'msg' => '操作失败'];
    if($bool){
        $response['code']=1;
        $response['msg'] = '操作成功';
        $response['file'] = $newFileName;
    }
    header('content-type:application/json;charset:utf-8');
    echo json_encode($response);
?>