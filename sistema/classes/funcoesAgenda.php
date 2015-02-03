<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class funcoesAgenda extends manipulaDados{
	
	private $id, $evento, $data;
	public $campos, $dados;
	public $tabela = "agenda";
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->gId;
	}
	public function getEvento(){
		return $this->evento;
	}
	public function getData(){
		return $this->data;
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
	
	public function cadastrar(){
		
	// tamanho de fotos para noticias
	
	$evento		= htmlentities(utf8_decode($_POST['evento']));
	$data		= cadastraData($_POST['data']); 
	
			$this->tabela 	= "agenda";
			$this->campos 	= "evento, data";
			$this->dados	= "'$evento','$data'";
			self::inserir();
	}
	
	public function geraAgenda(){
		
		$sql = "SELECT * FROM $this->tabela WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->gId = $dados['id'];
		$this->evento = $dados['evento'];
		$this->data = exibeData($dados['data']);
	}
	
	public function alterar(){
		
		$id			= $_POST['id'];
		$evento		= self::codHtml($_POST['evento']);
		$data		= cadastraData($_POST['data']);
		
			$this->campos 	= "evento='$evento', data='$data'";
			$this->campoId 	= "id";
			$this->valorId	= "$id";
			self::atualizar();
	}
	
	public function remover(){
		$this->campoId 		= "id";
		$this->valorId 		= $this->id;

			self::deletar();
			
	}
}// final da classe

?>