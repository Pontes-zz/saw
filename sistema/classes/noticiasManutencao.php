<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/criaPaginacao.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class noticiasManutencao extends criaPaginacao{

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

	public function codHtml($x){
	  
	  $codeHtml = htmlentities(utf8_decode($x));
	  /*$codeHtml = htmlentities($txtString);
	  $codeUtf8 = utf8_decode($codeHmlt);*/
	  return $codeHtml;
	}
/****************************************
*** LISTA NOTICIAS
*****************************************/
	public function geraListaNoticias(){

		$busca = $this->strCampoPesquisa;
		$buscahtm = self::codHtml($this->strCampoPesquisa);
		$busca = mysql_real_escape_string($busca);
		$buscahtm = mysql_real_escape_string($buscahtm);

		if(empty($this->strCampoPesquisa)){
			$sql = "SELECT * FROM noticias ORDER BY id DESC";
		}else{
			
			$sql = "SELECT * FROM noticias WHERE (titulo LIKE '%". $busca ."%') or('%". $busca ."%') or (titulo LIKE '%". $buscahtm ."%') or('%". $buscahtm ."%') or (categoria LIKE '%". $busca ."%') or('%". $busca ."%') or (categoria LIKE '%". $buscahtm ."%') or('%". $buscahtm ."%') ORDER BY id DESC";
		}

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
						
			if($j % 2 ==0){
				$corfnd = linhaTab1;
			}else{
				$corfnd = linhaTab2;
			}
			
			$categ = $prod['categoria'];
			if(!empty($prod['subcategoria'])){
				$categ = $categ . " / " . $prod['subcategoria'];
			}
			
			echo '<tr ';
				if($prod['status'] == "aguardando libera&ccedil;&atilde;o"){
					echo 'class="celula"';
					$corfnd = linhaTabDest;
				}
			echo '>
			  <td bgcolor="'.$corfnd.'" align="center"><img src="';
			  	
			  	if(!empty($prod["foto"])){
			  		echo urlSite.'uploads/t_'. $prod["foto"];
				}else{
					echo urlSite."imagens/fotoind.jpg";
				}

			  echo '" class="imgExibe"/></td>
			  <td bgcolor="'.$corfnd.'" align="center">'.$prod["titulo"].'</td>
			  <td bgcolor="'.$corfnd.'" align="center">'.$categ.'</td>
			  <td bgcolor="'.$corfnd.'" align="center">'.$prod["user"].'</td>
			  <td bgcolor="'.$corfnd.'" align="center">'.$prod["tipo"].'</td>
			  <td bgcolor="'.$corfnd.'" align="center">'.$prod["status"].'</td>
			  <td bgcolor="'.$corfnd.'" align="center">'.$dataAgenda.'</td>
			  <td bgcolor="'.$corfnd.'" align="center"><a href="'.urlPrincipal.'formAltNoticias/'.$prod['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" class="excluir" id="'.$prod['id'].'")" ><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
			</tr>			
				';
				$j++;
				
			self::setContador($contador);
		}
	}
}
?>