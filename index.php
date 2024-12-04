<!DOCTYPE html>
<html lang="hu">
<head>
<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("location: bejelentkezes.php");
    exit();
}
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTA V oldal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header_block">
        <img src="./media/grand-theft-auto-v-heade.png" alt="Header image" style="width: 100%; height: auto;">
        <div class="welcome-message">
        <?php
        if (isset($_SESSION["username"])) {
            echo "Üdvözöljük, " . htmlspecialchars($_SESSION["username"]) . "!";
        }
        ?>
    </div>
    </header>

    <nav>
        <div class="auth-buttons">
            <a href="galeria.php" class="bal">Galéria</a>
            <a href="kijelentkezes.php" class="jobb">Kijelentkezés</a>
        </div>
    </nav>

    <section class="main-content">
        <div class="content">
            <div class="text-side">
                <h1>Grand Theft Auto V</h1>
                <b>A Grand Theft Auto V egy akció-kaland játék, amelyben három főszereplőt – Michaelt, Trevort és Franklint – irányíthatjuk. Ők különféle rablásokat hajtanak végre a kormány ügynökségének nyomására. A történet Los Santos városában játszódik, és szabadon felfedezhető nyílt világot kínál, tele küldetésekkel és melléktevékenységekkel.</b>
            </div>
            <div class="image-side">
                <img src="./media/gtav.png" alt="GTA V kép">
            </div>
        </div>

        <div class="video">
            <h2>Hivatalos előzetes</h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/QkkoHAzjnUs" 
                    title="GTA V Trailer" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
        </div>
    </section>

    <footer>
        <p>Kapcsolat: <a href="mailto:tamogatas@gta.com">tamogatas@gta.com</a></p>
        <p>Telefon: +1-800-GTA-TAMOGATAS</p>
    </footer>

</body>
</html>
