<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/mySqlConn.class.php");

	class criaPaginacao extends MySqlConn{
				
		private $ida, $param;
		private $maxPage, $maxLink, $numeroPaginas;
		private $sqlA, $sqlB, $sqlC;
		private $fileName, $nomeArquivoHTML;
		private $temp;
		private $passoA, $passoB;
		private $qrA, $qrB, $qrC;
		private $totRegA, $totRegB;
		private $resultadoTotal, $resultadoParcial, $resultadoDiv, $numeroInt;
		private $pagAtual, $proxPag, $ultPag, $pagAnt;
		private $regInicial;
		private $dadosGerados;
		private $registroFinal;
		
		public function setParametro($cod){
			$this->ida = $cod;
		}
		
		public function setFileName($file){
			$this->fileName = $file;
		}
		
		public function setInfoMaxPag($max){
			$this->maxPage = $max;
		}
		
		public function setMaximoLinks($max){
			$this->maxLink = $max;
		}
		
		public function setSQL($qr){
			$this->sqlA = $qr;
		}
		
		public function setContador($cont){
			$this->registroFinal = $this->param + $cont;
		}
		
		public function setNomeArquivoHTML($arq){
			$this->nomeArquivoHTML = $arq;
		}
		
/**********************************************************************************************************/		

		protected function iniciaPaginacao(){
		
			if (empty($this->ida)){
				$this->param = 0;
			} else {
				$this->temp = $this->ida;
				$this->passoA = $this->temp - 1;
				$this->passoB = $this->passoA * $this->maxPage;
				$this->param = $this->passoB;
			}	
				//$parametroTemp = $this->parametro - 1;
				$this->sqlB = $this->sqlA." LIMIT ".$this->param.",".$this->maxPage;
				
				//cria as conexões
				$this->qrA = self::execSQL($this->sqlA);
				$this->qrB = self::execSQL($this->sqlB);
  				$this->totRegA = self::contaDados($this->qrA);
				$this->totRegB = self::contaDados($this->qrB);

				//carrega as variáveis
			
				$this->resultadoTotal = $this->totRegA;
				$this->resultadoParcial = $this->totRegB;
				$this->resultadoDiv = $this->resultadoTotal / $this->maxPage;
				$this->numeroInt = (int)$this->resultadoDiv;
				if ($this->numeroInt < $this->resultadoDiv){
					$this->numeroPaginas = $this->numeroInt + 1;
				}else{
					$this->numeroPaginas = $this->resultadoDiv;
				}
				$this->pagAtual = $this->param / $this->maxPage + 1;
				$this->regInicial = $this->param + 1;
				$this->pagAnt = $this->pagAtual - 1;
				$this->proxPag = $this->pagAtual + 1;
		}
		protected function results(){
			$this->dadosGerados = self::listaQr($this->qrB);
			return $this->dadosGerados;
		}
		
		protected function resultado(){
			$this->sqlC = $this->sqlA;
			$this->qrC = self::execSQL($this->sqlC);
			$this->dados = self::listaQr($this->qrC);
			return $this->dados;
		}


/**********************************************************************************************************/		

		public function geraNumeros(){
			echo "<div id=\"numeracao\"> \n";
			echo '<div class="paginacao"> <span class="paginacao1">';
			
			if($this->numeroPaginas == 1){
				echo "P&aacute;gina: ";
			}else{
				echo "P&aacute;ginas: ";
			}
			
			echo $this->pagAtual.' de '.$this->numeroPaginas.'</span>';
  				
			if ($this->ida > 1) { 
                echo "<a href=\"$this->fileName$this->pagAnt/\" title=\"$this->pagAnt\" class=\"ant\">&nbsp;</a>\n";
					   }
			           if ($this->temp >= $this->maxLink){
			             if ($this->numeroPaginas > $this->maxLink){
						     $n_maxlnk = $this->temp + 6;
			                 $this->maxLink = $n_maxlnk;
			                 $n_start = $this->maxLink - 6;
			                 $lnk_impressos = $n_start;
				         }
			           }
			           //mostra os números das páginas
					   while(($lnk_impressos < $this->numeroPaginas) and ($lnk_impressos < $this->maxLink)){ 
				           $lnk_impressos ++; 
							  // Mostra a página atual sem o link
							  if ($this->pagAtual == $lnk_impressos){
								 echo "<span class=\"atual\"> $lnk_impressos </span> \n";
				           //mostra os números das 
						   }else{
                              echo "<a href=\"$this->fileName$lnk_impressos/\" title=\"$lnk_impressos\" >$lnk_impressos</a>\n";
						      } 
					       }
                      // mostra o link PRÓXIMO >>
					  if ($this->registroFinal < $this->resultadoTotal){
                            echo"<a href=\"$this->fileName$this->proxPag/\" title=\"$this->proxPag\" class=\"prox\">&nbsp;</a>\n";
					 }				
		echo "</div><br>\n";
	echo "</div>\n";
		}
		
		public function getTime(){ 
			list($sec, $usec) = explode(" ",microtime()); 
			return ($sec + $usec); 
		}

	}
?>