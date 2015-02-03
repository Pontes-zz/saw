<?php
	class permissao{
		private $url;
		private $_explode;
		public $arquivos;
		public $permitidos;
		
		public function __construct(){
			$this->setUrl();
			$this->setExplode();
			$this->setArquivos();
		}
		
		private function setUrl(){
			$_GET['url'] = (isset ($_GET['url']) ? $_GET['url'] : 'index');
			$this->url = $_GET['url'];
		}
		
		private function setExplode(){
			$this->_explode = explode ('/', $this->url);
		}
		
		private function setArquivos(){
			$this->arquivos  = str_replace("-", "_", $this->_explode[0]);
		}
			
		public function allowConteudo(){
			
				if(isset($this->arquivos) && $this->arquivos != 'index' && $this->arquivos != '' && $this->arquivos != 'principal'){
					$allowCont = "paginas/".$this->arquivos;
				}else{
					$allowCont = "paginas/banner";
				}
				return $allowCont.".php";
		}
		
		
		public function idEncontrado(){
			$id = (!isset($this->_explode[1]) || $this->_explode[1] == null ?  '0' : $this->_explode[1]);
			return $this->idEnc = $id;
			
		}
		
		public function estilos(){
			return $this->arquivos;
		}
		
		public function breadCrumb(){
			$y = $this->_explode;
			return $y;
		}
	}
	?>