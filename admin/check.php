<?php
session_start();

include "../condb.php";

$error ='<span class="badge badge-danger"> Username/Password incorrect  </span>';

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            $_SESSION['error'] = $error;
            header("Location: index.php");
            // echo $_SESSION['error'];
       }
    }

}
?>