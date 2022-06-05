<?php 
session_start(); 
session_unset();
session_destroy(); 
?>
<html>

<head>
  <title>Login Page</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
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
  <style>
    body {
      background-color: rgba(206, 201, 201, 0.116);

    }

    .login {

      display: grid;
      grid-template-columns: 1fr 1fr;
      column-gap: 50px;

    }

    .user,
    .admin {
      background-color: white;
      border-radius: 6px;
    }


    /* for create id */
    .flip-card-3D-wrapper {
      /* width: 60%;
      height: 80%; */
      /* max-width: 300px;
      max-height: 500px; */
      position: relative;
      -o-perspective: 900px;
      -webkit-perspective: 900px;
      -ms-perspective: 900px;
      perspective: 900px;
      margin: 0 auto;
    }

    #flip-card{
      width: 100%;
      height: 100%;
      /* text-align: center; */
      /* margin: 50px auto; */
      position: absolute;
      -o-transition: all 1s ease-in-out;
      -webkit-transition: all 1s ease-in-out;
      -ms-transition: all 1s ease-in-out;
      transition: all 1s ease-in-out;
      -o-transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      -ms-transform-style: preserve-3d;
      transform-style: preserve-3d;
    }

    .do-flip {
      -o-transform: rotateY(-180deg);
      -webkit-transform: rotateY(-180deg);
      -ms-transform: rotateY(-180deg);
      transform: rotateY(-180deg);
    }

    #flip-card-btn-turn-to-back,
    #flip-card-btn-turn-to-front {
      /* position: absolute;
      top: 8px;
      right: 8px;
      width: 40px;
      height: 40px; */
      background: white;
      cursor: pointer;
      visibility: hidden;
      /* font-family: 'Open Sans', sans-serif; */
      /* font-weight: 600; */
      /* font-size: .7em; */
      padding: 0;
      color:#007BFF;
      border: 0;
    }

    #flip-card .flip-card-front,
    #flip-card .flip-card-back {
      width: 100%;
      height: 100%;
      position: absolute;
      -o-backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      -ms-backface-visibility: hidden;
      backface-visibility: hidden;
      z-index: 2;
      /* -webkit-box-shadow: 5px 6px 32px 2px rgba(133, 133, 133, 0.71);
      -moz-box-shadow: 5px 6px 32px 2px rgba(133, 133, 133, 0.71); */
      box-shadow: 4px 5px 10px 1px rgba(133, 133, 133, 0.603);
      border-radius: 4px;

    }

    #flip-card .flip-card-front {
      background: white;
      /* border: 1px solid grey; */
    }

    #flip-card .flip-card-back {
      background: white;
      /* border: 1px solid grey; */
      -o-transform: rotateY(180deg);
      -webkit-transform: rotateY(180deg);
      -ms-transform: rotateY(180deg);
      transform: rotateY(180deg);
    }

    #flip-card .flip-card-front p,
    #flip-card .flip-card-back p {
      color: grey;
      display: block;
      /* position: absolute;
      top: 40%; */
      width: 100%;
    }
  </style>
</head>

<body class="my-5">
  <h1 align="center">Tours and Travel planners</h1>

  <h3 align="center"> - Enter your login Details - </h3>
  <br>
  <script>
    document.addEventListener('DOMContentLoaded', function (event) {

      document.getElementById('flip-card-btn-turn-to-back').style.visibility = 'visible';
      document.getElementById('flip-card-btn-turn-to-front').style.visibility = 'visible';

      document.getElementById('flip-card-btn-turn-to-back').onclick = function () {
        document.getElementById('flip-card').classList.toggle('do-flip');
      };

      document.getElementById('flip-card-btn-turn-to-front').onclick = function () {
        document.getElementById('flip-card').classList.toggle('do-flip');
      };

    });

  </script>


  <div class="container login">

    <div class="flip-card-3D-wrapper  container   m-2">
      <div id="flip-card">
        <div class="flip-card-front">
        
          <div class="container p-4 ">
            <h3>Sign into your customer account </h3>
            <form action="login_check.php" method="post">
              <input type="email" class="p-2 m-3 rounded-pill col-7" name="login" id="name" require placeholder="Email address">
              <br>
              <input type="password" class="p-2 m-3 rounded-pill col-7" name="password" require id="password"
                placeholder="Password">
              <br>
              <button class="btn btn-success m-3" type="submit" name="submit" value="login">LOGIN</button>
              

            </form>
            <button id="flip-card-btn-turn-to-back">Do you have an account? Register here</button>
            
          </div>
        </div>
        <div class="flip-card-back">
          
          <div class="sign container p-4 ">

            <h3>Create your customer account </h3>
            <form action="login_check.php" method="post">
              <input type="text" class="p-2 m-2 rounded-pill col-5" name="name" id="cname" require placeholder="Name">
              <input type="email" class="p-2 m-2 rounded-pill col-5" name="username" id="name"require placeholder="Email address">
              
              <input type="password" class="p-2 m-2 rounded-pill col-5" require name="password" id="password"
                placeholder="Password">
              <input type="password" class="p-2 m-2 rounded-pill col-5" require name="confirm-password" id="password"
                placeholder="Confirm-Password">
                <br>
              
              <button class="btn btn-success m-2" type="submit" name="register" >Create</button>
    
            </form>
            
            <button id="flip-card-btn-turn-to-front">Already have an account? Signin now!!</button>
          </div>

        </div>
      </div>
    </div>


    

    <div class="container admin shadow p-4 m-2">
      <h3>Sign into your admin account </h3>
      <form action="../admin/login_check.php" method="post">
        <input type="email" class="p-2 m-3 rounded-pill col-7" name="login" require id="name" placeholder="Email address">
        <br>
        <input type="password" class="p-2 m-3 rounded-pill col-7" name="password" require id="password" placeholder="Password">
        <br>
        <button class="btn btn-success m-3" type="submit" name="submit" value="login">LOGIN</button>

      </form>


    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">

            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>

<!-- --------------- -->
