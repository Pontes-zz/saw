<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/mySqlConn.class.php");
require_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/Session.class.php");

class loginSistema extends mySqlConn{
	private $usr, $passw;
	
	public function setUser($usr){
		$this->user = $usr;
	}
	
	public function setSenha($passw){
		$this->senha = sha1($passw);
	}
	
	public function executeLogin(){
		$sql = "SELECT * FROM adminusers WHERE login='$this->user' AND senha='$this->senha' AND ativo='1'";
		$qr = self::execSql($sql);
		$total = self::contaDados($qr);
		
		if($total > 1){
			$erro = base64_encode("Login n&atilde;o efetuado!");
			@header("Location: ../login.php?msn=$erro");
			
		}elseif($total <= 0){
			$erro = base64_encode("Login ou Senha inv&aacute;lidos!");
			@header("Location: ../login.php?msn=$erro");
		}elseif($total==1){
		
		$dados = self::listaQr($qr);
			
		$sid = new Session();
        $sid->start();
        $sid->init( 1800 );
        $sid->addNode( 'start', date( 'd/m/Y - h:i' ) );
        $sid->addNode( 'id', $dados["id"] );
        $sid->addNode( 'NOME', $dados["nome"] );
			
			@header("Location: ../index.php");
		}
	}
}//fim da classe
/****************************************************************************
*** executando o login
****************************************************************************/
	if($_POST['txtlocal'] == "formLogin"){
		$login = new loginSistema();
		$login->setUser($_POST["login"]);
		$login->setSenha($_POST["senha"]);
		$login->executeLogin();
	}elseif($_GET['txtlocal'] == "logOff"){
			
		$sid = new Session;
    	$sid->start();
    	$sid->destroy();
		
		$erro = base64_encode("Voc� Efetuou LogOff!!");
		@header("Location:../login.php?msn=$erro");		
	}else{
		$erro = base64_encode("Acesso de Forma inadequada!");
		@header("Location:../login.php?msn=$erro");	
	}
?>
