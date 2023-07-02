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
    <?php require("header.php");?>
    <!-- <div class="conteiner-fluid" >
        <div class="row"> -->
            <div class="col-10 ms-auto p-4 overflow-hidden">
            <?php 
    require("../connection.php");
?>

        <div>
            <form method="post">
                <div class="form-group row p-2">
                    <label for="type" class="col-sm-2 col-form-label">Room's Category</label>
                    <select class="col-form-select col-sm-10" aria-label="Default select example" name="type">
                        <option selected>--Choose room's Category--</option>
                        <option value="1">Single Room (SGL)</option>
                        <option value="2">Twin Room (TWN)</option>
                        <option value="3">Double Room (DBL)</option>
                        <option value="4">Triple Room(TRPL)</option>
                    </select>
                </div>
                <div class="form-group row p-2">
                    <label for="name" class="col-sm-2 col-form-label">Room's Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="form-group row p-2">
                    <label for="name" class="col-sm-2 col-form-label">Room's Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <br>
                <div class="form-group row p-3 col-lg-1 text-center" style="margin: auto;">
                    <input type="submit" name="add" value="Add" class="btn btn-primary">
                </div>
            </form>
        </div>
        
            </div>
        </div>
    <div>
<!-- </div>
</div> -->
</body>
<?php 
    if (isset($_POST['add'])){
        $cat = $_POST['type'];
        $name = $_POST['name'];
        $img = $_POST['image'];
        if ($cat == 'Single Room (SGL)'){
            $cat = 'L01';
        }
        else if ($cat == 'Twin Room (TWN)'){
            $cat = 'L02';
        }
        else if ($cat == 'Double Room (DBL)'){
            $cat = 'L03';
        }
        else{
            $cat = 'L04';
        }
        


        $sql = "INSERT INTO `ds_phong`(`TEN_PHONG`, `ID_LOAIPHONG`, `HINHANH`, `STATUS`) VALUES ('$name','$cat','$img', 1)";
        $run = mysqli_query($connection, $sql);
        if ($run){
            echo "<script type='text/javascript'> alert('Add Success')</script>";
            echo "<script> window.location.href='rooms.php' </script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Add Fail')</script>";
        }
    }
?>
</html>