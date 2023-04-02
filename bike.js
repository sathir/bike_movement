class Bike {
    constructor() {
        this.x = null;
        this.y = null;
        this.direction = null;
    }

    place(x, y, direction) {
        if (x < 0 || x > 6 || y < 0 || y > 6) {
            return false;
        }

        this.x = x;
        this.y = y;
        this.direction = direction;
        return true;
    }

    forward() {
        if (this.direction === "NORTH" && this.y < 6) {
            this.y++;
        } else if (this.direction === "EAST" && this.x < 6) {
            this.x++;
        } else if (this.direction === "SOUTH" && this.y > 0) {
            this.y--;
        } else if (this.direction === "WEST" && this.x > 0) {
            this.x--;
        }
    }

    turnLeft() {
        if (this.direction === "NORTH") {
            this.direction = "WEST";
        } else if (this.direction === "WEST") {
            this.direction = "SOUTH";
        } else if (this.direction === "SOUTH") {
            this.direction = "EAST";
        } else if (this.direction === "EAST") {
            this.direction = "NORTH";
        }
    }

    turnRight() {
        if (this.direction === "NORTH") {
            this.direction = "EAST";
        } else if (this.direction === "EAST") {
            this.direction = "SOUTH";
        } else if (this.direction === "SOUTH") {
            this.direction = "WEST";
        } else if (this.direction === "WEST") {
            this.direction = "NORTH";
        }
    }

    gpsReport() {
        console.log(`(${this.x}, ${this.y}), ${this.direction}`);
    }
}

module.exports = Bike;