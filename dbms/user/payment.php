
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
        background-color: #15323a;
        z-index: 5;
        font-size: 1.5rem;
        font-family: 'Karla', sans-serif;
        width: 100%;
    }

    .navbar a {
        color: aliceblue;
    }

    footer {
        background-color: #15323a;
        color: white;
        height: 300px;
    }

    .footer {
        margin: 0px;
        display: grid;
        grid-template-columns: 3fr 1fr;

    }

    .footer a {
        border-radius: 50%;
    }

    .footer a:hover {

        background-color: rgba(255, 255, 255, 0.829);

    }

    .cart {
        width: 100px;
        position: fixed;
        top: 65px;
        left: 10px;
        z-index: 10;
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
        <h2 class="btn btn-success">Total amount is <i class="fas fa-rupee-sign"></i> <span id="demo">0</span></h2>

    </div>


    <div class="navbar   ">
        <ul class="nav justify-content-end ">
            <li class="nav-item strong">
                <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./home.php/#package">Our Packages</a>
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





    <div class="modal fade center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                            <select class="form-select"  name="city1" id="start">
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
        <div class="payment container col-5 shadow p-5 my-4">
            <form action="verify.php" class="left " method="post"  >
                <h3 class="center">Payment Form</h3>
                
                <div>
                    
                    <?php
                    echo '<input type="text" name="uid" value="'.$_SESSION['USER_ID'].'" class="rounded border visually-hidden">';
                    ?>
                   
                   
                </div>
                <div>
                  
                    
                    <?php
                    $pkg_id=$_POST['pkg_id'];
                    $pkg_name=$_POST['pkg_name'];
                    echo
                    '<h5>Package name:<br><strong> '.$pkg_name.'</strong></h5>
                    <input type="text" value="'.$pkg_id.'" name="pkg_id" class="rounded border form-control visually-hidden">';
                
                    ?>
                </div>
                <?php
                // $place=$_POST['package'];
                $price=$_POST['price'];
                echo
                    '<h4  value="'.$price.'">Amount: '.$price.' </h4>
                    <input type="text" name="price" value="'.$price.'" class="rounded border form-control visually-hidden ">';
                    
                ?>
                <div>
                    <label>
                        <h6>Card number</h6>
                    </label>
                    <br>
                    <input type="text" name="card_num" class="rounded border form-control">
                </div>
                <div>
                    <label>
                        <h6>Expire date</h6>
                    </label>
                    <br>
                    <input type="date" name="exp_date" class="rounded border form-control">
                </div>
                <div>
                    <label>
                        <h6>CVV</h6>
                    </label>
                    <br>
                    <input type="password" name="cvv" class="rounded border form-control">

                    
                    
                </div>
                <div class="d-flex justify-content-center my-2" >
                    <button type="submit" name="submit" value="payment" class="btn btn-success col-3 center ">Pay</button>
                </div>
            </form>
        </div>





        <footer class=" p-5" id="contact">
            <section class="footer">

                <div class="container">
                    <h4>creater</h4>
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
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous"></script>

</body>

</html>