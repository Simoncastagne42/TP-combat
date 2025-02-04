const attackButton = document.querySelector("#attack");

const heroHp = document.querySelector("#hero-health");
const heroAttack = document.querySelector("#hero-attack");

const monsterHp = document.querySelector("#monster-health");
const monsterAttack = document.querySelector("#monster-attack");

const heroName = document.querySelector("#hero-name");
const monsterName = document.querySelector("#monster-name");

const combatDetails = document.getElementById("combat-details");

attackButton.addEventListener("click", handleAttackClick);

function handleAttackClick() {
  let monsterHpNumber = parseInt(monsterHp.innerText);
  const monsterAttackNumber = parseInt(monsterAttack.innerText);

  let heroHpNumber = parseInt(heroHp.innerText);
  const heroAttackNumber = parseInt(heroAttack.innerText);

  if (heroHpNumber > 0 && monsterHpNumber > 0) {
    // le heros attaque
    monsterHpNumber = monsterHpNumber - heroAttackNumber;

    if (monsterHpNumber <= 0) {
      monsterHp.innerText = 0;
    } else {
      monsterHp.innerText = monsterHpNumber;
    }

    // AFFICHER un message pour le combat
    const message = `
   <strong>  ${
     document.getElementById("hero-name").textContent
   }</strong>  attaque et <strong>inflige ${heroAttackNumber} dégâts !</strong> <br>
    <strong>  ${
      document.getElementById("monster-name").textContent
    }</strong> riposte et <strong> inflige ${monsterAttackNumber} dégâts !</strong>
`
;
    combatDetails.innerHTML += `<p>${message}</p>`;
    // Scroller automatiquement vers le bas
    combatDetails.scrollTop = combatDetails.scrollHeight;
    
  } else {
    displayEndFight(heroHpNumber);
  }

  setTimeout(() => {
    if (heroHpNumber > 0 && monsterHpNumber > 0) {
      // le monstre attaque
      heroHpNumber = heroHpNumber - monsterAttackNumber;

      if (heroHpNumber <= 0) {
        heroHp.innerText = 0;
      } else {
        heroHp.innerText = heroHpNumber;
      }
    } else {
      displayEndFight(heroHpNumber);
    }
  }, 1000);

  // Gérer la fin du combat
  if (heroHpNumber <= 0 || monsterHpNumber <= 0) {

    // Déterminer le vainqueur
    let resultMessage = ''
     if (heroHpNumber <= 0) {
        resultMessage = `<strong> ${
            document.getElementById("monster-name").textContent
           } a gagné le combat !</strong> `;
    } else {
        resultMessage = `<strong> ${
            document.getElementById("hero-name").textContent
           } a gagné le combat !</strong> `;
    }

    
    // Afficher le message final
    combatDetails.innerHTML += `<p>${resultMessage}</p>`;
      // Scroller automatiquement vers le bas
      combatDetails.scrollTop = combatDetails.scrollHeight;
    
}

function displayEndFight(heroHpNumber) {
  const divAttacks = document.querySelector("#attacks");
  const divEndFight = document.querySelector("#endFight");
  const heroHpInput = document.querySelector("#heroHpInput");

  heroHpInput.value = heroHpNumber;

  divAttacks.classList.toggle("hidden");
  divEndFight.classList.toggle("hidden");
}}
