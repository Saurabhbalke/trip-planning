

<?php
//Start the session to see if the user is authenticated user. 
session_start();
//Check if the user is authenticated first. Or else redirect to login page 
if (isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1) {
    require('menu.php');
} else {
    header('location:login_form.php');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .heading {
            background-color: #5F9EA0;
            color: white;
        }
        .center{
            text-align: center;
        }
        .box{
            display: grid;
            grid-template-columns: 1fr ;
            grid-gap: 10px;
            
        }
    </style>


</head>

<body>


    <!--  JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Destination  -->

    <h1 class="p-4 center">Near by visting places Details </h1>
    <div class="container box p-4 shadow bg-white">
    <?php 
       /*Connect to mysql server*/ 
       $link = mysqli_connect('localhost', 'root', '', 'trip');  

       /*Check link to the mysql server*/ 
       if(!$link)
       { 
       die('Failed to connect to server: ');
        } 
       
       /*Create query*/ 
$qry = 'SELECT t_id,t_address,did,d_city,reach_cost,eat_cost FROM tourist_place,des_loc WHERE did=d_id ORDER BY d_city, t_address,reach_cost'; 

/*Execute query*/ 
$result = mysqli_query($link, $qry);

echo '<h1>Tourist Places - </h1>';

 


/*Draw the table for Players*/
echo '<div class="container">'; 
echo '<table class="table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope="col">ID</th>
          <th scope="col">ADDRESS</th>
          <th scope="col">NEAREST CITY</th>
          <th scope="col">CITY ID</th>
          <th scope="col">TRAVEL EXPENSES</th>
          <th scope="col">AVG. FOOD EXPENSES</th>
        </tr>
      </thead>
      <tbody>';

      
        
        $result = mysqli_query($link, $qry);
/*Show the rows in the fetched result set one by one*/ 
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>
          <th scope='row'>". $row['t_id']. "</th>
          <td>". $row['t_address'] ."</td>
          <td>" . $row['d_city'] . "</td>
          <td>" . $row['did'] . "</td>
          <td>" . $row['reach_cost'] . "</td>
          <td>" . $row['eat_cost'] . "</td>
          
        </tr>";
           
        }



        
       
     echo '</tbody>
    </table> </div>';

    ?>


    </div>



</body>

</html>


































