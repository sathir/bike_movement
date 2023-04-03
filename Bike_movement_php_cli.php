<?php

class Bike {
    private $x;
    private $y;
    private $direction;

    public function place($x, $y, $direction) {
        if ($x < 0 || $x > 6 || $y < 0 || $y > 6) {
            return false;
        }

        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
        return true;
    }

    public function forward() {
        if ($this->direction == "NORTH" && $this->y < 6) {
            $this->y += 1;
        } elseif ($this->direction == "EAST" && $this->x < 6) {
            $this->x += 1;
        } elseif ($this->direction == "SOUTH" && $this->y > 0) {
            $this->y -= 1;
        } elseif ($this->direction == "WEST" && $this->x > 0) {
            $this->x -= 1;
        }
    }

    public function turn_left() {
        if ($this->direction == "NORTH") {
            $this->direction = "WEST";
        } elseif ($this->direction == "WEST") {
            $this->direction = "SOUTH";
        } elseif ($this->direction == "SOUTH") {
            $this->direction = "EAST";
        } elseif ($this->direction == "EAST") {
            $this->direction = "NORTH";
        }
    }

    public function turn_right() {
        if ($this->direction == "NORTH") {
            $this->direction = "EAST";
        } elseif ($this->direction == "EAST") {
            $this->direction = "SOUTH";
        } elseif ($this->direction == "SOUTH") {
            $this->direction = "WEST";
        } elseif ($this->direction == "WEST") {
            $this->direction = "NORTH";
        }
    }

    public function gps_report() {
        printf("(%d, %d), %s\n", $this->x, $this->y, $this->direction);
    }
}

$bike = new Bike();

while (true) {
    $command = readline("Enter command: ");
    $command = trim(strtoupper($command));

    if (strpos($command, "PLACE") === 0) {
        $args = explode(",", substr($command, 6));
        if (count($args) !== 3) {
            echo "Invalid PLACE command. Usage: PLACE X,Y,DIRECTION\n";
            continue;
        }
        $x = (int)trim($args[0]);
        $y = (int)trim($args[1]);
        $direction = trim($args[2]);
        if (!$bike->place($x, $y, $direction)) {
            echo "Invalid PLACE command. Bike position must be within the 7x7 grid.\n";
            continue;
        }
    } elseif ($command === "FORWARD") {
        $bike->forward();
    } elseif ($command === "TURN_LEFT") {
        $bike->turn_left();
    } elseif ($command === "TURN_RIGHT") {
        $bike->turn_right();
    } elseif ($command === "GPS_REPORT") {
        $bike->gps_report();
    } else {
        echo "Invalid command. Available commands: PLACE, FORWARD, TURN_LEFT, TURN_RIGHT, GPS_REPORT\n";
        continue;
    }
}
?>