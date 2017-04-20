var largura = 200;
var altura = 200;
var frame = 60;
var numSimbolos = 100;
var listaSimbolos = [];

function setup(){
	tela = createCanvas(windowWidth, windowHeight);
	//tela = createCanvas(largura, altura);
	tela.position(0, 0);
	//tela.position(windowWidth/2.0-(largura/2.0), windowHeight/2.0-(altura/2.0));
	frameRate(frame);
	for(var i=0; i<numSimbolos; i++){
		listaSimbolos.push(new Simbolo());
	}
}

function draw(){
	background(255, 255, 255, 100);
	noStroke();
	fill(255);
	for(var i=0; i<listaSimbolos.length; i++){
		listaSimbolos[i].atualizarPosicao(windowWidth, windowHeight);
		listaSimbolos[i].desenhar();
	}
}

function windowResized() {
  tela = resizeCanvas(windowWidth, windowHeight);
}