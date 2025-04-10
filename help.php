<?php
session_start();
// if (!isset($_SESSION['user'])) {
//     header("Location: index.php");
//     exit();
// }


// $username = $_SESSION['user'];

// $sql = "SELECT user_type FROM personal_info WHERE Employee_id = '$username'";
// $result = mysqli_query($conn, $sql);

// if (!$result) {
//     // Query execution failed, show error message
//     echo "Error: " . mysqli_error($conn);
// } else {
//     // Fetch user information and user type
//     $row = mysqli_fetch_assoc($result);
//     $userType = $row['user_type']; // Assuming 'User_type' is the column name
// }

// // Determine which navigation file to include based on user type
// $navigationFile = ($userType === 'Admin') ? "navigation1.html" : "navigation.html";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About</title>
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
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 120px;
    padding-bottom: 50px;
    position: relative;
  }

  h1 {
    text-align: center;
    width: 100%;
    font-size: 30px;
    margin-bottom: 20px;
  }

  section {
    justify-content: center;
    text-align: center;
    width: 100%;
  }

  p {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
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
    <div class="logo-container">
  <a href="home.php">
    <img src="Hyundai_Wia_logo.png" alt="Logo" class="logo">
  </a>
</div>
 

<div class="container">
  <h1>Help</h1>
  <section>
    <p>If you need any assistance or have any questions, please feel free to contact us.</p>
    <p>Email: dhanushhariharan173@gmail.com</p>
    <p>Phone: 8608607599</p>
    <p>Email: kumaranush712@gmail.com</p>
    <p>Phone: 8248766850</p>
    
  </section>
  <h1>About Us</h1>
  <section>
    <p>We are committed to helping you manage your attendance efficiently. Our platform provides tools for attendance regularization and tracking.</p>
    <p>Feel free to reach out to us if you have any questions or feedback!</p>
  </section>
</div>

</body>
</html>
