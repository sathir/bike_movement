<?php

class Bike
{
    private $x;
    private $y;
    private $facing;

    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->facing = 'NORTH';
    }

    public function place($x, $y, $facing)
    {
        if ($this->isValidPosition($x, $y, $facing)) {
            $this->x = $x;
            $this->y = $y;
            $this->facing = $facing;
        }
    }

    private function isValidPosition($x, $y, $facing)
    {
        if ($x < 0 || $x > 6 || $y < 0 || $y > 6) {
            return false;
        }
        if ($facing !== 'NORTH' && $facing !== 'SOUTH' && $facing !== 'EAST' && $facing !== 'WEST') {
            return false;
        }
        return true;
    }

    public function move()
    {
        switch ($this->facing) {
            case 'NORTH':
                if ($this->y < 6) {
                    $this->y++;
                }
                break;
            case 'SOUTH':
                if ($this->y > 0) {
                    $this->y--;
                }
                break;
            case 'EAST':
                if ($this->x < 6) {
                    $this->x++;
                }
                break;
            case 'WEST':
                if ($this->x > 0) {
                    $this->x--;
                }
                break;
            default:
                break;
        }
    }

    public function turnLeft()
    {
        switch ($this->facing) {
            case 'NORTH':
                $this->facing = 'WEST';
                break;
            case 'SOUTH':
                $this->facing = 'EAST';
                break;
            case 'EAST':
                $this->facing = 'NORTH';
                break;
            case 'WEST':
                $this->facing = 'SOUTH';
                break;
            default:
                break;
        }
    }

    public function turnRight()
    {
        switch ($this->facing) {
            case 'NORTH':
                $this->facing = 'EAST';
                break;
            case 'SOUTH':
                $this->facing = 'WEST';
                break;
            case 'EAST':
                $this->facing = 'SOUTH';
                break;
            case 'WEST':
                $this->facing = 'NORTH';
                break;
            default:
                break;
        }
    }

    public function report()
    {
        echo '(' . $this->x . ', ' . $this->y . '), ' . $this->facing . PHP_EOL;
    }
}

// Usage Example
$bike = new Bike();
$bike->place(0, 5, 'NORTH');
$bike->move();
$bike->report();

?>