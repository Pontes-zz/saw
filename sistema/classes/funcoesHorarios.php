<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/removeacentos.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class funcoesHorarios extends manipulaDados{
	
	private $id, $linkBanner, $txtBanner, $fotoBanner;
	public $campos, $dados;
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->gId;
	}
	public function getFoto(){
		return $this->foto;
	}
	public function getLutas(){
		return $this->lutas;
	}
	public function getIdLutas(){
		return $this->idLutas;
	}
	public function getDiaSemana(){
		return $this->diaSemana;
	}
	public function getHoraInicio(){
		return $this->horaInicio;
	}
	public function getHoraFinal(){
		return $this->horaFinal;
	}
	
	public function getUsuario(){
		return $this->usuario;
	}
	public function getStatus(){
		return $this->status;
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
	public function cadastrarLutas(){
		
		$lutas 			= self::codHtml($_POST['lutas']);
		$foto 			= $_FILES['img']['name'];
		$fotoNot 		= $_POST['fotoNot'];
		
	if(!empty($foto)){

		$this->largura = wFotoNot;
		$this->altura  = hFotoNot;
		$this->pasta 		= $_SERVER['DOCUMENT_ROOT']."/fotos/";
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
		$this->tabela = "lutas";
		$this->campos 	= "lutas, img";
		$this->dados	= "'$lutas', '$this->nomeFoto'";
		self::inserir();
	}
	
	public function geraLutas(){
		$sql = "SELECT * FROM lutas WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->gId 				= $dados['id'];
		$this->lutas 			= $dados['lutas'];
		$this->foto 			= $dados['img'];
	}
	
	public function alterarLutas(){
		$id				= mysql_real_escape_string($_POST['id']);
		$lutas 			= self::codHtml($_POST['lutas']);
		$foto 			= $_FILES['img']['name'];		
		$fotoAntiga		= $_POST['fotoantiga'];
		
		
		$this->largura = wFotoNot;
		$this->altura  = hFotoNot;
		$this->pasta 		= $_SERVER['DOCUMENT_ROOT']."/fotos/";
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
		
		$this->tabela	= "lutas";
		$this->campos 	= "lutas='$lutas',  img='$fotoNova'";
		$this->campoId 	= "id";
		$this->valorId	= "$id";
		self::atualizar();
	}
	
	public function removerLutas(){
		$this->tabela  = "horarios";
		$this->campoId = "id_lutas";
		$this->valorId = $this->id;
		self::deletar();

		$this->tabela  		= "lutas";
		$this->letraIdImg	= "n_";
		$this->campoId 		= "id";
		$this->valorId 		= $this->id;
		$this->pasta		= "../../fotos/";
		
		$ft = self::removeFoto();	
		if($ft){
			self::deletar();
		}
	}

	public function cadastrarHorarios(){

		$id_lutas 		= self::codHtml($_POST['lutas']);
		$diaSem			= self::codHtml($_POST['dia_sem']);
		$horaInicio     = $_POST['horaIni'];
		$horaFim        = $_POST['horaFim'];
			
		$this->tabela = "horarios";
		$this->campos 	= "id_lutas, dia_semana, inicio, termino";
		$this->dados	= "'$id_lutas', '$diaSem', '$horaInicio', '$horaFim' ";
		self::inserir();
	}

	public function geraHorarios(){
		$sql = "SELECT * FROM horarios WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->gId 				= $dados['id'];
		$this->idLutas 			= $dados['id_lutas'];
		$this->diaSemana		= $dados['dia_semana'];
		$this->horaInicio		= $dados['inicio'];
		$this->horaFinal		= $dados['termino'];
	}
	
	public function alterarHorarios(){

		$id 			= $_POST['id'];
		$id_lutas 		= self::codHtml($_POST['lutas']);
		$diaSem			= self::codHtml($_POST['dia_sem']);
		$horaInicio     = $_POST['horaIni'];
		$horaFim        = $_POST['horaFim'];
			
		$this->tabela   = "horarios";
		$this->campoId  = "id";
		$this->valorId  = "$id";
		$this->campos 	= "id_lutas='$id_lutas', dia_semana='$diaSem', inicio='$horaInicio', termino='$horaFim'";
		self::atualizar();
	}

	public function geraMenu(){
		$sql = "SELECT * FROM lutas ORDER BY id ASC";
		$qr  = self::execSQL($sql);
		while($dados = self::listaQr($qr)){
			echo '<option value="'.$dados['id'].'" >'.$dados['lutas'].'</option>';
		}
	}
	
	public function geraMenuSel($x){
		$sql  = "SELECT * FROM lutas ORDER BY lutas ASC";
		$qr   = self::execSQL($sql);
		while($dados = self::listaQr($qr)){
			echo '<option value="'.$dados['id'].'"';
				if($x == $dados['id']){
					echo "selected=\"selected\"";
				}
			echo ' >'.$dados['lutas'].'</option>';
		}
	}

	public function removerHorarios(){
		$this->campoId 		= "id";
		$this->valorId 		= $this->id;
		$this->tabela		= "horarios";
				self::deletar();
	}
	
}// fim da classe
?>