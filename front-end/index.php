<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adruino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
        input {
			opacity: 0;
        }
        *{
            font-family: Comic Sans MS;
            padding: 0;
            margin: 0;
        }
        
        #controllerbox input{
            opacity: 0;
            height: 0px;
            width: 0px;
        }
        
        #controllerbox form{
            height: 0px;
            width: 0px;
            display: inline;
        }
        
        #BeginGames input{
            height: 130px;
            width: 130px;
        }

        #DisplayedController{
            margin: 50px;
        }
        
        #DisplayedController td{
            height: 80px;
            width: 80px;
        }
        
        #toets{
            background-color: lightgrey;
            text-align: center;
            font-size: 25px;
        }
        
    </style>
</head>
<body>
<!--    <form action = 'index.php' method = 'post' name="">
     <button value='w' name='w'> Name </button>
    <button value='s' name='S'>Name </button>
    <button value='a' name='A'>Name </button>
    <button value='d' name='D'>Name </button> 
    <input type="submit" value="w" name="w" id="w" />
    <input type="submit" value="A" name="a" id="a" />
    <input type="submit" value="D" name="d" id="d" />
    <input type="submit" value="S" name="s" id="s" />
    </form>-->
        <!-- <button value='w' name='w'> Name </button>
        <button value='s' name='S'>Name </button>
        <button value='a' name='A'>Name </button>
        <button value='d' name='D'>Name </button> -->
        
            <?php 
            //deze variabele gaat in javascript en dan naar de server.
            //hij mag aangepast worden zodat hij met de database wordt verbonden.
            $group = "INF1J";
        ?>
        <p> Maak gebruik van de A-S-W-D toetsen om naar link, achteren, rechts en voren te bewegen. </p>
        <h2> druk de knop langere tijd in</h2>
        <h3><a href="login.php">Inloggen</a> - <a href="logout.php">Uitloggen</a></h3>
        <input type="text" id="besturingsvak" onkeydown="GetKeyInput()" onkeyup="Stop()"> <!--   -->

        <form action = 'index.php' method = 'post' id="forward">
            <input type="radio" value="F" name="w" id="w" checked="checked"/>
           <!-- <input type="submit" value="p" name="w" id="w" checked="checked"/> -->
        </form>
        <form action = 'index.php' method = 'post' id="left">
            <input type="radio" value="L" name="a" id="a" checked="checked"/>
        </form>
        <form action = 'index.php' method = 'post' id="right">
            <input type="radio" value="R" name="d" id="d" checked="checked"/>
        </form>
        <form action = 'index.php' method = 'post' id="back">
            <input type="radio" value="B" name="s" id="s" checked="checked"/>
        </form>

        <form action = 'index.php' method = 'post' id="stop">
            <input type="radio" value="Q" name="q" id="q" checked="checked"/>
        </form>

        <div id="Infotest"> </div>
        <div id="richtingbox">
            <?php
                if(isset($_POST['w'])){
                    echo 'forward';
                }
                if(isset($_POST['a'])){
                    echo 'left';
                }
                if(isset($_POST['d'])){
                    echo 'right';
                }
                if(isset($_POST['s'])){
                    echo 'back';
                }
                if(isset($_POST['q'])){
                    echo 'Stop';
                }
            ?>
        </div>
        <div id="stopped"> </div>


        <script src="index.js"></script>
		<?php
		include 'sendCommand.php';
		?>

        <div id="DisplayedController"> 
            <table>
                <tr>
                    <td></td>
                    <td id="toets">W</td>
                    <td></td>
                </tr>
                <tr>
                    <td id="toets">A</td>
                    <td id="toets">S</td>
                    <td id="toets">D</td>
                </tr>
            </table>
        </div>
           
        <div id="BeginGames">
            <input type="submit" value="Start Lijnrace">
            <input type="submit" value="Start Parcour">        
            <input type="submit" value="Start Doolhof">
            <input type="submit" value="Start zoektocht">
        </div>
</body>
</html>