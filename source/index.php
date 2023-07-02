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
<body class="bg-light">
    <?php
    //  require("connection.php"); 
     ?>
    <?php require("header.php"); ?>
    <!-- Ảnh -->
    <div class="container-fluid mt-4" style="padding: 0;">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="slide/index_image1.jpg" class="w-100 d-block" style="height: 600px;"></div>
                <div class="swiper-slide"><img src="slide/index_image2.jpg" class="w-100 d-block" style="height: 600px;"></div>
                <div class="swiper-slide"><img src="slide/index_image3.jpg" class="w-100 d-block" style="height: 600px;"></div>
                <div class="swiper-slide"><img src="slide/index_image4.jpg" class="w-100 d-block" style="height: 600px;"></div>
                <div class="swiper-slide"><img src="slide/index_image5.jpg" class="w-100 d-block" style="height: 600px;"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Tìm kiếm theo yêu cầu: check-in, check-out, số lượng phòng muốn đặt -->
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h3 class="text-center mb-4">CHECK ROOM AVAILABILITY</h3>
                <form id="query-room-form" method=post>
                    <div class="row align-items-end">
                        <div class="col-lg-4">
                            <label class="form-label fw-bold">Check-in</label>
                            <input name="date-in" value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label fw-bold">Check-out</label>
                            <input name="date-out" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')); ?>" type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label fw-bold">The number of rooms</label>
                            <input name="quantity" value=1 min="1" type="number" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-1 mt-2">
                            <button name="submit-query" type="submit" class="btn btn-primary shadow">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    if (isset($_POST['submit-query'])) {
        $in = $_POST['date-in'];
        $out = $_POST['date-out'];
        $quantity = $_POST['quantity'];
        echo "
        <script>
            window.location.replace('rooms.php?q=".base64_encode("$in&$out&$quantity")."');
        </script>
        ";
    }
?>
    <div class="container my-3" id="result">
        
    </div>
    <!-- CÁC LOẠI PHÒNG -->
    <h3 class="text-center mt-5 pt-4 mb-4">OUR CATEGORIES ROOM</h3>
    <div class="container">
        <div class="row">
            <?php
            $i = 0;
            $s = "select * from DS_LOAIPHONG";
            $n = $connection->query($s);
            // $rowcount=mysqli_num_rows($n);
            $rowcount = $n->num_rows;
            for ($i = 1; $i <= $rowcount; $i++) {
                $id = 'L0' . '' . $i;
                $sql = "SELECT * FROM DS_LOAIPHONG where ID_LOAIPHONG = '$id'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_BOTH);
                echo "<div class='col-lg-3 col-md-6 p-3' id=$id onclick='goToRoomDetail(\"$id\")'>       
                                <div class='card shadow' style='max-width: 400px'>
                                    <img src='./admin/upload/categories/" . $row['HINHANH'] . "' class='card-img-top' style='height: 200px;'>
                                    <div class='card-body'>
                                        <h5 class=\"card-title fw-bold\">" . $row['TEN_LOAIPHONG'] . "</h5>
                                        <h5 class='text-danger'> " . currency_format($row['GIA']) . " /Day</h5>
                                        <div class='features mb-4'>
                                            <h6 class='mb-1 fw-bold'>Features</h6>
                                                <p class=\"badge rounded-pill bg-light text-dark text-wrap\">" . $row['FEATURES'] . "</p>
                                        </div>
                                        <div class='facilities mb-4'>
                                            <h6 class='mb-1 fw-bold'>Facilities</h6>
                                                <p class=\"badge rounded-pill bg-light text-dark text-wrap\">" . $row['FACILITIES'] . "</p>
                                        </div>
                                    </div>
                                </div>
                        </div>";
            }
            ?>

        </div>
    </div>
    <br>
    <!-- <script type="text/javascript">
        function goToRoomDetail(id) {
            alert('hi');
            window.location.href = "roomdetail.php?id=" + id;
        }
    </script> -->

    <!-- Contact -->
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 p-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0234563498393!2d106.69758091480851!3d10.732674162934535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b2747a81a3%3A0x33c1813055acb613!2zxJDhuqFpIGjhu41jIFTDtG4gxJDhu6ljIFRo4bqvbmc!5e0!3m2!1svi!2s!4v1680275898263!5m2!1svi!2s" width="95%" height="450"></iframe>
            </div>
            <div class="col-lg-3 col-md-3 p-3">
                <div class="bg-white p-3 rounded">
                    <h5 class="fw-bold p-3">Call us</h5>
                    <a class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-inbound-fill p-2"></i>0386207465
                    </a>
                    <br><br>
                    <a class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-inbound-fill p-2"></i>0343871265
                    </a>
                    <br><br>
                    <a class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-inbound-fill p-2"></i>0773339855
                    </a>
                    <br>
                    <h5 class="fw-bold p-3">Follow us</h5>
                    <a href="https://www.facebook.com/du.phi.756/" class="text-decoration-none d-inline-block text-dark p-1">
                        <i class="bi bi-facebook"></i> Facebook
                    </a>
                    <br><br>
                    <a href="https://www.instagram.com/phi.du.311/" class="text-decoration-none d-inline-block e text-dark p-1">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php require("footer.php"); ?>
    <!-- chuyển động ảnh -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script>
        var swiper = new Swiper(".mySwiper_fb", {
            slidesPerView: 3,
            spaceBetween: 30,
            freeMode: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    </script>
</body>

</html>