<?php
    session_start();
    require "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - Food Options</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
</head>
<body>

        <?php include "header.php"; ?>

        <div class="container">

            <div class="row  p-5 text-center text-success" style="background-image: url(img/1.png); ">
                <div class="col display-3 fw-bold text-uppercase">
                    <p id="Category">
                        <?php
                        if(isset($_GET['btnCategory'])) {

                            $categoryID = $_GET['btnCategory'];
                            $query = "SELECT * FROM tblCategory WHERE id ='$categoryID'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $categoryName = mysqli_fetch_array($result);
                                echo $categoryName['categoryName'];
                            }                            
                        }
                        else {
                            echo "Welcome";
                        }
                        ?>
                    </p>
                </div>
                <div class="row h3 mt-3">
                    <div class="col">
                        Food <i class="bi bi-egg"></i>ptions
                    </div>
                </div>
            </div>


            <!-- MGA BALIGYA -->

            <div class="container mt-5">
                
                <div class="row">

                        <?php

                        if(isset($_GET['btnSearch'])) {

                            $foodSearched = strtolower($_GET['btnSearch']);

                            $food = mysqli_query($conn, "SELECT * FROM tblProducts WHERE productName = '$foodSearched'");
                            if(mysqli_num_rows($food)> 0) {

                                foreach($food as $product) {
                                    require "showProduct.php";
                                }
                            }
                            else {
                                echo "<p class='display-6 text-center'>NO PRODUCT FOUND </p>";
                            }

                        }
                        else {

                        if(isset($_GET['btnCategory'])) {

                            $categoryID = $_GET['btnCategory'];
                            $query = "SELECT * FROM tblProducts WHERE categoryID ='$categoryID'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                
                                foreach($result as $product) {
                                   require "showProduct.php";
                                }
                            }
                            else {
                                echo "<p class='display-6 text-center'>NO PRODUCT FOUND </p>";
                            }                            
                            }
                            else {

                            $query = "SELECT * FROM tblProducts ";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                
                                foreach($result as $product) {
                                    require "showProduct.php";
                                }
                            }
                        }
                    }
                        ?>
                </div>    

            </div>

            <hr>

                  <?php include "footer.php"; ?>  

        </div>
    
</body>
</html>



