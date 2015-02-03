<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/criaPaginacao.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");

class userManutencao extends criaPaginacao{

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


/***************************************************************
*** Lista USUÁRIOS
****************************************************************/
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
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["nome"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["login"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$prod["email"].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$ativo.'</td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="'.urlPrincipal.'formAltUsuario/'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" class="excluir" id="'.$prod['id'].'" ><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>			
				';
				$j++;
				
			self::setContador($contador);
		}
	}
}//fim da classe
?>