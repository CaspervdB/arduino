<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adruino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <form action = 'index.php' method = 'post'>
    <!-- <button value='w' name='w'> Name </button>
    <button value='s' name='S'>Name </button>
    <button value='a' name='A'>Name </button>
    <button value='d' name='D'>Name </button> -->
    <input type="submit" value="w" name="w" id="w" />
    <input type="submit" value="A" name="a" id="a" />
    <input type="submit" value="D" name="d" id="d" />
    <input type="submit" value="S" name="s" id="s" />
    </form>
    <?php
    include "dbConn.php";
    $id = "";
    $user_id = "9981";
    
    if(isset($_POST['w']))
    {
        $id = 'w';
    }else if(isset($_POST['a']))
    {
        $id = 'a';
    }else if(isset($_POST['s']))
    {
        $id = 's';
    }else if(isset($_POST['d'])) 
    {
        $id = 'd';
    }
    if ($id != "")
    {
        

        $SQLstring2 = "INSERT INTO user_command (user_id, cmd_id) VALUES(?, ?)";
        if ($stmt = mysqli_prepare($conn, $SQLstring2)) 
        {
            mysqli_stmt_bind_param($stmt, 'is', $user_id, $id);

            $QueryResult2 = mysqli_stmt_execute($stmt);
            if ($QueryResult2 === FALSE) 
            {
                echo "<p>Unable to execute the query.</p>"
                . "<p>Error code "
                . mysqli_errno($conn)
                . ": "
                . mysqli_error($conn)
                . "</p>";
            } else {
                echo "Executed!";
                    
            }
            //Clean up the $stmt after use
            mysqli_stmt_close($stmt);
        }
    }
    
?>
    
</body>
</html>