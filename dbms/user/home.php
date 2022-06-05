<?php 
//Start the session to see if the user is authencticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page
$bool=false; 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
  $bool=true;
}
else{
    header('location:login_cus.php'); 
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">

    <!-- fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
</head>
<style>
    .center {
        text-align: center;
    }

    .navbar {
        position: sticky;
        z-index: 5;
        font-size: 1.5rem;
        font-family: "Karla", sans-serif;
        background-color: #15323a;
        width: 100%;
    }

    .navbar a {
        color: aliceblue;
    }

    .left {
        text-align: left;
    }

    .card {
        margin: 12px;
    }




    .icon {
        display: flex;
        flex-direction: row;

    }

    p {
        line-height: 18px;
        margin: 4px;
    }

    .icon:before,
    .icon:after {
        content: "";
        flex: 1 1;
        border-bottom: 1px solid;
        margin: auto;
    }

    .icon:before {
        margin-right: 10px
    }

    .icon:after {
        margin-left: 10px
    }

    .box {
        display: flex;
        align-items: center;
        padding-left: 100px;

    }

    .box img {
        border-radius: 50%;
        width: 150px;
        border: 2px solid white;
        /* box-shadow: 3px 3px 3px grey; */
        margin: 15px;


    }

    .box-1 {
        margin: 20px;

    }

    .des {
        background-color: rgba(128, 128, 128, 0.11);
        padding: 20px;
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

    .cart {
        width: 100px;
        position: fixed;
        top: 75px;
        left: 10px;
        z-index: 10;
    }

    .footer a {
        border-radius: 50%;
    }

    .footer a:hover {

        background-color: rgba(255, 255, 255, 0.829);

    }




    .section-center {
        display: grid;
        /* flex-direction: row; */
        align-items: center;
        justify-content: center;
    }

    .question {

        padding: 10px;
        border-radius: 4px;
        box-shadow: 1px 3px 3px 1px grey;
        width: 600px;
        margin: 30px;

    }

    .question p {
        display: inline;
    }

    .question-btn {
        /* position: absolute;
            left: 800px; */
        border: 0px;
        background-color: white;

        color: brown;
        width: 12px;

    }

    h3 {
        font-family: "Dancing Script", cursive;
        color: gold;
    }

    /* additional css for javascript */
    /* hide text */
    .question-text {
        display: none;
    }

    .show-text .question-text {
        display: block;

    }

    .minus-icon {
        display: none;
    }

    .show-text .minus-icon {
        display: inline;
    }

    .show-text .plus-icon {
        display: none;
    }

    .destination {
        display: grid;
        grid-template-columns: repeat(3, auto);
        grid-gap: 1rem;
    }

    .visible select {
        width: 0px;
        visibility: hidden;
    }

    body {
        background-color: rgba(206, 201, 201, 0.116);
    }
</style>


<body>


    <script>
        var total = 0;
        console.log(total);
        function sum(a) {
            console.log("inside");
            total = total + a;
            console.log(total);
            final();

        }
        function final() {
            document.getElementById("demo").innerHTML = total;

        }

    </script>
    <div class="cart">

        <h2 class="btn btn-success" onclick="payment()">Total amount is <i class="fas fa-rupee-sign"></i> <span
                id="demo">0</span></h2>

    </div>


    <div class="navbar fw-bold  ">
        <ul class="nav justify-content-end ">
            <li class="nav-item strong">
                <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#package">Our Packages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Flight ticket</a>
            </li>

        </ul>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <?php if(isset($_SESSION['username'])): ?>
            <span class="navbar-text" class="nav-item">
                <a href="#" class="nav-link">Welcome <strong>
                        <?php echo $_SESSION['username']; ?>
                    </strong></a>
            </span>
            <?php endif ?>
        </button>
        <div class="offcanvas offcanvas-end center " style="background-color: #15323a; color:white;" tabindex="-1"
            id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Profile</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <i class="fas fa-user-circle w3-xxlarge" style="color:white;"></i>
                    </li>
                    <?php if(isset($_SESSION['username'])): ?>
                    <li class="navbar-text" class="nav-item">
                        <a href="#" class="nav-link">Welcome <strong>
                                <?php echo $_SESSION['username']; ?>
                            </strong></a>
                    </li>
                    <li class="navbar-text" class="nav-item">
                        <a href="#" class="nav-link">Gmail: <strong>
                                <?php echo $_SESSION['USER_ID']; ?>
                            </strong></a>
                    </li>
                    <?php endif ?>

                    <li class="nav-item">
                        <a class=" btn btn-outline-success" href="login_check.php?logout='1'">logout</a>
                    </li>

                </ul>

            </div>
        </div>

    </div>
    <!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> -->

    <!-- Modal -->





    <div class="modal fade center " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Flight ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <script>



                            function buttonClickHandler() {
                                console.log("inside function");
                                var select1 = document.getElementById("start");
                                var select2 = document.getElementById("des");
                                r = select1.options[select1.selectedIndex].value;
                                console.log(r);
                                q = select2.options[select2.selectedIndex].value;
                                console.log(q);


                                if (q == "" || r == "") {
                                    document.getElementById("txtHint").innerHTML = "";
                                    console.log("empty");
                                    return;

                                }
                                else {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function () {
                                        if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById("txtHint").innerHTML = this.responseText;
                                        }
                                    };

                                    xmlhttp.open("GET", "getuser.php?r=" + r + "&q=" + q, true);
                                    xmlhttp.send();

                                }

                            }
                        </script>
                        <?php

                    
                        echo '<div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select"  onchange="showUser(this.value)" name="city1" id="start">
                                <option value="" selected>Choose starting point</option>';
                                $link = mysqli_connect('localhost', 'root', '', 'trip');  
                            /*Check link to the mysql server*/ 
                            if(!$link)
                            { 
                            die('Failed to connect to server: ');
                            } 
                                $qry= "SELECT c_city  FROM `curr_loc`";
                                $result = mysqli_query($link, $qry);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "
                                    <option value=".$row['c_city'].">".$row['c_city']."</option>";
                                    
                                };
                            echo '</select>
                        </div>
                        
                        
                         <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select"   name="city2" id="des" >
                                <option value="" selected>Choose Destination point</option>';

                                $qry= "SELECT d_city  FROM `des_loc`";
                                $result = mysqli_query($link, $qry);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "
                                    <option value=".$row['d_city'].">".$row['d_city']."</option>";
                                    
                                };

                            echo '</select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" name="submit" value="check" id="check" onclick="buttonClickHandler()" class="btn btn-primary">Check Flight</button>
                </div>'
                ?>
                        <br>
                        <div id="txtHint"><b>flight info will be listed here...</b></div>

                    </form>





                </div>
            </div>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide  " data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/crousel-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>We plan your trips</h2>
                        <!-- <h5>Some representative placeholder content for the first slide.</h5> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/crousel-2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block ">
                        <h2 class="align-item-center">We plan your journey</h2>
                        <!-- <h5>Some representative placeholder content for the second slide.</h5> -->

                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/crousel-3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>We try for your comfort</h2>
                        <!-- <h5>Some representative placeholder content for the third slide.</h5> -->
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container center shadow rounded p-4  my-5 bg-white ">
            <h2>
                <center>DID YOU KNOW ? </center>
            </h2>
            <span class="icon"><i class="fa fa-home w3-xxlarge "></i></span>
            <h3>"What are the things you should always do on a trip? Plan a trip with us and we will tell you all about
                it."
            </h3>
            <div class="box my-4 ">
                <div class="box-1">
                    <img src="./dress.jpg" class="card-img-top shadow" alt="...">
                    <br>
                    <h5>Wear local dressing</h5>
                </div>
                <div class="box-1">
                    <img src="./local.jpg" class="card-img-top shadow"
                        alt="...">
                    <br>
                    <h5>Visit the local attraction</h5>

                </div>
                <div class="box-1">
                    <img src="./hotel.jpg" class="card-img-top shadow" alt="...">
                    <br>
                    <h5>Go to the best hotels</h5>


                </div>
                <div class="box-1">
                    <img src="./moment.jpg" class="card-img-top shadow" alt="...">
                    <br>
                    <h5>Enjoy the moment</h5>
                </div>
            </div>
        </div>

        <div class="container bg-white my-5 rounded shadow center p-4">

            <h1>
                <center>Our Popular Destinations</center>
            </h1>
            <span class="icon"><i class="fa fa-globe w3-xxlarge "></i></span>

            <h3>" Pre-planning your arrival when you plan travel is a huge step to reducing misery and stress."</h3>
            <div class="container destination  my-5">
                <?php
                if(!$link)
                { 
                die('Failed to connect to server: ');
                } 
                    $qry= "SELECT d_city,d_link FROM `des_loc`";
                    $result = mysqli_query($link, $qry);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo
                        '<div class="card shadow" style="width: 20rem;">
                    <img src="'.$row['d_link'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <form class="card-text visible" action="city-1.php" method="POST">
                            <h5 class="card-title">'.$row['d_city'].'</h5>
                            <select name="maldives" id="maldives">
                                <option value="'.$row['d_city'].'" selected>
                                </option>
                            </select>

                            <button class="btn btn-primary">Visit Here</button>

                        </form>

                    </div>
                </div>';
                        
                        
                    };


                ?>


            </div>
        </div>
        <div class="container   rounded bg-white my-5 center shadow p-4" id="package">
            <h1>Our packages</h1>
            <span class="icon"><i class="fas fa-paper-plane w3-xxlarge"></i></span>
            <div class="container  " style="width: 800px;">
                <?php
                if(!$link)
                { 
                die('Failed to connect to server: ');
                } 
                    $qry= "SELECT * FROM `package`";
                    $result = mysqli_query($link, $qry);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo
                        '<div class="card  mb-3 " style="max-width: 700px; ">
                        <div class="row g-0">
                            <div class="col-md-4" >
                                <img src="'.$row['pkg_link'].'" class="img-fluid rounded-start"   alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title "><b><i class="fas fa-map-marked-alt"></i> '.$row['pkg_name'].' </b></h5>
                                    <br>
                                    <p class="card-text flex-row " style="color: rgba(255, 166, 0, 0.842);">
                                        <div class="contaienr d-flex flex-row  justify-content-center" >
                    
                                            <section>
                                                <i class="fas fa-utensils w3-xlarge"></i>
                                                <p>meal </p>
                                                
                                            </section>
                                            <section>
                                                <i class="fas fa-taxi w3-xlarge"></i>
                                                <p>travel </p> 
                                                
                                            </section>
                                            <section>
                                                <i class="fas fa-plane-arrival w3-xlarge "></i>
                                                <p>Airport </p> 
                                            </section>
                                            <section>
                                                <i class="fas fa-bed w3-xlarge"></i>
                                                <p>stay</p> 
                                            </section>
                                        </div>
                                        <br>
        
                                    </p>
                                         
                                    <p class="card-text"><small class="text-muted"></small>'.$row['contents'].'</p>
                                    <br>
                                    <form class="visible" action="payment.php" method="post" >
                                        <select name="price" id="price" >
                                            
                                            <option value="'.$row['pkg_price'].'" selected>
                                            </option>
                                        </select>
                                        <select name="pkg_id" id="price" >

                                            <option value="'.$row['pkg_id'].'" selected>
                                            </option>
                                        </select>
                                        <select name="pkg_name" id="price" >

                                            <option value="'.$row['pkg_name'].'" selected>
                                            </option>
                                        </select>
                                        
                                    <button class="btn btn-warning" type="button"  data-bs-toggle="modal" data-bs-target="#review" >review</button>

                                        <button class="btn btn-warning"   onclick="sum('.$row['pkg_price'].')" >'.$row['pkg_price'].'</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>';
                        
                        
                    };


                ?>
                <div class="modal fade" id="review" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="review.php" class="left" method="post">
                                    <h3 class="center">Give your valuable suggestion</h3>

                                    <div>

                                        <br>
                                        <!-- <input type="text" name="id" class="rounded border"> -->

                                        <?php
                                            
                                          
                                          echo '<input type="text" name="uid" value="'.$_SESSION['USER_ID'].'" class="rounded border form-control visually-hidden ">';
                                        ?>
                                    </div>
                                    <div>
                                        <label>
                                            <h6>Package id</h6>
                                        </label>
                                        <br>
                                        <!-- <input type="text" name="id" class="rounded border"> -->

                                        <?php
                                          
                                    /*Check link to the mysql server*/ 
                                    $link = mysqli_connect('localhost', 'root', '', 'trip');
                                    if(!$link)
                                    { 
                                    die('Failed to connect to server: ');
                                    } 
                                        echo
                                        '<select class=" border p-1 col-3 rounded form-control"  name="pkg_id" >
                                        
                                        <option value="" >Choose Package id</option>';
                                        
                                        $qry= "SELECT pkg_id,pkg_name FROM package";
                                        $result = mysqli_query($link, $qry);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<option value=".$row['pkg_id'].">".$row['pkg_name']." </option>";
                                            
                                        };
                
                                    echo '</select>';
                                        ?>
                                    </div>
                                    <div>
                                        <label>
                                            <h6>Rating</h6>
                                        </label>
                                        <br>
                                        <input type="text" name="rating" class="rounded border form-control">
                                    </div>
                                    <div>
                                        <label>
                                            <h6>Suggestion</h6>
                                        </label>
                                        <br>

                                        <textarea class="form-control rounded border" name="suggestion"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" value="review"
                                            class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="questions rounded container bg-white my-5 center shadow p-4">
            <!-- title -->
            <div class="title container">
                <h1>FAQs</h1>
                <span class="icon"><i class="fas fa-book-reader w3-xxlarge"></i></span>

            </div>
            <div class="section-center">
                <!-- single question -->
                <article class="question ">
                    <!-- question title -->
                    <div class="question-title ">

                        <p>Don’t plan an itinerary for every single day.</p>
                        <button type="button" class="question-btn">
                            <span class="plus-icon">
                                <i class="far fa-plus-square"></i>
                            </span>
                            <span class="minus-icon">
                                <i class="far fa-minus-square"></i>
                            </span>
                        </button>
                    </div>
                    <div class="question-text">
                        <hr>
                        <p>Planning each day of your vacation can set you up for disappointment: maybe one day you wake
                            up not feeling up for the activities you have planned, perhaps the weather turns, maybe you
                            find something else you’d like to do instead once you arrive.</p> <br>
                        <p> <b>Instead</b> , we recommend planning out a few day options to choose from: perhaps a group
                            of activities all in one area, or a day of seeing museums, etc.</p>
                    </div>
                </article>
                <article class="question">
                    <!-- question title -->
                    <div class="question-title">

                        <p>How To Find a Travel Destination</p>
                        <button type="button" class="question-btn">
                            <span class="plus-icon">
                                <i class="far fa-plus-square"></i>
                            </span>
                            <span class="minus-icon">
                                <i class="far fa-minus-square"></i>
                            </span>
                        </button>
                    </div>
                    <div class="question-text">
                        <hr>
                        <p>Browsing for travel destinations with an open mind can be really fun (and a little
                            addictive)! Here’s how we figure out where to go when we plan travel.</p>
                    </div>
                </article>
                <article class="question">
                    <!-- question title -->
                    <div class="question-title">

                        <p>How do I organise my Visa?</p>
                        <button type="button" class="question-btn">
                            <span class="plus-icon">
                                <i class="far fa-plus-square"></i>
                            </span>
                            <span class="minus-icon">
                                <i class="far fa-minus-square"></i>
                            </span>
                        </button>
                    </div>
                    <div class="question-text">
                        <hr>
                        <p>Please contact the relevant local embassy, or visit a travel agent, to organise your visa/s.
                        </p>
                    </div>
                </article>
            </div>
            <script>
                const questions = document.querySelectorAll(".question");
                questions.forEach(function (question) {
                    // console.log(question);
                    const btn = question.querySelector(".question-btn");

                    btn.addEventListener("click", function () {
                        questions.forEach(function (item) {
                            if (item !== question) {
                                item.classList.remove("show-text")
                            }
                        });
                        question.classList.toggle("show-text");
                    });

                });
            </script>
        </div>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">

            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous"></script>

</body>

</html>