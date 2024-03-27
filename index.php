<?php
session_start();

if (isset($_POST['login'])) {
    $servername = "localhost";
    $db_username = "cerny3a2";
    $db_password = "Jasne";
    $dbname = "cerny3a2";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
    } else {
        $sql = "SELECT id, password FROM t_user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $hashed_password = $row['password'];

            // Porovnajte heslá
            if (password_verify($password, $hashed_password)) {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $username;

                header("Location: welcome.php", true, 301);
                exit();
            } else {
                echo "Wrong password";
            }
        } else {
            echo "Wrong username";
        }
    }

    $stmt->close();
    $conn->close();
}

include_once('header.php');
?>

<div class="login-container">
    <h2>Prihlásenie</h2>
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>
    <p>Nemáte ešte účet? <a href="register.php">Zaregistrujte sa tu</a></p>
</div>

<?php
include_once('footer.php');
?>




