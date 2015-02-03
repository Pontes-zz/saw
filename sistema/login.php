<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel de Controle :: Nova Vida Maric&aacute;</title>
<link href="css/estilosadm.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#ebebeb">
<div id="caixa"><center>
  <img src="imagens/logo_login.png" width="296" height="96" />
</center>
  <form action="classes/loginSistema.php" method="post" name="logar" id="logar">
  <div id="cxLogin"><label>Login</label><input name="login" type="text" class="loginInput" size="25" />
  <label>Senha</label>
    <input name="senha" type="password" class="loginInput" id="senha" size="25" />
    <input name="txtlocal" type="hidden" id="txtlocal" value="formLogin" />
    <input name="logar" type="submit" class="btenviar" id="logar" value="LOGIN" />
	<span class="msgLogin"><?php echo base64_decode($_GET['msn']); ?></span></div>
</form>
</div>
</body>
</html>