<?php
//XSS対応（echoする場所で使用、それ以外はNG
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn(){
    try { 
        if($_SERVER["HTTP_HOST"] == 'localhost'){
        $db_name = "test_subscription_db";
        $db_id   = "root";
        $db_pw   = "";
        $db_host = "localhost";
        }
        else{
            $db_name = "***";
            $db_id   = "***";
            $db_pw   = "***";
            $db_host = "***";
        }
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host=' .$db_host, $db_id, $db_pw);

    } catch (PDOException $e){
        exit('DB Connection Error:' .$e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit();
}

//sessioncheck
function sschk(){
    if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){
        exit('LOGIN ERROR');
    } else {
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}

function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}