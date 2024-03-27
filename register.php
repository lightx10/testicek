<?php

$error = " ";
if (isset($_POST['register'])) {
    $servername = "localhost";
    $username = "cerny3a2";
    $password = "Jasne";
    $dbname = "cerny3a2";
 
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
echo 1;
    $input_username = $_POST['username'];
    $input_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $input_email = $_POST['email'];

    $check_username_sql = "SELECT * FROM t_user WHERE username='$input_username'";
    $result = $conn->query($check_username_sql);
    $check_email_sql = "SELECT * FROM t_user WHERE email='$input_email'";
    $result2 = $conn->query($check_email_sql);
echo 2;
    if ($result->num_rows > 0) {
        $error = "Username already exists. Please choose a different username."; echo 3;
    } else {
      if($result2->num_rows > 0){
        $error = "E-mail already in use"; echo 4;
      }
      else{ echo 5;
        $insert_sql = "INSERT INTO t_user (username, password, email) VALUES ('$input_username', '$input_password', '$input_email')";
echo 6;
        if ($conn->query($insert_sql) === TRUE) {
            $error = "New login created";
        } else {
            $error = "User already exists";//"Error: " . $insert_sql . "<br>" . $conn->error;
        }
      }
    }

    $conn->close();
}

include_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Screen</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <div class="register-container">
        <h2>Registracia</h2>
        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Meno" required autofocus>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Heslo" required>
            <input type="password" name="confirm_password" placeholder="Potvrdte heslo" required>
            <p><?php echo $error; ?></p>
            <input type="submit" name="register" value="Zaregistrovat">
        </form>
        <p>Už máte účet? <a href="index.php">Prihláste sa tu</a></p>
    </div>
</body>
</html>

<?php
include_once('footer.php');

?>

