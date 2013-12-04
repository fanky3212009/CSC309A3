function Board(canvas) {
	 if (canvas) {
		 this.canvas = canvas;
		 this.context = canvas.getContext("2d");
		 
		 this.turns = 0;
		 this.buttons = [];
		 this.currentTurn = 0;
		 this.boardState = [];
		 
		 for (var i = 0; i < 8; i++) {
this.boardState.push([0,0,0,0,0,0]);
		 }
		 	
		// Load buttons
		for (var i = 0; i < 7; i++) {
			this.buttons.push(new Button(context, (i * 40) + 15, canvas.height - 30));
		}
	}
	
	
}

Board.prototype = new Board();
Board.prototype.constructor = Board;
Board.type = 'Board';

Board.prototype.draw = function() {
	var columnSpace = 40;
	
	context.clearRect(0,0,canvas.width,canvas.height);
	context.fillText(winnerText, 
				(canvas.width / 2) - (context.measureText(winnerText).width / 2), 20);

	
	// Draw Columns
	for (var i = 0; i < 8; i++) {
		this.context.fillRect(i * columnSpace, 50, 5, canvas.height - 85);
	}
	
	
	// Draw rows
	for (var i = 0; i < 7; i++) {
		this.context.fillRect(0,(canvas.height - 35)  - (i * 35), (7 * 40) + 5 , 5);
	}
	
	// Draw buttons
	for (var i = 0; i < 7; i++) {
		this.buttons[i].draw();
	}
	
	// Draw circles
	for (var i = 0; i < 7; i++) {
		for (var j = 0; j < 6; j++) {
			var prevFill = context.fillStyle;
		
			if (this.boardState[i][j] == 1) {
				context.beginPath();
				
				context.arc(i * columnSpace + 20,(canvas.height - 35)  - (j * 35) - 10,10,0,2*Math.PI);
				context.fillStyle = 'red';
				context.fill();
				context.stroke();
			} else if (this.boardState[i][j] == 2) {
				context.beginPath();
				context.arc(i * columnSpace + 20,(canvas.height - 35)  - (j * 35) - 10,10,0,2*Math.PI);
				context.fillStyle = 'yellow';
				context.fill();
				context.stroke();
			}
			
			context.fillStyle = prevFill;
		}
	}
};