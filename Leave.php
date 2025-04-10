<?php
include("connection.php");
  if(isset($_POST['Submit'])){
    $Employee_Name = $_POST['username'];
    $Employee_id = $_POST['Employee_id'];
    $Shift = $_POST['Shift']; 
    $Date_of_Joining = $_POST['Date_of_Joining'];
    $NO_of_Days = $_POST['NO_of_Days'];
    $Leave_From = $_POST['Leave_From'];
    $Leave_To = $_POST['Leave_To'];
    $Reporting_Officer = $_POST['Reporting_Officer'];
    $Reason = $_POST['Reason']; 

    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO request (username, Employee_id, Shift, Date_of_Joining, No_of_days, leave_from, leave_to, reporting_officer, reason) VALUES ('$Employee_Name','$Employee_id','$Shift','$Date_of_Joining','$NO_of_Days','$Leave_From','$Leave_To','$Reporting_Officer', '$Reason')";
   
    if (mysqli_query($conn, $sql)) {
		// echo "new record created";
} 	else{
		echo "Error".$sql. "<br>".mysqli_error($conn);
	}


  }
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Leave Request</title>
<link rel="icon" href=
"images.png"
          type="image/x-icon">
<style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
  box-sizing: border-box;
}
  body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start;
      font-family: 'Montserrat', sans-serif;
    min-height: 100vh;
    overflow: hidden;
    background: linear-gradient(to bottom right, #3498db, #ffff);
    position: relative;
  }

  .container {
    width: 100%;
    height: auto;
    max-width: 900px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    margin: 120px auto; /* Centering the container using auto margins */
    position: relative;
    display: flex;
    flex-wrap: wrap;
}

  .form-container,
  .overlay-container {
    width: calc(50% - 5px); /* Adjusted width */
    padding: 0 10px; /* Added padding */
    box-sizing: border-box; /* Ensure padding is included in the width */
  }


  h1 {
    text-align: center;
    width: 100%;
    font-size: 24px;
    margin-bottom: 20px;
  }

  form {
    width: calc(100% - 10px); /* Adjusted width and added margin between forms */
    margin-bottom: 20px;
  }

  label {
    margin-bottom: 8px;
    font-size: 14px;
  }

  input, select {
    display: flex;
    flew-wrap: wrap;
    padding-bottom:30px;
    padding: 8px;
    padding-right:120px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
    width: 100%;
  }
    input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    width: calc(50% - 12px); /* Adjusted width */
    padding: 10px 0;
    margin: 0 auto; /* Center the button */
    display: block; /* Ensure it's a block-level element */
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }

  /* Adjusted styles for right column */
  @media (min-width: 768px) {
    .right-column {
      width: calc(50% - 10px);
    }
  }

  .reason-input { /* Added style for reason input */
    width: calc(100% - 30px); /* Adjusted width */
    height: 70px; /* Increased height */
    resize: vertical; /* Allow vertical resizing */
  }

  /* Added styles for centering the submit button */
.submit-container {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 20px;
    position: absolute;
    bottom: 50px; /* Adjusted position */
    left: 0; /* Center horizontally */
  }
  
  .logo-container {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 999;
    margin-top: 20px;
  }

  .logo {
    width: 200px;
    height: auto;
  }

</style>
</head>
<body>
<?php include("navigation.html"); ?>
<!-- Logo -->
<div class="logo-container">
  <a href="home.php">
    <img src="Hyundai_Wia_logo.png" alt="Logo" class="logo">
  </a>
</div>
 
<form action="" method="Post" onsubmit="showNotification()">
<div class="container" id="container">
<h1>Leave Request Form</h1>
        <div class="form-container sign-in-container">
                 <label for="employee_name">Employee Name:</label>
                <input type="text" id="username" name="username" required>

                <label for="Employee_id">Employee ID:</label>
                <input type="text" id="Employee_id" name="Employee_id" required>

                <label for="Shift">Shift:</label>
                <select id="Shift" name="Shift" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                </select>

                <label for="Date_of_Joining">Date of Joining:</label>
                <input type="date" id="Date_of_Joining" name="Date_of_Joining" required>

                <label for="NO_of_Days">No. of Days (Leave):</label>
                <input type="number" id="NO_of_Days" name="NO_of_Days" required>
        </div>
        <div class="overlay-container">
             <label for="Leave_From">Leave From:</label>
                <input type="date" id="Leave_From" name="Leave_From" required>

                <label for="Leave_To">Leave To:</label>
                <input type="date" id="Leave_To" name="Leave_To" required>

    
                 <label for="Reporting_Officer">Reporting Officer:</label>
                <select id="Reporting_Officer" name="Reporting_Officer" required>
                     <option value="officer1">Officer 1</option>
                     <option value="officer2">Officer 2</option>
                     <option value="officer3">Officer 3</option>
                 </select>
               <label for="reason">Reason:</label>
    <input type="text" id="reason" name="Reason" class="reason-input" required>  
               
        </div>
         <input type="Submit" value="Submit"  name = "Submit" class="Submit-button">
</div>
</form>

<script>

function showNotification() {
    alert("Leave Request Submitted");
}

    function openPage(url) {
        window.open(url, '_blank');
    }
    

    // Function to populate the dropdown with overtime dates and hours
    function populateOvertimeDates() {
      // Sample data for demonstration, replace with actual data source
      var overtimeData = [
        { date: "12/03/2024", hours: "5:30hrs" },
        { date: "10/03/2024", hours: "4hrs" }
        // Add more data as needed
      ];

      var selectElement = document.getElementById("Overtime_Date_Hours");

      // Clear existing options
      selectElement.innerHTML = "";

      // Populate options
      overtimeData.forEach(function(data) {
        var option = document.createElement("option");
        option.text = data.date + " - " + data.hours;
        selectElement.add(option);
      });
    }

    // Call the function to populate the dropdown on page load
  window.onload = populateOvertimeDates;
</script>
</body>
</html>