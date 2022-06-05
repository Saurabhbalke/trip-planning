<?php 


	//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
	// if ($_POST['submit'] == 'review'){

	// 	$validationFlag = true; 
    //     //Check all the required fields are filled 
    //     if(!($_POST['uid'])||!($_POST['pkg_id']))
    //     { 
    //         echo 'All the fields marked as * are compulsary.<br>'; 
    //         $validationFlag = false; 
    //     }
	// 	else{

	// 		$userid=$_POST['uid'];
	// 		$package=$_POST['pkg_id'];
	// 		$rating=$_POST['rating'];
	// 		$suggestion=$_POST['suggestion'];
	// 	}
		

    //     if($validationFlag){

			


	// 		$link = mysqli_connect('localhost', 'root', '','trip'); 
	// 		if(!$link){ 
	// 			die('Failed to connect to server'); 
	// 			} 
	// 		// $password=md5($password_1);
	// 		$sql="INSERT INTO review (u_id, pkgid, rating,comment) VALUES('$userid','$package','$rating','$suggestion')";
	// 		$result = mysqli_query($link,$sql);
	// 		if($result==false){

	// 			include('home.php');
	// 		echo 
	// 				'<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
	// 				<strong>Try again!!</strong> .
	// 				</div>'; 
	// 		}
            
    //             include('home.php');
	// 		echo 
	// 				'<div class="alert alert-success alert-dismissible fixed-top fade show" role="alert">
	// 				<strong>Thank you for your suggestion</strong> .
	// 				</div>'; 
            
			
	// 	}
    //     else{
            
    //     }

    // }


	if ($_POST['submit'] == 'review'){
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
			$rating=$_POST['rating'];
			$suggestion=$_POST['suggestion'];
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
            $query = "INSERT INTO review (u_id,pkgid,rating, comment) VALUES ('$userid','$package','$rating','$suggestion')"; 
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
						<strong>Thank you for your suggestion</strong> .
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
