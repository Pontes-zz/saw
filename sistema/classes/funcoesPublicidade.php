<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class funcoesPublicidade extends manipulaDados{
	
	private $id, $link, $tamanho, $foto;
	public $campos, $dados;
	public $tabela = "publicidade";
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function getLink(){
		return $this->link;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function getTamanho(){
		return $this->tamanho;
	}
	public function getFoto(){
		return $this->foto;
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
	
	$tamanho 	= $_POST['tamanho'];
	$link		= $_POST['link']; 

	$varTam = $lnkUrl = explode('x',$tamanho);
	
	$this->largura = $varTam[0];
	$this->altura  = $varTam[1];
	$this->pasta 		= "../fotos/";
	$this->letraIdImg 	= "h_";
	$this->imagemFoto 	= $_FILES['img'];
	$this->nomeImg 		= $this->imagemFoto['name'];
	$this->tmpFoto 		= $this->imagemFoto['tmp_name'];
	
	$enviado = self::tratarFoto();
	
		if($enviado){
			//instanciando o objeto de cadastro
			//self::criarFotoHome($this->nomeFoto);
			
			$this->campos 	= "foto, tamanho, link";
			$this->dados	= "'$this->nomeFoto', '$tamanho','$link'";
			self::inserir();
		}else{
			$erro = "erro ao enviar Imagem para o banco de dados";
		}
	}
	
	public function gerarDados(){
		
		$sql = "SELECT * FROM $this->tabela WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->getId 	= $dados['id'];
		$this->link 	= $dados['link'];
		$this->tamanho 	= $dados['tamanho'];
		$this->foto 	= $dados['foto'];
	}
	
	public function alterar(){
		
		$id					= $_POST['id'];
		$tamanho			= $_POST['tamanho'];
		$urlLink			= $_POST['link'];
		$imagemFoto			= $_FILES['img']['name'];
		$fotoAntiga			= $_POST['fotoantiga'];
		
		// configurações da imagem
		$varTam = $lnkUrl = explode('x',$tamanho);
	
		$this->largura = $varTam[0];
		$this->altura  = $varTam[1];
		$this->pasta 		= "../fotos/";
		$this->letraIdImg 	= "h_";
		$this->fotoAntiga	= "$fotoAntiga";
		$this->imagemFoto 	= $_FILES['img'];
		$this->nomeImg 		= $this->imagemFoto['name'];
		$this->tmpFoto 		= $this->imagemFoto['tmp_name'];
		
		if(!empty($imagemFoto)){
			$enviado = self::tratarFoto();
			//self::criarFotoHome($this->nomeFoto);
			$fotoNova = $this->nomeFoto;
			
			if($enviado){
				self::substituirFoto();
			}
		}else{
			$enviado = true;
			$fotoNova = $fotoAntiga;
		}
		
		// cadastro no banco de dados
		if($enviado == 1){
			$this->campos 	= "foto='$fotoNova', tamanho='$tamanho',  link='$urlLink'";
			$this->campoId 	= "id";
			$this->valorId	= "$id";
			self::atualizar();
		}else{
			$erro = "ERRO: ao enviar a Imagem!!";
		}
	}
	public function remover(){
		$this->letraIdImg 	= "h_";
		$this->campoId 		= "id";
		$this->valorId 		= $this->id;
		$this->pasta		= "../../fotos/";
		
		$ft = self::removeFoto();	
		
		if($ft){
			self::deletar();
		}
			
	}
}// final da classe

?>