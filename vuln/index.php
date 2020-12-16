<?php
define( 'SQL_INJECTION_APP', true );
require('includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id= $_POST['id'];
    //echo $id;
    $query= "SELECT * FROM PII WHERE id = '$id'";
    $retval= mysqli_query($conn, $query);

    if(! $retval){
        die('Woops! Could not retrieve data, check your input: ' .mysqli_error());   }

    echo "Successfully returned your information";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vulnerable App</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <header>
        Welcome Ginger.io team to my vulnerable HR application
    </header>

    <div class="titleDiv">
        <div class="backLink"><a class="nav-link" href="index.php"> Search</a></div>
    </div>
    <div class="titleDiv">
        <div class="backLink"><a class="nav-link" href="insert.php"> Enter new Employee Info</a></div>
    </div>
    <form action="index.php" method="post">

        <span class="label">Enter your Employee id to search the HR records</span>
        <input type="ins_text" name="id" />
        <br>


        <input type="submit"  />
    <table class="blueTable">
		<thead>
		<tr>
            <th scope="col">Employee ID </th>
			<th scope="col">Name</th>
			<th scope="col">Phone Number</th>
			<th scope="col">SSN</th>
			<th scope="col">Sex</th>
			<th scope="col">DOB</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if ( $retval ) {
			foreach ( $retval as $row ) {
				echo '<tr>';
                echo '<th scope="row">' . $row['id'] . '</th>';
                echo '<td>' . $row['name'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['SSN'] . '</td>';
                echo '<td>' . $row['sex'] . '</td>';
				echo '<td>' . $row['birth'] . '</td>';
				echo '<td>';
				echo '<a href="?action=update&id=' . $row['name'] . '"><i class="fas fa-pencil-alt"></i></a>&nbsp;';
				echo '<a href="?action=delete&id=' . $row['name'] . '"><i class="fas fa-trash"></i></a>';
				echo '</td>';
				echo '</tr>';
			}
        }
        
        mysqli_free_result($retval);
		?>
		</tbody>
	</table>

</html>
<?php require_once('include/footer.php');?>