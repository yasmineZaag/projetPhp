<?php
  if (session_start()){
  // servername => localhost
  // username => root
  // password => empty
  // database name => staff
  $conn = mysqli_connect("localhost", "root", "", "registration");
    
  // Check connection
  if($conn === false){
      die("ERROR: Could not connect. " 
          . mysqli_connect_error());
  }
    
  // Taking all 5 values from the form data(input)
  $title =  $_REQUEST['title'];
  $category = $_REQUEST['category'];
  $skils =  $_REQUEST['skils'];
  $price =  $_REQUEST['price'];
  $descrp = $_REQUEST['descrp'];
    
  // Performing insert query execution
  // here our table name is college
  $sql = "INSERT INTO college  VALUES ('','$title', 
      '$category','$skils', '$price','$descrp')";
    
  if(mysqli_query($conn, $sql)){
    header('location: index.php');
  } else{
      echo "ERROR: Hush! Sorry $sql. " 
          . mysqli_error($conn);
  }
    
  // Close connection
  mysqli_close($conn);
}

  ?>