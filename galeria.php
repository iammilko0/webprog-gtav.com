<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GTA V galéria</title>
        <link rel="stylesheet" href="style.css">
    </head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>
<link rel="stylesheet" href="galeria.css">
<body>
    <header class="header_block">
        <img src="./media/grand-theft-auto-v-heade.png" alt="Header image" style="width: 100%; height: auto;">
    </header>

    <nav>
        <div class="auth-buttons">
            <a href="index.php" class="bal">Főoldal</a>
        </div>
    </nav>

<div class="w3-content w3-display-container" style="max-width:800px">
  <img class="mySlides" src="./media/img.jpg" style="width:100%">
  <img class="mySlides" src="./media/img2.jpg" style="width:100%">
  <img class="mySlides" src="./media/img3.jpg" style="width:100%">
  <img class="mySlides" src="./media/img4.jpg" style="width:100%">
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>

<footer>
    <p>Kapcsolat: <a href="mailto:tamogatas@gta.com">tamogatas@gta.com</a></p>
    <p>Telefon: +1-800-GTA-TAMOGATAS</p>
</footer>

</body>
</html> 
