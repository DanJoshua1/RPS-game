
<?php
$choices = ['rock', 'paper', 'scissors'];
$userChoice = null;
$botChoice = null;
$userHealth = 3;
$botHealth = 3;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPS Game</title>
    <link rel="icon" href="/assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    /* Center the loader */
    #loader {
        position: absolute;
        left: 36%;
        top: 30%;
        z-index: 1;
        margin: -60px 0 0 -60px;
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0px;
            opacity: 1
        }
    }

    @keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0;
            opacity: 1
        }
    }

    #myDiv {
        display: none;
        text-align: center;
    }
</style>

<body onload="myFunction()" style="margin:0;">
    <div id="loader">
        <img src="./assets/loading.gif" alt="Loading..." style="width: 600px; height: 600px; border-radius: 100%;">
    </div>
    <div style="display:none;" id="myDiv" class="animate-bottom">
        <div class="container">
            <div class="game-panel">
                <div class="user-panel player-panel">
                    <h2>User</h2>
                    <div class="user-info">
                        <?php for ($i = 1; $i <= 3; $i++) : ?>
                            <img src="./assets/heart.png" id="userHeart<?= $i ?>" alt="User Heart <?= $i ?>">
                        <?php endfor; ?>
                    </div>
                    <img src="./assets/uchoice.png" alt="User Choice" id="userChoiceImg">
                </div>
                <div class="choices">
                    <button onclick="playGame('rock')"><img src="./assets/rhand.png" id="rhand"></button>
                    <button onclick="playGame('paper')"><img src="./assets/phand.png" id="phand"></button>
                    <button onclick="playGame('scissors')"><img src="./assets/shand.png" id="shand"></button>
                </div>
                <div class="vslogo"><img src="./assets/vslogo.png"></div>

                <div class="result-panel">
                    <h1 id="result"></h1>
                    <button id="playAgainBtn" onclick="playAgain()">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front text"> Play Again!
                        </span>
                    </button>
                </div>

                <div class="bot-panel player-panel">
                    <h2>Bot</h2>
                    <div class="bot-info">
                        <?php for ($i = 1; $i <= 3; $i++) : ?>
                            <img src="./assets/heart.png" id="botHeart<?= $i ?>" alt="Bot Heart <?= $i ?>">
                        <?php endfor; ?>
                    </div>
                    <img src="./assets/bchoice.png" alt="Bot Choice" id="botChoiceImg">
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 2000);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }

        function toggleButtons(show) {
            var buttons = document.querySelectorAll('.choices button');
            buttons.forEach(function (button) {
                button.style.display = show ? 'inline-block' : 'none';
            });
        }

        function togglePlayAgainButton(show) {
            var playAgainBtn = document.getElementById('playAgainBtn');
            playAgainBtn.style.display = show ? 'block' : 'none';
        }

        function toggleResult(show) {
            var result = document.getElementById('result');
            result.style.display = show ? 'block' : 'none';
        }
    </script>
</body>

</html>
