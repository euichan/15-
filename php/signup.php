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

$id = $_POST['id'];
$password = $_POST['password'];

if($id=="" || $passwd == "")
{
    echo "<script> alert('빈칸 잇음'); history.back();</script>"; die;
}

$sql = "select count(*) from user_db where id='$id'";
$res = mysql_query($sql,$connect);
$rs = mysql_fetch_row($res);
$reg_num=$rs[0];

if($reg_num>0)
{
    echo "<script>alert('아이디가 중복됨');history.back();</script>"; die;
}

$sql = "insert into user_db (id, password)";
$sql= "values ('$id','$password')";
$res = mysql_query($sql,$connect);
$tot_row = mysql_affected_rows();
mysql_close($connect);

echo "회원가입 됨<hr />";
echo "만든 레코드행 개수= ".$tot_row."개";

if($tot_row > 0){
    echo "<script>alert('회원가입 됨ㅊㅊ');location.replace('../html/signin.html');</script>";
}

else
{
    echo "<script>alert('실패함 다시 하셈');history.back(); </script>";
}