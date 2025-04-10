<?php
// Include the database connection file
include "connection.php";

// Check if the clear button is clicked
if(isset($_POST['clear'])) {
    // Delete compoff requests from the database
    $clearCompoffSql = "DELETE FROM compoff";
    mysqli_query($conn, $clearCompoffSql);

    // Delete leave requests from the database
    $clearLeaveSql = "DELETE FROM request";
    mysqli_query($conn, $clearLeaveSql);

    // Delete leave requests from the database
    $clearregularizationSql = "DELETE FROM regularization";
    mysqli_query($conn, $clearregularizationSql);

    // Reload the page to reflect the changes
    echo "<meta http-equiv='refresh' content='0'>";
    exit();
}
// Check if the accept button is clicked
if(isset($_POST['accept'])) {
    // Get the request ID from the POST data
    $request_id = $_POST['request_id'];

    // Update the status of the request to "Accepted" in the database
    $sql = "UPDATE request SET status = 'Accepted' WHERE id = $request_id";
    mysqli_query($conn, $sql);

    // You can optionally perform additional actions here, such as sending notifications or updating UI
}

// Check if the reject button is clicked
if(isset($_POST['reject'])) {
    // Get the request ID from the POST data
    $request_id = $_POST['request_id'];

    // Update the status of the request to "Rejected" in the database
    $sql = "UPDATE request SET status = 'Rejected' WHERE id = $request_id";
    mysqli_query($conn, $sql);

    // You can optionally perform additional actions here, such as sending notifications or updating UI
}
// Check if the accept button is clicked
if(isset($_POST['accept'])) {
    // Handle the logic for accepting requests here
    // For now, let's just display a message
    echo "Accept button clicked, but data is not accepted.";
}

// Retrieve compoff requests from the database
$compoffSql = "SELECT c_id, Created_at, Employee_id, username, Shift, Date_of_Joining, No_of_days, leave_from, leave_to, reporting_officer, status FROM compoff";
$compoffResult = mysqli_query($conn, $compoffSql);

// Retrieve leave requests from the database
$leaveSql = "SELECT r_id, Created_at, Employee_id, username, Shift, Date_of_Joining, No_of_days, leave_from, leave_to, reporting_officer, reason, status FROM request";
$leaveResult = mysqli_query($conn, $leaveSql);

// Retrieve leave requests from the database
$regularizationSql = "SELECT a_id, Created_at, Employee_id, username, Shift, Date_of_Joining, Absent_Date,Punch_In_Time, Punch_Out_Time, reporting_officer, status FROM regularization";
$regularizationResult = mysqli_query($conn, $regularizationSql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <!-- My CSS -->
  <link rel="stylesheet" href="style.css">

  <title>Admin</title>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');


    /* @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap'); */

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

a {
  text-decoration: none;
}

li {
  list-style: none;
}

:root {
   font-family: 'Montserrat', sans-serif;
  --lato: 'Lato', sans-serif;

  --light: #F9F9F9;
  --blue: #3C91E6;
  --light-blue: #CFE8FF;
  --grey: #eee;
  --dark-grey: #AAAAAA;
  --dark: #342E37;
  --red: #DB504A;
  --yellow: #FFCE26;
  --light-yellow: #FFF2C6;
  --orange: #FD7238;
  --light-orange: #FFE0D3;
}

html {
  overflow-x: hidden;
}

body.dark {
  --light: #0C0C1E;
  --grey: #060714;
  --dark: #FBFBFB;
}

body {

  background: linear-gradient(to bottom right, #3498db, #ffff);
  overflow-x: hidden;
  padding-top: 120px; /* Adjust this value as needed */
  height: 100vh;
}


/* SIDEBAR */
#sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 280px;
  height: 100%;
  background: var(--light);
  z-index: 2000;
  font-family: var(--lato);
  transition: .3s ease;
  overflow-x: hidden;
  scrollbar-width: none;
}
#sidebar::--webkit-scrollbar {
  display: none;
}
#sidebar.hide {
  width: 60px;
}
#sidebar .brand {
  font-size: 24px;
  font-weight: 700;
  height: 56px;
  display: flex;
  align-items: center;
  color: var(--blue);
  position: sticky;
  top: 0;
  left: 0;
  background: var(--light);
  z-index: 500;
  padding-bottom: 20px;
  box-sizing: content-box;
}
#sidebar .brand .bx {
  min-width: 60px;
  display: flex;
  justify-content: center;
}
#sidebar .side-menu {
  width: 100%;
  margin-top: 48px;
}
#sidebar .side-menu li {
  height: 48px;
  background: transparent;
  margin-left: 6px;
  border-radius: 48px 0 0 48px;
  padding: 4px;
}
#sidebar .side-menu li.active {
  background: var(--grey);
  position: relative;
}
#sidebar .side-menu li.active::before {
  content: '';
  position: absolute;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  top: -40px;
  right: 0;
  box-shadow: 20px 20px 0 var(--grey);
  z-index: -1;
}
#sidebar .side-menu li.active::after {
  content: '';
  position: absolute;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  bottom: -40px;
  right: 0;
  box-shadow: 20px -20px 0 var(--grey);
  z-index: -1;
}
#sidebar .side-menu li a {
  width: 100%;
  height: 100%;
  background: var(--light);
  display: flex;
  align-items: center;
  border-radius: 48px;
  font-size: 16px;
  color: var(--dark);
  white-space: nowrap;
  overflow-x: hidden;
}
#sidebar .side-menu.top li.active a {
  color: var(--blue);
}
#sidebar.hide .side-menu li a {
  width: calc(48px - (4px * 2));
  transition: width .3s ease;
}
#sidebar .side-menu li a.logout {
  color: var(--red);
}
#sidebar .side-menu.top li a:hover {
  color: var(--blue);
}
#sidebar .side-menu li a .bx {
  min-width: calc(60px  - ((4px + 6px) * 2));
  display: flex;
  justify-content: center;
}
/* SIDEBAR */





/* CONTENT */
#content {
  position: relative;
  width: 80%;
  left: 160px;
  right:10px;
  transition: .3s ease;
  z-index: 990;
}
#sidebar.hide ~ #content {
  width: calc(100% - 60px);
  left: 60px;
}




/*/* NAVBAR */
#content nav {
  height: 56px;
  background: var(--light);
  padding: 0 24px;
  display: flex;
  align-items: center;
  grid-gap: 24px;
  font-family: var(--lato);
  position: sticky;
  top: 0;
  left: 0;
  z-index: 1000;
}
#content nav::before {
  content: '';
  position: absolute;
  width: 40px;
  height: 40px;
  bottom: -40px;
  left: 0;
  border-radius: 50%;
  box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
  color: var(--dark);
}
#content nav .bx.bx-menu {
  cursor: pointer;
  color: var(--dark);
}
#content nav .nav-link {
  font-size: 16px;
  transition: .3s ease;
}
#content nav .nav-link:hover {
  color: var(--blue);
}
#content nav form {
  max-width: 400px;
  width: 100%;
  margin-right: auto;
}
#content nav form .form-input {
  display: flex;
  align-items: center;
  height: 36px;
}
#content nav form .form-input input {
  flex-grow: 1;
  padding: 0 16px;
  height: 100%;
  border: none;
  background: var(--grey);
  border-radius: 36px 0 0 36px;
  outline: none;
  width: 100%;
  color: var(--dark);
}
#content nav form .form-input button {
  width: 36px;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background: var(--blue);
  color: var(--light);
  font-size: 18px;
  border: none;
  outline: none;
  border-radius: 0 36px 36px 0;
  cursor: pointer;
}
#content nav .notification {
  font-size: 20px;
  position: relative;
}
#content nav .notification .num {
  position: absolute;
  top: -6px;
  right: -6px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 2px solid var(--light);
  background: var(--red);
  color: var(--light);
  font-weight: 700;
  font-size: 12px;
  display: flex;
  justify-content: center;
  align-items: center;
}
#content nav .profile img {
  width: 36px;
  height: 36px;
  object-fit: cover;
  border-radius: 50%;
}
#content nav .switch-mode {
  display: block;
  min-width: 50px;
  height: 25px;
  border-radius: 25px;
  background: var(--grey);
  cursor: pointer;
  position: relative;
}
#content nav .switch-mode::before {
  content: '';
  position: absolute;
  top: 2px;
  left: 2px;
  bottom: 2px;
  width: calc(25px - 4px);
  background: var(--blue);
  border-radius: 50%;
  transition: all .3s ease;
}
#content nav #switch-mode:checked + .switch-mode::before {
  left: calc(100% - (25px - 4px) - 2px);
}
/* NAVBAR */*/
<img src=""C:\Users\kumar\OneDrive\Desktop\HYUNDAI\WIA logo.png"" alt="Image description">
/* MAIN */
#content main {
  width: 50%;
  margin-top: 100px !important; /* Adjust this value as needed */
  padding: 36px 24px;
  font-family: var(--poppins);
  max-height: calc(100vh - 56px);
  overflow-y: auto;

}
#content main .head-title {
  display: flex;
  align-items: center;
  justify-content: space-between;
  grid-gap: 16px;
  flex-wrap: wrap;
}
#content main .head-title .left h1 {
  font-size: 36px;
  font-weight: 600;
  margin-bottom: 10px;
  color: var(--dark);
}
#content main .head-title .left .breadcrumb {
  display: flex;
  align-items: center;
  grid-gap: 16px;
}
#content main .head-title .left .breadcrumb li {
  color: var(--dark);
}
#content main .head-title .left .breadcrumb li a {
  color: var(--dark-grey);
  pointer-events: none;
}
#content main .head-title .left .breadcrumb li a.active {
  color: var(--blue);
  pointer-events: unset;
}
#content main .head-title .btn-download {
  height: 36px;
  padding: 0 16px;
  border-radius: 36px;
  background: var(--blue);
  color: var(--light);
  display: flex;
  justify-content: center;
  align-items: center;
  grid-gap: 10px;
  font-weight: 500;
}




#content main .box-info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  grid-gap: 24px;
  margin-top: 36px;
}
#content main .box-info li {
  padding: 24px;
  background: var(--light);
  border-radius: 20px;
  display: flex;
  align-items: center;
  grid-gap: 24px;
}
#content main .box-info li .bx {
  width: 80px;
  height: 80px;
  border-radius: 10px;
  font-size: 36px;
  display: flex;
  justify-content: center;
  align-items: center;
}
#content main .box-info li:nth-child(1) .bx {
  background: var(--light-blue);
  color: var(--blue);
}
#content main .box-info li:nth-child(2) .bx {
  background: var(--light-yellow);
  color: var(--yellow);
}
#content main .box-info li:nth-child(3) .bx {
  background: var(--light-orange);
  color: var(--orange);
}
#content main .box-info li .text h3 {
  font-size: 24px;
  font-weight: 600;
  color: var(--dark);
}
#content main .box-info li .text p {
  color: var(--dark); 
}

#content main .table-data {
  display: flex;
  flex-wrap: wrap;
  grid-gap: 24px;
  margin-top: 24px;
  width: 100%;
  color: var(--dark);
}
#content main .table-data > div {
  border-radius: 20px;
  background: var(--light);
  padding: 24px;
  overflow-x: auto;
}
#content main .table-data .head {
  display: flex;
  align-items: center;
  grid-gap: 16px;
  margin-bottom: 24px;
}
#content main .table-data .head h3 {
  margin-right: auto;
  font-size: 24px;
  font-weight: 600;
}
#content main .table-data .head .bx {
  cursor: pointer;
}

#content main .table-data .order {
  flex-grow: 1;
  flex-basis: 500px;
}
#content main .table-data .order table {
  width: 100%;
  border-collapse: collapse;
}
#content main .table-data .order table th {
  padding-bottom: 12px;
  font-size: 13px;
  text-align: left;
  border-bottom: 1px solid var(--grey);
}
#content main .table-data .order table td {
  padding: 16px 0;
}
#content main .table-data .order table tr td:first-child {
  display: flex;
  align-items: center;
  grid-gap: 12px;
  padding-left: 6px;
}
#content main .table-data .order table td img {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  object-fit: cover;
}
#content main .table-data .order table tbody tr:hover {
  background: var(--grey);
}
#content main .table-data .order table tr td .status {
  font-size: 10px;
  padding: 6px 16px;
  color: var(--light);
  border-radius: 20px;
  font-weight: 700;
}
#content main .table-data .order table tr td .status.completed {
  background: var(--blue);
}
#content main .table-data .order table tr td .status.process {
  background: var(--yellow);
}
#content main .table-data .order table tr td .status.pending {
  background: var(--orange);
}

#content main .table-data .todo {
  flex-grow: 1;
  flex-basis: 300px;
}
#content main .table-data .todo .todo-list {
  width: 100%;
}
#content main .table-data .todo .todo-list li {
  width: 100%;
  margin-bottom: 16px;
  background: var(--grey);
  border-radius: 10px;
  padding: 14px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
#content main .table-data .todo .todo-list li .bx {
  cursor: pointer;
}
#content main .table-data .todo .todo-list li.completed {
  border-left: 10px solid var(--blue);
}
#content main .table-data .todo .todo-list li.not-completed {
  border-left: 10px solid var(--orange);
}
#content main .table-data .todo .todo-list li:last-child {
  margin-bottom: 0;
}
/* MAIN */
/* CONTENT */









@media screen and (max-width: 768px) {
  #sidebar {
    width: 200px;
  }

  #content {
    width: 50%;
    left: 200px;
  }

  #content nav .nav-link {
    display: none;
  }
}






@media screen and (max-width: 576px) {
  #content nav form .form-input input {
    display: none;
  }

  #content nav form .form-input button {
    width: auto;
    height: auto;
    background: transparent;
    border-radius: none;
    color: var(--dark);
  }

  #content nav form.show .form-input input {
    display: block;
    width: 100%;
  }
  #content nav form.show .form-input button {
    width: 36px;
    height: 100%;
    border-radius: 0 36px 36px 0;
    color: var(--light);
    background: var(--red);
  }

  #content nav form.show ~ .notification,
  #content nav form.show ~ .profile {
    display: none;
  }

  #content main .box-info {
    grid-template-columns: 1fr;
  }

  #content main .table-data .head {
    min-width: 420px;
  }
  #content main .table-data .order table {
    min-width: 420px;
  }
  #content main .table-data .todo .todo-list {
    min-width: 420px;
  }
}
  .logo-container {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 980;
    margin-top: 20px;
  }

  .logo {
    width: 200px;
    height: auto;
  }
  </style>
  <style>
  /* Styles for action buttons */
  .action-button {
    padding: 5px 10px;
    margin-right: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: white;
  }

  .accept-button {
    background-color: #4CAF50; /* Green */
  }

  .reject-button {
    background-color: #f44336; /* Red */
  }

  /* Styles for status */
  .status {
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
    color: white;
  }

  .status.pending {
    background-color: #FFD700; /* Yellow */
  }

  .status.completed {
    background-color: #4CAF50; /* Green */
  }

  .status.rejected {
    background-color: #f44336; /* Red */
  }

  /* #clearButton {
  position: absolute;
  bottom: 70px; /* Adjust this value to change the distance from the bottom */
  right: 150px; /* Adjust this value to change the distance from the right */
} */

</style>


</head>
<body>
<?php include("navigation1.html"); ?>
<!-- Logo -->
<div class="logo-container">
  <a href="home.php">
    <img src="Hyundai_Wia_logo.png" alt="Logo" class="logo">
  </a>
</div>
 
  <!-- CONTENT -->
  <section id="content">
    

    <!-- MAIN -->
    <main>
  <div class="head-title">
    <div class="left">
      <h1>Dashboard</h1>
    </div>
  </div>

  <ul class="box-info">
  <a href="account.html">
  <li>
    <i class='bx bxs-calendar-check'></i>
    <span class="text">
      <h3>250</h3>
      <p>No.of Working Days</p>
    </span>
  </li>
  </a>
    <li>
      <i class='bx bxs-group'></i>
      <span class="text">
        <h3>1050</h3>
        <p>No.of Workers</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-dollar-circle'></i>
      <span class="text">
        <h3>86%</h3>
        <p>Production Rate</p>
      </span>
    </li>
  </ul>
<form method="post">
  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>Request</h3>
        <input type="submit" name="clear" value="Clear All" id="clearButton" class="action-button" style="background-color: var(--orange);">
      </div>
      <table>
        <thead>
          <tr>
            <th>User</th>
            <th>Date</th>
            <th>Type</th>
            <th>Requested Date</th>
            <th>Status</th>
            <th>Action</th> <!-- Added action column -->
          </tr>
        </thead>
        <tbody>
          <?php
            // Modify the displayRequests function to include accept and reject buttons based on the request type
            function displayRequests($result)
            {
              global $conn; // Access the database connection
            
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)):
          ?>
                  <tr>
                    <td>
                      <img src="user.png">
                      <p>
                        <?php echo isset ($row['username']) ? $row['username'] : ''; ?>
                      </p>
                    </td>
                    <td>
                      <?php echo isset($row['Created_at']) ? date('d-m-Y', strtotime($row['Created_at'])) : ''; ?>
                    </td>
                    <td>
                      <?php
                        if (isset($row['c_id'])) {
                            echo "Comp Off ";
                        } elseif (isset($row['r_id'])) {
                            echo "Leave";
                        } elseif (isset($row['a_id'])) { 
                            echo "Attendance Regularization";
                        } else {
                            echo "unknown";
                        }
                      ?>
                    </td>
                    <td>
                      <?php
                    if (isset($row['c_id'])) {
                        echo isset($row['leave_from']) ? date('d-m-Y', strtotime($row['leave_from'])) : '';
                        echo " to ";
                        echo isset($row['leave_to']) ? date('d-m-Y', strtotime($row['leave_to'])) : '';
                    } elseif (isset($row['r_id'])) {
                        echo isset($row['leave_from']) ? date('d-m-Y', strtotime($row['leave_from'])) : '';
                        echo " to ";
                        echo isset($row['leave_to']) ? date('d-m-Y', strtotime($row['leave_to'])) : '';
                    } elseif (isset($row['a_id'])) {
                        echo isset($row['Absent_Date']) ? date('d-m-Y', strtotime($row['Absent_Date'])) : '';
                    } else {
                        echo "unknown";
                    }
                    ?>
                    </td>
                    <td><span class="status <?php echo isset($row['status']) ? $row['status'] : ''; ?>">
                      <?php echo ucfirst(isset($row['status']) ? $row['status'] : ''); ?>
                      </span></td>

                    <td>
                      <?php
                        // Display accept and reject buttons based on the request type
                        if (isset($row['c_id'])) {
                            echo '<button class="action-button accept-button" onclick="acceptRequest(' . $row['Employee_id'] . ', \'compoff\')">Accept</button>';
                            echo '<button class="action-button reject-button" onclick="rejectRequest(' . $row['Employee_id'] . ', \'compoff\')">Reject</button>';
                        } elseif (isset($row['r_id'])) {
                            echo '<button class="action-button accept-button" onclick="acceptRequest(' . $row['Employee_id'] . ', \'request\')">Accept</button>';
                            echo '<button class="action-button reject-button" onclick="rejectRequest(' . $row['Employee_id'] . ', \'request\')">Reject</button>';
                        } elseif (isset($row['a_id'])) {
                            echo '<button class="action-button accept-button" onclick="acceptRequest(' . $row['Employee_id'] . ', \'regularization\')">Accept</button>';
                            echo '<button class="action-button reject-button" onclick="rejectRequest(' . $row['Employee_id'] . ', \'regularization\')">Reject</button>';
                        }
                      ?>
                    </td>

                  </tr>
          <?php
                endwhile;
              } else {
                //   echo "<tr><td colspan='5'>No requests found</td></tr>";
              }
            }

            // Display compoff requests
            displayRequests($compoffResult);

            // Display leave requests
            displayRequests($leaveResult);

            // Display leave requests
            displayRequests($regularizationResult);
          ?>
        </tbody>
      </table>
    </div>
  </div>
</form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// function clearTable() {
//     // Remove all rows from the table
//     var table = document.querySelector('.table-data table');
//     var tbody = table.querySelector('tbody');
//     tbody.innerHTML = '';

//     // Clear the stored table data in localStorage
//     localStorage.removeItem('tableData');
//   }



  // JavaScript function to set the color of status bubble
  $(document).ready(function() {
    $('.status').each(function() {
      var status = $(this).text().trim().toLowerCase();
      switch (status) {
        case 'pending':
          $(this).css('background-color', '#FFA500'); // Orange
          break;
        case 'accepted':
          $(this).css('background-color', '#4CAF50'); // Green
          break;
        case 'rejected':
          $(this).css('background-color', '#f44336'); // Red
          break;
        default:
          break;
      }
    });
  });
</script>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
// function clearTable() {
//     // Remove all rows from the table
//     var table = document.querySelector('.table-data table');
//     var tbody = table.querySelector('tbody');
//     tbody.innerHTML = '';

//     // Clear the stored table data in localStorage
//     localStorage.removeItem('tableData');
// }

// JavaScript function to accept a request
function acceptRequest(Employee_id, table) {
    // Make an AJAX request to update the status to "Accepted"
    $.ajax({
        url: 'update_status.php',
        type: 'POST',
        data: {
            id: Employee_id,
            status: 'Accepted',
            table: table
        },
        success: function (response) {
            // Handle the response, if needed
            alert('Request with ID ' + Employee_id + ' has been accepted.');
            // You may want to update the UI to reflect the change in status
        },
        error: function (xhr, status, error) {
            // Handle errors, if any
            alert('Error: ' + error);
        }
    });

    // Prevent form submission
    return false;
}

// JavaScript function to reject a request
function rejectRequest(Employee_id, table) {
    // Make an AJAX request to update the status to "Rejected"
    $.ajax({
        url: 'update_status.php',
        type: 'POST',
        data: {
            id: Employee_id,
            status: 'Rejected',
            table: table
        },
        success: function (response) {
            // Handle the response, if needed
            alert('Request with ID ' + Employee_id + ' has been rejected.');
            // You may want to update the UI to reflect the change in status
        },
        error: function (xhr, status, error) {
            // Handle errors, if any
            alert('Error: ' + error);
        }
    });

    // Prevent form submission
    return false;
}

    </script>
    <!-- MAIN -->
  </section>
  <!-- CONTENT -->
  

  <script>
    const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
  const li = item.parentElement;

  item.addEventListener('click', function () {
    allSideMenu.forEach(i=> {
      i.parentElement.classList.remove('active');
    })
    li.classList.add('active');
  })
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
  sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
  if(window.innerWidth < 576) {
    e.preventDefault();
    searchForm.classList.toggle('show');
    if(searchForm.classList.contains('show')) {
      searchButtonIcon.classList.replace('bx-search', 'bx-x');
    } else {
      searchButtonIcon.classList.replace('bx-x', 'bx-search');
    }
  }
})





if(window.innerWidth < 768) {
  sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
  searchButtonIcon.classList.replace('bx-x', 'bx-search');
  searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
  if(this.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
  }
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
  if(this.checked) {
    document.body.classList.add('dark');
  } else {
    document.body.classList.remove('dark');
  }
})
  </script>
</body>
</html>