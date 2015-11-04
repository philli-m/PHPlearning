<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <!--metadata information that cannot be represented by one of the other HTML meta-related elements (<base>, <link>, <script>, <style> or <title>). -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <title>Make Me Elvis - Add Email</title>

  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

  <?php

//PHP email query implemented. dbc saves the database connection details, always starts mysqli_connect-->saying connect to database 
  $dbc = mysqli_connect('127.0.0.1', 'root', 'ServantEgg86', 'elvis_store')
  or die('Error connecting to MySQL server.');

//the table column name = $_post[ html form input name]
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $email = $_POST['email'];

//method INSERT INTO table name (column titles (keys)) VALUES(data to fill columns)(labelled with PHP tags )  
  $query = "INSERT INTO email_list (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')";

//saying query the database 
  mysqli_query($dbc, $query)
  or die('Error querying database.');

//printing to screen customer added? 
  echo 'Customer added.';
//closeing connection to database 
  mysqli_close($dbc);
  ?>

</body>
</html>
