function Button(context, x, y) {
	this.context = context;
	this.x = x;
	this.y = y;
	this.sideX = 20;
	this.sideY = 20;
	this.selected = false;
}

Button.prototype = new Button();
Button.prototype.constructor = Button;

Button.prototype.setSelected = function(state) {
	this.selected = state;
	
	if (state) {
		this.context.fillStyle = 'red';
	} else {
		this.context.fillStyle = 'black';
	}
};

Button.prototype.testHit = function(testX, testY) {
		if (this.x < testX && this.x + this.sideX > testX &&
			this.y < testY && this.y + this.sideY > testY) {
			return true;
		} else {
			return false;
		}
		
};

Button.prototype.draw = function() {

	this.context.beginPath();
	
	if (this.testHit(mouseX, mouseY)) {
		this.setSelected(true);
		console.log('HIT');
	} else {
		this.setSelected(false);
	}
	//console.log(this.x);
	this.context.fillRect(this.x, this.y, this.sideX, this.sideY);
	this.context.stroke();
};