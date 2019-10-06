<!DOCTYPE html>
<html>
<head>
	<title>Pedra, Papel e Tesoura</title>
	<style>
		* {
			font-family: Helvetica;
			font-weight: 400;
		}
		#titulo {
			color: #2d3436;
			text-align: center;
		}
		#placar {
			display: flex;
			align-items: center;
			justify-content: center;
		}
		#jogador, #computador {
			position: relative;
			flex-grow: 1;
			border-radius: 5px;
			width: 200px;
			padding: 20px;
			color: #fff;
		}
		#jogador {
			background-color: #0984e3;
		}
		#computador {
			background-color: #fdcb6e;
		}
		#versus {
			font-size: 40px;
			text-align: center;
			width: 70px;
		}
		#jogador-nome, #computador-nome {
			margin: 0;
			padding: 0;
		}
		#jogador-nome {
			text-align: left;
		}
		#computador-nome {
			text-align: right;
		}
		#jogador-pontos, #computador-pontos {
			position: absolute;
			top: 8px;
			font-size: 32px;
		}
		#jogador-pontos {
			right: 20px;
		}
		ul#jogador-escolha, ul#computador-escolha {
			list-style: none;
			text-align: center;
			margin: 0;
			padding: 0;
		}
		ul#jogador-escolha li, ul#computador-escolha li {
			display: inline;
		}
		ul#jogador-escolha li a, ul#computador-escolha li a {
			opacity: 0.2;
		}
		ul#jogador-escolha li a:hover, ul#jogador-escolha li a.selecionado, ul#computador-escolha li a.selecionado {
			opacity: 1;
		}
		ul#jogador-escolha li a img, ul#computador-escolha li a img {
			max-width: 80px;
		}
		#mensagens {
			background-color: #dfe6e9;
			font-size: 32px;
			border-radius: 5px;
			margin: 40px 0;
			padding: 20px;
		}
	</style>
</head>
<body>
	<div id="principal">
		<h1 id="titulo">Pedra, Papel e Tesoura</h1>
		<div id="placar">
			<div id="jogador">
				<h2 id="jogador-nome">Douglas</h2>
				<span id="jogador-pontos">0</span>

				<ul id="jogador-escolha">
					<li><a id="jogador-escolha-1" onclick="jogar(1)"><img src="images/pedra.png" alt=""></a></li>
					<li><a id="jogador-escolha-2" onclick="jogar(2)"><img src="images/papel.png" alt=""></a></li>
					<li><a id="jogador-escolha-3" onclick="jogar(3)"><img src="images/tesoura.png" alt=""></a></li>
				</ul>
			</div>

			<div id="versus">vs</div>

			<div id="computador">
				<h2 id="computador-nome">Computador</h2>
				<span id="computador-pontos">0</span>

				<ul id="computador-escolha">
					<li><a id="computador-escolha-1"><img src="images/pedra.png" alt=""></a></li>
					<li><a id="computador-escolha-2"><img src="images/papel.png" alt=""></a></li>
					<li><a id="computador-escolha-3"><img src="images/tesoura.png" alt=""></a></li>
				</ul>
			</div>

		</div>
		<div id="mensagens">&nbsp;</div>
	</div>
	<script>
		var jogadorEscolha = 1;
		var jogadorPontuacao = 0;
		var computadorEscolha = 0;
		var computadorPontuacao = 0;
		var ganhador = -1;
		var mensagem = document.getElementById("mensagens");
			
		function jogar(escolha) {
			jogadorEscolha = escolha;
			computadorEscolha = Math.floor((Math.random() * (3 - 1 + 1)) + 1);
			// 1 = Pedra
			// 2 = Papel
			// 3 = Tesoura
			mensagem.innerHTML = jogadorEscolha + computadorEscolha;
			if (jogadorEscolha == 1 && computadorEscolha == 1) {
				ganhador = 0;
			} else if (jogadorEscolha == 1 && computadorEscolha == 2) {
				ganhador = 2;
				computadorPontuacao++;
			} else if (jogadorEscolha == 1 && computadorEscolha == 3) {
				ganhador = 1;
				jogadorPontuacao++;
			} else if (jogadorEscolha == 2 && computadorEscolha == 1) {
				ganhador = 1;
				jogadorPontuacao++;
			} else if (jogadorEscolha == 2 && computadorEscolha == 2) {
				ganhador = 0;
			} else if (jogadorEscolha == 2 && computadorEscolha == 3) {
				ganhador = 2;
				computadorPontuacao++;
			} else if (jogadorEscolha == 3 && computadorEscolha == 1) {
				ganhador = 2;
				computadorPontuacao++;
			} else if (jogadorEscolha == 3 && computadorEscolha == 2) {
				ganhador = 1;
				jogadorPontuacao++;
			} else if (jogadorEscolha == 3 && computadorEscolha == 3) {
				ganhador = 0;
			}
			document.getElementById("jogador-escolha-1").classList.remove('selecionado');
			document.getElementById("computador-escolha-1").classList.remove('selecionado');
			document.getElementById("jogador-escolha-2").classList.remove('selecionado');
			document.getElementById("computador-escolha-2").classList.remove('selecionado');
			document.getElementById("jogador-escolha-3").classList.remove('selecionado');
			document.getElementById("computador-escolha-3").classList.remove('selecionado');

			document.getElementById("jogador-escolha-" + jogadorEscolha).classList.add('selecionado');
			document.getElementById("computador-escolha-" + computadorEscolha).classList.add('selecionado');

			

			if (ganhador == 0) {
				mensagem.innerHTML = "Empate";
			} else if (ganhador == 1) {
				mensagem.innerHTML = "Jogador Ganhou";
				document.getElementById("jogador-pontos").innerHTML = jogadorPontuacao;

			} else if (ganhador == 2) {
				mensagem.innerHTML = "Computador Ganhou";
				document.getElementById("computador-pontos").innerHTML = computadorPontuacao;
			} else {
				mensagem.innerHTML = "ERRO!";
			}

		} 
	</script>
</body>
</html>