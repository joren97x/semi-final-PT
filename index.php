<?php
    require "conn.php";
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Options</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
</head>
<body>

        <div class="container">

            <div class="row  mt-3 text-success" >
                <div class="col-2" >
                    <?php if (!isset($_SESSION['email'])) { echo "<a href='login.php' class='text-success' style='text-decoration: none;'><i class='bi bi-box-arrow-in-right'></i> Log In</a>";} else {echo "<a href='myAccount.php' class='text-success' style='text-decoration: none;'><i class='bi bi-person-circle'></i> My Account</a>";}  ?>
                </div>
                <div class="col-2" >
                    <?php if (!isset($_SESSION['email'])) { echo "<a href='create.php' class='text-success' style='text-decoration: none;'><i class='bi bi-person-add'></i> Create Account</a>";} else {echo "<a href='logOut.php' class='text-success' style='text-decoration: none;'> <i class='bi bi-box-arrow-right'></i> Log Out</a>";} ?>
                </div>
                <div class="col-7 text-center">
                    <i class="bi bi-search"></i>
                    Search for a food here
                </div>
                <div class="col-1">
                    <i class="bi bi-cart3"></i>
                    Cart
                </div>
                <hr class="mt-3">
            </div>

            <div class="row">
                <div class="col display-4 text-center justify-content-center text-success">
                    <a href="index.php" class="text-success " style="text-decoration: none;">Food <i class="bi bi-egg"></i>ptions</a>
                </div>
            </div>

            <div class="row bg-success mt-3 text-center p-2">

            <?php

                $query = "SELECT * FROM tblCategory";
                $result = mysqli_query($conn, $query);

                if(mysqli_num_rows($result) > 0) {

                    foreach($result as $category) {

            ?>

                <div class="col">
                    <div class="dropdown">
                        <button class=" btn btn-success dropdown-toggle"  data-bs-toggle="dropdown" ><?php  echo $category['categoryName']; ?></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">Small Eggs</a> 
                            <a class="dropdown-item" href="">Medium Eggs</a>
                            <a class="dropdown-item" href="">Big Eggs</a>
                        </div>
                    </div>
                </div>
                        

            <?php

                    }
                }

            ?>
            </div>

            <hr>

        </div>

        <div class="container">

            <div class="row  p-5 text-center text-success" style="background-image: url(1.png); ">
                <div class="col display-3 fw-bold text-uppercase">
                    eggs
                </div>
                <div class="row h3 mt-3">
                    <div class="col">
                        Food <i class="bi bi-egg"></i>ptions
                    </div>
                </div>
            </div>


            <!-- MGA BALIGYA WALA PAY SOLUD :( -->

            <div class="container mt-5">
                
                <div class="row">
                    <div class="col">
                        <div class="card" style="width: 300px;">
                            <img class="card-img-top m-5" src="egg.png" alt="Card image cap" style="width: 250px;">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                    <h5 class="card-title">Small Eggs</h5>
                                    <p class="card-text">₱250.00</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 300px;">
                            <img class="card-img-top m-5" src="egg.png" alt="Card image cap" style="width: 250px;">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                    <h5 class="card-title">Small Eggs</h5>
                                    <p class="card-text">₱250.00</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 300px;">
                            <img class="card-img-top m-5" src="egg.png" alt="Card image cap" style="width: 250px;">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                    <h5 class="card-title">Small Eggs</h5>
                                    <p class="card-text">₱250.00</p>
                                </div>
                        </div>
                    </div>
                </div>    

            </div>

            <hr>

            <div class="footer py-3 text-success">

                <div class="row fw-bold my-4">
                    <div class="col">Account</div>
                    <div class="col">Links</div>
                    <div class="col">Follow Us</div>
                </div>
                <div class="row">
                    <div class="col">Create Account</div>
                    <div class="col">About Us</div>
                    <div class="col"><i class="bi bi-instagram"></i> Instagram</div>
                </div>
                <div class="row">
                    <div class="col"><a href='myAccount.php' class='text-success' style='text-decoration: none;'>My Account</a></div>
                    <div class="col">Privacy Policy</div>
                    <div class="col"><i class="bi bi-facebook"></i> Facebook</div>
                </div>
                <div class="row">
                    <div class="col">Log In</div>
                    <div class="col">Hello</div>
                    <div class="col"><i class="bi bi-youtube"></i> Youtube</div>
                </div>

            </div>

            <hr>

            <div class="row p-3 text-success">
                Copyright © 2022, Food Options.
            </div>

        </div>
    
</body>
</html>