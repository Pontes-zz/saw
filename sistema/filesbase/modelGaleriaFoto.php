<?php
include_once("classes/manipulaDados.class.php");
include_once("classes/config_var.php");
include_once("classes/criaPaginacao.php");
include_once("classes/removeacentos.php");
include_once("funcoes/tratartexto.php");
include_once("classes/breadCrumb.php");

class modeloModel extends criaPaginacao{
		
	private $strCampoPesquisa, $strNumPagina, $strPaginas, $strUrl, $strTipo;
	
	public function setNumPagina($x){
			$this->strNumPagina = $x;
	}
	public function setUrl($x){
		$this->strUrl = $x;
	}
	public function setCampoPesquisa($x){
		$this->strCampoPesquisa = $x;
	}
	public function getPaginas(){
		return $this->strNumPagina = $x;
	}
	public function setTipo($x){
		$this->strTipo = $x;
	}
	public function setIdEncontrado($x){
		$this->idEncontrado = $x;
	}
	public function setArquivoEnc($x){
		$this->arquivoEnc = $x;
	}
	
	public function geraLista(){
		global $urlBread;
		
		$sql = "SELECT * FROM albuns ORDER BY album_id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(12); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$cont = 0;
		
		echo "<div class=\"row margin-bottom-20 margin-border\">";

		while($dados = self::results()){
			$contador ++;
			$id   = $dados['album_id'];
			$gal  = $dados['album_name'];
			
			$lg = new manipulaDados();
			$exibeLista = $lg->listar1("fotos", "foto_album='$id' and foto_pos='0'","1", null, null);

			if($cont % 4 == 0){
				echo "</div> \n";
				echo "<div class=\"row margin-bottom-20 margin-border\">";
			}

			
			/*$xArray = [1,5,9];
			foreach ($xArray as $x) {
				if($cont == $x){
					echo "<div class=\"row margin-bottom-20 margin-border\">";
				}
			}*/

			include("paginas/listaFotos.php");
			/*$yArray = [4,8,12];
			foreach ($yArray as $y) {
				if($cont == $y){
					echo "</div>";
				}
			}*/
			$cont++;
							
			self::setContador($contador);
		}
		echo "</div>";
	}
	
	public function geraTitulo(){
		$sql = "SELECT * FROM albuns WHERE album_id='$this->idEncontrado' ORDER BY album_id ASC";
		$qr = self::execSQL($sql);
		$dado = self::listaQr($qr);
		$txt = $dado['album_name'];
			
			if(!empty($txt)){
				$nomeGal = $txt;
			}else{
				$nomeGal = "Galeria de Fotos";
			}
		return 	$nomeGal;
	}
	
}// fim da classe

$listagem 	= new modeloModel();
$idEnc 		= $liberar->idEncontrado();
$urlBread  	= $liberar->breadCrumb();
$urlEnc 	= $urlBread[0];
$listagem->setIdEncontrado($idEnc);
$listagem->setArquivoEnc($urlEnc);
$listagem->setNumPagina($urlBread[2]);
$listagem->setUrl(urlPrincipal . $urlEnc ."/page/");

$dados = new manipulaDados();
$lista = $dados->listar1("fotos", "foto_album='$idEnc'", null, null, "foto_pos ASC");

foreach($lista as $lt){
	$urlEncont = $lt['foto_album'];
}

$pagina = $liberar->allowConteudo();

if(file_exists($pagina) && ($urlBread[1] == "" || is_numeric($urlBread[2]))){
	$blocoP1 =  "exibirListaFotos.php";
}elseif(file_exists($pagina) && $urlBread[1] != 'page' && $urlBread[1] == $urlEncont){
		$blocoP1 = "exibirGaleria.php";
	}elseif($urlBread[1] != 'page' && $urlBread[1] != $urlEncont){
		$blocoP1 = "404.php";	
	}
?>