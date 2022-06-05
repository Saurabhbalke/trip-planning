<?php 
//Start the session to see if the user is authencticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page
$bool=false; 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
  $bool=true;
//   require('menu.php');
}
else{
    header('location:../user/login_cus.php'); 
exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
    <style>
        .footer a {
        border-radius: 50%;
    }
    .center {
        text-align: center;
    }
    .footer a:hover {

        background-color: rgba(255, 255, 255, 0.829);

    }
    
    footer {
        background-color: #15323a;
        color: white;
        height: 300px;
        margin: 0px;
    }


    .footer {
        margin: 0px;
        display: grid;
        grid-template-columns: 3fr 1fr;

    }
    </style>
</head>


<body>


<nav class="navbar navbar-light bg-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="main_page.php">Home</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span> <i class="fas fa-user-circle"></i></span>
            </button>
            <div class="offcanvas offcanvas-end center" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Profile</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body center">
                    <ul class="navbar-nav justify-content-end  flex-grow-1 pe-3">
                        <li class="nav-item">
                            <i class="fas fa-user-circle w3-xxlarge"></i>
                        </li>
                        <?php if(isset($_SESSION['username'])): ?>
                        <li class="navbar-text" class="nav-item">
                        <a href="#" class="nav-link">Welcome <strong>
                            <?php echo $_SESSION['username']; ?>
                            </strong></a>
                        </li>
                        <li class="navbar-text" class="nav-item">
                        <a href="#" class="nav-link">Gmail <strong>
                            <?php echo $_SESSION['USER_ID']; ?>
                            </strong></a>
                        </li>
                        <?php endif ?>

                        <li class="nav-item">
                            <a class=" btn btn-outline-success" href="log_out.php">logout</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </nav>


<div class="container my-5 shadow"> 
    <h1 class="center " >Admin site</h1>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Customer
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><span><i class="fas fa-angle-right"></i></span><a href="view_customer.php"><button
                                class="btn">View All Customer Details</button></a></p>
                    <p><span><i class="fas fa-angle-right"></i></span><a href="reg_customer.php"><button
                                class="btn">Edit Customer</button></a></p>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Locations
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><span><i class="fas fa-angle-right"></i></span><a href="view_loc.php"><button
                                class="btn">View All Locations</button></a> </p>
                    <p><span><i class="fas fa-angle-right"></i></span><a href="reg_curr_loc.php"><button
                                class="btn">Register/Edit Starting location</button></a></p>
                    <p><span><i class="fas fa-angle-right"></i></span><a href="reg_des_loc.php"><button
                                class="btn">Register/Edit Destination</button></a></p>
                </div>

            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Package
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><span><i class="fas fa-angle-right"></i></span><a href="view_package.php"><button class = "btn">View All Package</button></a> </p>
                    <p><span><i class="fas fa-angle-right"></i></span><a href="reg_package.php"><button class = "btn">Register/Edit Package</button></a></p>
                    
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapse">
                    Hotels
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><span><i class="fas fa-angle-right"></i></span><a href="view_hotel.php"><button class = "btn">View All Hotels</button></a> </p>
                    <p><span><i class="fas fa-angle-right"></i></span><a href="reg_hotel.php"><button class = "btn">Register/Edit Hotels</button></a></p>
                   
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapse">
                    Flight
                </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><span><i class="fas fa-angle-right"></i></span><a href="view_plane.php"><button class = "btn">View All Flight</button></a> </p>
                    <p><span><i class="fas fa-angle-right"></i></span><a href="reg_plane.php"><button class = "btn">Register/Edit Flight</button></a></p>
                   
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapse">
                    Tourist places
                </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><span><i class="fas fa-angle-right"></i></span><a href="view_tourist_place.php"><button class = "btn">View All Tourist Places</button></a> </p>
                    <p><span><i class="fas fa-angle-right"></i></span><a href="reg_tourist_place.php"><button class = "btn">Register/Edit Tourist Places</button></a></p>
                    
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSeaven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseSeaven" aria-expanded="false" aria-controls="flush-collapse">
                    Package reviews
                </button>
            </h2>
            <div id="flush-collapseSeaven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeaven"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><span><i class="fas fa-angle-right"></i></span><a href="view_review.php"><button class = "btn">View All package review</button></a> </p>
                    
                    
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapse">
                    Payment and Booking
                </button>
            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><span><i class="fas fa-angle-right"></i></span><a href="view_payment.php"><button class = "btn">View booking of package</button></a> </p>
                    
                    
                </div>
            </div>
        </div>

    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

</body>



<footer class=" p-5" id="contact">
    <section class="footer">

        <div class="container">
            <h4>Our team</h4>
            <h3>Saurabh Singh Balke <span>(20BCS201)</span></h3>
            <h3>Sarthak Jain <span>(20BCS198)</span></h3>
            <h3>Shivam Agrahari <span>(20BCS205)</span></h3>



        </div>

        <div class="container center">
            <h4>social media handles</h4>
            <!-- Facebook -->
            <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

            <!-- Google -->
            <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

            <!-- Instagram -->
            <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
            <!-- Github -->
            <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>

        </div>
    </section>
    <section class="sub-footer center">
        <h4>Contact Us</h4>
        <h5><i> 20bcs201@iiitdmj.ac.in </i> • <i> 20bcs205@iiitdmj.ac.in </i> • <i> 20bcs198@iiitdmj.ac.in </i>
        </h5>


        <h4> &copy; IIITDM Jabalpur (Batch - 2020)- All rights are reserved</h4>
    </section>


</footer>

</html>

