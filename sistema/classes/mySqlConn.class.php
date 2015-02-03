<?php
/****************************************************
** CLASSE EM PHP QUE FAZ CONEXAO COM BANCO DE DADOS MYSQL VERSAO 1.0
**	DATA DA CRIAÇÃO 22/03/2011
**	DESENVOLVIDO POR PONTES T.I.
**	CÓDIGO LIVRE MANTIDO PELA GNU
**  EMAIL : PONTES@PONTESTI.COM.BR
**
**	ESTA CLASSE SÓ PODERÁ SER USADA EM MODO DE HERANÇA
**
**	CLASSE ABSTRATA PARA CONEXAO DO BANCO DE DADOS
****************************************************/
abstract class mySqlConn{
	
	protected $host, $usuario, $pass, $dba, $conn, $sql, $qr, $dados, $status, $totalCampos, $error;
	
	//método que inicializa automaticamente as variaveis do conexão
	public function __construct(){
				
		$this->host = "localhost";
		$this->usuario = "nome de usuario";
		$this->pass = "coloque a senha";
		$this->dba = "Coloque o nome do banco";

				
		self::conexao();//executa o método de conexão automaticamente ao herda a classe
		}
	
	//método para utilizar a conexao do banco de dados
	protected function conexao(){
		$this->conn = @mysql_connect($this->host, $this->usuario, $this->pass) or die
										("<strong><center>Erro ao acessar o Banco de Dados !!!</center></strong><br />".mysql_error());
		$this->dba = @mysql_select_db($this->dba) or die 
										("<strong><center>Erro ao Selecionar Banco de Dados !!!</center></strong><br />".mysql_error());
	}
	//método para executar comando SQL
	protected function execSQL($sql){
		$this->qr = @mysql_query($sql) or die
										("<strong><center>Erro ao Executar a Query: $sql </center></strong><br />".mysql_error());
		return $this->qr;
	}
	
	//método que executa e lista dados do banco de dados
	protected function listaQr($qr){
		$this->dados = @mysql_fetch_assoc($qr);
		return $this->dados;		
	}
	
	protected function listarQr2($qr){
		
		$this->dados = @mysql_fetch_assoc($qr);
		$retorno = array();
		if(mysql_num_rows($this->dados)>0){
			for($i=0; $i<mysql_num_rows($this->dados);$i++){
				$retorno[] = mysql_fetch_array($this->dados);
			}
		}
		return $retorno;
				
	}
	
	
	//método que lista a quantidade de dados encontrados no query
	protected function contaDados($qr){
		$this->totalCampos = mysql_num_rows($qr);
		return $this->totalCampos;
	}
}
?>