<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");

class geraMenus extends manipulaDados{
	
	public function criaMenu(){
		$sql = "SELECT * FROM menu WHERE id_menu='0' ORDER BY id ASC";
			$qr = self::execSQL($sql);
			//gera menu produtos
			echo "\n";
			while($listaop = self::listaQr($qr)){
					echo '<option value="'.$listaop['texto'].'"';
					if($op == $listaop['id']){
						echo 'selected="selected" ';
					}
					echo ">".$listaop['texto']."</option> \n";
				}
	}

		
	public function geraMenu($op){
		$sql = "SELECT * FROM menu ORDER BY id ASC";
			$qr = self::execSQL($sql);
			//gera menu produtos
			echo "\n";
			while($listaop = self::listaQr($qr)){
					echo '<option value="'.$listaop['texto'].'"';
					if($op == $listaop['id']){
						echo 'selected="selected" ';
					}
					echo ">".$listaop['texto']."</option> \n";
				}
	}
	
	public function geraSubMenu($op){
		$sql = "SELECT * FROM menu WHERE sub_menu='1' ORDER BY id ASC";
			$qr = self::execSQL($sql);
			//gera menu produtos
			echo "\n";
			while($listaop = self::listaQr($qr)){
					echo '<option value="'.$listaop['texto'].'"';
					if($op == $listaop['id']){
						echo 'selected="selected" ';
					}
					echo ">".$listaop['texto']."</option> \n";
				}
	}
	
	public function cadastraMenu(){
		$sql = "SELECT * FROM $this->tabela ORDER BY id ASC";
		$qr  = self::execSQL($sql);
		while($dados = self::listaQr($qr)){
			echo '<option value="'.$dados['id'].'" >'.$dados['texto'].'</option>';
			}
	}

}// fim da classe

?>