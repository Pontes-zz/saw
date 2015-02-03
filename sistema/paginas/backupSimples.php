
primeiro iniciamos com os nome do servidor,usuario,senha do banco de dados e o 
nome do banco de dados
iniciando a função e entrar com dois parametros o path onde ira salvar o 
arquivo de backup e o nome do banco de dados.
<?php 
include_once("classes/config_var.php");

/*define(baseBanco, 'localhost');
define(userBanco, 'tkdsmu_pontes');
define(passBanco, 'passwd#2013');
define(dbaBanco, 'tkdsmu_banco');*/
 
function BackupDb($salva){

 //variavel que recebe o nome do servidor na maioria dos casos localhost
 @$host = baseBanco;
 //variavel que recebe o usuario do banco na maiorias dos casos root 
 @$user = userBanco; 
 //variavel que recebe a senha do banco de dados 
 @$password = passBanco;
 //variavel que recebe o nome do banco de dados que sera salvo 
 @$bancoDB = dbaBanco;

//conectando a  com o banco de dados isso é  muito simples 
 $db = mysql_connect($host,$user,$password,$bancoDB) or die ("Erro 1:".mysql_error());
//selecionando o banco de dados 
//colocamos um if para testar se o conseguir conectar executa o codigo interno se não com die eu cancelo a execução do programa
 if (mysql_select_db($bancoDB,$db)){
//com show tables listamos todas tabelas do banco de dados 
// logo apos executamos o query com o die se haver algum erro 
// criamos uma variavel que vai receber a data atual para termos controle dos backups	
   @$TextoSql = "SHOW TABLES FROM $bancoDB";   
   @$CONS = mysql_query(@$TextoSql) or die ("ERRO: ".mysql_error());
   @$data = date("d-m-y");

//colocamos uma variavel que ira receber o caminho onde sera salvo o nome do arquivo ficara bancodedados_14-07-07   
// abrimos um arquivo com fopen se ele ja existir sera substituido
   @$nomeArquivo = @$bancoDB."_".@$data.".sql";
   @$diretorio ="$salva/$nomeArquivo";
   @$open = fopen(@$diretorio,"w")or die(" O arquivo não pode ser criado !");

 // agora vem a parte mais complicada com  os tres whiles abaixo vamos inserir todo o conteudo no arquivo criado
 //enquanto existir tabelas no banco de dados
  while ($row = mysql_fetch_row(@$CONS)) {		   
		@$TextoSql2 = "SHOW CREATE TABLE $row[0]";
		@$CONS2 = @$mysql_query(@$TextoSql2) or die ("ERRO 1: ".mysql_error());
// o show create table no comando sql imprime tudo para que seja criado identica a que ja existe 
//enquanto existir tabelas pra ser criadas ele ira executar 		
		while ($row2 = mysql_fetch_row(@$CONS2)) {
					 //inserindo no arquivo o conteudo do segundo e primeiro while
					  fwrite(@$open,"\n#\n# Criação da Tabela : $row[0]\n#\n\n");
                	  fwrite(@$open,"$row2[1] ;\n\n#\n# \n#\n\n");
		           //fazendo uma nova consulta que ira selecionar todo o conteudo das tabelas 
				   @$TextoSql3 = "SELECT * FROM $row[0]";
				   @$CONS3 = mysql_query(@$TextoSql3) or die("ERRO 3: ".mysql_error());
                   //enquanto existir valor ira executar 				  
				  while($row3 = mysql_fetch_array(@$CONS3)){
						 $array1 = array_keys($row3);
						// agora iniciamos uma variavel de texto onde ira receber os comandos sql para ser enserido os campos ta tabela 
						$sql1= "INSERT INTO `$row[0]`(";
							 //for para ficar nesse formato (valor,valor2)values(teste1,teste2);
							 //obs tb evita nomes de tabelas com numeros mais se for o seu caso so retitar o if que faz essa restrição
							 for($i=1; $i< count(@$array1);$i++){
										if(!isset($array1[$i]))
											$sql1 .= " ,";
										elseif($array1[$i] =="" || is_numeric($array1[$i])){								   		
											$array1[$i] ="";
										}elseif($array1[$i]!= ""){
											$sql1 .= " `".addslashes($array1[$i])."`,";
										}else
											$sql1 .= " ,";
							  }//fecha for
						 $sql1 = ereg_replace(",$", "", $sql1);
						 $sql  =") VALUES(";
							 for($j=0; $j<mysql_num_fields(@$CONS3);$j++){
									if(!isset($row3[$j]))
										$sql .= " ,";
									elseif($row3[$j] != "")
										$sql .= "' ".addslashes($row3[$j])."',";
									elseif($row3[$j] =="")
										$sql .= "'".addslashes($row3[$j])."',";
									else
										$sql .= " ,";
							 }//fecha for
							
	    $sql = ereg_replace(",$", "", $sql);
	    $sql .= ");\n";
		// a variavel tudo recebe a concatenação das duas strings 
	    $tudo = $sql1." ".$sql;
	    // inserimos o ultimos valores 
		fwrite(@$open,$tudo);
									
				   }//fechando while 3
				   				   
		   }//fechando while 2		 
		 }//fechando while 1
	// pronto a parte mais dificil já foi  aqui fechamos o arquivo 
	fclose(@$open);
	
	//com a função header tudo fica mais facil 
	//criamos duas função para procurar o arquivo do tipo sql 
	// e outra para chamar o arquivo pra download
	$arquivo = @$nomeArquivo;
	header("Content-type: application/sql");
	header("Content-Disposition: attachment; filename=$arquivo");
    // lê e exibe o conteúdo do arquivo gerado
    readfile($arquivo);
	
 }else{
	die("Erro 2: ".mysql_error());
  
 }
 
}//fechando a função BackupDb
?>

