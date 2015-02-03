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
	public function setData($x){
		$this->data = $x;
	}
	public function setRemoveArray($x){
		
		$pesqArray = array_search('page',$x);
		
		if($pesqArray == 1){
			for($i=0; $i<=1; $i++){
				$retArray = array_pop($x);
			}
		}
		return $this->removeArray = $x;
	}
	public function setCondWhere($x){
		
		$y = self::setRemoveArray($x);
		
		$contArray = count($y) -1;
		$urlEncont = $y;
		
		if($contArray == 1){
			

			$categoria = $urlEncont[1]; 
			$cond = "url_categoria='$categoria' ";
			
		}elseif($contArray == 2){
			
			$categoria 	= $urlEncont[1]; 
			$url 		= $urlEncont[2];
			
			if($urlEncont[1] == "page"){
				$cond = "url_categoria='$categoria' && url_seo='$url' ";
			}else{
				$cond = "url_categoria='$categoria' && url_seo='$url' ";
			}
			
		}elseif($contArray == 3){
			$categoria  = $urlEncont[1]; 
			$url		= $urlEncont[2];

			if($urlEncont[2] == "page"){
				$cond = "url_categoria='$categoria' ";
			}else{
				$cond = "url_categoria='$categoria' && url_seo='$url' ";
			}
		}elseif($contArray >= 4){
			$categoria  = $urlEncont[1]; 
			$url		= $urlEncont[2];
			

			if($urlEncont[2] == "page"){
				$cond = "url_categoria='$categoria'";
			}else{
				$cond = "url_categoria='$categoria' && url_seo='$url' ";
			}
		}

		return $this->condWhere = $cond;
	}
	public function urlString($x){
		
		$y = self::setRemoveArray($x);
		
		$contArray = count($y);
		$urlEncont = $y;
		
		if($contArray == 1){
			$urlS = $urlEncont[0];
		}elseif($contArray >=2){
			$urlS = $urlEncont[0] . "/" . $urlEncont[1];
		}
		return $this->urlString = $urlS;
	}
	
	public function geraLista(){
		
		$sql = "SELECT * FROM videos WHERE $this->condWhere && datacad<='$this->data' && datacad!='0000-00-00' && tipo='P&uacute;blico' && status='publicar' ORDER BY id DESC";

		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		
		while($dados = self::results()){
			$contador ++;
			$id 		= $dados['id'];
			$video 		= $dados['video'];
			$titulo 	= $dados['titulo'];
			$txt 		= $dados['texto'];
			$datacad 	= exibeData($dados['datacad']);
			$lead	 	= $dados['lead'];
			$foto		= $dados['foto'];

			$lnkUrl		= urlPrincipal ."videos/". $dados['url_categoria'] ."/". $dados['url_seo'];
						 
			include("paginas/listaInfoVideos.php");
							
			self::setContador($contador);
		}
	}
	public function geraListaThumbs(){
		
		$sql = "SELECT * FROM videos WHERE $this->condWhere && datacad<='$this->data' && datacad!='0000-00-00' && tipo='P&uacute;blico' && status='publicar' ORDER BY id DESC";

		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		
		while($dados = self::results()){
			$contador ++;
			$id 		= $dados['id'];
			$video 		= $dados['video'];
			$titulo 	= $dados['titulo'];
			$txt 		= $dados['texto'];
			$datacad 	= exibeData($dados['datacad']);
			$lead	 	= $dados['lead'];
			$foto		= $dados['foto'];

			$lnkUrl		= urlPrincipal ."videos/". $dados['url_categoria'] ."/". $dados['url_seo'];
						 
			include("paginas/listaInfoVideos.php");
							
			self::setContador($contador);
		}
	}
	
	public function geraTitulo(){
		$sql = "SELECT * FROM videos WHERE $this->condWhere && datacad<='$this->data' && datacad!='0000-00-00' && tipo='P&uacute;blico' && status='publicar' LIMIT 1";
		$qr = self::execSQL($sql);
		$dado = self::listaQr($qr);
		return $dado['categoria'];
	}
	
}// fim da classe

$idUrl = array_reverse($liberar->breadCrumb());

if(!is_numeric($idUrl[0])){
	$numPag = 0;
}else{
	$numPag = $idUrl[0];
}

$listagem = new modeloModel();
$listagem->setData(dataHoje);
$listagem->setIdEncontrado($idUrl[0]);
$listagem->setNumPagina($numPag);
$condW = $listagem->setCondWhere($liberar->breadCrumb());
$urlString = $listagem->urlString($liberar->breadCrumb());
$listagem->setUrl(urlPrincipal . $urlString ."/page/");

$dados = new manipulaDados();
$lista = $dados->listar1("videos", "datacad<='dataHoje' && $condW && tipo='P&uacute;blico' && status='publicar' && datacad!='0000-00-00'", "1", null, "id DESC");

foreach($lista as $lt){
	$cat 	= $lt['url_categoria'];
	$urlEnc = $lt['url_seo'];
}

$pagina = $liberar->allowConteudo();

if(file_exists($pagina) && ($idUrl[0] == $urlEnc)){
	$blocoP1 =  "exibirVideo.php";
}elseif(file_exists($pagina) && ($idUrl[0] == $cat)){
		$blocoP1 = "exibirLista.php";
	}elseif(file_exists($pagina) && $idUrl[1] != 'page' && (is_numeric($idUrl[0]) ) ){
			$blocoP1 = "exibirLista.php";
		}elseif($idUrl[1] != 'page' && $idUrl[0] != $urlEnc || empty($idUrl[0])){
			$blocoP1 = "404.php";	
		}
?>