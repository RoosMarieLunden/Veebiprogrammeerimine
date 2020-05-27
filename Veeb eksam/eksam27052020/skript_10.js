let canvas;
let ctx;

window.onload = function(){
	canvas = document.getElementById("canvas");
	ctx = canvas.getContext("2d");
    drawRectangles();
    drawCircle();
    drawLines();
}

function drawLines(){
	
	ctx.strokeStyle = "black";
	ctx.beginPath();
		ctx.moveTo(420, 490);
		ctx.lineTo(0, 30000);
		ctx.stroke();
	ctx.closePath();

	ctx.strokeStyle = "black";
	ctx.beginPath();
		ctx.moveTo(350, 520);
		ctx.lineTo(490, 520);
		ctx.stroke();
    ctx.closePath()
	

	ctx.strokeStyle = "#FF33AA";
	ctx.beginPath();
		ctx.moveTo(450, 300);
		//kÃµveruse 1 kontrollpunkti x ja x, 2 kontrollpunkti x ja x, joone otsa x, y
		ctx.bezierCurveTo(500, 0, 700, 600, 900, 300);
		ctx.stroke();
	ctx.closePath();

	ctx.strokeStyle = "#FF33AA";
	ctx.beginPath();
		ctx.moveTo(400, 300);
		//kÃµveruse 1 kontrollpunkti x ja x, 2 kontrollpunkti x ja x, joone otsa x, y
		ctx.bezierCurveTo(500, 0, 700, 600, 1000, 300);
		ctx.stroke();
	ctx.closePath();

	ctx.strokeStyle = "black";
	ctx.beginPath();
		ctx.moveTo(460, 360);
		ctx.lineTo(460, 400);
	ctx.stroke();

	ctx.strokeStyle = "black";
	ctx.beginPath();
		ctx.moveTo(400, 360);
		ctx.lineTo(400, 400);
	ctx.stroke();


	ctx.strokeStyle = "red";
	ctx.beginPath();
		ctx.moveTo(400, 445);
		ctx.lineTo(470, 445);
	ctx.stroke();
	
	
}



function drawCircle(){
    ctx.beginPath();
     //keskpunkti x ja y, raadius, kaare algusnurk ja kaare lõppnurk
        ctx.arc(250, 125, 100, 0, 2 * Math.PI);
		ctx.stroke();
		ctx.fillStyle = "yellow";
		ctx.fill();
    ctx.closePath();
    ctx.beginPath();
    //keskpunkti x ja y, raadius, kaare algusnurk ja kaare lõppnurk
       ctx.arc(420, 390, 100, 0, 2 * Math.PI);

       // tõmban joone, kuhu maani x , y
	   //ctx.lineTo(250, 400);
	   ctx.fillStyle = "pink";
       ctx.fill();
       //ctx.stroke();
   ctx.closePath();
}


function drawRectangles(){
	ctx.strokeStyle = "orange";
	ctx.fillStyle = "black";
	ctx.lineWidth = 8;
	// vasaku ülanurma x ja y, laius ja kõrgus
	
	
	//ctx.strokeStyle = "#0000FF";
	ctx.fillStyle = "pink";
	ctx.lineWidth = 3;
    

}