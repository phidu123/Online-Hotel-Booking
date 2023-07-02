<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@v6-alpha1/dist/css/tempus-dominus.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;

        }

        .h-font {
            font-family: 'Merienda', cursive;
        }

        .card-profile-image {
            width: 180px;
            height: 180px;
            transform: translate(-50%, -30%);
        }

        .edit-img-btn {
            left: calc(50% + 90px);
            /* x% = % of the img, + img width/2 */
            transform: translate(-50%, 50%);
        }

        .edit-btn {
            right: 15%;
        }

        .edit-inline {
            top: -40%;
        }

        .w-10 {
            width: 10% !important;
            min-width: 40px;
        }

        /*remove scrollbar in textarea but allow scrolling*/
        textarea {
            overflow-y: scroll;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        /*remove scrollbar in textarea*/
        textarea::-webkit-scrollbar {
            display: none;
        }

        /*remove the focus border which is black*/
        .form-control-plaintext:focus {
            outline: none;
        }

        /*to replicate .form-control:focus blue glow color when in focus*/
        .form-control-focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25);
            border: 0.3px solid rgba(13, 110, 253, 0.7) !important;
            border-radius: 4px;
        }

        .avt-upload {
            /* width: .1px; */
            /* height: .1px; */
            opacity: 0;
            /* z-index: -1; */
            position: absolute;
            top: 0;
            left: 0px;
        }
    </style>

</head>

<body>
    <?php
    require('header.php');
    $sql = "select * from ds_khachhang where username='$id'";
    $result = $connection->query($sql);
    $row = $result->fetch_array();
    $avt = $row['PICTURE'];
    $name = $row['TEN_KHACHHANG'];
    $address = $row['DIACHI'];
    $dob = $row['DOB'];
    $email = $row['EMAIL'];
    $phone = $row['SDT'];
    $card = $row['SO_THE'];
    ?>
    <div class="container mb-5" style="margin-top: 75px;">
        <div class="row justify-content-center">
            <section class="col-10">
                <form method="post" class="card shadow pb-3">
                    <div class="row justify-content-center">
                        <div class="col-4 position-relative">
                            <img src="./admin/upload/user/<?php echo $avt ?>" class="rounded-circle card-profile-image position-absolute top-0 start-50"><span class="btn btn-light btn-sm rounded-circle edit-img-btn position-absolute">
                                <i class="bi bi-camera-fill">
                                    <input onchange="ableBtn()" class="avt-upload" name="avt" type="file">
                                </i>
                            </span>
                        </div>
                    </div>
                    <div class="card-header bg-secondary border-0 pt-5 pb-5"> </div>
                    <div class="card-body">
                        <div class="text-center my-4">
                            <div class="h2">
                                <input onchange="ableBtn()" type="text" class="text-center form-control-plaintext mx-aut0 m-0 p-0" name="name" value="<?php echo $name ?>" />
                            </div>

                            <div class="my-3 position-relative w-100">
                                <textarea onchange="ableBtn()" type="text" class="h5 text-center form-control-plaintext mx-aut0 m-0 p-0" name="address"><?php echo $address ?></textarea>
                            </div>

                            <div class="d-flex justify-content-center my-0 position-relative w-100">
                                <input onchange="ableBtn()" name="dob" value="<?php echo $dob ?>" type="date" class="d-inline px-2 py-0 w-25 form-control-plaintext mx-auto" />
                            </div>
                        </div>
                        <hr class="mb-0">
                        <section class="container">
                            <div class="row" id="contact">
                                <div class="col-4">
                                    <div class="h6 mt-4 mb-2 position-relative w-100 edit-btn-container"><b>Email</b></div>
                                    <input onchange="ableBtn()" name="email" type="email" class="m-0 p-0 form-control-plaintext w-100" value="<?php echo $email ?>" />
                                </div>
                                <div class="col-4">
                                    <div class="h6 mt-4 mb-2 position-relative w-100 edit-btn-container"><b>Phone number</b></div>
                                    <input onchange="ableBtn()" name="phone" type="number" class="m-0 p-0 form-control-plaintext w-100" value="<?php echo $phone ?>" />
                                </div>
                                <div class="col-4">
                                    <div class="h6 mt-4 mb-2 position-relative w-100 edit-btn-container"><b>Bank account</b></div>
                                    <input onchange="ableBtn()" name="card-number" type="number" class="m-0 p-0 form-control-plaintext w-100" value="<?php echo $card ?>" />
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-4 col-sm-6">
                                <button id="save" class="btn btn-primary" type="button" disabled>
                                    Save changes
                                </button>
                            </div>
                            <div class="col col-md-4 col-sm-6">
                                <button id="changepass" class="btn btn-warning" type="button">
                                    Change password
                                </button>
                            </div>
                            <div class="col col-md-4 col-sm-6">
                                <button id="logout" class="btn btn-danger" type="button">
                                    Logout
                                </button>
                            </div>
                        </div>
                    </div>
                    <section class="container mt-4 show-password" style="display: none">
                        <div class="row">
                            <div class="col">
                                <label for="">
                                    <span style="color: red">Confirm your password: </span>
                                    <input name="password" type="password" required>
                                </label>
                                <button id="confirm" name="confirm" class="btn btn-primary" type="submit">
                                    Confirm
                                </button>
                            </div>
                        </div>
                        <div class="row" id="cfm-pas"></div>
                    </section>
                </form>
            </section>
        </div>
    </div>
    <!-- Popperjs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <!-- Tempus Dominus JavaScript -->
    <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@v6-alpha1/dist/js/tempus-dominus.js" crossorigin="anonymous"></script>
    <script>
        const ableBtn = () => {
            document.querySelector("#save").disabled = false;
        }
        document.querySelector('#save').addEventListener('click', () => {
            document.querySelector('.show-password').style.display = "";
        })
        document.querySelector('#logout').addEventListener('click', () => {
            document.cookie = "id=; expires=Thu, 01 Jan 2023 00:00:00 UTC";
            window.location.replace('index.php');
        })
        document.querySelector('#changepass').addEventListener('click', () => {
            window.location.replace('udtpass.php');
        })
    </script>
    <?php
    if (isset($_POST['confirm'])) {
        $password = md5($_POST['password']);
        $sql = "select * from taikhoan where username='$id'";
        $result = $connection->query($sql);
        $row = $result->fetch_array();
        if ($password != $row['PASSWORD']) {
    ?>
            <script>
                alert('Your changes have not been saved due to wrong password');
            </script>
    <?php
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $avatar = $avt;
            $cardNumber = $_POST['card-number'];
            if (isset($_FILES['avt'])) {
                define('SITE_ROOT', realpath(dirname(__FILE__)));
                $src = $_FILES['avt']["tmp_name"];
                $avatar = basename($_FILES["avt"]["name"]);
                $dist = SITE_ROOT . '/admin/upload/user/' . $avatar;
                move_uploaded_file($_FILES['avt']['tmp_name'], $dist);
            }
            $sql = "update ds_khachhang set TEN_KHACHHANG='$name', DIACHI='$address', SDT='$phone', PICTURE='$avatar', SO_THE='$cardNumber', DOB='$dob', EMAIL='$email' where USERNAME='$id'";
            $result = $connection->query($sql);
    ?>
            <script>
                alert('Successfully updated');
                window.location.replace('profile.php');
            </script>
    <?php
        }
    }
    ?>
</body>

</html>