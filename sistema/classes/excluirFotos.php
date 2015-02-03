<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/mySqlConn.class.php");

class excluirFotos extends mySqlConn{
	
	//envia o nome da tabela a ser usada
	public function setTabela($t){
		$this->tabela = $t;
	}
	// envia os campos a serem usados na classe
	public function setCampos($c){
		$this->campos = $c;
	}
	//envia os dados a serem usados na classe
	public function setDados($d){
		$this->dados = $d;
	}
	//envia o campo de pesquisa normalmente o campo codigo
	public function setCamposId($cid){
		$this->campoId = $cid;
	}
	//envia os dados a serem cadastrados ou pesquisados
	public function setValorId($vi){
		$this->valorId = $vi;
	}
	public function removeFoto(){
		$sql = "SELECT * FROM $this->tabela WHERE $this->campoId = '$this->valorId'";
		$qr = self::execSQL($sql);
		$dados = self::listaQr($qr);
		$tab = "$this->tabela";
		
		if($tab == "galeria_foto"){
			$local = "../../galeria/".$this->valorId."/";
		}elseif($tab == "banner"){
			$local = "../../banner/";
		}elseif($tab == "videos"){
			$local = "../../video/data/thumbnails/";
		}elseif($tab == "colunistas"){
			$local = "../../galeria/colunistas/";
		}
		
		$ftantiga = $dados['foto'];
		
		if(!empty($ftantiga)){
			$pasta = $local.$ftantiga;
			@unlink($pasta);
			$imgpeq = $local."p_".$ftantiga;
			@unlink($imgpeq);
			$imgpeq = $local."h_".$ftantiga;
			@unlink($imgpeq);
		}
		if($tab == "videos"){
			$localVideo = "../../video/";
			$vd = $dados['video'];
			$pastaVideo = $localVideo.$vd;
			@unlink($pastaVideo);
		}
	}
	
	public function removerGaleria($x){
		
		$sqlPrinc = "SELECT * FROM subcat_foto WHERE id='$x'";
		$qrPrinc = self::execSQL($sqlPrinc);
		$dados = self::listaQr($qrPrinc);
		
		$idCat = $dados['id_cat_foto'];
		$idSub = $dados['id'];
		
		$sql = "DELETE FROM galeria_foto WHERE id_cat_foto='$idCat' and id_subcat_foto='$idSub'";
		$qr	 = self::execSQL($sql);
		
		$sql2 = "DELETE FROM subcat_foto WHERE id_cat_foto='$idCat' and id='$idSub'";
		$qr2  =  self::execSQL($sql2);
		
		$diretorio = "../../galeria/".$idCat."/".$idSub."/";
		echo $diretorio;
		if(file_exists($diretorio)){
			
			foreach($fotos = scandir("$diretorio") as $deletar) {
				@unlink($diretorio."/".$deletar);
			}
		@rmdir($diretorio);
		}		
	}
	
	public function removerFotos($x){
		$sql = "SELECT * FROM galeriafoto WHERE id_subcategoria='$x'";
		$qr = self::execSQL($sql);
		
		$diretorio = "../../galeriaFotos/1/";
		
		while($dados = self::listaQr($qr)){
			$pasta = $diretorio.$dados['foto'];
			@unlink($pasta);
			$imgPeq = $diretorio."p_".$dados['foto'];
			@unlink($imgPeq);
		}
		
		$sql1 = "DELETE FROM galeriafoto WHERE id_subcategoria='$x'";
		$qr1	 = self::execSQL($sql1);
		
		$sql2 = "SELECT * FROM subcategoria WHERE id='$x'";
		$qr2 = self::execSQL($sql2);
		$dados2 = self::listaQr($qr2);
		
		$pasta2 = $diretorio.$dados2['foto'];
		@unlink($pasta2);
		$imgPeq2 = $diretorio."p_".$dados2['foto'];
		@unlink($imgPeq2);
				
		$sql2 = "DELETE FROM subcategoria WHERE id='$x'";
		$qr2  =  self::execSQL($sql2);
	}
	
}//fim da classe

?>