<!DOCTYPE html>
<html>
<head>
<title>Champ Chomp Tab Title</title>





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

    <script>
//using html canvas tutorial from w3s
//pong example is in Section 12 (but the icon move in canvas happened without it...)

//variables
var canvas;
var ctx;
var playerPiece;

var outerWallRight;
var outerWallLeft;
var outerWallTop;
var outerWallBottom;

var middleWallcenter;


//starts the gameArea function
var playerPiece;
//canvas is 900y x 600x (height x width)
//objects are width, height, color, x and y
function startGame() {
    //piece object
    playerPiece = new component(30, 30, "yellow", 440, 250);
    //wall object
    outerWallRight = new component(20, 600, "red", 880,0);
    outerWallLeft = new component(20,600, "blue", 0,0);
    outerWallTop = new component(900,20, "green", 0,0);
    outerWallBottom = new component(900,20, "purple", 0,580);
    //middle wall objects
    middleWallcenter = new component(30, 30, "black", 440, 290);
    bigFollow = new component(50, 40, "blue", 20,20);
    greatF = new component(10, 50,"green", 440,250);
    pureD = new component(30, 600, "purple", 580,580);
    runningR= new component(900, 60, "red", 880,440);
    //GAMU STARTO!
    gameArea.start();
}
//Big Boy canvas stuff
var gameArea = {
    canvas : document.getElementById("canvas"),
    //the canvas... IS ALIVE!
    start : function() {
       
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
    //clears canvas in order to pass off to update function
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function(){
        clearInterval(this.interval);
    }
    

}

//object creator 3000
function component(width, height, color, x, y) {
    this.width = width;
    this.height = height;
    //starting with controllers; this is speed
    this.speedX =0;
    this.speedY =0;
    this.x = x;
    this.y = y;

    //update function that updates components    
    this.update = function(){
        ctx = gameArea.context;
        ctx.fillStyle = color;
        ctx.fillRect(this.x, this.y, this.width, this.height);
    }
    //newPos function is speed change
    //controllers; this updates the speed so we get start and stops
    this.newPos = function(){
        this.x += this.speedX;
        this.y += this.speedY;
    }
    //collision function checks for collisions duh
    this.collision = function(objectB){
        //check player pos
        var pLeft = this.x;
        var pRight = this.x + (this.width);
        var pTop = this.y;
        var pBottom = this.y + (this.height);
        //check objectB pos
        var bLeft = objectB.x;
        var bRight = objectB.x + (objectB.width);
        var bTop = objectB.y;
        var bBottom = objectB.y + (objectB.height);
        //collide?

        //true = no collision false = collision detected
        var collide = true;

        //if top and bottom or bottom and top collide and there is input on X axis
        //collison on Y axis
        if ( (pBottom < bTop) || (pTop > bBottom) ){
            //collision detected
            collide = false;
            
        }

        //collision on X axis
        if ( (pRight < bLeft) || (pLeft > bRight) ){
            //collision detected
            collide = false;
            //allow slide on Y axis
            //playerPiece.speedY = this.speedY;
            
        }

        return collide;
    }

}

//AI


function updateGameArea() {
    gameArea.clear();

    //prevents the player from movement after button press
    playerPiece.speedX = 0; 
    playerPiece.speedY = 0;
    middleWallcenter.speedX =0;
    middleWallcenter.speedY =0;
    //bigFollow.speedX = 0;
    //bigFollow.speedY=0;
    greatF.speedY=-1.5;
    //pureD.speedX=0;
    pureD.speedY=7;
    runningR.speedX = -5;

    
    //left
        //left arrow or a
    if( (gameArea.key && gameArea.key == 37) || (gameArea.key && gameArea.key == 65) )
    {
        playerPiece.speedX =-1.5;
        middleWallcenter.speedX = 1.5;
        middleWallcenter.speedY =1.5;
        bigFollow.speedX = -2;
        
    }
    //right arrow or d
    if( (gameArea.key && gameArea.key == 39) || (gameArea.key && gameArea.key == 68) )
    {
        playerPiece.speedX =1.5;
        middleWallcenter.speedX = -1.5;
        middleWallcenter.speedY = -1.5;
        bigFollow.speedX = 2;
    }
    //up arrow or w
    if( (gameArea.key && gameArea.key == 38) || (gameArea.key && gameArea.key == 87) )
    {
        playerPiece.speedY =-1.5;
        middleWallcenter.speedY = 1.5;
        bigFollow.speedY = -2;
        pureD.speedY = -3.5;
    }
    //down arrow or s
    if( (gameArea.key && gameArea.key == 40) || (gameArea.key && gameArea.key == 83) )
    {
        playerPiece.speedY =1.5;
        middleWallcenter.speedY = -1.5;
        bigFollow.speedY = 2;
        pureD.speedY =2.5;
        greatF.speedY =-1.5;
    }

    //easier win using e
    if (gameArea.key && gameArea.key == 69)
    {
        gameArea.stop();
        gameArea.clear();
        ctx.font = "100 Arial";
        ctx.fillStyle = "green";
        ctx.textAlign = "center";
        ctx.fillText("You Win!", 440, 250);

    }

    //win by default cheat code
    if ((gameArea.key && gameArea.key == 38) || (gameArea.key && gameArea.key == 87))
    {
        if ((gameArea.key && gameArea.key == 40) || (gameArea.key && gameArea.key == 83))
        {
            if((gameArea.key && gameArea.key == 38) || (gameArea.key && gameArea.key == 87))
            {
                if((gameArea.key && gameArea.key == 40) || (gameArea.key && gameArea.key == 83))
                {
                    if((gameArea.key && gameArea.key == 37) || (gameArea.key && gameArea.key == 65))
                    {
                        if((gameArea.key && gameArea.key == 39) || (gameArea.key && gameArea.key == 68) )
                        {
                            if((gameArea.key && gameArea.key == 37) || (gameArea.key && gameArea.key == 65))
                            {
                                if((gameArea.key && gameArea.key == 39) || (gameArea.key && gameArea.key == 68))
                                {
                                    gameArea.stop();
                                    gameArea.clear();
                                    ctx.font = "100 Arial";
                                    ctx.fillStyle = "green";
                                    ctx.textAlign = "center";
                                    ctx.fillText("You Win!", 440, 250);
                                }
                            }

                        }

                    }

                }
            }
        }
    }

    //collision checker, if none update
    if (playerPiece.collision(middleWallcenter) || playerPiece.collision(bigFollow) || playerPiece.collision(runningR) )
    {
        //stops player
        gameArea.stop();
        gameArea.clear();
        ctx.font = "100 Arial";
        ctx.fillStyle = "red";
        ctx.textAlign = "center";
        ctx.fillText("GAME OVER!", 440, 250);
        


    }else{
        //updates
        gameArea.clear();
        outerWallRight.update();
        outerWallLeft.update();
        outerWallTop.update();
        outerWallBottom.update();

        middleWallcenter.update();
        middleWallcenter.newPos();
        middleWallcenter.update();
        bigFollow.newPos();
        bigFollow.update();
        pureD.newPos();
        pureD.update();
        greatF.newPos();
        greatF.update();
        runningR.newPos();
        runningR.update();



        playerPiece.newPos();
        playerPiece.update();

    }   
}

</script>


    
	<div>
		<p>This is where game goes</p>

	</div>
	
		<!-- canvas creation -->
    <!-- bullet: https://vignette.wikia.nocookie.net/pgideas/images/1/1a/Just_A_Bullet.png/revision/latest?cb=20171008044642 -->

        
    

    



	
	

</body>
</html>