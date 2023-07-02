<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AURORA Hotel - About us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;

        }

        .h-font {
            font-family: 'Merienda', cursive;
        }

        .zoom {
            transition: transform .5s ease;
        }

        .zoom:hover {
            transform: scale(1.01);
        }
    </style>
</head>
<?php
if (!function_exists('currency_format')) {

    function currency_format($number, $suffix = ' VND') {
        if (!empty($number)) {
            return number_format($number, 0, ',', ',') . "{$suffix}";
        }
    }

}
?>

<body class="bg-light">
    <?php
    //  require("connection.php"); 
     ?>
    <?php require("header.php"); ?>
    <h3 class="text-center mt-2 pt-4 mb-4">ABOUT US</h3>

    <?php 
     $sql = "select * from settings";
     $run = mysqli_query($connection, $sql);
     $num = mysqli_num_rows($run);
     while ($row = mysqli_fetch_array($run)) {
                 
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <p class="fw-bold fs-5 h-font"><?php echo $row['site_title']?></p>
           <p class="fs-5 h-font"> <?php echo $row['site_about'] ?></p>
        </div>
    </div>
</div>


<?php
     }
    ?>
    <?php require("footer.php");?>
</body>

</html>