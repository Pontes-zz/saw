<?php
include_once("classes/manipulaDados.class.php");
include_once("classes/config_var.php");
include_once("classes/criaPaginacao.php");
include_once("classes/removeacentos.php");
include_once("funcoes/tratartexto.php");

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
	public function setTipoDados($x){
		$codeUtf8 = htmlentities(utf8_decode($x));//servidor online
		/*$codeHtml = htmlentities($x); // servidor local
	  	$codeUtf8 = utf8_decode($codeHtml);*/
		return $this->tipoDados = $codeUtf8;
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
		
		$contArray = count($y);
		$urlEncont = $y;
		
		if($contArray == 1){
			
			$categoria = $urlEncont[0]; 
			$cond = "url_categoria='$categoria' ";
			
		}elseif($contArray == 2){
			
			$categoria 	  = $urlEncont[0]; 
			$url = $urlEncont[1];
			
			if($urlEncont[1] == "page"){
				$cond = "url_categoria='$categoria' && url_seo='$url' ";
			}else{
				$cond = "url_categoria='$categoria' && url_subcategoria='$url' || url_seo='$url' ";
			}
			
		}elseif($contArray >= 3){
			$categoria  = $urlEncont[0]; 
			$subCat 	= $urlEncont[1];
			$url		= $urlEncont[2];

			if($urlEncont[2] == "page"){
				$cond = "url_categoria='$categoria' && url_subcategoria='$subCat' && url_seo='$url' ";
			}else{
				$cond = "url_categoria='$categoria' && url_subcategoria='$subCat' && url_seo='$url' ";
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

	public function breadString($x,$u){
		
		$y = self::setRemoveArray($x);
		
		$contArray = count($x);
		$urlEncont = $y;

		foreach ($u as $k) {
			$ct = utf8_encode($k['categoria']);
			if(!empty($k['subcategoria'])){
				$sct = utf8_encode($k['subcategoria']);
			}else{
				$sct = utf8_encode($k['titulo']);
			}
		}
		
		if($contArray == 1){
			$urlS = "<a href=\"". urlPrincipal ."\">HOME</a> >". $ct;
		}elseif($contArray >=2){
			$urlS = "<a href=\"". urlPrincipal ."\">HOME</a> > <a href=\"". urlPrincipal.$urlEncont[0] ."\">". $ct .  "</a> > <a href=\"". urlPrincipal.$urlEncont[0] ."/".$urlEncont[1]."\">" . $sct ."</a>";
		}
		return $this->breadString = $urlS;
	}
	
	public function geraLista(){
		
		$sql = "SELECT * FROM noticias WHERE $this->condWhere && dtagenda<='$this->data' && dtagenda!='0000-00-00' && tipo='$this->tipoDados' && status='publicar' ORDER BY dtagenda DESC";
		
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		
		while($dados = self::results()){
			$contador ++;
			$id			= $dados['id'];
			$titulo 	= utf8_encode($dados['titulo']);
			$foto		= $dados['foto'];
			$lead		= utf8_encode($dados['lead']);
			$data		= exibeData($dados['dtagenda']);
			$titSEO 	= $dados['url_seo'];	
			
			if(!empty($dados['url_subcategoria'])){
				$urlCat = $dados['url_categoria'] ."/". $dados['url_subcategoria'];
			}else{
				$urlCat = $dados['url_categoria'];
			}
			$lnkSeo		= urlPrincipal . $urlCat . "/" . $titSEO;

			if(!empty($foto)){
				$fotoLink = urlPrincipal ."uploads/".$foto;
			}else{
				$fotoLink = urlPrincipal."imagens/fotoind.jpg";
			}
						
			include("paginas/lista.php");
							
			self::setContador($contador);
		}
	}
	
	public function geraTitulo(){
		$sql = "SELECT * FROM noticias WHERE $this->condWhere && dtagenda<='$this->data' && dtagenda!='0000-00-00' && tipo='$this->tipoDados' && status='publicar' LIMIT 1";
		$qr = self::execSQL($sql);
		$dado = self::listaQr($qr);

		$lnkUrl = explode('/',$_GET['url']);
		$cont = count($lnkUrl);
				
		if(!empty($dado['subcategoria']) && $cont > 1){
			$titNoticia = $dado['subcategoria'];
		}else{
			$titNoticia = $dado['categoria'];
		}
		return $titNoticia;
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
$tp = $listagem->setTipoDados("Público");
$listagem->setIdEncontrado($idUrl[0]);
$listagem->setNumPagina($numPag);

$condW = $listagem->setCondWhere($liberar->breadCrumb());
$urlString = $listagem->urlString($liberar->breadCrumb());
$listagem->setUrl(urlPrincipal . $urlString ."/page/");

$dados = new manipulaDados();
$lista = $dados->listar1("noticias", "dtagenda<='dataHoje' && $condW && tipo='$tp' && status='publicar' && dtagenda!='0000-00-00'", "1", null, "dtagenda DESC");

foreach($lista as $lt){
	$urlEnc = $lt['url_seo'];
	$cat = $lt['url_categoria'];
	$subCat = $lt['url_subcategoria'];
}

$breadSt = $listagem->breadString($liberar->breadCrumb(), $lista);
$pagina = $liberar->allowConteudo();

if(file_exists($pagina) && (is_numeric($idUrl[0]) || $idUrl[0] != $urlEnc)){
	$blocoP1 =  "exibirLista.php";
}elseif(file_exists($pagina) && $idUrl[1] != 'page' && $idUrl[0] == $urlEnc){
		$blocoP1 = "exibirNotFoto.php";
	}elseif($idUrl[1] != 'page' && $idUrl[0] != $urlEnc || empty($idUrl[0])){
		$blocoP1 = "404.php";	
	}
?>