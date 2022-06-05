
<html>
     <head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
     </head>
     <body>
        
         
     <?php 
//Start the session to see if the user is authencticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
 
 /*Connect to mysql server*/ 
$link = mysqli_connect('localhost', 'root', '', 'trip');  

/*Check link to the mysql server*/ 
if(!$link)
{ 
die('Failed to connect to server: ');
 } 

 /*Create query*/ 
$qry = 'SELECT * FROM admin'; 

/*Execute query*/ 
$result = mysqli_query($link, $qry);

echo '<h1> Current admins - </h1>';

 


/*Draw the table for Players*/
echo '<div class="container">'; 
echo '<table class="table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope="col">Admin ID</th>
        </tr>
      </thead>
      <tbody>';

      
        
        $result = mysqli_query($link, $qry);
/*Show the rows in the fetched result set one by one*/ 
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>
          <th scope='row'>". $row['aid']. "</th>
          
        </tr>";
           
        }



        
       
     echo '</tbody>
    </table> </div>';


} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>

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
