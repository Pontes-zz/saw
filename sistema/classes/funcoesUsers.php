<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");

include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class funcoesUsers extends manipulaDados{
	
	private $id, $login, $email, $ativo, $passw;
	public $campos, $dados;
	public $tabela = "adminusers";
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->gId;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getAtivo(){
		return $this->ativo;
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
	
	$nome  = self::codHtml($_POST['nome']);
	$login = self::codHtml($_POST['login']);	
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$ativo = $_POST['ativo'];
	$nivel = "2";
	$passw = sha1($senha);
	
	$sql = "SELECT * FROM $this->tabela where login='$login'";	
	$qr = self::execSQL($sql);	
	$qtdLogin = self::contaDados($qr);
	
		if($qtdLogin >=1 ){
			$this->status = "O Login <em>$login</em> j&aacute; existe, Favor cadastrar outro Login.";	
		}else{
			$this->campos 	= "nome, login, senha, email, nivel, ativo";
			$this->dados	= "'$nome', '$login', '$passw', '$email', '$nivel', '$ativo'";
			self::inserir();
		}
	}
	
	public function geraUsuario(){
		
		$sql = "SELECT * FROM $this->tabela WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->gId 		= $dados['id'];
		$this->nome 	= $dados['nome'];
		$this->login	= $dados['login'];
		$this->email	= $dados['email'];
		$this->ativo	= $dados['ativo'];
	}
	
	public function alterar(){
		
		$id	   = $_POST['id'];
		$nome  = self::codHtml($_POST['nome']);
		$email = $_POST['email'];
		$ativo = $_POST['ativo'];
		$nivel = "2";
		
			$this->campos 	= "nome='$nome', email='$email', ativo='$ativo'";
			$this->campoId 	= "id";
			$this->valorId	= "$id";
			self::atualizar();
	}
	public function remover(){
		//$this->letraIdImg 	= "h_";
		$this->campoId 		= "id";
		$this->valorId 		= $this->id;
		//$this->pasta		= "../../banner/";
		//$ft = self::removeFoto();	
		
		//if($ft){
			self::deletar();
		//}
			
	}
	
	public function alterarSenha(){
		$id 	= $_POST['id'];
		$senha	= sha1($_POST['senha']);
		$this->campos 	= "senha='$senha'";
		$this->campoId 	= "id";
		$this->valorId	= "$id";
		self::atualizar();
		
	}
}// final da classe

?>