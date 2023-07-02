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
    <!-- <div class="conteiner-fluid" >
        <div class="row"> -->
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

        <div>
            <form method="post">
                <div class="form-group row">
                    <label for="type" class="col-sm-2 col-form-label">Room's Category</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="type" value="<?php echo $r['TEN_LOAIPHONG'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Room's Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name_room" value="<?php echo $row['TEN_PHONG'] ?>">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Room's Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="img" required>
                        <br>
                        <img src="./upload/rooms/<?php echo $row['HINHANH']?>">
                    </div>
                </div>
                <div class="form-group row p-3 col-lg-1 text-center" style="margin: auto;">
                    <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                </div>
            </form>
        </div>
        
<?php }
        }
    
    }
 ?>
            </div>
        </div>
    <div>
<!-- </div>
</div> -->
</body>
<?php 
    if (isset($_POST['edit'])){
        $id = $_GET['id'];
        $sql = "UPDATE `ds_phong` set `TEN_PHONG`='$_POST[name_room]',  `HINHANH`='$_POST[img]' where `ID_PHONG`='$id'";
        $run = mysqli_query($connection, $sql);
        if ($run){
            echo "<script type='text/javascript'> alert('Update Success')</script>";
            echo "<script> window.location.href='rooms.php' </script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Update Fail')</script>";
        }
    }
?>
</html>