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

/********************************************************************************
*** Lista Banner
*********************************************************************************/
	public function geraListaBanner(){
		$sql = "SELECT * FROM banner ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(5); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paginacao
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
      <td bgcolor="'.$corfnd.'" align="center"><img src="'.urlSite.'banner/t_'.$prod["foto"].'" width="120" class="imgExibe" /></td>
      <td bgcolor="'.$corfnd.'" align="center">'.utf8_encode($prod['texto']).'</td>
	  <td bgcolor="'.$corfnd.'" align="center">'.$prod['link'].'</td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="formAltBanner/'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" class="excluir" id="'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>			
				';
			$j++;
			self::setContador($contador);
		}
	}

}//fim da classe
?>