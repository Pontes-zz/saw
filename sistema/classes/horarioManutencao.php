<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/criaPaginacao.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");

class horarioManutencao extends criaPaginacao{

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
	public function geraListaLutas(){
		$sql = "SELECT * FROM lutas ORDER BY id DESC";
		
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		$qr	 = self::execSQL($sql);
		while($dados = self::listaQr($qr)){
	
			if($j % 2 ==0){
				$corfnd = "#F7F7F7";
			}else{
				$corfnd = "#F2F2F2";
			}
			echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center"><img src="';
			  	
			  	if(!empty($dados["img"])){
			  		echo urlSite.'fotos/t_'. $dados["img"];
				}else{
					echo urlSite."imagens/fotoind.jpg";
				}

			  echo '" class="imgExibe" width="80"/></td>
      <td bgcolor="'.$corfnd.'" align="center">'.$dados['lutas'].'</td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="'.urlPrincipal.'formAltLutas/'.$dados['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" class="excluirLutas" id="'.$dados['id'].'"><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>			
				';
			$j++;
		}
	}

/********************************************************************************
*** Lista Banner
*********************************************************************************/
	public function geraListaHorarios(){

		$sql = "SELECT lutas.id as id_lutas, lutas.lutas, horarios.* FROM  lutas, horarios where lutas.id = horarios.id_lutas  ORDER BY lutas DESC";
		
		$contador = 0; // contador para gerar o numero de paginas
		$j=1;
		$qr	 = self::execSQL($sql);
		while($dados = self::listaQr($qr)){
	
			if($j % 2 ==0){
				$corfnd = "#F7F7F7";
			}else{
				$corfnd = "#F2F2F2";
			}
			echo '<tr>
      <td bgcolor="'.$corfnd.'" align="center">'.$dados['lutas'].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$dados['dia_semana'].'</td>
      <td bgcolor="'.$corfnd.'" align="center">'.$dados['inicio'].'h &agrave;s '.$dados['termino'].'h </td>
      <td bgcolor="'.$corfnd.'" align="center"><a href="'.urlPrincipal.'formAltHorarios/'.$dados['id'].'"><img src="'.urlPrincipal.'imagens/alterar.png" width="80" height="24" border="0" /></a><a href="javascript:void();" class="excluirHorarios" id="'.$dados['id'].'"><img src="'.urlPrincipal.'imagens/excluir.png" width="80" height="24" border="0"/></a></td>
    </tr>			
				';
			$j++;
		}
	}

}//fim da classe
?>