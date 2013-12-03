// Globals
var canvas;
var context;
var board;
var rect;
// Mouse coordinates
var mouseX = 0;
var mouseY = 0;
var target = 1;
var state;
var winner = false;

function encodeJSON(boardState) {
	state = {};
	var column = {};
	for (var i = 0; i < 7; i++) {
		for (var j = 0; j < 6; j++) {
			column[j] = boardState[i][j];
		}
		state[i] = column;
		column = {};
	}
	console.log(state);
}

function recodeJSON(boardState) {
	var boardPosition = JSON.parse(boardState);
	boards = $.parseJSON(boardState);

	$.each(boards, function(index, value) {
		$.each(value, function(index2, val2) {
			board.boardState[index][index2] = val2;
		});
	});
}

$(document).ready(function() {
	canvas = document.getElementById("gameBoard");
	context = canvas.getContext("2d");
	
	board = new Board(canvas);
	
	// Initialize mouse move function
	canvas.onmousemove = function(e) {		
		context.clearRect(0,0,canvas.width,canvas.height);
		
		rect = canvas.getBoundingClientRect();
		mouseX = e.pageX - rect.left;
		mouseY = e.pageY - rect.top;
		board.draw();
	};
	
	canvas.onmousedown = function(e) {
		clickX = e.pageX - rect.left;
		clickY = e.pageY - rect.top;
		
		winner = false;

		// Draw buttons
		for (var i = 0; i < 7; i++) {
			if (board.buttons[i].testHit(clickX, clickY)) {
				// Check column
				for (var j = 0; j < 6; j++) {
					if (board.boardState[i][j] == 0) {
						board.boardState[i][j] = target;
						
						break;
					}
				}
			}
		}
		
		// Check winner linear
		for (var j = 0; j < 6; j++) {
			var count = 0;
			for (var i = 0; i < 4; i++) {
				for (var a = 0; a < 4; a++) {
					if (board.boardState[i + a][j] == target) {
						count++;
					}
				}
				
				if (count == 4) {
					winner = true;
				} 
				count = 0;
			}
		}
		
		// Check winner vertical
		for (var j = 0; j < 7; j++) {
			var count = 0;
			for (var i = 0; i < 3; i++) {
				for (var a = 0; a < 4; a++) {
					if (board.boardState[j][i + a] == target) {
						count++;
					}
				}
				
				if (count == 4) {
					console.log('winner vert');
					encodeJSON(board.boardState);
					winner = true;
				} 
				count = 0;
			}
		}
		////***********************//////////////////////
		// Check winner diagonally 3
		for (var j = 0; j < 3; j++) {
			var count = 0;
			for (var a = 0; a < 4; a++) {
				if(board.boardState[j + a][a] == target) {
					count++;
				}
			}
			
			if (count == 4) {
					console.log('winner DIAG31');
					winner = true;
				} 
			count = 0;
		}
		
		for (var j = 0; j < 2; j++) {
			var count = 0;
			for (var a = 0; a < 4; a++) {
				if(board.boardState[j + a][a + 1] == target) {
					count++;
				}
			}
			
			if (count == 4) {
					console.log('winner diag21');
					winner = true;
				} 
			count = 0;
		}
		
		for (var j = 0; j < 1; j++) {
			var count = 0;
			for (var a = 0; a < 4; a++) {
				if(board.boardState[j + a][a + 2] == target) {
					count++;
				}
			}
			
			if (count == 4) {
					console.log('winner diag11');
					winner = true;
				} 
			count = 0;
		}
		
		
		//////////////////////////
		// Check winner diagonally 3
		for (var j = 6; j > 3; j--) {
			var count = 0;
			for (var a = 0; a < 4; a++) {
				if(board.boardState[j - a][a] == target) {
					count++;
				}
			}
			
			if (count == 4) {
					console.log('winner diag32');
					winner = true;
				} 
			count = 0;
		}
		
		for (var j = 6; j > 4; j--) {
			var count = 0;
			for (var a = 0; a < 4; a++) {
				if(board.boardState[j - a][a + 1] == target) {
					count++;
				}
			}
			
			if (count == 4) {
					console.log('winner diag22');
					winner = true;
				} 
			count = 0;
		}
		
		for (var j = 6; j > 5; j--) {
			var count = 0;
			for (var a = 0; a < 4; a++) {
				if(board.boardState[j - a][a + 2] == target) {
					count++;
				}
			}
			
			if (count == 4) {
					console.log('winner Diag12');
					winner = true;
				} 
			count = 0;
		}
		
		
		//////////////////////////		
		
		// switch turns
		if (target == 1) {
			target = 2;
		} else {
			target = 1;
		}
		
		
		
			 context.clearRect(0,0,canvas.width,canvas.height);
	 			board.draw();
				
	};
});

