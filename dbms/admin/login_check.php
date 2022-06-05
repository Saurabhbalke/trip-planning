






<?php
	session_start();
	$username="";
	$email="";
	$errors=array();

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
            $qry = "SELECT * FROM admin WHERE aid='$login' AND apass='$password'";
            
            //Execute query 
            $result=mysqli_query($link, $qry); 
            //Check whether the query was successful or not 
            $count = mysqli_num_rows($result);
            if($count!=1){ 
                //Login failed 
                // include('../user/login_cus.php'); 
                header('location:../user/login_cus.php'); 

                echo 
                    '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                    <strong>Try again!!</strong> Incorrect Id or password.
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
                header('location:main_page.php'); 
            } 
            else{ 
                //Login failed 
                // include('../user/login_cus.php');
                header('location:../user/login_cus.php'); 
                 
                echo 
                '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                <strong>Try again!!</strong> Incorrect Id or password.
                </div>';  
                exit(); 
            } 
        } 
        else{ 
            // include('../user/login_cus.php'); 
            header('location:../user/login_cus.php'); 

            echo 
            '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
            <strong>Try again!!</strong> Incorrect Id or password.
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
        header("location: ../user/login_cus.php "); 
        exit(); 
		
	}

?>