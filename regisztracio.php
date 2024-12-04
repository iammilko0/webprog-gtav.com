<?php
// Session indítása, hogy hibaüzeneteket tárolhassunk
session_start();

include('database.php');

if (isset($_POST["registration"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $errors = array();

    // Email formátum ellenőrzése
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Az email címe nem helyes!");
    }

    // Jelszó hossz ellenőrzése
    if (strlen($password1) < 8) {
        array_push($errors, "A jelszónak legalább 8 karakternek kell lennie!");
    }

    // Jelszavak összehasonlítása
    if ($password1 !== $password2) {
        array_push($errors, "A jelszavak nem egyeznek!");
    }

    // Ha nincsenek hibák
    if (count($errors) == 0) {
        // Jelszó titkosítása
        $passwordhash = password_hash($password1, PASSWORD_DEFAULT);

        // Paraméterezett SQL lekérdezés használata
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $passwordhash);

        // Lekérdezés végrehajtása
        if ($stmt->execute()) {
            // Átirányítás a bejelentkezés oldalra
            header('Location: bejelentkezes.php');
            exit();
        } else {
            // Hibaüzenet, ha nem sikerül az adatbázisba mentés
            echo "Hiba a regisztráció során: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Hibák megjelenítése
        $_SESSION['errors'] = $errors;  // Hibák tárolása a session-ben
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-page">
        <h2>Regisztráció</h2>

        <!-- Hibák kiírása -->
        <?php
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
            unset($_SESSION['errors']); // Hibák törlése session-ből
        }
        ?>

        <form action="regisztracio.php" method="POST">
            <input type="text" name="username" placeholder="Felhasználónév" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
            <input type="password" name="password1" placeholder="Jelszó" required>
            <input type="password" name="password2" placeholder="Jelszó megerősítése" required>
            <input type="submit" name="registration" value="Regisztráció">
            <p style="color: white;">
                Ha már regisztrált <a href="bejelentkezes.php" style="color: rgb(79, 34, 163);">jelentkezzen be!</a>
            </p>
        </form>
    </div>
</body>
</html>
