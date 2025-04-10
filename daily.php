<?php
include ("fetch_attendance.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance Data</title>
<style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

  * {
    box-sizing: border-box;
  }

  body {
    background: linear-gradient(to bottom right, #3498db, #ffff);
    height: 100vh;
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    overflow: hidden;
  }

  .container {
    width: 90%;
    margin: 20px auto;
    margin-top: 120px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
    max-height: calc(100vh - 140px);
  }

  h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th, td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
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
<?php include("navigation1.html"); ?>
<!-- Logo and Navigation Bar -->
<!-- Include your logo and navigation bar code here -->
<div class="logo-container">
  <a href="home.html">
    <img src="Hyundai_Wia_logo.png" alt="Logo" class="logo">
  </a>
</div>
<!-- Logo and Navigation Bar -->
<!-- Include your logo and navigation bar code here -->

<div class="container">
  <h1>Daily Attendance Data</h1>

  <!-- Month Selection Dropdown -->
  <label for="monthSelect">Select Month:</label>
  <select id="monthSelect">
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
    <!-- Add more options for other months -->
  </select>

  <!-- Attendance Data Table -->
  <table id="attendanceTable">
    <thead>
      <tr>
        <th>Date</th>
        <th>Day</th>
        <th>Shift</th>
        <th>First Section</th>
        <th>Second Section</th>
        <th>Day Status</th>
        <th>In Time</th>
        <th>Out Time</th>
        <th>Total Hours</th>
        <th>Late In</th>
        <th>Over Time</th>
      </tr>
    </thead>
    <tbody id="attendanceBody">
      <!-- Attendance data rows will be dynamically generated here -->
    </tbody>
  </table>
</div>

<!-- Include your JavaScript code here -->
<script>
 document.addEventListener('DOMContentLoaded', function() {
  const monthSelect = document.getElementById('monthSelect');
  const attendanceBody = document.getElementById('attendanceBody');

  monthSelect.addEventListener('change', function() {
    const selectedMonth = this.value;
    const daysInMonth = new Date(new Date().getFullYear(), selectedMonth, 0).getDate();
    attendanceBody.innerHTML = ''; // Clear previous data

    for (let day = 1; day <= daysInMonth; day++) {
      const date = new Date(`${new Date().getFullYear()}-${selectedMonth}-${day}`);
      const formattedDate = date.toISOString().slice(0, 10);
      const formattedDay = date.toLocaleString('en-us', { weekday: 'long' });

      const newRow = `
        <tr>
          <td>${formattedDate}</td>
          <td>${formattedDay}</td>
          <td>No Data</td>
          <td>No Data</td>
          <td>No Data</td>
          <td>No Data</td>
          <td>No Data</td>
          <td>No Data</td>
          <td>No Data</td>
          <td>No Data</td>
          <td>No Data</td>
        </tr>
      `;
      attendanceBody.insertAdjacentHTML('beforeend', newRow);

      // AJAX request to fetch data for each date
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          const rowData = JSON.parse(this.responseText);

          if (rowData !== ".") {
            const row = attendanceBody.querySelector(`tr:nth-child(${day})`);
            row.innerHTML = `
              <td>${formattedDate}</td>
              <td>${formattedDay}</td>
              <td>${rowData['Shift']}</td>
              <td>${rowData['First_Section']}</td>
              <td>${rowData['Second_Section']}</td>
              <td>${rowData['Day_Status']}</td>
              <td>${rowData['In_Time']}</td>
              <td>${rowData['Out_Time']}</td>
              <td>${rowData['Total_Hours']}</td>
              <td>${rowData['Late_In']}</td>
              <td>${rowData['Early_Out']}</td>
            `;
          }
        }
      };
      xhr.open('GET', `fetch_attendance.php?date=${formattedDate}`, true);
      xhr.send();
    }
  });
});
</script>

</body>
</html>
