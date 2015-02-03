<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/removeacentos.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");

class funcoesCategorias extends manipulaDados{
	
	private $id;
	public $campos, $dados;
	public $tabela = "menu";
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->gId;
	}
	public function getSubId(){
		return $this->gSubId;
	}
	public function getTexto(){
		return $this->texto;
	}
	public function getSubMenu(){
		return $this->subMenu;
	}
	public function getArquivo(){
		return $this->arquivo;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getFormato(){
		return $this->formato;
	}
	
	public function getLateral(){
		return $this->lateral;
	}
	
	public function getUrlSeo(){
		return $this->urlSeo;
	}
	public function getErrorMsg(){
		return $this->errorMsg;
	}

	public function getColunas(){
		return $this->colunas;
	}
	
	public function setTabela($tabela){
		$this->tabela = $tabela;
	}
	
	public function setIdentTable($t){
		$this->identTable = $t;
	}
	
	public function setCampos($campos){
		$this->campos = $campos;
	}
	
	public function setDados($dados){
		$this->dados = $dados;
	}
	
	public function cadastrar(){
		$texto	 	= self::codHtml($_POST['texto']);
		$subMenu	= $_POST['submenu'];
		$arquivo	= 1;	
		$tipo		= $_POST['tipo'];
		$formato	= $_POST['formato'];
		$lateral	= $_POST['lateral'];
		$colunas	= $_POST['colunas'];
		
		$urlSeo1 = removeAcentos::clean(utf8_decode($_POST["texto"]));
		
		if($arquivo==1){
			
			$name = str_replace("-", "_", $urlSeo1);
			$nomeArq	= basePathArq . $name.".php";
			$nomeModel	= basePathModel . $name."Model.php";
			
			if($lateral == 1){
					$arqBase  	= basePathFiles . "paginaComLateral.php";	
				}else{
					$arqBase  	= basePathFiles . "paginaSimples.php";
				}
				
			if($tipo == 0){
				switch($formato){
					case 0:
						$modelBase 	= basePathFiles . "modelExibirFoto.php";
					break;
					case 1:
					  $modelBase 	= basePathFiles . "modelListaExibirFoto.php";
					break;
					case 2:
					  $modelBase 	= basePathFiles . "modelListaExibirFoto.php";
					break;
					case 3:
					  $modelBase 	= basePathFiles . "modelVazio.php";
					break;
				}
			}elseif($tipo == 1){
				$modelBase 	= basePathFiles . "modelGaleriaFoto.php";
				
			}elseif($tipo == 2){
				$modelBase 	= basePathFiles . "modelVideos.php";				
			}
		
			//Conteudo do arquivo exibir noticia com foto
			if(!copy($arqBase, $nomeArq)){
				$this->errorMsg = "Falha ao criar arquivo $arqBase!";
			}
			
			if(!copy($modelBase, $nomeModel)){
				$this->errorMsg = "Falha ao criar modelagem de dados $modelBase !";
			}
		}// fim da criação do arquivo

		$this->campos 	= "texto, url, sub_menu, arquivo, tipo, formato, coluna_lateral, colunas";
		$this->dados	= "'$texto', '$urlSeo1', '$subMenu', '$arquivo', '$tipo', '$formato', '$lateral','$colunas'";
		self::inserir();			
	}
	
	public function geraCategoria(){
		$sql = "SELECT * FROM $this->tabela WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->gId 			= $dados['id'];
		$this->texto 		= $dados['texto'];
		$this->subMenu 		= $dados['sub_menu'];
		$this->arquivo		= $dados['arquivo'];
		$this->tipo			= $dados['tipo'];
		$this->formato		= $dados['formato'];
		$this->lateral		= $dados['coluna_lateral'];
		$this->urlSeo 		= $dados['url'];
		$this->colunas 		= $dados['colunas'];
	}
	
	public function alterar(){
		$id			= mysql_real_escape_string($_POST['id']); 
		$texto	 	= self::codHtml($_POST['texto']);
		$subMenu	= $_POST['submenu'];
		$arquivo	= 1;	
		$tipo		= $_POST['tipo'];
		$formato	= $_POST['formato'];
		$lateral	= $_POST['lateral'];
		$colunas	= $_POST['colunas'];
		$catTxtAnt	= self::codHtml($_POST['catTxtAntiga']);
		$catUrlAnt	= $_POST['catAntiga'];
		
		$urlSeo1 = removeAcentos::clean(utf8_decode($_POST["texto"]));


		//echo "mostra url; $urlSeo1 ---- $catUrlAnt";
		if($urlSeo1 != $catUrlAnt){
			
			if($arquivo==1){
					$name = str_replace("-", "_", $urlSeo1);
					$nomeArq	= basePathArq . $name.".php";
					$nomeModel	= basePathModel . $name."Model.php";
					
					$nameAnt = str_replace("-", "_", $catUrlAnt);
					$nomeArqAnt		= basePathArq . $nameAnt.".php";
					$nomeModelAnt	= basePathModel . $nameAnt."Model.php";
					
					if(file_exists($nomeArqAnt)){
						unlink($nomeArqAnt);
					}
					if(file_exists($nomeModelAnt)){
						unlink($nomeModelAnt);
					}
				
				
				if($tipo == 0){				
					
					if($lateral == 1){
						$arqBase  	= basePathFiles . "paginaComLateral.php";	
					}else{
						$arqBase  	= basePathFiles . "paginaSimples.php";
					}
					
					switch($formato){
						case 0:
						  $modelBase 	= basePathFiles . "modelExibirFoto.php";
						break;
						case 1:
						  $modelBase 	= basePathFiles . "modelListaExibirFoto.php";
						break;
						case 2:
						  $modelBase 	= basePathFiles . "modelListaExibirSimples.php";
						break;
						case 3:
						  $modelBase 	= basePathFiles . "modelExibirSimples.php";
						break;
					}

				}elseif($tipo == 1){
				$modelBase 	= basePathFiles . "modelGaleriaFoto.php";
				
				}elseif($tipo == 2){
				$modelBase 	= basePathFiles . "modelVideos.php";				
			}
				
				//Conteudo do arquivo exibir noticia com foto
				if(!copy($arqBase, $nomeArq)){
					$this->errorMsg = "Falha ao criar arquivo $arqBase!";
				}
				
				if(!copy($modelBase, $nomeModel)){
					$this->errorMsg = "Falha ao criar modelagem de dados $arqBase!";
				}
			}elseif($arquivo == 0){
					$nameAnt = str_replace("-", "_", $catUrlAnt);
					$nomeArqAnt		= basePathArq . $nameAnt.".php";
					$nomeModelAnt	= basePathModel . $nameAnt."Model.php";
					
					if(file_exists($nomeArqAnt)){
						unlink($nomeArqAnt);
					}
					if(file_exists($nomeModelAnt)){
						unlink($nomeModelAnt);
					}
				}// fim da criação do arquivo
		}elseif($urlSeo1 == $catUrlAnt){
			//echo "<br />chegou no igual a urls $urlSeo1 e $catUrlAnt<br />";
			if($arquivo == 0){
					$nameAnt = str_replace("-", "_", $catUrlAnt);
					//echo $nameAnt;
					$nomeArqAnt		= basePathArq . $nameAnt.".php";
					$nomeModelAnt	= basePathModel . $nameAnt."Model.php";
					
					if(file_exists($nomeArqAnt)){
						unlink($nomeArqAnt);
					}
					if(file_exists($nomeModelAnt)){
						unlink($nomeModelAnt);
					}
					// fim da exclusão do arquivo
				}elseif($arquivo==1){
					
					//echo "arquivo $arquivo === tipo: $tipo === formato: $formato === lateral: $lateral <br />";
					$name = str_replace("-", "_", $urlSeo1);
					$nomeArq	= basePathArq . $name.".php";
					$nomeModel	= basePathModel . $name."Model.php";
					
				if($tipo == 0){
					
					switch($formato){
						case 0:
						  $modelBase 	= basePathFiles . "modelExibirFoto.php";
						break;
						case 1:
						  $modelBase 	= basePathFiles . "modelListaExibirFoto.php";
						break;
						case 2:
						  $modelBase 	= basePathFiles . "modelListaExibirFoto.php";
						break;
						case 3:
						  $modelBase 	= basePathFiles . "modelExibirSimples.php";
						break;
					}
					
				}elseif($tipo == 1){
					$modelBase 	= basePathFiles . "modelGaleriaFoto.php";
				
				}elseif($tipo == 2){
					$modelBase 	= basePathFiles . "modelVideos.php";				
			}
			
			if($lateral == 1){
						$arqBase  	= basePathFiles . "paginaComLateral.php";	
					}else{
						$arqBase  	= basePathFiles . "paginaSimples.php";
					}
			
			
				//Conteudo do arquivo exibir noticia com foto
				if(!copy($arqBase, $nomeArq)){
					$this->errorMsg = "Falha ao criar arquivo $arqBase!";
				}
				
				if(!copy($modelBase, $nomeModel)){
					$this->errorMsg = "Falha ao criar modelagem de dados $arqBase!";
				}
			}// fim da criação do arquivo		
		}

		$this->campos 	= "texto='$texto', url='$urlSeo1', sub_menu='$subMenu', arquivo='$arquivo', tipo='$tipo', formato='$formato', coluna_lateral='$lateral', colunas='$colunas'";
		$this->campoId 	= "id";
		$this->valorId	= "$id";
		self::atualizar();
		
	$sqlNot	= "SELECT * FROM noticias WHERE categoria='$catTxtAnt'";
	//echo $sqlNot;
	$qrNot	= self::execSQL($sqlNot);
	while($dadoNot = self::listaQr($qrNot)){
		$this->tabela	= "noticias";
		$this->campos 	= "categoria='$texto', url_categoria='$urlSeo1'";		
		$this->campoId 	= "id";
		$this->valorId	= $dadoNot['id'];
		self::atualizar();
		}			
	}//FIM DO METODO
	
	
	public function remover(){
		$this->campoId 	= "id";
		$this->valorId	= $this->id;
		$this->tabela 	= "menu";
		
		//pegando id e texto para deletar
		$sqlNome	= "SELECT * FROM $this->tabela WHERE $this->campoId='$this->valorId' LIMIT 1";
		$qrNome 	= self::execSQL($sqlNome);
		$dadosNome 	= self::listaQr($qrNome);
		
		$idNome		= $dadosNome['id'];
		$textoNome 	= $dadosNome['texto'];
		$idMenu		= $dadosNome['id_menu'];
		$subMenu	= $dadosNome['sub_menu'];
						
		include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/removeacentos.php");
		
		if(($subMenu == 1)){
			
			$sqlSub   = "SELECT * FROM $this->tabela WHERE id_menu='$idNome'";
			$qrSub	  = self::execSQL($sqlSub);

			while($dadosSub = self::listaQr($qrSub)){
							
				$idSub2   = $dadosSub['id'];
				$subMenu2 = $dadosSub['sub_menu'];
				$texto2	  = $dadosSub['texto'];
				$idMenu2  = $dadosSub['id_menu'];
				
				if(($subMenu2>0)){	
					$sqlSub3 = "SELECT * FROM $this->tabela WHERE id_menu='$idSub2'";
					$qrSub3	 = self::execSQL($sqlSub3);
					while($dadosSub3 = self::listaQr($qrSub3)){
					
						$idSub3   = $dadosSub3['id'];
						$subMenu3 = $dadosSub3['sub_menu'];
						$texto3	  = $dadosSub3['texto'];
						
						self::delNoticias("categoria='$texto2'");
						$nomeArq3 = $texto2."_".$dadosSub3['texto'];
											
						$this->campoId 	= "id";
						$this->valorId	= $idSub3;
						$this->tabela 	= "menu";
						$at3 = self::delArquivos($nomeArq3);
						self::deletar();
					}
				}
									
				self::delNoticias("categoria='$textoNome'");
				$nomeArq2 = $textoNome."_".$texto2;
				$this->campoId 	= "id";
				$this->valorId	= $idSub2;
				$this->tabela 	= "menu";
				self::delArquivos($nomeArq2);
				self::deletar();
			}

				$sqlSub2   = "SELECT * FROM $this->tabela WHERE id='$idMenu'";
							
				$qrSub2    = self::execSQL($sqlSub2);
				$dadosSub2 = self::listaQr($qrSub2);
				$textoSub2 = $dadosSub2['texto'];
				$nomeArqSub2 = $textoSub2 ."_". $textoNome;

				self::delNoticias("subcategoria='$textoNome'");
				$this->campoId 	= "texto";
				$this->valorId	= $textoNome;
				$this->tabela 	= "menu";
				self::delArquivos($nomeArqSub2);
				self::deletar();
			
			if(($subMenu == 1) && ($idMenu == 0)){
				self::delNoticias("categoria='$textoNome'");
				$this->campoId 	= "id";
				$this->valorId	= $this->id;
				$this->tabela 	= "menu";
				self::delArquivos($textoNome);
				self::deletar();
			}

		}elseif(($subMenu == 0) && ($idMenu>0)){
			//echo "terceiro if";
			$sqlSub   = "SELECT * FROM $this->tabela WHERE id='$idMenu'";
			$qrSub	  = self::execSQL($sqlSub);
			$dadosSub = self::listaQr($qrSub);
			
			$idSub2   = $dadosSub['id'];
			$subMenu2 = $dadosSub['sub_menu'];
			$texto2	  = $dadosSub['texto'];	
			
			$nomeArq1 = $texto2."_".$textoNome;
			// removendo as noticias relacionadas
		
			self::delNoticias("subcategoria='$textoNome'");
			$this->campoId 	= "texto";
			$this->valorId	= $textoNome;
			$this->tabela 	= "menu";
			self::delArquivos($nomeArq1);
			self::deletar();
					
		}elseif($idMenu == 0){
			
			self::delNoticias("categoria='$textoNome'");
			$this->campoId 	= "id";
			$this->valorId	= $idNome;
			$this->tabela 	= "menu";
			self::delArquivos($textoNome);
			self::deletar();
		}
		
	}// fim remover
	
	public function delNoticias($x){
		$sqlNot		= "SELECT * FROM noticias WHERE $x";
		$qrNot		= self::execSQL($sqlNot);
			while($dadosNot = self::listaQr($qrNot)){
				$this->tabela 	= "noticias";
				$this->letraIdImg	= "n_";
				$this->campoId 		= "id";
				$this->valorId 		= $dadosNot['id'];
				$this->pasta		= $_SERVER['DOCUMENT_ROOT']."/fotos/";
			
			$ft = self::removeFoto();	
			
			if($ft){
				self::deletar();
				}
			}//fim do loop
		
	}
	
	public function delArquivos($x){
		
		$txt = removeAcentos::clean(utf8_decode($x));
		$name = str_replace("-", "_", $txt);

			$nomeArq	= basePathArq . $name.".php";
			$nomeModel	= basePathModel . $name."Model.php";
			
			if(file_exists($nomeArq)){
				unlink($nomeArq);
			}
			if(file_exists($nomeModel)){
				unlink($nomeModel);
			}
		
	}
/*****************************************
*** METODOS DOS SUBMENUS
******************************************/
	public function cadastrarSub(){
		
		$categoria	=	self::codHtml($_POST['categoria']);
		$sql	= "SELECT * FROM menu WHERE texto='$categoria' limit 1";
		$qr		= self::execSQL($sql);
		$dados	= self::listaQr($qr);
		$idMenu	= $dados['id'];
		$subM	= $dados['sub_menu'];
		
		if($subM){
			$this->campos 	= "id_menu='$idMenu', texto='$texto', url='$urlSeo1', arquivo='$arquivo', tipo='$tipo', formato='$formato', coluna_lateral='$lateral', colunas='$colunas'";
			$this->campoId 	= "id";
			$this->valorId	= "$id";
			self::atualizar();		
		}
		
		$texto	 	= self::codHtml($_POST['texto']);
		$subMenu	= $_POST['submenu'];
		$arquivo	= 1;	
		$tipo		= $_POST['tipo'];
		$formato	= $_POST['formato'];
		$lateral	= $_POST['lateral'];
		$colunas	= $_POST['colunas'];

		$urlSeo = removeAcentos::clean(utf8_decode($_POST["texto"]));
		$urlSeoCat = removeAcentos::clean(utf8_decode($_POST['categoria']));
				
		
		$this->campos 	= "id_menu,texto, url, sub_menu, arquivo, tipo, formato, coluna_lateral, colunas";
		$this->dados	= "'$idMenu','$texto', '$urlSeo', '$subMenu', '$arquivo', '$tipo', '$formato', '$lateral','$colunas'";
		
		self::inserir();		
	}
	
	public function geraSubCategoria(){
		$sql = "SELECT * FROM $this->tabela WHERE id='$this->id'";
		$qr  = self::execSQL($sql);
		$dados = self::listaQr($qr);
		
		$this->gId 			= $dados['id'];
		$this->gSubId		= $dados['id_menu'];
		$this->texto 		= $dados['texto'];
		$this->subMenu 		= $dados['sub_menu'];
		$this->arquivo		= $dados['arquivo'];
		$this->tipo			= $dados['tipo'];
		$this->formato		= $dados['formato'];
		$this->lateral		= $dados['coluna_lateral'];
		$this->urlSeo 		= $dados['url'];
		$this->colunas 		= $dados['colunas'];
	}
	
	public function alterarSub(){


		$categoria	= self::codHtml($_POST['categoria']);
		$sql	 	= "SELECT * FROM menu WHERE texto='$categoria' limit 1";
		$qr		 	= self::execSQL($sql);
		$dados	 	= self::listaQr($qr);
		$idMenu	 	= $dados['id'];
		$txtMenu 	= $dados['texto'];
						
		$id			= mysql_real_escape_string($_POST['id']); 
		$subId		= $_POST['subId'];
		$texto	 	= self::codHtml($_POST['texto']);
		$arquivo	= 1;	
		$tipo		= $_POST['tipo'];
		$subMenu	= $_POST['submenu'];
		$formato	= $_POST['formato'];
		$lateral	= $_POST['lateral'];
		$subCatAnt	= $_POST['subCatAntiga'];
		$textoSubCat = $_POST['textoSubCat'];
		$colunas	= $_POST['colunas'];

		$sqlAnt		= "SELECT * FROM menu WHERE id='$subId' LIMIT 1";
		$qrAnt		= self::execSQL($sqlAnt);
		$dadosAnt	= self::listaQr($qrAnt);
		$catAnt		= $dadosAnt['url'];
		$txtMenuAnt	= removeAcentos::clean(utf8_decode($dadosAnt['texto']));
		
		$urlSeoCat 		= removeAcentos::clean(utf8_decode($_POST['categoria']));
		$urlSeo1 		= removeAcentos::clean(utf8_decode($_POST["texto"]));

		$urlSub 		= removeAcentos::clean(utf8_decode($_POST["textoSubCat"]));
			
		$this->campos 	= "id_menu='$idMenu', texto='$texto', url='$urlSeo1',sub_menu='$subMenu', arquivo='$arquivo', tipo='$tipo', formato='$formato', coluna_lateral='$lateral',colunas='$colunas'";
		
		$this->campoId 	= "id";
		$this->valorId	= "$id";
		self::atualizar();
				 
		$sqlNot	= "SELECT * FROM noticias WHERE url_categoria='$urlSeoCat' and url_subcategoria='$urlSub' ";
							
			$qrNot	= self::execSQL($sqlNot);
			while($dadoNot = self::listaQr($qrNot)){
				$this->tabela	= "noticias";
				$this->campos 	= "categoria='$categoria', subcategoria='$texto', url_categoria='$urlSeoCat', url_subcategoria='$urlSeo1'";
				$this->campoId 	= "id";
				$this->valorId	= $dadoNot['id'];
				self::atualizar();
			}
	}// fim do metodo
	
}// fim da classe=
?>