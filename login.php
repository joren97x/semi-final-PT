<?php
require "conn.php";
    session_start();

    if (isset($_SESSION['email'])) {

        header("Location: index.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In - Food Options</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
</head>
<body>

        <div class="container">
            <div class="row mt-3 text-success">
                <div class="col-2 text-start" >
                    <a href="create.php" class="text-success" style="text-decoration: none;"><?php if (!isset($_SESSION['email'])) { echo "<a href='login.php' class='text-success' style='text-decoration: none;'><i class='bi bi-box-arrow-in-right'></i> Log In</a>";} else {echo "<a href='myAccount.php' class='text-success' style='text-decoration: none;'><i class='bi bi-person-circle'></i> My Account</a>";}  ?></a>
                </div>
                <div class="col-2 text-start" >
                <?php if (!isset($_SESSION['email'])) { echo "<a href='create.php' class='text-success' style='text-decoration: none;'><i class='bi bi-person-add'></i> Create Account</a>";} else {echo "<a href='logOut.php' class='text-success' style='text-decoration: none;'> <i class='bi bi-box-arrow-right'></i> Log Out</a>";}  ?>

                </div>
                <div class="col-7 text-center">
                    <i class="bi bi-search"></i>
                    Search for a food here
                </div>
                <div class="col-1">
                    <i class="bi bi-cart3"></i>
                    <a href='cart.php' class='text-success' style='text-decoration: none;'> Cart</a>
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
                        <form action="" method="GET">
                            <a href="functions.php"><button class=" btn btn-success " name="btnCategory" id="btnCategory" value="<?php echo $category['id']; ?>" ><?php  echo $category['categoryName']; ?></button></a>
                        </form>
                </div>
            <?php

                    }
                }

            ?>
            </div>

            <hr>

        </div>

        <div class="container">

            <form action="functions.php" method="POST" class="text-success">
                 <p class="display-6 fw-bold">Log In</p>
                <div class="form-group w-50" id="input">
                    <input type="text" placeholder="Email" id="email" name="email"  class="form-control my-3" style="background-color: #f4f4f4";>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control my-3 " style="background-color: #f4f4f4";><input type="checkbox" onclick="showPass()"> Show password
                    <input type="submit" id="logIn" name="logIn"  value="SIGN IN" class="form-control text-white bg-success">
                </div>
            </form>
                    <a href="create.php" class="text-success " style="text-decoration: none;"><p class="my-3" > Create Account</p> </a>
                    <a href="forgotPassword.php" class="text-success " style="text-decoration: none;"><p class="mb-5" > Forgot Password?</p>  </a>

            <hr>

            <div class="footer py-3 text-success">

                <div class="row fw-bold my-4">
                    <div class="col">Account</div>
                    <div class="col">Links</div>
                    <div class="col">Follow Us</div>
                </div>
                <div class="row">
                    <div class="col"><a href='create.php' class='text-success' style='text-decoration: none;'>Create Account</a></div>
                    <div class="col"><a href='aboutUs.php' class='text-success' style='text-decoration: none;'>About Us</a></div>
                    <div class="col"><i class="bi bi-instagram"></i> Instagram</div>
                </div>
                <div class="row">
                    <div class="col"><a href='myAccount.php' class='text-success' style='text-decoration: none;'>My Account</a></div>
                    <div class="col">Privacy Policy</div>
                    <div class="col"><i class="bi bi-facebook"></i> Facebook</div>
                </div>
                <div class="row">
                    <div class="col"><a href='logIn.php' class='text-success' style='text-decoration: none;'>Log In</a></div>
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

<script>
    function showPass(){
        var pass = document.getElementById("password");
        if (pass.type === "password") {
            pass.type = "text";
        }
        else {
            pass.type = "password";
        }

    }

    

</script>