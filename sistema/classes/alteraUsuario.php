<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/mySqlConn.class.php");
	/**************************************************************
	*** ALTERACAO DE USUÁRIOS
	**************************************************************/
	class alteraUsuario extends mySqlConn{
		
		private $id, $idLogin, $nome, $login, $senha, $email, $ativo;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getIdLogin(){
			return $this->idLogin;
		}
		public function getNome(){
			return $this->nome;
		}
		
		public function getLogin(){
			return $this->login;
		}
		
		public function getSenha(){
			return $this->senha;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getAtivo(){
			return $this->ativo;
		}
		public function geraUsuario(){
			$sql = "SELECT * FROM adminusers WHERE id='$this->id'";
			$qr  = self::execSQL($sql);
			$dados = self::listaQr($qr);
			$this->getIdLogin = $dados['id'];
			$this->getNome = $dados['nome'];
			$this->getLogin = $dados['login'];
			$this->getSenha = sha1($dados['senha']);
			$this->getEmail = $dados['email'];
			$this->getAtivo = $dados['ativo'];
		}
	}
?>