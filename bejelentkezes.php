<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-page">
        <?php 
        session_start();
        include 'database.php';

        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $query = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                header('Location: index.php');
                exit();
            } else {
                echo "<div class='alert alert-danger' role='alert'> Hibás felhasználónév vagy jelszó </div>";
            }
        }
        ?>
        <h2>Bejelentkezés</h2>
        <form action="bejelentkezes.php" method="POST">
            <input type="text" name="username" placeholder="Felhasználónév">
            <input type="password" name="password" placeholder="Jelszó">
            <input type="submit" name="login" value="Bejelentkezés">
            <p style="color: white;">
                Ha még nincs fiókja <a href="regisztracio.php" style="color: rgb(79, 34, 163);">regisztráljon!</a>
            </p>
        </form>
    </div>
</body>
</html>
