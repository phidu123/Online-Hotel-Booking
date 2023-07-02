<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php require("header.php");
        require("../connection.php");
        $sql = "select * from DS_KHACHHANG";
        $run = mysqli_query($connection, $sql); 

?>

<div class="conteiner-fluid" >

        <div class="row">
        
            <div class="col-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">CUSTOMERS</h3>
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">PHONE NUMBER</th>
                <th scope="col">USERNAME</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                        $i = 1;
                        while($row = mysqli_fetch_array($run)){
                    ?>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['TEN_KHACHHANG'] ?></td>
                        <td><?php echo $row['DIACHI'] ?></td>
                        <td><?php echo $row['SDT'] ?></td>
                        <td><?php echo $row['USERNAME'] ?></td>
                </tr>
                    <?php
                        $i = $i+1;
                            }

                    ?>
                
            </tbody>
        </table>
    </div>
</div>
</body>
</html>