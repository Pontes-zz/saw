<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/mySqlConn.class.php");

class verificaAdmin extends mySqlConn{
	
	public function getIdAdm(){
			return $this->idAdm;
		}
	public function getNomeAdm(){
			return $this->nomeAdm;
		}
	public function getemailAdm(){
			return $this->emailAdm;
		}
	public function getloginAdm(){
			return $this->loginAdm;
		}

	public function amostraAdmin(){
		session_start();
		$nome = $_SESSION["NOME"];
		
		$sql = "SELECT * FROM adminusers WHERE nome='$nome'";
		$qr	= self::execSQL($sql);
		$dadosAdm = self::listaQr($qr);
		
		$this->idAdm = $dadosAdm['id'];
		$this->nomeAdm = $dadosAdm['nome'];
		$this->emailAdm = $dadosAdm['email'];
		$this->loginAdm = $dadosAdm['login'];
		}
}
?>