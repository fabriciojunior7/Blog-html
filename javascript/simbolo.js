function Simbolo(){
	//Atributos
	this.x = round(random(windowWidth));
	this.y = round(random(-100, 0));
	this.tamanhoTexto = 26;
	this.simbolos = "0123456789+-";
	this.velocidadeY = random(0.5, 5);
	this.r = round(random(100, 250));
	//this.g = round(random(20, 256));
	//this.b = round(random(20, 256));
	r = round(random(11));
	this.simbolo = this.simbolos.split("")[r];
	print(this.simbolo);

	//Metodos
	this.atualizarPosicao = function(largura, altura){
		this.y += this.velocidadeY;
		if(this.y > altura+this.tamanhoTexto){
			this.x = round(random(largura));
			this.tamanhoTexto = round(random(12, 32));
			this.r = round(random(20, 256));
			this.g = round(random(20, 256));
			this.b = round(random(20, 256));
			this.y = -this.tamanhoTexto*2;
		}
	}

	this.desenhar = function() {
		noStroke();
		fill(this.r, this.r, this.r);
		//fill(this.r, this.g, this.b);
		textFont("Corbel");
		textSize(this.tamanhoTexto);
		text(this.simbolo, this.x, this.y);
	}

}