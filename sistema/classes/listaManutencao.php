<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/criaPaginacao.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");

class listaManutencao extends criaPaginacao{

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


/**************************************************
*** LISTA GALERIA DE FOTOS
***************************************************/
	public function geraCatFotos(){
		$sql = "SELECT * FROM cat_foto ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		while($prod = self::results()){
			$contador ++;
			if($j % 2 ==0){
				$corfnd = "#F7F7F7";
			}else{
				$corfnd = "#F2F2F2";
			}
			echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["texto"].'</td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="formAltCatFotos/'.$prod['id'].'"><img src="imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>';
	$j++;
			self::setContador($contador);
		}
	}
/**************************************************
*** LISTA EVENTOS DE FOTOS
***************************************************/
	public function geraEventos(){
		$sql = "SELECT * FROM subcat_foto ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		while($prod = self::results()){
			
			$sqlC = "SELECT * FROM cat_foto WHERE id='". $prod['id_cat_foto'] ."'";
			$this->setSQL($sqlC);
			$categ = self::resultado();
			
			$evento	= strtolower($prod['texto']);
			$cat = strtolower($categ['texto']);
				
			$evento = removeAcentos::clean(utf8_decode($evento));
			$cat = removeAcentos::clean(utf8_decode($cat));
					
			$contador ++;
			if($j % 2 ==0){
				$corfnd = "#F7F7F7";
			}else{
				$corfnd = "#F2F2F2";
			}
			echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
	  <td bgcolor="'.$corfnd.'" align="center"><img src="../galeria/'.$prod["id_cat_foto"].'/'.$prod["id"].'/'.$prod["foto"].'" width="120" /></td>
      <td bgcolor="'.$corfnd.'" align="center">'.$categ["texto"].'</td>
	  <td bgcolor="'.$corfnd.'" align="center">'.$prod["texto"].'</td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="'.urlPrincipal.'formCadFotoEvento/'.$prod['id_cat_foto'].'/'.$prod['id'].'/'.$cat.'/'.$evento.'"><img src="imagens/incluir.png" width="80" height="24" border="0" /></a><a href="formAltEventos/'.$prod['id'].'"><img src="imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>';
	$j++;
			self::setContador($contador);
		}
	}
/***************************************
*** LISTA GALERIA DE FOTOS
****************************************/
	public function geraGaleriaFotos(){
		$server = $_SERVER['SERVER_NAME'];
		$urlPrincipal = "http://".$server."/";
		$sql = "SELECT * FROM fotos ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		while($prod = self::results()){
			$contador ++;
			if($j % 2 ==0){
				$corfnd = "#F7F7F7";
			}else{
				$corfnd = "#DDEEFF";
			}
			echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
      <td bgcolor="'.$corfnd.'" align="center"><img src="../fotos/p_'.$prod["foto"].'" width="120" /></td>
      <td bgcolor="'.$corfnd.'" align="center"><strong>'.$urlPrincipal.'fotos/'.$prod["foto"].'</strong></td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="imagens/excluir.gif" width="19" height="19" border="0"/>Excluir</a></td>
    </tr>			
				';
				
			self::setContador($contador);
		}
	}
/*************************************************************************************
*** Lista USUÁRIOS
*************************************************************************************/
	public function geraListaUsuarios(){
		$sql = "SELECT * FROM adminusers WHERE nivel > '1' ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		while($prod = self::results()){
		  $contador ++;
		  $situacao = $prod['ativo'];
			if($situacao == 1){
				$ativo = "Ativo";
			}else{
				$ativo = "Inativo";
			}
			
			if($j % 2 ==0){
				$corfnd = $corfnd1;
			}else{
				$corfnd = $corfnd2;
			}
			echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["nome"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["login"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["email"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$ativo.'</td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="formAltUsuario/'.$prod['id'].'"><img src="imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>			
				';
				$j++;
				
			self::setContador($contador);
		}
	}
	/*******************************************
*** LISTA GALERIA DE FOTOS
************************************************/
	public function geraFotos($x){
		$sql = "SELECT * FROM tb_categoriagal WHERE categoria='$x' ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		while($prod = self::results()){
			$contador ++;
			if($j % 2 ==0){
				$corfnd = "#F7F7F7";
			}else{
				$corfnd = "#DDEEFF";
			}
			echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["categoria"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.exibeData($prod["data"]).'</td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="?paginas=formCadGaleriaFoto&id='.$prod['id'].'&idp=fotos&evento='.$prod["evento"].'"><img src="imagens/files.gif" width="19" height="19" border="0" />Incluir Fotos</a><a href="?paginas=formAltFotos&id='.$prod['id'].'&idp=fotos"><img src="imagens/alterar.gif" width="19" height="19" border="0" />Alterar</a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="imagens/excluir.gif" width="19" height="19" border="0"/>Excluir</a></td>
    </tr>			
				';
				
			self::setContador($contador);
		}
	}
/**************************************************
*** LISTA GALERIA DE FOTOS
***************************************************/
	public function geraFotos2(){
		$sql = "SELECT * FROM subcat_foto ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		while($prod = self::results()){
			$contador ++;
			if($j % 2 == 0){
				$corfnd = "#F7F7F7";
			}else{
				$corfnd = "#DDEEFF";
			}
			echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
	  <td bgcolor="'.$corfnd.'" align="center"><img src="../galeriaFotos/1/p_'.$prod["foto"].'" width="280" /></td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["subcategoria"].'</td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="?paginas=formCadPlanejados&id='.$prod['id_categoria'].'&idp='.$prod['id'].'&categoria=planejados&subcategoria='.$prod['subcategoria'].'"><img src="imagens/files.gif" width="19" height="19" border="0" />Incluir Fotos</a><a href="?paginas=formAltPlanejados&id='.$prod['id_categoria'].'&idp='.$prod['id'].'"><img src="imagens/alterar.gif" width="19" height="19" border="0" />Alterar</a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="imagens/excluir.gif" width="19" height="19" border="0"/>Excluir</a></td>
    </tr>';
			self::setContador($contador);
		}
	}
/*************************************************************************************
*** Lista USUÁRIOS
*************************************************************************************/
	public function geraListaNewsletter(){
		$sql = "SELECT * FROM newsletter ORDER BY codigo DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(15); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		while($prod = self::results()){
			$contador ++;
			$situacao = $prod['ativo'];
			if($situacao == 1){
				$ativo = "Ativo";
			}else{
				$ativo = "Inativo";
			}
			
			if($j % 2 ==0){
				$corfnd = "#9FCFFF";
			}else{
				$corfnd = "#DDEEFF";
			}
			echo '<tr class="celulatab">
      <td bgcolor="'.$corfnd.'" align="center" height="25">'.$prod["codigo"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["nome"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["email"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.exibeData($prod['data']).'</td>
      
    </tr>			
				';
				$j++;
				
			self::setContador($contador);
		}
	}
/*********************************************************************************
*** Lista Vídeos
*********************************************************************************/
	public function geraListaVideos(){
		$sql = "SELECT * FROM videos ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
	while($prod = self::results()){
			$contador ++;
			
			$data = exibeData($prod['dtexibe']);
			$dataCad = exibeData($prod['datacad']);
	if($j % 2 ==0){
		$corfnd = "#F7F7F7";
	}else{
		$corfnd = "#F2F2F2";
	}
	echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["video"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["titulo"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$dataCad.'</td>
	  <td bgcolor="'.$corfnd.'" align="center">'.$prod["lead"].'</td>
	  
	  <td bgcolor="'.$corfnd.'" align="center"><a href="formAltVideos/'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>			
				';
				$j++;
				
			self::setContador($contador);
		}
	}

/*********************************************************************************
*** LISTA DEPOIMENTOS
*********************************************************************************/
	public function geraListaDep(){
		$sql = "SELECT * FROM depoimentos ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
	while($prod = self::results()){
			$contador ++;
			
			$data = exibeData($prod['dtexibe']);
			$dataCad = exibeData($prod['datacad']);
	if($j % 2 ==0){
		$corfnd = "#F7F7F7";
	}else{
		$corfnd = "#F2F2F2";
	}
	echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["texto"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["nome"].'</td>
	  <td bgcolor="'.$corfnd.'" align="center">';
	  
	  if($prod["liberar"] == 1){
		  echo "Liberado";
	  }else{
		  echo "Não Liberado";
	  }
	  
	echo '</td>
	  
	  <td bgcolor="'.$corfnd.'" align="center"><a href="formAltDepoimentos/'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>			
				';
				$j++;
				
			self::setContador($contador);
		}
	}

/*********************************************************************************
*** LISTA ARTIGOS DE COLUNISTAS
*********************************************************************************/
	public function geraListaArtigos(){
		$sql = "SELECT * FROM colunistas ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(10); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
	while($prod = self::results()){
			$contador ++;
	if($j % 2 ==0){
		$corfnd = "#F7F7F7";
	}else{
		$corfnd = "#F2F2F2";
	}
	echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["id"].'</td>
      <td bgcolor="'.$corfnd.'" align="center"><img src="'.urlSite.'galeria/colunistas/'.$prod["foto"].'" /></td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["titulo"].'</td>
	  <td bgcolor="'.$corfnd.'" align="center">'.$prod["nome"].'</td>
	  <td bgcolor="'.$corfnd.'" align="center">'.$prod["profissao"].'</td>
	  <td bgcolor="'.$corfnd.'" align="center">'.$prod["empresa"].'</td>
	  
	  <td bgcolor="'.$corfnd.'" align="center"><a href="formAltArtigos/'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\')" ><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>			
				';
				$j++;
				
			self::setContador($contador);
		}
	}

}//fim da classe
?>