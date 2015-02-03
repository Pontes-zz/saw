// JavaScript Document
/********************************** 
Formatação para qualquer mascara 
***********************************/
function formatar(src, mask) 
{
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i)
if (texto.substring(0,1) != saida) 
  {
	src.value += texto.substring(0,1);
  }
}
/*****************************************
*** FORMULÁRIO FALE CONOSCO
******************************************/
function verForm(){
	var nome = document.getElementById("txtnome");	
	var email = document.getElementById("txtemail");	
	var cidade = document.getElementById("txtcidade");	
	var estado = document.getElementById("txtestado");	
	var mensagem = document.getElementById("txtmensagem");
	var tel = document.getElementById("txttel");
	
	if(nome.value == "" || email.value == "" || mensagem.value == "" || tel.value == ""){
		alert("Os campos com asterisco devem ser preenchidos!");
		return false;
	}else{
		return true;
	}
}

/*****************************************
*** POP-UP
******************************************/
function openWindow(url, nomeWindow,config){
  		janela = window.open(url,nomeWindow,config);
		text = "Se a janela não abrir, é porque você tem um programa \r bloquedor de pop-ups! \r o Windows XP Bloqueia Pop-up";
		if(janela == null) {
			alert(text); 
			return false;
		}
   		janela.moveTo(300,200);
}

/***********************************************
** Cadastro de MENUS
************************************************/
	function limpa(str) {                
	   var tamanho = str.length;
	   var novaString = "";
	   for(i = 0; i <= tamanho; i++ ) {
		  if( str.charAt(i) != " " ) {
			 novaString += str.charAt(i);
		  }
	   }
	   return novaString;
	}   
	function insereNomeCss(){
	
		var descricao = document.getElementById("txtDescricao");
		var css = document.getElementById("txtCss");
		
		css.value = "bt_"+limpa(descricao.value);
	}


// Controla Imagens
function PrevFoto(img, id){
  foto1= new Image();
  foto1.src=(img);
  Controlla(img, id);
}
function Controlla(img , id){
  if((foto1.width!=0)&&(foto1.height!=0)){
    viewFoto(img, id);
  }
  else{
    funzione="Controlla('"+img+"')";
    intervallo=setTimeout(funzione,20);
  }
}
function viewFoto(img, id){
  largh=foto1.width;
  altez=foto1.height+60;
  stringa="width="+largh+",height="+altez+",scrollbars=yes";
  finestra=window.open("popup.php?img="+id,"",stringa);
  finestra.moveTo(300,200);
}
