<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Database connection parameters
$servername = "sql307.infinityfree.com";
$username = "if0_36166084";
$password = "8810JBnxGE";
$dbname = "if0_36166084_hyundai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the encoded data from the form
$encoded_data = $_POST['encoded_data'];

// Explode the encoded data into separate lines
$lines = explode("\n", $encoded_data);

// Loop through each line and insert/update the database
foreach ($lines as $line) {
    // Split the line into separate fields
    $fields = explode(" ", $line);
    
    // Assuming the format is ID Date Time Action EventID
    $employee_id = substr($fields[0], 13, 4);
    $date = substr($fields[1], 0, 8); // Extract the date part
    $time = substr($fields[1], 8, 4); // Extract the time part
    $action = substr($fields[1], 12, 1);

    // Check if the entry already exists for the employee and date
    $sql_check = "SELECT * FROM test WHERE Employee_id = '$employee_id' AND Date = '$date'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Entry already exists, update the row with out time
        $row = $result_check->fetch_assoc();
        $existing_in_time = $row['In_time'];

        // Determine if it's In time or Out time based on the action code
        if ($action === 'I') {
            // In time data should not overwrite existing data, so skip this entry
            continue;
        } elseif ($action === 'O') {
            // Update the row with out time and calculate total working hours
            $out_time = $time;
            $in_time = $row['In_time'];
            $total_hours = calculateTotalHours($in_time, $out_time);
            $sql_update = "UPDATE test SET Out_time = '$out_time', Total_Hours = '$total_hours' 
                           WHERE Employee_id = '$employee_id' AND Date = '$date'";
            if ($conn->query($sql_update) === TRUE) {
                echo "Existing record updated with Out time and Total working hours successfully<br>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        // Entry doesn't exist, insert a new row
        if ($action === 'I') {
            // Insert data into the attendance table
            $sql_insert = "INSERT INTO test (Employee_id, Date, In_time, Out_time, Total_Hours) 
                           VALUES ('$employee_id', '$date', '$time', NULL, '0')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "New record inserted successfully<br>";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        } else {
            // Invalid action code, skip this entry
            continue;
        }
    }
}

$conn->close();

// Function to calculate total working hours
// Function to calculate total working hours
function calculateTotalHours($in_time, $out_time) {
    $in_time_parts = explode(":", $in_time); // Split in time into hours and minutes
    $out_time_parts = explode(":", $out_time); // Split out time into hours and minutes

    $in_hours = intval($in_time_parts[0]); // Extract hours from in time and convert to integer
    $in_minutes = intval($in_time_parts[1]); // Extract minutes from in time and convert to integer
    $out_hours = intval($out_time_parts[0]); // Extract hours from out time and convert to integer
    $out_minutes = intval($out_time_parts[1]); // Extract minutes from out time and convert to integer

    $total_hours = $out_hours - $in_hours; // Calculate difference in hours
    $total_minutes = $out_minutes - $in_minutes; // Calculate difference in minutes

    if ($total_minutes < 0) {
        // Adjust total hours if minutes are negative
        $total_hours--;
        $total_minutes += 60;
    }

    return $total_hours;
}

?>
