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
    <div class="conteiner-fluid" >
        <div class="row">
            <div class="col-10 ms-auto p-4 overflow-hidden">
            <?php 
    require("../connection.php");
            $id = $_GET['id'];
            $sql = "select * from DS_PHONG where ID_PHONG = '$id'";
            $run = mysqli_query($connection, $sql);
            $num = mysqli_num_rows($run);
            if ($num == 0){
                echo "Not found";
            }
            else{
                $arr = array();
                while ($row = mysqli_fetch_array($run)) {
                    $s = "SELECT * FROM DS_LOAIPHONG WHERE ID_LOAIPHONG='" . $row['ID_LOAIPHONG'] . "'";
                    $ex = mysqli_query($connection, $s);
                    $n = mysqli_num_rows($ex);
                    $r = mysqli_fetch_array($ex);

                    if($n == 0){
                        echo "Not found";
                    }
                    else{      
?>


        <div class='col-lg-3 col-md-6 p-3'>  
            <div class="card" style="width: 18rem;">
            <img src="../admin/upload/rooms/<?php echo $row['HINHANH']?>" class='card-img-top' style='height: 200px;'>
            <div class="card-body">
                <h4 class="card-title fw-bold"> <?php echo $row['TEN_PHONG'] ?></h4> <br>
                <h5 class="card-title"><?php echo $r['TEN_LOAIPHONG']?></h5>
                <h5 class="card-title text-danger"><?php echo currency_format($r['GIA'])?>/Day</h5>
                <div class='features mb-4'>
                        <h6 class='mb-1 fw-bold'>Features</h6>
                        <p class="badge rounded-pill bg-light text-dark text-wrap\"><?php echo $r['FEATURES'] ?></p>
                </div>
                <div class='features mb-4'>
                        <h6 class='mb-1 fw-bold'>Facilities</h6>
                        <p class="badge rounded-pill bg-light text-dark text-wrap\"><?php echo $r['FACILITIES'] ?></p>
                </div>
            </div>
            </div>
        </div>
 
<?php }
        }
    
    }
 ?>
            </div>
        </div>
    <div>
</div>
</html>