<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/criaPaginacao.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class videosManutencao extends criaPaginacao{

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
/****************************************
*** LISTA NOTICIAS
*****************************************/
	public function geraLista(){
		//$sql = "SELECT * FROM videos WHERE titulo LIKE '%$this->strCampoPesquisa%' or categoria LIKE '%$this->strCampoPesquisa%' ORDER BY dtagenda DESC";
		$sql = "SELECT * FROM videos ORDER BY id DESC";
		$this->setParametro($this->strNumPagina); //numero de pagina atual
		$this->setFileName($this->strUrl); // nome da pagina atual
		$this->setInfoMaxPag(5); // quantidade de produtos por tela
		$this->setMaximoLinks(8); //quantidade de links para a paaginacao
		$this->setSQL($sql);
		self::iniciaPaginacao();
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		while($prod = self::results()){
			$contador ++;
			$data = exibeData($prod['datacad']);
						
			if($j % 2 ==0){
				$corfnd = linhaTab1;
			}else{
				$corfnd = linhaTab2;
			}
			
			echo '<tr ';
				if($prod['status'] == "Aguardando Libera&ccedil;&atilde;o"){
					echo 'class="celula"';
					$corfnd = linhaTabDest;
				}
			echo '>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["video"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["titulo"].'</td>
      <td bgcolor="'.$corfnd.'">'.$prod["categoria"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$data.'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod['status'].'</td>
	  <td bgcolor="'.$corfnd.'" align="center"><a href="'.urlPrincipal.'formAltVideos/'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" class="excluir" id="'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
			</tr>			
				';
				$j++;
				
			self::setContador($contador);
		}
	}
}
	
	?>