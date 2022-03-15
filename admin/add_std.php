<?php 
session_start();
require_once "../condb.php";

// echo $st_class = $_POST['st_class'];
// echo $st_day = $_POST['st_day'];
// echo $st_period = $_POST['st_period'];
// echo $st_sub = $_POST['st_sub'];
// echo $st_tc = $_POST['st_tc'];
// echo $st_room = $_POST['st_room'];


if (isset($_POST['sub_stb'])) {
    $st_class = $_POST['st_class'];
    $st_day = $_POST['st_day'];
    $st_period = $_POST['st_period'];
    $st_sub = $_POST['st_sub'];
    $st_tc = $_POST['st_tc'];
    $st_room = $_POST['st_room'];
    $sql = $conn->prepare("INSERT INTO tb_study(st_class, st_day, st_period,st_sub, st_tc,  st_room) VALUES(:st_class, :st_day, :st_period,:st_sub, :st_tc, :st_room)");
        $sql->bindParam(":st_class", $st_class);
        $sql->bindParam(":st_day", $st_day);
        $sql->bindParam(":st_period", $st_period);
        $sql->bindParam(":st_sub", $st_sub);
        $sql->bindParam(":st_tc", $st_tc);
        $sql->bindParam(":st_room", $st_room);
        $sql->execute();
            if ($sql) {
                $_SESSION['success'] = "Data has been inserted successfully";
                 header("location: home.php");
             } else {
                $_SESSION['error'] = "Data has not been inserted ";
                header("location: home.php");     
        }
}


?>