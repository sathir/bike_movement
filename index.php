<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bike Movement Simulator</title>
</head>
<body>
<h1>Bike Movement Simulator</h1>
<form method="POST">
<label for="command-input">Enter command:</label>
<input type="text" id="command-input">
<button id="submit-button">Submit</button>
</form>
<br>
<label for="output-textarea">Output:</label>
<textarea id="output-textarea" cols="50" rows="10" readonly></textarea>

<?php
require 'Bike.php';
$bike = new Bike();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $command = strtoupper(trim($_POST['command-input']));

    if (strpos($command, 'PLACE') === 0) {
        $args = explode(',', substr(trim($command), 6));
        if (count($args) !== 3) {
            echo '<script>document.getElementById("output-textarea").value += "\nInvalid PLACE command. Usage: PLACE X,Y,DIRECTION";</script>';
        } else {
            $x = intval(trim($args[0]));
            $y = intval(trim($args[1]));
            $direction = trim($args[2]);
            if (!$bike->place($x, $y, $direction)) {
                echo '<script>document.getElementById("output-textarea").value += "\nInvalid PLACE command. Bike position must be within the 7x7 grid.";</script>';
            }
        }
    } else if ($command === 'FORWARD') {
        $bike->forward();
    } else if ($command === 'TURN_LEFT') {
        $bike->turnLeft();
    } else if ($command === 'TURN_RIGHT') {
        $bike->turnRight();
    } else if ($command === 'GPS_REPORT') {
        echo '<script>document.getElementById("output-textarea").value += "\n(" + ' . $bike->x . ' + ", " + ' . $bike->y . ' + "), " + "' . $bike->direction . '";</script>';
    } else {
        echo '<script>document.getElementById("output-textarea").value += "\nInvalid command. Available commands: PLACE, FORWARD, TURN_LEFT, TURN_RIGHT, GPS_REPORT";</script>';
    }
}
?>

</body>
</html>
