<?php
  session_start();
  include('connection.php');

  if(isset($_POST['Submit'])){
    $Employee_Name = $_POST['username'];
    $Employee_id = $_POST['Employee_id'];
    $Shift = $_POST['Shift']; // Corrected the name of the Shift field
    $Date_of_Joining = $_POST['Date_of_Joining'];
    $NO_of_Days = $_POST['NO_of_Days'];
    $Leave_From = $_POST['Leave_From'];
    $Leave_To = $_POST['Leave_To'];
    $Overtime_Date_Hours = $_POST['Overtime_Date_Hours']; 
    $Reporting_Officer = $_POST['Reporting_Officer'];

    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO compoff (username, Employee_id, Shift, Date_of_Joining, NO_of_Days, Leave_From, Leave_To, Overtime_Date_Hours, Reporting_Officer) VALUES ('$Employee_Name','$Employee_id','$Shift','$Date_of_Joining','$NO_of_Days','$Leave_From','$Leave_To','$Overtime_Date_Hours','$Reporting_Officer')";
   
    if (mysqli_query($conn, $sql)) {
		echo "new record created";
} 	else{
		echo "Error".$sql. "<br>".mysqli_error($conn);
	}


  }

?>