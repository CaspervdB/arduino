<?php

$db_name = "arduino";
//assign the connection and selected database to a variable
$conn = mysqli_connect("127.0.0.1", "root", "");
if ($conn === FALSE) {
    echo "<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_errno() . ": "
    . mysqli_error() . "</p>";
} else {
//select the database
    $db = mysqli_select_db($conn, $db_name);
    if ($db === FALSE) {
        echo "<p>Unable to connect to the database server.</p>"
        . "<p>Error code " . mysqli_errno() . ": "
        . mysqli_error() . "</p>";
        mysqli_close($conn);
        $conn = FALSE;
    }
}