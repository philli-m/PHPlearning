<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <title>Make Me Elvis - Send Email</title>
  
  <link rel="stylesheet" type="text/css" href="style.css" />
<
/head>
<body>

<?php
//storing information in variables 
  $from = 'phillippa.morland@researchgate.net';
  //gets subject and email from form using html name tags within divs? 
  $subject = $_POST['subject'];
  $text = $_POST['elvismail'];
// this saves the database connection to a variable that can be used while querying 
  $dbc = mysqli_connect('127.0.0.1', 'root', 'ServantEgg86', 'elvis_store')
    or die('Error connecting to MySQL server.');

//query is a function which runs a SELECT  query on the database to retrieve email list 
  $query = "SELECT * FROM email_list";
  //
  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

// to send to all in list, a while loop is required fetch_array function retrives query results in form of rows of data 
  while ($row = mysqli_fetch_array($result)){
    $to = $row['email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $msg = "Dear $first_name $last_name,\n$text";
    mail($to, $subject, $msg, 'From:' . $from);
    echo 'Email sent to: ' . $to . '<br />';
  } 

  mysqli_close($dbc);
?>

</body>
</html>
