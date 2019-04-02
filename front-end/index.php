<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adruino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">

    </script>
    <style>
        input {
			opacity: 0;
		}
    </style>
</head>
<body>

        <p> Maak gebruik van de A-S-W-D toetsen om naar link, achteren, rechts en voren te bewegen. </p>
        <h2> druk de knop langere tijd in</h2>
        <h3><a href="login.php">Inloggen</a> - <a href="logout.php">Uitloggen</a></h3>
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
        <script src="index.js"></script>
		<?php
		include 'sendCommand.php';
		?>






   

</body>
</html>
