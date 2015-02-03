<?php 
/*********************************************************************************
** CLASSE EM PHP QUE FAZ MANIPULAÇÃO DE DADOS NO BANCO DE DADOS MYSQL VERSAO 1.0
**	DATA DA CRIAÇÃO 22/03/2011
**	DESENVOLVIDO POR PONTES T.I.
**	CÓDIGO LIVRE MANTIDO PELA GNU
** EMAIL : PONTES@PONTESTI.COM.BR
**
**	ESTA CLASSE SÓ PODERÁ SER USADA EM MODO DE HERANÇA
**
**	CLASSE ABSTRATA PARA CONEXAO DO BANCO DE DADOS
*********************************************************************************/

include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/mySqlConn.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include($_SERVER['DOCUMENT_ROOT']."/lib/WideImage.php");

class manipulaDados extends mySqlConn{
	
	protected $sql, $tabela, $campos, $dados, $status, $campoId, $valorId, $quantidadeLista, $txtString;
	
	//envia o nome da tabela a ser usada
	public function setTabela($t){
		$this->tabela = $t;
	}
	
	// envia os campos a serem usados na classe
	public function setCampos($c){
		$this->campos = $c;
	}
	
	public function setQuantidadeLista($ql){
		$this->quantidadeLista = $ql;
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
	
	//recebe o status atual,erros ou acertos
	public function getStatus(){
		return $this->status;
	}
	
	//método que efeuta cadastro de dados no banco
	public function inserir(){
		$this->sql = "INSERT INTO $this->tabela(
									$this->campos
								)VALUES(
									$this->dados
								)";
		if(self::execSQL($this->sql)){
			$this->status = "Cadastrado com Sucesso!!";
		}
	}
	
	//método que efeuta a exclusão de dados no banco
	public function deletar(){
		$this->sql = "DELETE FROM $this->tabela WHERE $this->campoId = '$this->valorId'";
			if(self::execSQL($this->sql)){
				$this->status = "Removido com Sucesso!!";
			}
	}
	
	//método que faz a alteração dos dados no banco
	public function atualizar(){
		$this->sql = "UPDATE $this->tabela SET
									$this->campos
								WHERE
									$this->campoId = '$this->valorId'
								";
		if(self::execSQL($this->sql)){
			$this->status = "Alterado com Sucesso!!";
		}
		
	}
	
	//método que busca o ultimo código na tabela cadastrada
	public function pegaUltimoId(){
		$this->sql = "SELECT $this->campoId FROM $this->tabela ORDER BY $this->campoId DESC LIMIT 1";
		$this->qr = self::execSQL($this->sql);
		$this->dados = self::listaQr($this->qr);
		return $this->dados["$this->campoId"];		
	}
	
	public function retornaId(){
		$this->sql = "SELECT * FROM $this->tabela WHERE $this->campoId = '$this->valorId' LIMIT 1";
		$this->qr = self::execSQL($this->sql);
		$this->dados = self::listaQr($this->qr);
		return $this->dados["id"];
	}
	
	// método que verificar se existe valores duplicados,retorna 1 existe e 0 não existe
	public function pegaDadosDuplicados($valorPesquisado){
		$this->sql = "SELECT $this->campoId FROM  $this->tabela WHERE $this->campoId = '$valorPesquisado'";
		$this->qr = self::execSQL($this->sql);
		return self::contaDados($this->qr);
	}
	
	//método que busca o total de dados cadastrados em uma query
	public function pegaTotalDados(){
		$this->sql = "SELECT $this->campoId FROM $this->tabela ORDER BY $this->campoId";
		$this->qr = self::execSQL($this->sql);
		return self::contaDados($this->qr);
	}
	
	public function buscaFoto(){
		$sql = "SELECT $this->campoId FROM $this->tabela WHERE $this->campoId='$valorId'";
		$this->qr = self::execSQL($sql);
		return self::listaQr($this->qr);
	}
		
	public function listar(){
		$this->sql = "SELECT $this->campos FROM $this->tabela ORDER BY ID DESC";
		$this->qr = self::execSQl($this->sql);
		$retorno = array();
		if(mysql_num_rows($this->qr)>0){
			for($i=0; $i<mysql_num_rows($this->qr);$i++){
				$retorno[] = mysql_fetch_array($this->qr);
			}
		}
		return $retorno;
	}

	public function listarQuantidade($campos, $tabela,$quantidadeLista){
		$this->sql = "SELECT $campos FROM $tabela ORDER BY ID DESC LIMIT $quantidadeLista";
		$this->qr = self::execSQl($this->sql);
		$retorno = array();
		if(mysql_num_rows($this->qr)>0){
			for($i=0; $i<mysql_num_rows($this->qr);$i++){
				$retorno[] = mysql_fetch_array($this->qr);
			}
		}
		return $retorno;
				
	}
	
	public function listar1($tabela, $where = null, $limit = null, $offSet = null, $orderBy = null){
		$where = ($where != null ? "WHERE $where" : "");
		$limit = ($limit != null ? "LIMIT $limit" : "");
		$offSet = ($offSet != null ? "OFFSET $offSet" : "");
		$orderBy = ($orderBy != null ? "ORDER BY $orderBy" : "");
		
		$this->sql = "SELECT * FROM $tabela $where $orderBy $limit $offSet";
		$this->qr = self::execSQl($this->sql);
		$retorno = array();
		if(mysql_num_rows($this->qr)>0){
			for($i=0; $i<mysql_num_rows($this->qr);$i++){
				$retorno[] = mysql_fetch_array($this->qr);
			}
		}
		return $retorno;
	}
	
	public function listar2($campos, $tabela, $where = null, $limit = null, $offSet = null, $orderBy = null){
		$where = ($where != null ? "WHERE $where" : "");
		$limit = ($limit != null ? "LIMIT $limit" : "");
		$offSet = ($offSet != null ? "OFFSET $offSet" : "");
		$orderBy = ($orderBy != null ? "ORDER BY $orderBy" : "");
		
		$this->sql = "SELECT $campos FROM $tabela $where $orderBy $limit $offSet";
		$this->qr = self::execSQl($this->sql);
		$retorno = array();
		if(mysql_num_rows($this->qr)>0){
			for($i=0; $i<mysql_num_rows($this->qr);$i++){
				$retorno[] = mysql_fetch_array($this->qr);
			}
		}
		return $retorno;
	}
	
	public function limparBase(){
		$this->sql = "TRUNCATE TABLE $this->tabela";
		$this->qr = self::execSQL($this->sql);
		return $this->qr;
	}

/****************************************************
*** metodo para manipulações de imagens
*******************************************************/
	public function setlargura($x){
		$this->largura = $x;
	}
	
	public function setAltura($x){
		$this->altura = $x;
	}
	
	public function setLetraIdImg($x){
		$this->letraIdImg = $x;
	}
	
	public function setPasta($x){
		$this->pasta = $x;
	}

	public function setImagemFoto($x){
		$this->imagemFoto = $x;
	}
	
	public function setNomeImg($x){
		$this->nomeImg = $x;
	}
	
	public function setTmpFoto($x){
		$this->tmpFoto = $x;
	}
	
	public function setFotoAntiga($x){
		$this->fotoAntiga = $x;
	}
	
	public function getNomeFoto(){
		return $this->nomeFoto;
	}
	
	// metodo para cadastrar foto no banco
	public function tratarFoto(){
		$ext 			= explode('.', $this->nomeImg);
		$extensao 		= strtolower(end($ext));
		$nomeFoto		= md5(uniqid(rand(),true)).".$extensao";
		$this->nomeFoto = $nomeFoto;
		@rename($nomeImg, $this->nomeFoto);
		
		if($enviado = @move_uploaded_file($this->tmpFoto, $this->pasta . $nomeFoto)){
											
			$foto = $this->pasta . "$nomeFoto";
			$fotoloadp = "t_$nomeFoto";
			$nomeft= $this->pasta . "$fotoloadp";
			
			$imagem = wideImage::Load($foto);
			$imagem = $imagem->resize($this->largura,$this->altura,outside);
			$imagem = $imagem->crop(0, 0, $this->largura, $this->altura);
			$imagem->saveToFile($foto, 80);
			$imagem->destroy();
					
			$imagep = wideImage::Load($foto);				
			$imagep = $imagep->resize(wThumbRed,hThumbRed, outside);
			$imagep = $imagep->crop(center,center,wThumbCorte,hThumbCorte);
			$imagep->saveToFile($nomeft, 70);
			$imagep->destroy();
		}
		 return $enviado;
	}
	public function criarFotoHome($nomeFoto){
		$fotoHome = $this->pasta . "$nomeFoto";
		$fotoloadHome = $this->letraIdImg . "$nomeFoto";
		$nomeftHome= $this->pasta . "$fotoloadHome";
		
		$imageHome = wideImage::Load($fotoHome);				
		$imageHome = $imageHome->resize(wFotoHome,hFotoHome, outside);
		$imageHome = $imageHome->crop(center,center,wHomeCorte,hHomeCorte);
		$imageHome->saveToFile($nomeftHome, 70);
		$imageHome->destroy();
	}
	
	public function substituirFoto(){
		$fotoG = $this->pasta . $this->fotoAntiga;
		@unlink($fotoG);
		$fotoP = $this->pasta . $this->letraIdImg . $this->fotoAntiga;
		@unlink($fotoP);
		$fotoT = $this->pasta . "t_" . $this->fotoAntiga;
		@unlink($fotoT);
	}
	
	public function removeFoto(){
		$sql = "SELECT * FROM $this->tabela WHERE $this->campoId = '$this->valorId'";
		$qr = self::execSQL($sql);
		$dados = self::listaQr($qr);
		$fotoBanco = $dados['foto'];
		//apagar fotos
		$fotoThumb = $this->pasta . "t_" . $fotoBanco;
		@unlink($fotoThumb);
		$fotoHome = $this->pasta . $this->letraIdImg . $fotoBanco;
		@unlink($fotoHome);
		$foto = $this->pasta . $fotoBanco;
		@unlink($foto);
	
		return true;
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
		
		$diretorio = "../../galeria/1/";
		
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

/********************************************************
*** FUNÇÃO PARA TRATAR HTML E UTF8
********************************************************/
	
	public function codHtml($txtString){
	  
	  $codeHtml = htmlentities(utf8_decode($txtString));// servidor online
	  /*$codeHtml = htmlentities($txtString); // servidor local
	  $codeUtf8 = utf8_decode($codeHmlt);*/
	  return $codeHtml;
	}

	public function codificaHtml($x){
	  $codeHtml = htmlentities(utf8_decode($x));// servidor online
	  /*$codeHtml = htmlentities($x); // servidor local*/
	  $codeUtf8 = utf8_decode($codeHmlt);

	  return $codeHtml;
	}

}//fim da classe
?>