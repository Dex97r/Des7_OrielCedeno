<?php
session_start();
?>
<HTML LANG="es">
<HEAD>
<TITLE>Desconectar</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<?PHP
if (isset($_SESSION["usuario_valido"]))
{
    session_destroy ();
print ("<BR><BR><P ALIGN='CENTER'>Conexion finalizada</P>\n");
print ("<P ALIGN='CENTER'> [<A HREF='login.php'>Conectar</A> </P>\n");
}

else
{
print ("<BR><BR>\n");
print ("<P ALIGN='CENTER'>No existe una conexion activa</P>\n");
print ("<P ALIGN='CENTER'> <A HREF='login.php'>Conectar</A> </P>\n");
}
?>
</BODY>
</HTML>
