<?php 
include 'navigation/nav.php'

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Ocean Background</title>
<link rel="stylesheet" href="index.css">  
  <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/pictorial.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


        <script src="index.js"></script>
</head>
<body>


    <div class="ocean-container">
        <!-- Light effect -->
        <div class="light-rays"></div>
        
        <!-- Bubbles -->
        <div class="bubbles">
            <div class="bubble"></div>           
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            

        </div>
        
        

        <!-- Aquatic Elements -->
        <div class="fish fish1"></div>
        <div class="fish fish2"></div>
        <div class="starfish"></div>

        <div class="card-container">
    <div class="card">
        <div class="card-inner">
            <div class="card-front">
                <img src="images/imgFond.jpg" alt="" srcset="">
            </div>
            <div class="card-back">
                <a href="#animated-text""><p>L'océan est la source de vie. Apprenez-en plus sur son rôle crucial pour la planète.</p></a>
            </div>
        </div>
    </div>

    

    <div class="card">
        <div class="card-inner">
            <div class="card-front">
                <img src="images/imgOcean.jpg" alt="" srcset="">
            </div>
            <div class="card-back">
               <a href="#animated-text2"> <p>
                    Les pôles océaniques sont comme les extrémités du corps humain : ils régulent l’équilibre global. 
                    Ces zones critiques influencent les courants, les températures et la biodiversité, tout comme les mains et pieds influencent la température corporelle et l’équilibre.
                </p>   </a>         
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-inner">
            <div class="card-front">
                <img src="./images/imgHumain.jpg" alt="" srcset="">
            </div>
            <div class="card-back">
                <a href="#container"><p>Les similitudes entre l'océan et le corps humain sur des thèmes tels que le stockage de chaleur, l'équilibre chimique, ou la répartition de l'eau.</p></a>
            </div>
        </div>
        
    </div>
    
</div>
    </div>
      

        
    </div>


    <div class="animated-text" id="animated-text">
    <h2>L'océan : le cœur battant de notre planète</h2>
    <div class="text-lines">
        <p class="line" id="firstLine">Comme un corps humain, l'océan respire, produit de l'énergie, et régule la température.</p>
        <p class="line">Il absorbe <span class="highlight">50% de l'oxygène</span> produit sur Terre, tout comme les poumons du corps humain.</p>
        <p class="line">Ses courants marins distribuent la chaleur, un peu comme le <span class="highlight">cœur</span> qui pompe le sang.</p>
        <p class="line">Mais sous la pression des <span class="highlight">activités humaines</span>, il s'affaiblit.</p>
        <p class="line">La montée des eaux, l'acidification et la perte de biodiversité menacent son équilibre fragile.</p>
    </div>
    </div>

    <div class="animated-text" id="animated-text2">

        <div class="text-lines">
        <h2>Les Extrémités du Corps Humain et les Pôles Océaniques : <br> Une Comparaison Essentielle</h2>
        <p class="line">Les pôles océaniques sont comme les extrémités du corps humain : <br>$ils régulent l’équilibre global. Ces zones critiques influencent les courants, les températures et la biodiversité, <br>tout comme les mains et pieds influencent la température corporelle et l’équilibre.</p>
        </div>

    </div>

    <figure class="highcharts-figure">
            <div id="container"></div>
            
        </figure>

        <footer>
    <div class="footer-content">
        <!-- Seaweeds -->
        <div class="seaweed seaweed1"></div>
        <div class="seaweed seaweed2"></div>
        <div class="seaweed seaweed3"></div>
        <div class="seaweed seaweed4"></div>
        <div class="seaweed seaweed5"></div>

        <img id="lyrecoLogo" src="https://upload.wikimedia.org/wikipedia/commons/2/22/Lyreco_Logotype_RGB_positive.png" alt="Lyreco" width="25" height="25">
 
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
 
    <script>
        function randomPosition() {
            const logo = document.getElementById('lyrecoLogo');
            const maxWidth = window.innerWidth - logo.offsetWidth;
            const maxHeight = window.innerHeight - logo.offsetHeight;
 
            const randomLeft = Math.random() * maxWidth;
            const randomTop = Math.random() * maxHeight;
 
            logo.style.left = `${randomLeft}px`;
            logo.style.top = `${randomTop}px`;
        }
 
        function onLogoClick() {
            confetti({
                particleCount: 200,
                spread: 90,
                origin: { x: 0.5, y: 0.5 }
            });
 
            const fish = document.createElement('div');
            fish.classList.add('fish');
 
            const maxWidth = window.innerWidth - fish.offsetWidth;
            const maxHeight = window.innerHeight - fish.offsetHeight;
            const randomLeft = Math.random() * maxWidth;
            const randomTop = Math.random() * maxHeight;
 
            fish.style.left = `${randomLeft}px`;
            fish.style.top = `${randomTop}px`;
 
            document.body.appendChild(fish);
 
            setTimeout(() => {
                fish.style.display = 'block';
            }, 100);
 
            randomPosition();
        }
 
        window.onload = function() {
            randomPosition();
 
            document.getElementById('lyrecoLogo').addEventListener('click', onLogoClick);
        };
 
        window.onresize = function() {
            randomPosition();
        };
    </script>

    </div>
</footer>

</body>
</html>
