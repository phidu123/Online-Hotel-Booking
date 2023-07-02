<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AURORA Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        * {
            font-family: 'Poppins', sans-serif;

        }

        .h-font {
            font-family: 'Merienda', cursive;
        }
    </style>
</head>

<body>
<?php
    error_reporting(E_ERROR | E_PARSE);
    require("header.php");
    if (isset($_COOKIE['id'])) {
        $id = $_COOKIE['id'];
        $sql = "select * from ds_khachhang where username='$id'";
        $result = $connection->query($sql);
        $row = $result->fetch_array();
        $card = $row['SO_THE'];
        $name = $row['TEN_KHACHHANG'];
        $id_kh = $row['ID_KHACHHANG'];
    }
        $r = explode("&" ,base64_decode($_GET['r']));
        $room_id = $r[0];
        // $date1 = getDate(strtotime($r[2]));
        $date2 = date('d/M/Y', strtotime($r[2]));
        $date1 = date('d/M/Y', strtotime($r[1]));
        $sql = "select * from ds_phong where id_phong='$room_id'";
        $result = $connection->query($sql);
        $row = $result->fetch_array();
        $room_name = $row['TEN_PHONG'];
        $type_id = $row['ID_LOAIPHONG'];
        $sql = "select ten_loaiphong as name, gia as price from ds_loaiphong where id_loaiphong='$type_id'";
        $result = $connection->query($sql);
        $data = $result->fetch_array();
        $room_type = $data['name'];
        $room_fee = $data['price'];
?>

    <section style="background-color: #eee;">
        <div class="col-md-6" style="margin: auto;">
            <div class="card bg-secondary text-white rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0 mt-1 text-center w-100">BOOKING FORM</h3>
                    </div>

                    <form method="post" class="mt-4 container">
                        <h5>Customer information</h5>
                        <div>
                            <div class="form-outline form-white mb-4 ms-2">
                                <label class="form-label" for="typeName">Cardholder's Name</label>
                                <input name="usr_name" type="text" id="typeName" class="form-control form-control-lg" siez="17"" 
                                <?php
                                    if (isset($_COOKIE['id'])) {
                                        echo "value='$name' readonly";
                                    }?>>
                                 
                            </div>
                            <div class="form-outline form-white mb-4 ms-2">
                                <label class="form-label" for="typeText">Card Number</label>
                                <input name="usr_card" type="text" id="typeText" class="form-control form-control-lg" siez="17"maxlength="19" 
                                <?php
                                    if (isset($_COOKIE['id'])) {
                                        echo "value='$card' readonly";
                                    }
                                ?>>
                            </div>
                        </div>

                        <hr class="my-4">
                        <h5>Room information</h5>
                        <div class="row ms-1">
                            <div class="form-outline form-white mb-4 col-6">
                                <label class="form-label" for="typeText">Room name</label>
                                <input type="text" class="form-control form-control-lg" siez="17" 
                                
                                <?php
                                    echo "value='$room_name' readonly";
                                ?>>
                            </div>
                            <div class="form-outline form-white mb-4 col-6">
                                <label class="form-label" for="typeText">Room type</label>
                                <input type="text" class="form-control form-control-lg" siez="17" 
                                
                                <?php
                                    echo "value='$room_type' readonly";
                                ?>>
                            </div>
                        </div>
                        
                        <div class="row ms-1">
                            <div class="col-6">
                                <label for="">Check-in date:</label>
                                <input value="<?php echo $r[1] ?>" readonly class="w-100 px-2" style="border-radius: 5px; border:none; height: 40px" type="date" name="date-in">
                            </div>

                            <div class="col-6">
                                <label for="">Check-out date</label>
                                <input value="<?php echo $r[2] ?>" readonly class="w-100 px-2" style="border-radius: 5px; border:none; height: 40px" type="date" name="date-out">
                            </div>
                        </div>

                        <hr class="my-4">
                        <h5>Extra services</h5>
                        <div class="row">
                            <table class="ms-4 w-100">
                                <tr>
                                    <td>
                                        <label style="color: #fff" for="">Transit from the airport 
                                            <span style="color: yellow; font-size: 10px"><i>(Only support within 10km)</i></span> 
                                        </label>
                                    </td>
                                    <td>
                                        <label style="color: #fff" for="">Serve meals</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" onclick="updateExtra(this.value)" class="pickup"  name="service[]" value ="1">
                                    </td>
                                    <td>
                                        <div class="select-meals" style="color: #fff">
                                            <label for="">
                                                <input onclick="updateExtra(this.value)" name="service[]"  value = "2" type="checkbox">
                                                Breakfast
                                            </label>
                                            <br>
                                            <label for="">
                                                <input onclick="updateExtra(this.value)" name="service[]" value="3" type="checkbox">
                                                Lunch
                                            </label>
                                            <br>
                                            <label for="">
                                                <input onclick="updateExtra(this.value)" name="service[]" value="4" type="checkbox">
                                                Dinner
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <script>
                            const showTransit = () => {
                                const e = document.querySelector('.pickup');
                                var dp = e.style.display;
                                e.style.display = dp == 'none' ? '' : 'none';
                            }

                            const showMeals = () => {
                                const e = document.querySelector('.select-meals');
                                var dp = e.style.display;
                                e.style.display = dp == 'none' ? '' : 'none';
                            }
                        </script>

                        <div class="row">
                        </div>
                        <hr class="my-4">
                        <div>
                            <div class="d-flex justify-content-between">
                                <p class="p-2">Subtotal:</p>
                                <input id="fee" style="background-color: #eee; border: none; height: 70%" class="rounded p-2" value="<?php
                                 echo $room_fee*($date2 - $date1);
                                 ?>" readonly>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="p-2">Extra service fee:</p>
                                <input id="extra-fee" style="background-color: #eee; border: none; height: 70%" class="rounded p-2" value="0" readonly>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="p-2">Total:</p>
                                <input name="total-fee" id="total-fee" style="background-color: #eee; border: none; height: 70%" class="rounded p-2" value="" readonly>
                            </div>
                        </div>

                        <hr>
                        <div class="text-center p-2">
                            <button type="button" class="confirm btn btn-dark btn-lg shadow-none">Confirm</button>
                        </div>
                        <section class="container mt-4 show-password">
                            
                        </section>
                    </form>
        
                </div>
                </div>
                </div>

                </div>

                </div>
                </div>
            </div>
        </div>
    </section>
<?php
    require("footer.php"); 

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    if (isset($_POST['confirm'])) {
        if (!isset($_COOKIE['id'])) {
            $sdt = $_POST['sdt-cfm'];
            $name = $_POST['usr_name'];
            $st = $_POST['usr_card'];
            $sql = "insert into ds_khachhang(TEN_KHACHHANG, SDT, SO_THE) values('$name', $sdt, $st)";
            $connection->query($sql);
            $sql = "SELECT ID_KHACHHANG FROM ds_khachhang ORDER BY ID_KHACHHANG DESC LIMIT 1";
            $result = $connection->query($sql);
            $id_kh = $result->fetch_array()['ID_KHACHHANG'];
        }
        else {
            $sql = "select * from taikhoan where username='$id'";
            $result = $connection->query($sql);
            $row = $result->fetch_array();
            $password = md5($_POST['password']);
            if ($password != $row['PASSWORD']) {
               echo "
               <script>
                    alert('Your changes have not been saved due to wrong password');
                </script>
               ";
            }
        }
            $dateIn = $_POST['date-in'];
            $dateOut = $_POST['date-out'];
            $totalFee = $_POST['total-fee'];
            $date = date('Y-m-d');
            $sql = "insert into ds_hoadon(id_kh, tongtien, ngay) values($id_kh, $totalFee, '$date')";
            $connection->query($sql);
            $sql = "SELECT id_hd FROM ds_hoadon ORDER BY id_hd DESC LIMIT 1";
            $result = $connection->query($sql);
            $id_hd = $result->fetch_array()['id_hd'];
            
            $services = $_POST['service'];
            foreach($services as $s_id) {
                $sql = "select gia as price from ds_dichvu where id='$s_id'";
                $result = $connection->query($sql);
                $s_price = $result->fetch_array()['price'];
                $sql = "insert into cthd values($id_hd, $room_id, $s_id, $s_price, $room_fee, '$dateIn','$dateOut')";
                $connection->query($sql);

                echo'
                <script>
                    alert("Payment Success!");
                    window.location.href = "index.php"; // Quay về trang chủ
                </script>';
            }
        }
            
?>


<?php
    $sql = "select * from ds_dichvu";
    $result = $connection->query($sql);
    $service = [];
    while ($row = $result->fetch_array()) {
        array_push($service, $row['GIA']);
    }
?>

<script>
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
                        
    document.querySelector('.confirm').addEventListener('click', () => {
        if (getCookie('id') == '') {
            document.querySelector('.show-password').innerHTML = `
                <div class="row">
                <div class="col">
                    <label for="">
                        <span style="color: #fff">Enter your phone number: </span>
                        <input name="sdt-cfm" type="number" required>
                    </label>
                    <button id="confirm" name="confirm" class="btn btn-primary" type="submit">
                        PAY
                    </button>
                </div>
            </div>
            <div class="row" id="cfm-pas"></div>
            `;
        }
        else {
            document.querySelector('.show-password').innerHTML = 
            `<div class="row">
                <div class="col">
                    <label for="">
                        <span style="color: #fff">Confirm your password: </span>
                        <input id = "pwd_confirm" name="password" type="password" required>
                    </label>
                    <button id="confirm" name="confirm" class="btn btn-primary" type="submit">
                        Pay
                    </button>
                </div>
            </div>
            <div class="row" id="cfm-pas"></div>`;
            document.getElementById("pwd_confirm").focus();
        }
    })

    let data = [0,0,0,0,0];
    // Lưu biến trạng thái kích hoạt của các checkboxes
    var service_map = <?php echo json_encode($service)?>;

    function updateExtra (value) {
        var extra = document.querySelector('#extra-fee').value;
        var total = document.querySelector('#total-fee').value;
        if(data[value] == 0){
            data[value] = 1;
            document.querySelector('#extra-fee').value = parseInt(extra) + parseInt(service_map[value-1]);
        }
        else if (data[value] == 1){
            document.querySelector('#extra-fee').value = parseInt(extra) - parseInt(service_map[value-1]);
            data[value] = 0;
        }
    }

    setInterval(()=> {
        const fee = parseInt(document.querySelector('#fee').value);
        const extra = parseInt(document.querySelector('#extra-fee').value);
        document.querySelector('#total-fee').value = fee + extra;
    }, 1);

</script>
</body>