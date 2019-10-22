<!DOCTYPE html>
<html>
<head>
<title>Champ Chomp Tab Title</title>


</head>
<body onload="startGame()">
	<!-- image sources -->
	
	<header>
	<figure>
		
		<nav>
			<a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=home">Home</a> ||
			<a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=about">About</a> ||
			<a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=How to Play">How to Play</a> ||
			<a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=Login">Login Page(testing)</a> ||
			<a href="https://web.njit.edu/~joa23/IT-202-011/GameTest.php">Game Test</a> ||
		</nav>

	</figure>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid black;
    background-color: white;
}
</style>
	</header>
	<div>
		<p>This is where game goes</p>

	</div>
	
		<!-- canvas creation -->
    
        
    

	<script>
	
    var myGamePiece;

    function startGame() {
        myGamePiece = new component(30, 30, "https://cdn.frankerfacez.com/emoticon/377851/4", 10, 120, "image");
        myGameArea.start();
    }

    var myGameArea = {
        canvas : document.createElement("canvas"),
        start : function() {
            this.canvas.width = 900;
            this.canvas.height = 600;
            this.context = this.canvas.getContext("2d");
            document.body.insertBefore(this.canvas, document.body.childNodes[0]);
            this.frameNo = 0;
            this.interval = setInterval(updateGameArea, 20);
            window.addEventListener('keydown', function (e) {
                myGameArea.key = e.keyCode;
            })
            window.addEventListener('keyup', function (e) {
                myGameArea.key = false;
            })
        },
        clear : function() {
            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
        },
        stop : function() {
            clearInterval(this.interval);
        }
    }

    function component(width, height, color, x, y, type) {
        this.type = type;
        if (type == "image") {
            this.image = new Image();
            this.image.src = color;
        }
        this.width = width;
        this.height = height;
        this.speedX = 0;
        this.speedY = 0;    
        this.x = x;
        this.y = y;    
        this.update = function() {
            ctx = myGameArea.context;
            if (type == "image") {
                ctx.drawImage(this.image, 
                    this.x, 
                    this.y,
                    this.width, this.height);
            } else {
                ctx.fillStyle = color;
                ctx.fillRect(this.x, this.y, this.width, this.height);
            }
        }
        this.newPos = function() {
            this.x += this.speedX;
            this.y += this.speedY;        
        }
    }

    function updateGameArea() {
        myGameArea.clear();
        myGamePiece.speedX = 0;
        myGamePiece.speedY = 0;    
        if (myGameArea.key && myGameArea.key == 37) {myGamePiece.speedX = -1; }
        if (myGameArea.key && myGameArea.key == 39) {myGamePiece.speedX = 1; }
        if (myGameArea.key && myGameArea.key == 38) {myGamePiece.speedY = -1; }
        if (myGameArea.key && myGameArea.key == 40) {myGamePiece.speedY = 1; }
        myGamePiece.newPos();
        myGamePiece.update();
    }

	</script>
    



	
	

</body>
</html>