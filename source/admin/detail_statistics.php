<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Romms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-light">
    <?php require("header.php");?>
    <?php 
        require("../connection.php");
                $id = $_GET['id'];
                $sql = "select * from CTHD where ID_HOADON='$id'";
                $run = mysqli_query($connection, $sql);
                $num = mysqli_num_rows($run);
                if ($num == 0){
                    echo "Not found";
                }
                else{

     
    ?>
       
    <div class="conteiner-fluid" >
        <div class="row">
            <div class="col-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">STATISTIC DETAIL</h3>
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Invoice ID</th>
                <th scope="col">Room's Name</th>
                <th scope="col">Room's Price</th>
                <th scope="col">Service's Name</th>
                <th scope="col">Service's Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                        $i = 1;
                        while ($row = mysqli_fetch_array($run)) {
                            $s = "SELECT * FROM DS_HOADON WHERE id_hd='" . $row['ID_HOADON'] . "'";
                            $ex = mysqli_query($connection, $s);
                            $r = mysqli_fetch_array($ex);
                            
                            $p = "SELECT * FROM DS_DICHVU WHERE ID='" . $row['ID_DV'] . "'";
                            $e = mysqli_query($connection, $p);
                            $re = mysqli_fetch_array($e);
                            $o = "SELECT * FROM DS_PHONG WHERE ID_PHONG='" . $row['ID_PHONG'] . "'";
                            $m = mysqli_query($connection, $o);
                            $h = mysqli_fetch_array($m);

                            $a = "SELECT * FROM DS_LOAIPHONG WHERE ID_LOAIPHONG='" . $h['ID_LOAIPHONG'] . "'";
                            $t = mysqli_query($connection, $a);
                            $x = mysqli_num_rows($t);
                            $_r = mysqli_fetch_array($t);
                    ?>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['ID_HOADON']?></td>
                        <td><?php echo $h['TEN_PHONG'] ?></td>
                        <td><?php echo $_r['GIA'] ?></td>
                        <td><?php echo $re['TEN_DICHVU'] ?></td>
                        <td><?php echo currency_format($re['GIA']) ?></td>

                </tr>
                    <?php
                        $i = $i+1;
                            }

                    ?>
                
            </tbody>
            



        
            </div>
        </div>
    <div>
</div>
<?php }
 ?>
</html>