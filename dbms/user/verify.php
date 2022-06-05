<?php 


	//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
	

	if ($_POST['submit'] == 'payment'){
        //validation flag to check that all validations are done 
        $validationFlag = true; 
        //Check all the required fields are filled 
        if(!($_POST['uid'])||!($_POST['pkg_id']))
        { 
            echo 'All the fields marked as * are compulsary.<br>'; 
            $validationFlag = false; 
        } 

        else{ 
            $userid=$_POST['uid'];
			$package=$_POST['pkg_id'];
			$price=$_POST['price'];
			$date=date_create($_POST['exp_date']);

            $exp=date_format($date,"Y-m-d");
			$card_num=$_POST['card_num'];
			$cvv=$_POST['cvv'];
        }



        //If all validations are correct, connect to MySQL and execute the query 
        if($validationFlag){ 
            //Connect to mysql server 
            $link = mysqli_connect('localhost', 'root', '', 'trip'); 
            //Check link to the mysql server 
            if(!$link){ 
            die('Failed to connect to server'); 
            } 
            //Create Insert query 
            $query = "INSERT INTO payment (uid,pkgid,card_num, cvv,exp_date,price) VALUES ('$userid','$package','$card_num','$cvv','$exp','$price')"; 
            //Execute query 
            $results = mysqli_query($link, $query); 
             
            //Check if query executes successfully 
            if($results == FALSE) 
			{
				include('home.php');
				
				echo 
						'<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
						<strong>Try again!!</strong> .
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>'; 
			}
					
            else {

				// header('location: home.php');
				include('home.php');

				echo 
						'<div class="alert alert-success alert-dismissible fixed-top fade show" role="alert">
						<strong>Thank you for Payment </strong>Booking successfull .
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>'; 
			}
        } 
    } 
    



    
     
} 
else{ 
   
    
	include('home.php');
			echo 
					'<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
					<strong>Write valid user id or packge name</strong> .
					</div>';  
}




























    
?>
