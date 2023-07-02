<?php
       $connection = mysqli_connect("localhost","root","","database"); 
       if (!$connection){
            die("Can't connect database!".mysqli_connect_error());
       }
       function filteration($data){
              foreach($data as $i => $value){
                     $data[$i] = trim($value);
                     $data[$i] = stripcslashes($value);
                     $data[$i] = htmlspecialchars($value);
                     $data[$i] = strip_tags($value);
              }
              return $data;
       }

       function select($sql, $value, $type){
              $con = $GLOBALS['connection'];
              if($stmt = mysqli_prepare($con, $sql)){
                     mysqli_stmt_bind_param($stmt, $type, ...$value);
                     if(mysqli_stmt_execute(($stmt))){
                           $result = mysqli_stmt_get_result($stmt);
                           return $result;
                     }
                     else{
                            die("Not executed");
                     }
                     mysqli_stmt_close($stmt);
              }
              else{
                     die("Not executed");
              }
       }
       function update($sql, $value, $type){
              $con = $GLOBALS['connection'];
              if($stmt = mysqli_prepare($con, $sql)){
                     mysqli_stmt_bind_param($stmt, $type, ...$value);
                     if(mysqli_stmt_execute(($stmt))){
                           $result = mysqli_stmt_affected_rows($stmt);
                           return $result;
                     }
                     else{
                            die("Not executed");
                     }
                     mysqli_stmt_close($stmt);
              }
              else{
                     die("Not executed");
              }
       }
       if (!function_exists('currency_format')) {

              function currency_format($number, $suffix = ' VND') {
                  if (!empty($number)) {
                      return number_format($number, 0, ',', ',') . "{$suffix}";
                  }
              }
          
       }
       error_reporting(E_ALL);
       ini_set('display_errors', 0);
?>