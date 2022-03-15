<?php
ob_start();
session_start();
include "../condb.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM tb_study WHERE id = $delete_id");
    $deletestmt->execute();

    if ($deletestmt) {
        echo "<script>alert('Data has been deleted successfully');</script>";
        $_SESSION['success'] = "Data has been deleted succesfully";
        header("refresh:1; url=home.php");
    }
    
}
?>
<!doctype html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link href="../assets/style.css" rel="stylesheet" type="text/css">
    <title> Study :: Admin Dashboard</title>
    <style>
    #showtb_wrapper {
        width: 100% !important;
    }
    </style>
</head>

<body class="#">
    <!----modal----->
    <!-- MOdal add std -->
    <div class="modal fade" id="add_std" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel ">::: Add Study :: </h4>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <form action="add_std.php" method="post">
                        <div class=" mb-3">
                            <label for="st_class" class="col-form-label  fw-bold"> Class :</label>
                            <select name="st_class" class="custom-select" required>
                                <option selected value="">ชั้นเรียน</option>
                                <option value="4/2">ม.4/2</option>
                                <option value="4/3">ม.4/3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="st_day" class="col-form-label fw-bold">วันที่เรียน :</label>
                            <input type="text" class="form-control" name="st_day" require>
                        </div>
                        <div class="mb-3">
                            <label for="st_period" class="col-form-label fw-bold">คาบที่ :</label>
                            <input type="text" class="form-control" name="st_period" require>
                            <!-- <input type="number" name="st_period" min="1" max="8"> -->
                        </div>
                        <div class="mb-3">
                            <label for="st_sub" class="col-form-label fw-bold">วิชาที่เรียน :</label>
                            <input type="text" class="form-control" name="st_sub" require>
                        </div>
                        <div class="mb-3">
                            <label for="st_tc" class="col-form-label fw-bold">ครูผู้สอน :</label>
                            <input type="text" class="form-control" name="st_tc" require>
                        </div>
                        <div class="mb-3">
                            <label for="st_room" class="col-form-label fw-bold">ห้องเรียน :</label>
                            <input type="text" class="form-control" name="st_room" require>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="sub_stb" class="btn btn-success">::
                                บันทึก ::
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!---./----modal----->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">&#x2302</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="home.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../contact.php" class="nav-link">Contact</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form method='post' action="">
                    <button type="submit" value="Logout" class="btn btn-danger" name="but_logout">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style=" position: fixed;">
        <span class="brand-text pt-5 m-2 font-weight-light text-light text-xl">Admin Dashboard</span>
        <hr class="text-alight mx-2" style="border:solid 1px #fff;">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="home.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../contact.php" class="nav-link">
                            <p>
                                Contact Us
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper pt-2">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <h3 class="title">สวัสดีคุณ <?php echo $_SESSION['uname']?></h3>
                    <!-- <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>
                                <p>จำนวนห้องเรียน</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row mt-2">
                    <div class="col-mb-6 d-flex justify-content-start">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_std">
                            เพิ่มวิชาเรียน
                        </button>

                    </div>
                </div>
                <div class="row mt-3">

                    <?php if (isset($_SESSION['success'])) { ?>
                    <span class="badge badge-success">
                        <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
                    </span>
                    <?php } ?>
                    <?php if (isset($_SESSION['error'])) { ?>
                    <span class="badge badge-danger">
                        <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
                    </span>
                    <?php } ?>
                </div>

                <div class="row mb-5">
                    <table class="table table-striped" id="showtb">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>st_class</th>
                                <th>st_day</th>
                                <th>st_period</th>
                                <th>sub</th>
                                <th>tc</th>
                                <th>room</th>
                                <th> แก้ไข </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $stmt = $conn->query("SELECT * FROM tb_study ORDER BY st_class");
                    $stmt->execute();
                    $datas = $stmt->fetchAll();

                    if (!$datas) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($datas as $dt)  {  
                ?>
                            <tr>
                                <td><?php echo $dt['id']; ?></td>
                                <td><?php echo $dt['st_class']; ?></td>
                                <td><?php echo $dt['st_day']; ?></td>
                                <td><?php echo $dt['st_period']; ?></td>
                                <td><?php echo $dt['st_sub']; ?></td>
                                <td><?php echo $dt['st_tc']; ?></td>
                                <td><?php echo $dt['st_room']; ?></td>
                                <td>
                                    <a onclick="return confirm('Are you sure you want to delete?');"
                                        href="?delete=<?php echo $dt['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php }  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>
    <script>
    $(document).ready(function() {
        $('#showtb').DataTable();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>