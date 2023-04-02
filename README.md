Design and develop an application simulating a bike driving on a 7 x 7 grid.

The bike is free to move around the grid but must be prevented from exiting the grid. Any movement that would cause the bike to leave the grid must be prevented, however further valid movement must still be allowed.

The following commands must be supported by the application:

1. PLACE <X>,<Y>,<Facing-direction>
2. FORWARD
3. TURN_LEFT
4. TURN_RIGHT 
5. GPS_REPORT

PLACE will put the bike at position (X,Y) facing NORTH, SOUTH, EAST or WEST, where (0,0) is the south-west corner.

The application should discard all commands until a valid PLACE command has been executed. The application should also ignore all invalid commands.

After the initial PLACE command any sequence of commands may be issued (and in any order) including another PLACE command.

FORWARD will move the bike one unit forward in the direction it is currently facing.

TURN_LEFT and TURN_RIGHT will rotate the bike in the specified direction without changing its position on the grid.

GPS_REPORT will output the bike's position and facing in the following format: (<X>, <Y>), <Facing-direction>


The bike must not exit the grid during movement. This includes the PLACE command.

Any move that would cause the bike to leave the grid must be ignored.

Input for the bike must be provided by the user.


Examples:

1. Input

PLACE 0,5,NORTH

FORWARD

GPS_REPORT



Output: (0,6), NORTH



2. Input

PLACE 0,0,NORTH

TURN_LEFT

GPS_REPORT



Output: (0,0), WEST



3. Input

PLACE 1,2,EAST

FORWARD

FORWARD

TURN_LEFT

FORWARD

GPS_REPORT



Output: (3,3),NORTH