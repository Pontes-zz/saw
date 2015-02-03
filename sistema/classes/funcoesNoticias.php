<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/removeacentos.php");

include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class funcoesNoticias extends manipulaDados{
	
	private $id, $linkBanner, $txtBanner, $fotoBanner;
	public $campos, $dados;
	public $tabela = "noticias";
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->gId;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function getNoticia(){
		return $this->noticia;
	}
	public function getDataCad(){
		return $this->dataCad;
	}
	public function getCategoria(){
		return $this->categoria;
	}
	public function getSubCategoria(){
		return $this->subCategoria;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getFoto(){
		return $this->foto;
	}
	public function getFotoNot(){
		return $this->fotoNot;
	}
	public function getLead(){
		return $this->lead;
	}
	public function getDataAgenda(){
		return $this->dataAgenda;
	}
	public function getLegenda(){
		return $this->legenda;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getUrlCategoria(){
		return $this->urlCategoria;
	}
	public function getUrlSubCategoria(){
		return $this->urlSubCategoria;
	}
	public function getMetas(){
		return $this->metas;
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
		$titulo 		= self::codHtml($_POST['titulo']);
		$noticia 		= $_POST['texto'];
		$dataCad 		= date('Y-m-d');
		$categoria 		= self::codHtml($_POST['categoria']);
		$subCategoria	= self::codHtml($_POST['subcategoria']);
		$tipo			= self::codHtml($_POST['tipo']);
		$foto 			= $_FILES['img']['name'];
		$fotoNot 		= $_POST['fotoNot'];
		$lead 			= self::codHtml($_POST['lead']);
		$dataAgenda 	= cadastraData($_POST['data']);	
		$legenda 		= self::codHtml($_POST['legenda']);
		$usuario 		= self::codHtml($_POST["nome"]);
		$status			= self::codHtml($_POST['status']);
		$metas			= self::codHtml($_POST['metas']);
		
		$urlSeo = removeAcentos::clean(utf8_decode($_POST["titulo"]));
		$urlCategoria = removeAcentos::clean(utf8_decode($_POST["categoria"]));
		$urlSubCategoria = removeAcentos::clean(utf8_decode($_POST["subcategoria"]));
		
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

		$this->campos 	= "titulo, noticia, data, categoria, subcategoria, tipo, foto, fotoNot, lead, dtagenda, url_seo,  legenda, user, status, url_categoria, url_subcategoria, metas";
		$this->dados	= "'$titulo', '$noticia', '$dataCad', '$categoria', '$subCategoria', '$tipo', '$this->nomeFoto', '$fotoNot', '$lead', '$dataAgenda', '$urlSeo', '$legenda', '$usuario', '$status', '$urlCategoria' ,'$urlSubCategoria', '$metas'";
		self::inserir();
	}
	
	public function geraNoticia(){
		$sql = "SELECT * FROM $this->tabela WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->gId 				= $dados['id'];
		$this->titulo 			= $dados['titulo'];
		$this->noticia 			= $dados['noticia'];
		$this->dataCad 			= exibeData($dados['data']);
		$this->categoria 		= $dados['categoria'];
		$this->subCategoria 	= $dados['subcategoria'];
		$this->tipo 			= $dados['tipo'];
		$this->foto 			= $dados['foto'];
		$this->fotoNot 			= $dados['fotonot'];
		$this->lead 			= $dados['lead'];
		$this->dataAgenda		= $dados['dtagenda'];
		$this->legenda 			= $dados['legenda'];
		$this->usuario 			= $dados['user'];
		$this->status 			= $dados['status'];
		$this->urlCategoria 	= $dados['url_categoria'];
		$this->urlSubCategoria 	= $dados['url_subcategoria'];
		$this->metas			= $dados['metas'];
	}
	
	public function alterar(){
		$id				= mysql_real_escape_string($_POST['id']);
		$titulo 		= self::codHtml($_POST['titulo']);
		$noticia 		= $_POST['texto'];
		$tipo			= self::codHtml($_POST['tipo']);
		$foto 			= $_FILES['img']['name'];
		$fotoNot 		= $_POST['fotoNot'];
		$lead 			= self::codHtml($_POST['lead']);
		$dataAgenda 	= cadastraData($_POST['data']);	
		$legenda 		= self::codHtml($_POST['legenda']);
		$usuario 		= self::codHtml($_POST["nome"]);
		$status			= self::codHtml($_POST['status']);
		$fotoAntiga		= $_POST['fotoantiga'];
		$metas			= self::codHtml($_POST['metas']);
		
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
		
		$this->campos 	= "titulo='$titulo', noticia='$noticia', tipo='$tipo', foto='$fotoNova',fotoNot='$fotoNot', lead='$lead', dtagenda='$dataAgenda', url_seo='$urlSeo', legenda='$legenda', user='$usuario', status='$status', metas='$metas'";
		$this->campoId 	= "id";
		$this->valorId	= "$id";
		self::atualizar();
	}
	
	public function alterarCategoria(){
		$id				= $_POST['id'];
		$categoria 		= $_POST['categoria'];
		$subCategoria	= $_POST['subcategoria'];
		
		$urlCategoria = removeAcentos::clean(utf8_decode($_POST["categoria"]));
		$urlSubCategoria = removeAcentos::clean(utf8_decode($_POST["subcategoria"]));
		
		$this->campos 	= "categoria='$categoria', subcategoria='$subCategoria', url_categoria='$urlCategoria', url_subcategoria='$urlSubCategoria'";
		$this->campoId 	= "id";
		$this->valorId	= "$id";
		self::atualizar();
	}
	
	public function remover(){
		$this->letraIdImg	= "n_";
		$this->campoId 		= "id";
		$this->valorId 		= $this->id;
		$this->pasta		= "../../fotos/";
		
		$ft = self::removeFoto();	
		if($ft){
			self::deletar();
		}
	}
}// fim da classe=
?>