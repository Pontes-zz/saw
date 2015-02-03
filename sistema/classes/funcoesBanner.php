<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class funcoesBanner extends manipulaDados{
	
	private $id, $linkBanner, $txtBanner, $fotoBanner;
	public $campos, $dados;
	public $tabela = "banner";
	
	public function setId($id){
		$this->id = $id;
	}
	public function getIdBanner(){
		return $this->idBanner;
	}
	public function getLinkBanner(){
		return $this->linkBanner;
	}
	public function getVideoBanner(){
		return $this->videoBanner;
	}
	public function getTituloBanner(){
		return $this->tituloBanner;
	}
	public function getTextoBanner(){
		return $this->textoBanner;
	}
	public function getFotoBanner(){
		return $this->fotoBanner;
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
	
	public function cadastrarBanner(){
		
	// tamanho de fotos para noticias
	
	$texto 		= self::codHtml($_POST['texto']);
	$link		= $_POST['link']; 
	$video  	= $_POST['video'];
	
	$this->largura = wBanner;
	$this->altura  = hBanner;
	$this->pasta 		= "../banner/";
	$this->letraIdImg 	= "h_";
	$this->imagemFoto 	= $_FILES['img'];
	$this->nomeImg 		= $this->imagemFoto['name'];
	$this->tmpFoto 		= $this->imagemFoto['tmp_name'];
	
	$enviado = self::tratarFoto();
	
		if($enviado){
			//instanciando o objeto de cadastro
			self::criarFotoHome($this->nomeFoto);
			
			$this->tabela 	= "banner";
			$this->campos 	= "link, texto, foto, video";
			$this->dados	= "'$link','$texto','$this->nomeFoto', '$video'";
			self::inserir();
		}else{
			$erro = "erro ao enviar Imagem para o banco de dados";
		}
	}
	
	public function geraBanner(){
		
		$sql = "SELECT * FROM $this->tabela WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->getIdBanner 	= $dados['id'];
		$this->linkBanner 	= $dados['link'];
		$this->tituloBanner = $dados['titulo'];
		$this->textoBanner 	= $dados['texto'];
		$this->fotoBanner 	= $dados['foto'];
		$this->videoBanner  = $dados['video'];
	}
	
	public function alterarBanner(){
		
		$id					= $_POST['idbanner'];
		$txt				= $_POST['texto'];
		$texto 				= self::codHtml($txt);
		$urlLink			= $_POST['link'];
		$imagemFoto			= $_FILES['img']['name'];
		$fotoAntiga			= $_POST['fotoantiga'];
		$video  			= $_POST['video'];
		
		// configurações da imagem
		$this->largura 		= wBanner;
		$this->altura  		= hBanner;
		$this->pasta 		= "../banner/";
		$this->letraIdImg 	= "h_";
		$this->fotoAntiga	= "$fotoAntiga";
		$this->imagemFoto 	= $_FILES['img'];
		$this->nomeImg 		= $this->imagemFoto['name'];
		$this->tmpFoto 		= $this->imagemFoto['tmp_name'];
		
		if(!empty($imagemFoto)){
			$enviado = self::tratarFoto();
			self::criarFotoHome($this->nomeFoto);
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
			$this->campos 	= "link='$urlLink', texto='$texto', foto='$fotoNova', video='$video'";
			$this->campoId 	= "id";
			$this->valorId	= "$id";
			self::atualizar();
		}else{
			$erro = "ERRO: ao enviar a Imagem!!";
		}
	}
	public function removerBanner(){
		$this->letraIdImg 	= "h_";
		$this->campoId 		= "id";
		$this->valorId 		= $this->id;
		$this->pasta		= "../../banner/";
		
		$ft = self::removeFoto();	
		
		if($ft){
			self::deletar();
		}
			
	}
}// final da classe

?>