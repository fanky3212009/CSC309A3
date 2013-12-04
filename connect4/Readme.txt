Group
---------

Matt Shwed
997719090
g2mshwed

Dennis Ip
998274923
g1ipdenn

Connect 4
-------------

Our website implements the multiplayer connect4 as specified in the assignment.

We implement the actual Connect 4 game using the HTML5 canvas element. Similar to the drawing in assignment 1 our project draws a variety of shapes to represent the board. 
The logic of the game play is handled in javascript. When a player makes a move we utilize Ajax to then update the database with the current board state. Our game represents the board using a 2d array. To send this blob to the server we parse this into a JSON object and then send it off. Every second the board updates by requesting the current state of the game from the server. The server then returns a JSON object representing our 2d board state along with the current turn and whether a player has won the game or not. 

This JSON array is then deserialized and the current board state is updated and redrawn. If a player has won the game, the board becomes disabled by making use of the canvas.onmousedown function. 

To improve security we implement the Secureimage captcha library. 

To play the game the player clicks one of the squares on the bottom of each column to insert their piece into the board. If it is not the current players turn the board is disabled until it is their turn.

