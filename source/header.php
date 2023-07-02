<?php
    require("connection.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">AURORA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="list_rooms.php">Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="about.php">About</a>
            </li>
        </ul>
        <div class="d-flex right-side">
<?php 
            if (isset($_COOKIE['id'])) {
                $id = $_COOKIE['id'];
                $sql = "select * from ds_khachhang where username='$id'";
                $result = $connection->query($sql);
                $row = $result->fetch_array();
                $avt = $row['PICTURE'];
                $name = $row['TEN_KHACHHANG'];
?>
            <button class="btn" onclick="window.location.replace('profile.php')">
                <img style="border-radius: 50px" width="30px" height="30px" src="./admin/upload/user/<?php echo $avt?>" alt="">
                <span class="mx-2"><?php echo $name?></span>
            </button>
<?php
            }
            else {
                echo '
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Register
                    </button>               
                ';
            }
?>
        </div>
    </div>
    </div>
    </nav>
    <!-- form đăng nhập -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label  class="form-label">Username</label>
                            <input name="username" type="text" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label  class="form-label">Password</label>
                            <input name="password" type="password" class="form-control shadow-none">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="login" class="btn btn-dark shadow-none">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "select * from taikhoan where username='$username' and password='$password' and isActivated=1 limit 1";
        $result = $connection->query($sql);
        if ($result->num_rows < 1) {
            echo "
                <script>alert('Login Failed')</script>
            ";
?>
<?php
        }
        else {
            $row = $result->fetch_array();
            $id = $row['USERNAME'];
            $isAdmin = $row['isAdmin'];
?>
            <script>
                // alert('succ');
                if (<?php echo $isAdmin?> == 0) {
                    document.cookie = `id=<?php echo $id?>; expires=Thu, 18 Dec 2023 12:00:00 UTC`;
                    window.location.replace('index.php');
                }
                else {
                    sessionStorage.setItem("loginAdmin", true);
                    sessionStorage.setItem('id', '<?php echo $id?>');
                    window.location.replace('admin/categories.php');
                }
            </script>
<?php
        }
    }
?>
    <!-- form đăng kí tài khoản -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i> User Registration
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Full Name</label>
                                    <input type="text" name = "r_user_fname" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Username</label>
                                    <input type="text" name = "r_user_name" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Email</label>
                                    <input type="email" name = "r_user_email" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Phone Number</label>
                                    <input type="text" name = "r_user_phone_number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Picture</label>
                                    <input name="avt" type="file" class="form-control shadow-none">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label  class="form-label">Address</label>
                                    <textarea class="form-control" name="address" rows="1"></textarea>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Birthday</label>
                                    <input type="date" name = "r_user_bday"class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Card number</label>
                                    <input type="number" name="card_number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Password</label>
                                    <input type="password" name = "r_user_pw" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label  class="form-label">Confirm password</label>
                                    <input type="password" name="r_pw_confirm"class="form-control shadow-none">
                                </div>
                                <div class="text-center">
                                    <button name="register" type="submit" name ="r_user_btn" class="btn btn-dark shadow-none">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
    if (isset($_POST['register'])) {
        $username = $_POST['r_user_name'];
        $fname = $_POST['r_user_fname'];
        $email = $_POST['r_user_email'];
        $phone = $_POST['r_user_phone_number'];
        $address = $_POST['address'];
        $dob = $_POST['r_user_bday'];
        $password = md5($_POST['r_user_pw']);
        $cardNumber = $_POST['card_number'];

        define ('SITE_ROOT', realpath(dirname(__FILE__)));
        $src = $_FILES['avt']["tmp_name"];
        $avatar = basename($_FILES["avt"]["name"]);
        $dist = SITE_ROOT . '/admin/upload/user/' . $avatar;
        $tryUpload = move_uploaded_file($_FILES['avt']['tmp_name'], $dist);
        if (!$tryUpload) {
            $avatar = '';
        }
        $s = "select * from taikhoan where username='$username'";
        $r = $connection->query($s);
        if ($r->num_rows != 0){
?>    
        <script>
                alert('Username is existed');
        </script>
        <?php
        }
        else{
            echo '<script>alert("Register success")</script>';
            $sql = "insert into taikhoan values('$username', '$password', 0, 1)";
            if ($result = $connection->query($sql)) {
                $sql = "insert into ds_khachhang(TEN_KHACHHANG, DIACHI, SDT, PICTURE, SO_THE, USERNAME, DOB, EMAIL) 
                values('$fname', '$address', '$phone', '$avatar', '$cardNumber', '$username', '$dob', '$email')";
                $result = $connection->query($sql);
?>
                <script>
                    document.cookie = `id=<?php echo $username?>; expires=Thu, 18 Dec 2023 12:00:00 UTC`;
                    window.location.replace('index.php');
                </script>
                
<?php
            }
            else {
    ?>
                <script>
                    alert('failed');
                </script>
<?php
        }
    }
}
?>

