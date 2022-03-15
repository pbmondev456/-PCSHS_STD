<?php
 require_once "condb.php";
 $class = $_POST['stdclass']
?>

<div id="printable font-wg superfont">
    <p align="center" class="text02"><span id="superfont">ตารางเรียน ของชั้นมัธยมศึกษาปีที่
            <?php echo $_POST['stdclass'] ?>
            &nbsp;ปีการศึกษา
            2564&nbsp;&nbsp;
            โรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย พิษณุโลก</span></p>

    <div class="container-fluid" id="superfont">
        <div class="row">
            <div class="col"></div>
            <div class="col-sm-12 mx-auto">
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col" class="text-center align-middle"><span>วัน /
                                        เวลา</span></th>
                                <th scope="col" class="text-center align-middle"><span>คาบที่
                                        1<br>08.30-09.20</span></th>
                                <th scope="col" class="text-center align-middle"><span>คาบที่
                                        2<br>09.20-10.10</span></th>
                                <th scope="col" class="text-center align-middle"><span>คาบที่
                                        3<br>10.30-11.20</span></th>
                                <th scope="col" class="text-center align-middle"><span>คาบที่
                                        4<br>11.20-12.10</span></th>
                                <th scope="col" class="text-center align-middle"><span>คาบที่
                                        5<br>13.00-13.50</span></th>
                                <th scope="col" class="text-center align-middle"><span>คาบที่
                                        6<br>13.50-14.40</span></th>
                                <th scope="col" class="text-center align-middle"><span>คาบที่
                                        7<br>14.50-15.40</span></th>
                                <th scope="col" class="text-center align-middle"><span>คาบที่
                                        8<br>15.40-16.30</span></th>
                                <!-- <th scope="col" class="text-center align-middle"><span>คาบที่
                                        9<br>16.30-17.20</span></th> -->
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <th class="text-center align-middle"><span>จันทร์</span></th>
                                <?php 
                                         $stmt = $conn->query("SELECT * FROM tb_study WHERE st_class='$class' AND st_day='จันทร์' ORDER BY st_period ");
                                         $stmt->execute();
                                         $allstd = $stmt->fetchAll();
                                        if (!$allstd) {
                                         echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                         } else {
                                         foreach ($allstd as $std){
                ?>
                                <td class="text-center align-middle">
                                    <span>
                                        <?php echo $std['st_sub']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_tc']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_room']?>
                                    </span>
                                </td>
                                <?php }  } ?>
                            </tr>
                            <tr>
                                <th class="text-center align-middle"><span>อังคาร</span></th>
                                <?php 
                                         $stmt = $conn->query("SELECT * FROM tb_study WHERE st_class='$class' AND st_day='อังคาร' ORDER BY st_period ");
                                         $stmt->execute();
                                         $allstd = $stmt->fetchAll();
                                        if (!$allstd) {
                                         echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                         } else {
                                         foreach ($allstd as $std){
                ?>
                                <td class="text-center align-middle">
                                    <span>
                                        <?php echo $std['st_sub']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_tc']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_room']?>
                                    </span>
                                </td>
                                <?php }  } ?>
                            </tr>
                            <tr>
                                <th class="text-center align-middle"><span>พุธ</span></th>
                                <?php 
                                         $stmt = $conn->query("SELECT * FROM tb_study WHERE st_class='$class' AND st_day='พุธ' ORDER BY st_period ");
                                         $stmt->execute();
                                         $allstd = $stmt->fetchAll();
                                        if (!$allstd) {
                                         echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                         } else {
                                         foreach ($allstd as $std){
                ?>
                                <td class="text-center align-middle">
                                    <span>
                                        <?php echo $std['st_sub']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_tc']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_room']?>
                                    </span>
                                </td>
                                <?php }  } ?>
                            </tr>
                            <tr>
                                <th class="text-center align-middle"><span>พฤหัสบดี</span></th>
                                <?php 
                                         $stmt = $conn->query("SELECT * FROM tb_study WHERE st_class='$class' AND st_day='พฤหัสบดี' ORDER BY st_period ");
                                         $stmt->execute();
                                         $allstd = $stmt->fetchAll();
                                        if (!$allstd) {
                                         echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                         } else {
                                         foreach ($allstd as $std){
                ?>
                                <td class="text-center align-middle">
                                    <span>
                                        <?php echo $std['st_sub']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_tc']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_room']?>
                                    </span>
                                </td>
                                <?php }  } ?>
                            </tr>
                            <tr>
                                <th class="text-center align-middle"><span>ศุกร์</span></th>
                                <?php 
                                         $stmt = $conn->query("SELECT * FROM tb_study WHERE st_class='$class' AND st_day='ศุกร์' ORDER BY st_period ");
                                         $stmt->execute();
                                         $allstd = $stmt->fetchAll();
                                        if (!$allstd) {
                                         echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                         } else {
                                         foreach ($allstd as $std){
                ?>
                                <td class="text-center align-middle">
                                    <span>
                                        <?php echo $std['st_sub']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_tc']?>
                                        <?php echo '<br>'?>
                                        <?php echo $std['st_room']?>
                                    </span>
                                </td>
                                <?php }  } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

</div>