let money = 0;
let mpc = 1;
let mpcCost = 10;
let mps = 0;
let mpsCost = 50;

const moneyDisplay = document.getElementById("money");
const mpcDisplay = document.getElementById("mpc");
const mpcCostDisplay = document.getElementById("mpcCost");
const mpsDisplay = document.getElementById("mps");
const mpsCostDisplay = document.getElementById("mpsCost");

function updateDisplay() {
  moneyDisplay.textContent = money;
  mpcDisplay.textContent = mpc;
  mpcCostDisplay.textContent = mpcCost;
  mpsDisplay.textContent = mps;
  mpsCostDisplay.textContent = mpsCost;
}

function clickCookie() {
  money += mpc; // Augmenter l'argent
  updateDisplay();
}

function upgradeMPC() {
  if (money >= mpcCost) {
    money -= mpcCost;
    mpc++; // Augmenter MPC
    mpcCost *= 2; // Augmenter le coût pour la prochaine amélioration
    updateDisplay();
  } else {
    alert("Pas assez d'argent pour améliorer !");
  }
}

function buyMPS() {
  if (money >= mpsCost) {
    money -= mpsCost;
    mps++; // Augmenter MPS
    mpsCost *= 2; // Augmenter le coût pour le prochain achat
    // Ajouter de l'argent automatiquement chaque seconde
    setInterval(function () {
      money += mps;
      updateDisplay();
    }, 1000);
    updateDisplay();
  } else {
    alert("Pas assez d'argent pour acheter un MPS !");
  }
}

// Réinitialiser le jeu
function resetClicker() {
  // Réinitialiser les valeurs
  money = 0;
  mpc = 1;
  mpcCost = 10;
  mps = 0;
  mpsCost = 50;

  // Supprimer tous les intervals de MPS
  mpsIntervals.forEach(interval => clearInterval(interval));
  mpsIntervals = []; // Vider le tableau des intervals

  // Mettre à jour les affichages
  updateDisplay();
  alert("Clicker reset !");
}

updateDisplay();

const image = document.getElementById('cookie');
const container = document.getElementById('clickerContainer');
const distance = 200; // Distance minimale de "fuite"
let nbDeplacement = 0;
let nbIteration = 0;

document.addEventListener('mousemove', (event) => {
  const mouseX = event.clientX;
  const mouseY = event.clientY;

  // Obtenir la position actuelle de l'image
  const rect = image.getBoundingClientRect();
  const imgX = rect.left + rect.width / 2;
  const imgY = rect.top + rect.height / 2;

  // Calculer la distance entre la souris et le centre de l'image
  const deltaX = mouseX - imgX;
  const deltaY = mouseY - imgY;
  const distanceFromMouse = Math.sqrt(deltaX ** 2 + deltaY ** 2);

  // Si la souris est trop proche, déplacer l'image
  if(nbIteration == 0){
    
  }
  if (distanceFromMouse < distance) {
    if (nbDeplacement > 3) {
      setTimeout(() => {
        nbDeplacement = 0; // Réinitialiser le compteur après 1 seconde
      }, 1000);
    } else {
      // Calculer une position aléatoire
      const containerRect = container.getBoundingClientRect();
      const randomX = Math.random() * (containerRect.width - rect.width);
      const randomY = Math.random() * (containerRect.height - rect.height);

      // Appliquer la nouvelle position
      image.style.left = `${randomX}px`;
      image.style.top = `${randomY}px`;
      nbDeplacement++;
    }
  }
});
