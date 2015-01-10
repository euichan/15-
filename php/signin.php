<?php

    //mysql 연결 설정
    $mysql_hostname =  "localhost";
    $mysql_user = "root";
    $mysql_password = "root";
    $mysql_database = "layer7";

    //mysql 접속 확인
    $db = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ("db connect error");

    //mysql 데이터베이스 연결 확인
    mysql_select_db($mysql_database, $db) or die("db connect error");

    //세션 시작
    session_start();

    //세션 확인
    if(isset($_SESSION['login_user']))
//세션 확인
if(isset($_SESSION['login_user']))
{
    unset($_SESSION['login_user']);
}

else if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['id'];
    $password = $_POST['password'];
    
    //아이디 입력 확인
    if(!$username)
    {
        echo "<script> alert("아이디를 입력하셈..ㅉㅉ"); location.href=\"../html/signin.html\"; </script>";
    }
    
    
    //패스워드 입력 확인
    if(!$password)
    {
        unset($_SESSION['login_user']);
    }

    else if($_SERVER["REQUEST_METHOD"] == "POST")
    
    //회원 정보를 가져오는 SQL구문
    $sql = "select id from user_db where id = '$username' and pw = '$password'";
    $result = mysql_query($sql);
    
    //레코드 갯수 셈
    $count=mysql_num_rows($result);
    if($count==1)
    {
        $_SESSION['login_user']=$username;
    }
    
    else
    {
        $username = $_POST['id'];
        $password = $_POST['password'];
        
        //아이디 입력 확인
        if(!$username)
        {
            echo "<script> alert(\"아이디를 입력하셈..ㅉㅉ\"); location.href=\"../html/signin.html\"; </script>";
        }
        
        
        //패스워드 입력 확인
        if(!$password)
        {
            echo "<script> alert(\"비번을 입력하셈..ㅉㅉ\"); location.href=\"../html/signin.html\"; </script>";
        }
        
        //회원 정보를 가져오는 SQL구문
        $sql = "select id from user_db where id = '$username' and pw = '$password'";
        $result = mysql_query($sql);
        
        //레코드 갯수 셈
        $count=mysql_num_rows($result);
        if($count==1)
        {
            $_SESSION['login_user']=$username;
        }
        
        else
        {
            echo "<script>alert('로그인 실패함..ㅉ');</script>";
        }
    }
?>
