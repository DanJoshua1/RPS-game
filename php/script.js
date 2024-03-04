const choices = ['rock', 'paper', 'scissors'];
let userChoice;
let botChoice;
let userHealth = 3;
let botHealth = 3;

function toggleButtons(show) {
  const buttons = document.querySelectorAll('.choices button');
  buttons.forEach(button => {
    button.style.display = show ? 'inline-block' : 'none';
  });
}

function togglePlayAgainButton(show) {
  const playAgainBtn = document.getElementById('playAgainBtn');
  playAgainBtn.style.display = show ? 'block' : 'none';
}

function toggleResult(show) {
  const result = document.getElementById('result');
  result.style.display = show ? 'block' : 'none';
}

function playGame(playerChoice) {
  if (userHealth === 0 || botHealth === 0) {
    // Game is over, do not continue
    return;
  }

  userChoice = playerChoice;
  botChoice = choices[Math.floor(Math.random() * 3)];

  document.getElementById('userChoiceImg').src = `./assets/${userChoice}.png`;
  document.getElementById('botChoiceImg').src = `./assets/${botChoice}.png`;
  const result = determineWinner();
  displayResult(result);

  if (result !== 'It\'s a tie!') {
    updateHealth(result);
  }

  if (userHealth === 0 || botHealth === 0) {
    toggleButtons(false);
    togglePlayAgainButton(true);
  }
}

function determineWinner() {
  if (userChoice === botChoice) {
    return 'It\'s a tie!';
  } else if (
    (userChoice === 'rock' && botChoice === 'scissors') ||
    (userChoice === 'paper' && botChoice === 'rock') ||
    (userChoice === 'scissors' && botChoice === 'paper')
  ) {
    return 'You win!';
  } else {
    return 'You lose!';
  }
}

function displayResult(result) {
  document.getElementById('result').innerText = result;
  toggleResult(true);
}

function updateHealth(result) {
  if (result === 'You lose!') {
    userHealth--;
    document.getElementById(`userHeart${userHealth + 1}`).src = './assets/emptyheart.png';
    if (userHealth === 0) {
      gameOver(false);
    }
  } else if (result === 'You win!') {
    botHealth--;
    document.getElementById(`botHeart${botHealth + 1}`).src = './assets/emptyheart.png';
    if (botHealth === 0) {
      gameOver(true);
    }
  }
}

function playAgain() {
  // Reset the images only if the game is not over
  document.getElementById('userChoiceImg').src = './assets/uchoice.png';
  document.getElementById('botChoiceImg').src = './assets/bchoice.png';

  // Reset the game
  userHealth = 3;
  botHealth = 3;
  document.getElementById('userHeart1').src = './assets/heart.png';
  document.getElementById('userHeart2').src = './assets/heart.png';
  document.getElementById('userHeart3').src = './assets/heart.png';
  document.getElementById('botHeart1').src = './assets/heart.png';
  document.getElementById('botHeart2').src = './assets/heart.png';
  document.getElementById('botHeart3').src = './assets/heart.png';

  toggleButtons(true);
  togglePlayAgainButton(false);
  toggleResult(false);
}

function gameOver(userWins) {
  document.getElementById('userChoiceImg').src = userWins ? './assets/win.gif' : './assets/gameover.gif';
  document.getElementById('botChoiceImg').src = userWins ? './assets/gameover.gif' : './assets/win.gif';
  document.getElementById('result').innerText = userWins ? 'You win!' : 'You lose!';
  document.getElementById('result').style.fontSize = '24px';
  document.getElementById('result').style.fontWeight = 'bold';
  document.getElementById('result').style.marginTop = '20px';
  togglePlayAgainButton(true);
}

