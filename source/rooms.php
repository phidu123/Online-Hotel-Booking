<?php
require("header.php");
    // require("connection.php");
    if (isset($_GET['q'])) {
        // print_r();
        $query = explode("&", base64_decode($_GET['q']));
        $dateIn = $query[0];
        $dateOut = $query[1];
        $quantity = $query[2];
        // $sql = "select * from ds_phong where id_phong in (select id_phong from status where date_checkout < '$dateIn' or '$dateOut' < date_checkin)";
        $sql = "select * from ds_phong where id_phong not in (
            select id_phong from cthd where check_in <= '$dateIn' and check_out >= '$dateOut'
        ) and id_phong not in (
            select id_phong from cthd where check_in between '$dateIn' and '$dateOut' or check_out between '$dateIn' and '$dateOut'
        ) and status=1";
        $result = $connection->query($sql);
        $res = [];
        while ($row = $result->fetch_array()) {
            $data = [];
            $data['id'] = $row['ID_PHONG'];
            $data['name'] = $row['TEN_PHONG'];
            $data['rating'] = $row['DANHGIA'];
            $data['img'] = $row['HINHANH'];
            $sql = "select * from ds_loaiphong where id_loaiphong = '". $row['ID_LOAIPHONG'] . "'";
            $result2 = $connection->query($sql);
            $row = $result2->fetch_array();
            $data['roomType'] = $row['TEN_LOAIPHONG'];
            $data['price'] = $row['GIA'];
            $data['ft'] = $row['FEATURES'];
            $data['fc'] = $row['FACILITIES'];
            array_push($res, $data);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AURORA Hotel - Rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <style>
        *{
            font-family: 'Poppins', sans-serif;

        }
        .h-font{
            font-family: 'Merienda', cursive;
        }
    </style>
</head>


<body class="bg-light">

    
    
    <!-- Navbar -->
    <!-- CÁC LOẠI PHÒNG -->
    <div class="my-3 ox-4">
        <h3 class="text-center mt-2 pt-4 mb-4">OUR ROOMS AVAILABLE</h3>
        <div class="h-line bg-dark"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 px-4">
<?php
    foreach ($res as $key) {
?>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-4">
                            <img style="height: 200px; width: 400px" src="admin/upload/rooms/<?php echo $key['img']?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 px-2">

                            <h5 class="card-title fw-bold"><?php echo $key['name']?></h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                <?php
                                    $ft = explode(" | ", $key['ft']);
                                    $ft_len = count($ft);
                                    $fc = explode(" | ", $key['fc']);
                                    // echo "</br>";
                                    $fc_len = count($fc);
                                ?>
                                <?php
                                    for($i = 0; $i < $ft_len; $i++){
                                        echo "
                                            <span class=\"badge rounded-pill bg-light text-dark text-wrap\">
                                                $ft[$i]
                                            </span>
                                        ";
                                    }
                                ?>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <?php
                                    for($i = 0; $i < $fc_len; $i++){
                                        echo "
                                            <span class=\"badge rounded-pill bg-light text-dark text-wrap\">
                                                $fc[$i]
                                            </span>
                                        ";
                                    }
                                ?>

                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-between">
                            <div class="mb-4">
                                <span style="color: red"><b><?php echo currency_format($key['price'])?>/Day</b></span>
                            </div>
                            <div class="mt-1">
                                <a href="paymentpage.php?r=<?php 
                                    $st = $key['id']."&".$dateIn."&".$dateOut;
                                echo base64_encode($st)?>" class="btn btn-outline-primary text-blue">Book</a>                            </div>
                        </div>
                    </div>
                </div>
<?php
    }
?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>

<?php
    }
?>