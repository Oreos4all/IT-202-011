<!DOCTYPE html>
<html>
<head>
<title>Champ Chomp Tab Title</title>


<script>

var playerPiece;

function startGame() {
    myGameArea.start();
    playerPiece = new component(30, 30, "https://cdn.frankerfacez.com/emoticon/377851/4", 100, 120, "image");
    
}

var myGameArea = {
    canvas : document.getElementById("canvas"),
    start : function() {
       

        ctx= canvas.getContext("2d");
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
    playerPiece.speedX = 0;
    playerPiece.speedY = 0;    
    if (myGameArea.key && myGameArea.key == 37) {playerPiece.speedX = -1; }
    if (myGameArea.key && myGameArea.key == 39) {playerPiece.speedX = 1; }
    if (myGameArea.key && myGameArea.key == 38) {playerPiece.speedY = -1; }
    if (myGameArea.key && myGameArea.key == 40) {playerPiece.speedY = 1; }
    playerPiece.newPos();
    playerPiece.update();
}


</script>


</head>

<body onload="startGame();">
	<!-- image sources -->
	
	
	<figure>
		
	<nav>
		<a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=home">Home</a> ||
		<a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=about">About</a> ||
		<a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=How to Play">How to Play</a> ||
		<a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=Login">Login Page(testing)</a> ||
        <a href="https://web.njit.edu/~joa23/IT-202-011/Oct15.php?page=Register">Registration Page(testing)</a> ||
		<a href="https://web.njit.edu/~joa23/IT-202-011/GameTest.php">Game Test</a> ||
	</nav>

	</figure>
    <canvas id="canvas" width="900" height="600" style="border:1px solid black;"></canvas>


    
	<div>
		<p>This is where game goes</p>

	</div>
	
		<!-- canvas creation -->
    <!-- bullet: https://vignette.wikia.nocookie.net/pgideas/images/1/1a/Just_A_Bullet.png/revision/latest?cb=20171008044642 -->

        
    

    



	
	

</body>
</html>