class Bike:
    def __init__(self):
        self.x = None
        self.y = None
        self.direction = None

    def place(self, x, y, direction):
        if x < 0 or x > 6 or y < 0 or y > 6:
            return False

        self.x = x
        self.y = y
        self.direction = direction
        return True

    def forward(self):
        if self.direction == "NORTH" and self.y < 6:
            self.y += 1
        elif self.direction == "EAST" and self.x < 6:
            self.x += 1
        elif self.direction == "SOUTH" and self.y > 0:
            self.y -= 1
        elif self.direction == "WEST" and self.x > 0:
            self.x -= 1

    def turn_left(self):
        if self.direction == "NORTH":
            self.direction = "WEST"
        elif self.direction == "WEST":
            self.direction = "SOUTH"
        elif self.direction == "SOUTH":
            self.direction = "EAST"
        elif self.direction == "EAST":
            self.direction = "NORTH"

    def turn_right(self):
        if self.direction == "NORTH":
            self.direction = "EAST"
        elif self.direction == "EAST":
            self.direction = "SOUTH"
        elif self.direction == "SOUTH":
            self.direction = "WEST"
        elif self.direction == "WEST":
            self.direction = "NORTH"

    def gps_report(self):
        print(f"({self.x}, {self.y}), {self.direction}")


bike = Bike()

while True:
    command = input("Enter command: ").strip().upper()

    if command.startswith("PLACE"):
        args = command[6:].strip().split(",")
        if len(args) != 3:
            print("Invalid PLACE command. Usage: PLACE X,Y,DIRECTION")
            continue
        x, y, direction = args
        if not bike.place(int(x), int(y), direction.upper()):
            print("Invalid PLACE command. Bike position must be within the 7x7 grid.")
            continue
    elif command == "FORWARD":
        bike.forward()
    elif command == "TURN_LEFT":
        bike.turn_left()
    elif command == "TURN_RIGHT":
        bike.turn_right()
    elif command == "GPS_REPORT":
        bike.gps_report()
    else:
        print("Invalid command. Available commands: PLACE, FORWARD, TURN_LEFT, TURN_RIGHT, GPS_REPORT")
        continue
