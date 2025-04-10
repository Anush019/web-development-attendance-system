<?php
include('fetch_attendance1.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Attendance</title>
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

  * {
    box-sizing: border-box;
  }
  /* General styles */
  body {
    /* font-family: Arial, sans-serif; */
    background: linear-gradient(to bottom right, #3498db, #ffff);
    height: 100vh;
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    /* overflow: hidden; */
  }

  .logo-container {
    position: absolute;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 999;
  }

  .logo {
    width: 200px;
    height: auto;
  }

  .container {
    width: 70%;
    margin: 100px auto 20px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    padding-bottom: 20px;
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  /* Calendar styles */
  .calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 10px;
    margin-top: 20px;
  }

  .calendar-cell {
    width: 140px;
    height: 90px;
    line-height: 40px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .present {
    background-color: #00ff00; /* Green for present */
    color: #fff; /* White text */
  }

  .absent {
    background-color: #ff0000; /* Red for absent */
    color: #fff; /* White text */
  }

  .no-data {
    background-color: #cccccc; /* Grey for no data */
  }
</style>
</head>
<body>
<?php include("navigation1.html"); ?>
<div class="logo-container">
  <a href="home.php">
    <img src="Hyundai_Wia_logo.png" alt="Logo" class="logo">
  </a>
</div>
<div class="container">
  <h1>Monthly Attendance</h1>
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
  </select>
  <div class="calendar"></div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const monthSelect = document.getElementById('monthSelect');
    const calendar = document.querySelector('.calendar');

    monthSelect.addEventListener('change', function() {
      const selectedMonth = this.value;
      const daysInMonth = new Date(new Date().getFullYear(), selectedMonth, 0).getDate();
      calendar.innerHTML = ''; // Clear previous calendar

      for (let day = 1; day <= daysInMonth; day++) {
        const cell = document.createElement('div');
        cell.classList.add('calendar-cell');
        cell.textContent = day;
        calendar.appendChild(cell);

        const date = new Date(`${new Date().getFullYear()}-${selectedMonth}-${day}`);
        const formattedDate = date.toISOString().slice(0, 10);

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            const dayStatus = this.responseText.trim();
            if (dayStatus === 'Present') {
              cell.classList.add('present');
            } else if (dayStatus === 'Absent') {
              cell.classList.add('absent');
            } else {
              cell.classList.add('no-data');
            }
          }
        };
        xhr.open('GET', `fetch_attendance1.php?date=${date.getFullYear()}-${('0' + (date.getMonth() + 1)).slice(-2)}-${('0' + day).slice(-2)}`, true);
        xhr.send();
      }
    });
  });
</script>
</body>
</html>