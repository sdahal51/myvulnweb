<?php
require('includes/db_connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id= $_POST['id'];
    $name= $_POST['name'];
    $phone= $_POST['phone'];
    $SSN= $_POST['SSN'];
    $sex= $_POST['sex'];
    $birth= $_POST['birth'];

    $query = "INSERT INTO PII (id, name, phone, SSN, sex, birth) VALUES ('$id', '$name', '$phone', '$SSN', '$sex', '$birth')";
    $retval= mysqli_query($conn, $query);

    if(! $retval){
        die('Woops! Could submit your data to the DB, check your input: ' .mysqli_error($query));   
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Insert Data</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <header>
       Insert your information into the database
    </header>

    <div class="titleDiv">
        <div class="backLink"><a class="nav-link" href="index.php"> Search </a></div>
    </div>
    <form action="insert.php" method="post">

        <span class="label1">Employee ID</span>
		<input type="ins_text" name="id" />
		<br>
        <span class="label1">Name</span>
		<input type="ins_text" name="name" />
		<br>
		<span class="label1">Phone Number</span>
		<input type="ins_text" name="phone" />

		<span class="label1">SSN</span>
		<input type="ins_text" name="SSN" />
		
		<span class="label1">sex</span>
		<input type="ins_text" name="sex" />
		
		<span class="label1">DOB</span>
		<input type="ins_text" name="birth" />
		<br>

        <input type="submit"  />

</html>

	