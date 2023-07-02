<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AURORA Hotel - Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
</head>
<body class="bg-light">
    <?php require("header.php");?>
    <div class="conteiner-fluid" >
        <div class="row">
            <div class="col-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SETTINGS</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">General Settings</h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#general-settings">
                                    Edit
                                </button>
                            </div>
                            <h6 class="card-subtitle mb-1 fw-bold">Site title</h6>
                            <p class="card-subtitle p-2" id="site_title"></p>
                            <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                            <p class="card-subtitle p-2" id="site_about"></p>
                        </div>
                    </div>
                    <div class="modal fade" id="general-settings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="general_s_form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">General Settings</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label  class="form-label">Site title</label>
                                    <input type="text" name="site_title" id="site_title_in" class="form-control"></input>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label  class="form-label">About Us</label>
                                    <textarea name="site_about"  id="site_about_in" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="site_title.value = data.site_title, site_about.value = data.site_about" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" onclick="up(site_title.value, site_about.value)" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <br>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Shutdown Website</h5>
                        <div class="form-check form-switch">
                            <form action="">
                                <input onchange="up_shutdown(this.value)"class="form-check-input" type="checkbox" id="shutdown">

                            </form>
                    </div>
                </div>
                    <p class="card-text">
                        Not allow booking
                    </p>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        let data;
        let general_s_form = document.getElementById("general_s_form");
        function get_general(){
            let site_title = document.getElementById("site_title");
            let site_about = document.getElementById("site_about");

            let title_in = document.getElementById("site_title_in");
            let about_in = document.getElementById("site_about_in");

            let shutdown = document.getElementById("shutdown");


            xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/setting.php", true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            xhr.onload = function(){
                console.log(this.responseText);
                data = JSON.parse(this.responseText);
                site_title.innerText = data.site_title;
                site_about.innerText = data.site_about;
                title_in.value = data.site_title;
                about_in.value = data.site_about;

                if(data.shut == 0){
                    shutdown.checked = false;
                    shutdown.value = 0;
                }
                else{
                    shutdown.checked = true;
                    shutdown.value = 1;
                }
            }
            xhr.send('get_general');
        }
        

        function up(a, b){
            xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/setting.php", true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            xhr.onload = function(){
                
                // console.log(this.responseText);
                var myModalEl = document.getElementById('general-settings');
                
                var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instance
                modal.hide();
                if (this.responseText == 1){
                    alert("Update Success");
                    get_general();
                }
                else{
                    alert("No Changes!");
                }
            }
            xhr.send('site_title=' + a + '&site_about=' + b +'&up');
        }

        function up_shutdown(value){
            xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/setting.php", true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            xhr.onload = function(){
                if (this.responseText == 1 && data.shut == 0){
                    alert("Shutdown Success");
                }
                else{
                    alert("Shutdown is off");
                }
                get_general();
            }
            xhr.send('up_shutdown=' + value);
    

        }

        window.onload = function(){
            get_general();

        }

        
    </script>
</body>
</html>