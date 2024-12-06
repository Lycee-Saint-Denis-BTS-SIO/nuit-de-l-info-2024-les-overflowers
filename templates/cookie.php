<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clicker Game</title>
  <link href="CSS/styles.css" rel="stylesheet">
</head>
<body>

  <h1 id="title_cooker" >Clicker Game</h1>
  <p>Euro: <span id="money">0</span></p>

  <div id="clickerContainer">
    <img src="templates/logoNuitdelInfo.jpg" alt="Cookie" id="cookie" onclick="clickCookie()">
  </div>

  <div id="shopContainer">
    <h2>Shop</h2>
    <p>Argent par Click: <span id="mpc">1</span></p>
    <button onclick="upgradeMPC()">Améliorer le Prix par click (Prix: <span id="mpcCost">10</span> euro)</button>
    <p>Argent par Seconde: <span id="mps">0</span></p>
    <button onclick="buyMPS()">Achat de MPS (Cost: <span id="mpsCost">50</span> money)</button>
    <br><br>
    <button onclick="resetClicker()">Reset</button>
  </div>
  <script src="JS/interraction.js"></script>
</body>
</html>
