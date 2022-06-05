<?php
	session_start();
	$username="";
	$email="";
	$errors=array();

   

	// for registration
	if(isset($_POST['register'])){
		$link = mysqli_connect('localhost', 'root', '','trip'); 

		$username = $_POST['name']; 
		$email= $_POST['username']; 
		$password_1=$_POST['password'];
		$password_2=$_POST['confirm-password'];
		
		

		// $username=mysqli_real_escape_string($db,$_POST['username']);
		// $email=mysqli_real_escape_string($db,$_POST['email']);
		// $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
		// $password_2=mysqli_real_escape_string($db,$_POST['password_2']);

		$q1="SELECT * FROM customer WHERE name='$username'";
		$q2="SELECT * FROM customer WHERE uid='$email'";
		$r1=mysqli_query($link,$q1);
		$r2=mysqli_query($link,$q2);
		$count1=mysqli_num_rows($r1);
		$count2=mysqli_num_rows($r2);
		//ensure that form fields are filled properly
		if(empty($username)){
			array_push($errors,"Username is required");
		}
		if($count1!=0){
			array_push($errors,"Username is taken by some other user");
		}
		if(empty($email)){
			array_push($errors,"Email is required");
		}
		if($count2!=0){
			array_push($errors,"Email is Already registered please login");
		}
		if(empty($password_1)){
			array_push($errors,"Password is required");
		}
		if($password_1!=$password_2)
		{
			array_push($errors,"The two passwords do not match");
		}

		if(count($errors)==0){
			$link = mysqli_connect('localhost', 'root', '','trip'); 
			// $password=md5($password_1);
			$sql="INSERT INTO customer (uid, name, upass) VALUES('$email','$username','$password_1')";
			$result = mysqli_query($link,$sql);
			if($result==false){

				
				header('location: login_cus.php');
			}
			session_start(); 
			
			$_SESSION['IS_AUTHENTICATED'] = 1; 
			$_SESSION['username']=$username;
			// $_SESSION['username']=$username;
			$_SESSION['USER_ID']=$email;

				$_SESSION['success']="You are now logged in";
				header('location: home.php');
		}
		if(count($errors)!=0){
			// include('login_cus.php');
			header('location:login_cus.php'); 

			 
					echo 
						'<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
						<strong>Try again!!</strong> .
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
		}
	}
	if ($_POST['submit'] == 'login'){ 
        //Collect POST values 
        $login = $_POST['login']; 
        $password = $_POST['password']; 
        if($login && $password){ 
            //Connect to mysql server 
            $link = mysqli_connect('localhost', 'root', '','trip'); 
            //Check link to the mysql server 
            if(!$link) { 
                die('Failed to connect to server: '); 
            } 
            //Create query (if you have a Logins table the you can select login id and password from there)
            $qry="SELECT * FROM customer WHERE uid ='$login' AND upass ='$password'"; 
            //Execute query 
            $result=mysqli_query($link, $qry); 
            //Check whether the query was successful or not 
            $count = mysqli_num_rows($result);
            if($count!=1){ 
                //Login failed 
                // include('login_cus.php'); 
                header('location:login_cus.php'); 

				echo 
				'<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
				<strong>Try again!!</strong> .
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'; 
                exit();
                
            } 
            
            //if query was successful it should fetch 1 matching record from the table. 
            if( $count == 1){ 
                //Login successful set session variables and redirect to main page. 
                

                session_start(); 
				$row = mysqli_fetch_assoc($result);

				$_SESSION['IS_AUTHENTICATED'] = 1; 
				$_SESSION['USER_ID'] = $login; 
				$_SESSION['username']=$row['name'];
                header('location:home.php'); 
            } 
            else{ 
                //Login failed 
                // include('login_cus.php'); 
                header('location:login_cus.php'); 

                echo 
						'<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
						<strong>Try again!!</strong>please create your account .
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>'; 
                exit(); 
            } 
        } 
        else{ 
            // include('login_cus.php'); 
			header('location:login_cus.php'); 

            echo 
						'<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
						<strong>Try again!!</strong>write required field .
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';  
            exit(); 
        } 
    }
	
	



	if(isset($_GET['logout'])){

        //Destroy the session 
        session_start(); 
        session_unset(); 
        session_destroy(); 
        //Redirect to login page 
        header("location: login_cus.php"); 
        exit(); 
		
	}

?>