<?php
    function checkLogin(){
        session_start();
        if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] !=1 ){
            header('Location:login.php');
        }
    }
    function getData($sql){
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
        $result = mysqli_query($conn,$sql);
        $arr =[];
        
        while($row = mysqli_fetch_assoc($result)){
            $arr[] = $row;
            
        }
        mysqli_close($conn);
        return $arr;
    }

    function insert($table,$arr){
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
        $key = array_keys($arr);
        $values = array_values($arr);
        $sql = "insert into {$table}(" . implode(",", $key ). ") values('" . implode("','" , $values) . "')";
        mysqli_query($conn,$sql);
        $sql1 = "select id from {$table} where $key[0]='$values[0]'";
        $result1 = mysqli_query($conn,$sql1);
        // 返回添加进数据库的对应的ID号
        $arr =[];
        
        while($row = mysqli_fetch_assoc($result1)){
            $arr[] = $row;
            
        }
        mysqli_close($conn);
        return $arr;
    }
    function updateData($sql){
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
        return $result;
    }
?>