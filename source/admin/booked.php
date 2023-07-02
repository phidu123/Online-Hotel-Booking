<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Rooms</title>
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
        $sql = "select * from DS_HOADON";
        $run = mysqli_query($connection, $sql);

?>

<div class="conteiner-fluid" >

        <div class="row">
        
            <div class="col-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">BOOKED</h3>
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ROOM</th>
                <th scope="col">CHECK-IN</th>
                <th scope="col">CHECK-OUT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                        $i = 1;
                        while($row = mysqli_fetch_array($run)){
                            $s = "SELECT * FROM CTHD  WHERE ID_HOADON ='" . $row['id_hd'] . "'";
                            $ex = mysqli_query($connection, $s);
                            $r = mysqli_fetch_array($ex);

                            $a = "SELECT TEN_PHONG FROM DS_PHONG  WHERE ID_PHONG ='" . $r['ID_PHONG'] . "'";
                            $b = mysqli_query($connection, $a);
                            $_r = mysqli_fetch_array($b);
                            
                            
                            ?>
                        <td><?php echo $i ?></td>
                        <td><?php echo $_r['TEN_PHONG'] ?></td>
                        <td><?php echo $r['CHECK_IN'] ?></td>
                        <td><?php echo $r['CHECK_OUT'] ?></td>
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