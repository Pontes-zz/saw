<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/removeacentos.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class funcoesVideos extends manipulaDados{
	
	private $id, $linkBanner, $txtBanner, $fotoBanner;
	public $campos, $dados;
	public $tabela = "videos";
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->gId;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function getTexto(){
		return $this->texto;
	}
	public function getDataCad(){
		return $this->dataCad;
	}
	
	public function getVideo(){
		return $this->video;
	}
	public function getMetas(){
		return $this->metas;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getFoto(){
		return $this->foto;
	}
	public function getLead(){
		return $this->lead;
	}
	
	public function getUsuario(){
		return $this->usuario;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getCategoria(){
		return $this->categoria;
	}
	
	public function setTabela($tabela){
		$this->tabela = $tabela;
	}
	
	public function setCampos($campos){
		$this->campos = $campos;
	}
	
	public function setDados($dados){
		$this->dados = $dados;
	}
	
	public function setFotoHome($x){
		$this->fotoHome = $x;
	}
	
	public function cadastrar(){
		$video 			= $_POST['video'];
		$lead 			= self::codHtml($_POST['lead']);
		$titulo 		= self::codHtml($_POST['titulo']);
		$datacad	 	= cadastraData($_POST['data']);
		$status			= self::codHtml($_POST['status']);
		$texto 			= self::codHtml($_POST['texto']);
		$tipo			= self::codHtml($_POST['tipo']);
		$status			= self::codHtml($_POST['status']);
		$categoria		= self::codHtml($_POST['categoria']);
		$foto 			= $_FILES['img']['name'];
		$metas			= self::codHtml($_POST['metas']);

		$urlSeo = removeAcentos::clean(utf8_decode($_POST["titulo"]));
		$urlCategoria = removeAcentos::clean(utf8_decode($_POST["categoria"]));

		if(!empty($foto)){

		$this->largura = wFotoNot;
		$this->altura  = hFotoNot;
		$this->pasta 		= $_SERVER['DOCUMENT_ROOT']."/uploads/";
		$this->letraIdImg 	= "n_";
		$this->imagemFoto 	= $_FILES['img'];
		$this->nomeImg 		= $this->imagemFoto['name'];
		$this->tmpFoto 		= $this->imagemFoto['tmp_name'];
		
		$enviado = self::tratarFoto();
	
		if($enviado){
			//instanciando o objeto de cadastro
			$imgFt = $this->nomeFoto;
			self::criarFotoHome($imgFt);
		}else{
			$erro = "erro ao enviar Imagem para o banco de dados";
		}
	}else{
		$foto = fotoPadrao;
	}
		
		$this->campos 	= "video, titulo, url_seo, texto, datacad, lead, status, tipo, categoria, url_categoria, foto, metas";
		$this->dados	= "'$video', '$titulo', '$urlSeo', '$texto', '$datacad', '$lead', '$status', '$tipo', '$categoria', '$urlCategoria','$imgFt','$metas'";
		self::inserir();
	}
	
	public function geraVideo(){
		$sql = "SELECT * FROM $this->tabela WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->gId 		= $dados['id'];
		$this->titulo 	= $dados['titulo'];
		$this->video 	= $dados['video'];
		$this->texto 	= $dados['texto'];
		$this->dataCad 	= exibeData($dados['datacad']);
		$this->tipo 	= $dados['tipo'];
		$this->lead 	= $dados['lead'];
		$this->status 	= $dados['status'];
		$this->categoria = $dados['categoria'];
		$this->metas 	= $dados['metas'];
		$this->foto 	= $dados['foto'];
	}
	
	public function alterar(){
		$id				= $_POST['id'];
		$video 			= $_POST['video'];
		$lead 			= self::codHtml($_POST['lead']);
		$titulo 		= self::codHtml($_POST['titulo']);
		$datacad	 	= cadastraData($_POST['data']);
		$status			= self::codHtml($_POST['status']);
		$texto 			= self::codHtml($_POST['texto']);
		$tipo			= self::codHtml($_POST['tipo']);
		$status			= self::codHtml($_POST['status']);
		$categoria		= self::codHtml($_POST['categoria']);
		$metas 			= self::codHtml($_POST['metas']);
		$foto 			= $_FILES['img']['name'];
		$fotoAntiga		= $_POST['fotoantiga'];

		$urlCategoria = removeAcentos::clean(utf8_decode($_POST["categoria"]));

		$urlSeo = removeAcentos::clean(utf8_decode($_POST["titulo"]));
		
		$this->largura = wFotoNot;
		$this->altura  = hFotoNot;
		$this->pasta 		= $_SERVER['DOCUMENT_ROOT']."/uploads/";
		$this->letraIdImg 	= "n_";
		$this->fotoAntiga	= "$fotoAntiga";
		$this->imagemFoto 	= $_FILES['img'];
		$this->nomeImg 		= $this->imagemFoto['name'];
		$this->tmpFoto 		= $this->imagemFoto['tmp_name'];
	
		if(!empty($foto)){
			$enviado = self::tratarFoto();
			$fotoNova = $this->nomeFoto;
			self::criarFotoHome($this->nomeFoto);
				if($enviado){
					self::substituirFoto();
				}else{
					$erro = "ERRO: ao enviar a Imagem!!";
				}
		}else{
			$enviado = true;
			$fotoNova = $fotoAntiga;
		}
		
		$this->campos 	= "video='$video', titulo='$titulo', url_seo='$urlSeo', texto='$texto', datacad='$datacad', lead='$lead', status='$status', tipo='$tipo', categoria='$categoria', url_categoria='$urlCategoria', foto='$fotoNova', metas='$metas'";
		$this->campoId 	= "id";
		$this->valorId	= "$id";
		self::atualizar();
	}
	
	public function remover(){
		$this->letraIdImg	= "n_";
		$this->campoId 		= "id";
		$this->valorId 		= $this->id;
		$this->pasta		= "../../uploads/";
		
		$ft = self::removeFoto();	
		
		if($ft){
			self::deletar();
		}
		self::deletar();
	}

	public function geraMenuVideo(){
		$sql = "SELECT * FROM menu WHERE tipo='2' ORDER BY id ASC LIMIT 1";
		$qr  = self::execSQL($sql);
		$menuCat = self::listaQr($qr);

		$sqlSubMenu = "SELECT * FROM menu WHERE id_menu = '$menuCat[id]' ORDER BY texto ASC";
		$qrSubMenu	= self::execSQL($sqlSubMenu);
		while($dados = self::listaQr($qrSubMenu)){
			echo '<option value="'.$dados['texto'].'" >'.$dados['texto'].'</option>';
		}
	}

	public function geraMenuVideoSel($x){
		$sql = "SELECT * FROM menu WHERE tipo='2' ORDER BY id ASC LIMIT 1";
		$qr  = self::execSQL($sql);
		$menuCat = self::listaQr($qr);

		$sqlSubMenu = "SELECT * FROM menu WHERE id_menu = '$menuCat[id]' ORDER BY texto ASC";
		$qrSubMenu	= self::execSQL($sqlSubMenu);
		while($dados = self::listaQr($qrSubMenu)){
			echo '<option value="'.$dados['texto'].'"';
				if($x == $dados['texto']){
					echo "selected=\"selected\"";
				}
			echo ' >'.$dados['texto'].'</option>';
		}
	}

	
}// fim da classe=
?>