<?php
session_start();
include("connection.php");
if (isset($_POST['Submit'])) {
    $Employee_Name = $_POST['username'];
    $Employee_id = $_POST['Employee_id'];
    $Shift = $_POST['Shift'];
    $Date_of_Joining = $_POST['Date_of_Joining'];
    $Absent_Date = $_POST['Absent_Date'];
    $Punch_In_Time = $_POST['Punch_In_Time'];
    $Punch_Out_Time = $_POST['Punch_Out_Time'];
    $Reporting_Officer = $_POST['Reporting_Officer'];

    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO regularization (username, Employee_id, Shift, Date_of_Joining, Absent_Date, Punch_In_Time, Punch_Out_Time, reporting_officer) VALUES ('$Employee_Name','$Employee_id','$Shift','$Date_of_Joining','$Absent_Date','$Punch_In_Time','$Punch_Out_Time','$Reporting_Officer')";

    if (mysqli_query($conn, $sql)) {
        // echo "new record created";
    } else {
        echo "Error" . $sql . "<br>" . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Regularization</title>
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
            margin: 120px auto;
            /* Centering the container using auto margins */
            position: relative;
            display: flex;
            flex-wrap: wrap;
        }

        .form-container,
        .overlay-container {
            width: calc(50% - 5px);
            /* Adjusted width */
            padding: 0 10px;
            /* Added padding */
            box-sizing: border-box;
            /* Ensure padding is included in the width */
        }

        h1 {
            text-align: center;
            width: 100%;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            width: calc(100% - 10px);
            /* Adjusted width and added margin between forms */
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 8px;
            font-size: 14px;
        }

        input,
        select {
            display: flex;
            flew-wrap: wrap;
            padding-bottom: 30px;
            padding: 8px;
            padding-right: 120px;
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
            width: calc(50% - 12px);
            /* Adjusted width */
            padding: 10px 0;
            margin: 0 auto;
            /* Center the button */
            display: block;
            /* Ensure it's a block-level element */
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (min-width: 768px) {
            .right-column {
                width: calc(50% - 10px);
            }
        }

        .reason-input {
            /* Added style for reason input */
            width: calc(100% - 30px);
            /* Adjusted width */
            height: 70px;
            /* Increased height */
            resize: vertical;
            /* Allow vertical resizing */
        }

        .submit-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 20px;
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
            <h1>Attendance Regularization Form</h1>
            <div class="form-container sign-in-container">
                <label for="employee_name">Employee Name:</label>
                <input type="text" id="username" name="username" required>

                <label for="employee_id">Employee ID:</label>
                <input type="text" id="Employee_id" name="Employee_id" required>

                <label for="shift">Shift:</label>
                <select id="Shift" name="Shift" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>

                <label for="date_of_joining">Date of Joining:</label>
                <input type="date" id="Date_of_Joining" name="Date_of_Joining" required>

            </div>

            <div class="overlay-container">

                <label for="absent_date"> Absent Date:</label>
                <select id="Absent_Date" name="Absent_Date" required>
                    <!-- Options will be populated dynamically -->
                    <option value="">Select Absent Date</option>
                    <?php
// Check if the logged-in Employee_id matches with the attendance table Employee_id where Day_Status is 'Absent'
$sql = "SELECT DISTINCT DATE_FORMAT(Date, '%d-%m-%Y') AS Absent_Date FROM attendance WHERE Employee_id = '{$_SESSION['user']}' AND Day_Status = 'Absent'";
$result = mysqli_query($conn, $sql);

// Check if there are any absent dates
if (mysqli_num_rows($result) > 0) {
    // Loop through each row of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Output an option element for each absent date
        echo '<option value="' . $row['Absent_Date'] . '">' . $row['Absent_Date'] . '</option>';
    }
} else {
    // No absent dates found
    echo '<option value="">No absent dates found</option>';
}
?>

                </select>

                <label for="punch_in">Punch In Time:</label>
                <input type="time" id="Punch_In_Time" name="Punch_In_Time" required>

                <label for="punch_out">Punch Out Time:</label>
                <input type="time" id="Punch_Out_Time" name="Punch_Out_Time" required>

                <label for="reporting_officer">Reporting Officer:</label>
                <select id="Reporting_Officer" name="Reporting_Officer" required>
                    <option value="officer1">Officer 1</option>
                    <option value="officer2">Officer 2</option>
                    <option value="officer3">Officer 3</option>
                </select>

            </div>
            <input type="Submit" value="Submit" name="Submit" class="Submit-button">
        </div>
    </form>


    <script>
        function showNotification() {
            alert("Attendance Regularization Form Submitted");
        }

        function openPage(url) {
            window.open(url, '_blank');
        }

        // Function to populate absent dates dropdown with example dates
        function populateAbsentDates() {
            var select = document.getElementById("Absent_Date");
            // Check if the dropdown is already populated
            if (select.options.length === 1) {
                // Dropdown is empty, populate it
                <?php
                include("connection.php");
                // Retrieve absent dates from the attendance table where Employee_id matches with the logged-in Employee_id
                $sql = "SELECT DISTINCT DATE_FORMAT(Date, '%d-%m-%Y') AS Absent_Date FROM attendance WHERE Employee_id = '$Employee_id' AND Day_Status = 'Absent'";
                $result = mysqli_query($conn, $sql);
                // Check if there are any absent dates
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row of the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Output an option element for each absent date
                        echo 'var option = document.createElement("option");';
                        echo 'option.text = "' . $row['Absent_Date'] . '";';
                        echo 'option.value = "' . $row['Absent_Date'] . '";';
                        echo 'select.appendChild(option);';
                    }
                } else {
                    // No absent dates found
                    echo 'var option = document.createElement("option");';
                    echo 'option.text = "No absent dates found";';
                    echo 'option.value = "";';
                    echo 'select.appendChild(option);';
                }
                ?>
            }
        }

        // Call the function when the page loads
        window.onload = function () {
            populateAbsentDates();
        };
    </script>
</body>

</html>
