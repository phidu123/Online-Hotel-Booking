<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('connection.php');
    $oldpassword = "";
    $newpassword = "";
    $passwordConfirm = "";
    $err = "";
    $complete = "";
    $id = $_COOKIE['id'];
    $sql = "select * from taikhoan where username='$id'";
    $result = $connection->query($sql);
    $row = $result->fetch_array();
    $currentPass = $row['PASSWORD'];
    if (isset($_POST['btnChangePass'])) {
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $passwordConfirm = $_POST['passwordConfirm'];

        if ($currentPass == md5($oldpassword) && $newpassword == $passwordConfirm) {
            $newpassword = md5($newpassword);
            $sql = "update taikhoan set password='$newpassword' where username='$id'";
            $connection->query($sql);
?>
            <script>
                window.location.replace('index.php');
            </script>
<?php
        } else {
            $err = "Confirm password is wrong, try again";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta hoten="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Change your password</title>

</head>

<body>
    <div id="logreg-forms" class="row">
        <!-- Đổi mật khẩu  -->
        <form action="" class="form-signup col-6 m-auto" method="post">
            <h1 class="h1 mb-3 font-weight-normal" style="text-align: center">Change Password</h1>

            <!-- ĐANG LÀM TỚI ĐÂY -->
            Current Password<input type="password" id="user-pass" class="form-control" placeholder="Enter Current Password" required name="oldpassword" value="<?php echo $oldpassword; ?>">
            New Password<input type="password" id="user-pass" class="form-control" placeholder="Enter New Password" required name="newpassword" value="<?php echo $newpassword; ?>">
            Confirm Password<input type="password" id="user-repeatpass" class="form-control" placeholder="Confirm Password" required name="passwordConfirm" value="<?php echo $passwordConfirm; ?>">
            <br>
            <input type="submit" value="Đổi mật khẩu" class="btn btn-primary btn-block" name="btnChangePass">
            <div style="color: red;"><?php echo $err; ?></div>
            <a name="loginAgain" href="login.php">
                <div style="color: green;"><?php echo $complete; ?></div>
            </a>
            <br>

            <a style="width: 35%;" href="profile.php" id="cancel_signup"><i class="fas fa-angle-left"></i>Back</a>
        </form>
    </div>
</body>

</html>