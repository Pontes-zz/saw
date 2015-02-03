<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/criaPaginacao.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class menuManutencao extends criaPaginacao{

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

	public function geraListaMenu(){
		$sql = "SELECT * FROM menu WHERE id_menu='0' ORDER BY id ASC";
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
			$data = strtotime($prod['dataval']);
			$dataAgenda = exibeData($prod['dtagenda']);
						
			$corfnd = linhaTab2;
					
			echo '<tr>
			  <td bgcolor="'.$corfnd.'">'.utf8_encode($prod['texto']).'</td>
			  <td bgcolor="'.$corfnd.'" align="center">Principal</td>
			  <td bgcolor="'.$corfnd.'" align="center"><a href="formAltCategorias/'.$prod['id'].'"><img src="imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$prod['id'].'\',\'0\')" ><img src="imagens/excluir.png" width="80" height="24" border="0"/></a></td>
			</tr>';
			
				$j++;
				
			if($prod['sub_menu'] ==1){
				$sqlSub = "SELECT * FROM menu WHERE id_menu='$prod[id]' and id_menu>'0' ORDER BY id ASC";
				$qr = self::execSQL($sqlSub);
				while($d = self::listaQr($qr)){
					$corfnd = linhaTab1;
					echo '<tr>
							<td bgcolor="'.$corfnd.'"><span class="tdMenu">'.utf8_encode($prod['texto']).' / '.utf8_encode($d['texto']).'</span></td>
			  				<td bgcolor="'.$corfnd.'" align="center">sub-menu</td>
			  				<td bgcolor="'.$corfnd.'" align="center"><a href="formAltSubCategorias/'.$d['id'].'"><img src="imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$d['id'].'\')" ><img src="imagens/excluir.png" width="80" height="24" border="0"/></a></td>
						</tr>';
					
			if($d['sub_menu'] == 1){
				$sqlSub2 = "SELECT * FROM menu WHERE id_menu='$d[id]' and id_menu>'0' ORDER BY id ASC";
				$qr2 = self::execSQL($sqlSub2);
				while($d2 = self::listaQr($qr2)){
					$corfnd = linhaTab3;
					echo '<tr>
							<td bgcolor="'.$corfnd.'"><span class="tdMenu2">'.utf8_encode($prod['texto']).' / '.utf8_encode($d['texto']).' / '.utf8_encode($d2['texto']).'</span></td>
			  				<td bgcolor="'.$corfnd.'" align="center">sub-menu</td>
			  				<td bgcolor="'.$corfnd.'" align="center"><a href="formAltSubCategorias/'.$d2['id'].'"><img src="imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" onclick="excluir(\''.$d2['id'].'\')" ><img src="imagens/excluir.png" width="80" height="24" border="0"/></a></td>
						</tr>';
					}
				}//fim if
				
				
				}
			}//fim if
				
			self::setContador($contador);
		}
	}
}
	
?>