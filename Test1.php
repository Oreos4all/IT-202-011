<!DOCTYPE html>
<html>
<head>

</head>

<body onload="startGame();">
<canvas id="canvas" width="900" height="600" style="border:1px solid black;"></canvas>
<script>
//using html canvas tutorial from w3s
//pong example is in Section 12 (but the icon move in canvas happened without it...)

//variables
var canvas;
var ctx;
var playerPiece;

//starts the gameArea function
var playerPiece;

function startGame() {
    playerPiece = new component(30, 30, "yellow", 10, 120);
    gameArea.start();
}

var gameArea = {
    canvas : document.getElementById("canvas"),
    start : function() {
        //this.canvas.width = 480;
        //this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.interval = setInterval(updateGameArea, 20);
        //Event listeners for keypresses
        window.addEventListener('keydown', function(e){
            gameArea.key = e.keyCode;
        })
        window.addEventListener('keyup', function(e){
            gameArea.key = false;
        })
        
    },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}

function component(width, height, color, x, y) {
    this.width = width;
    this.height = height;
    //starting with controllers; this is speed
    this.speedX =0;
    this.speedY =0;
    this.x = x;
    this.y = y;    
    this.update = function(){
        ctx = gameArea.context;
        ctx.fillStyle = color;
        ctx.fillRect(this.x, this.y, this.width, this.height);
    }
    //controllers; this updates the speed so we get start and stops
    this.newPos = function(){
        this.x += this.speedX;
        this.y += this.speedY;
    }
}

function updateGameArea() {
    gameArea.clear();
    //movement from origin
    playerPiece.speedX =0;
    playerPiece.speedY =0;

    //keyboard inputs
    if(gameArea.key && gameArea.key == 37)
    {
        playerPiece.speedX =-1;
    }
    if(gameArea.key && gameArea.key == 39)
    {
        playerPiece.speedX =1;
    }
    if(gameArea.key && gameArea.key == 38)
    {
        playerPiece.speedY =-1;
    }
    if(gameArea.key && gameArea.key == 40)
    {
        playerPiece.speedY =1;
    }

    //updates
    playerPiece.newPos();
    playerPiece.update();
}


</script>


<!-- Below is a list of things that have been completed and what is currently being worked on -->
<p>Canvas should be a 900 x 600 rectangle</p>
<p>A yellow square should be present in the canvas</p>
<p>Yellow square should move on canvas with WASD (YES, VERY COOL!)</p>
<p>Part 1: Walls</p>
<p>Make a wall</p>


</body>
</html>
