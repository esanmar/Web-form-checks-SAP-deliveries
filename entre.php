<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title></title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
  body { font-family: Helvetica, Arial, sans-serif; }
	h1 { text-transform: uppercase; color: #005366; }
	label { display: block; margin-bottom: 0.4em; }
	label div { display: inline-block; width: 8em; }
	label input[type="text"] { padding: 1.5em; border: 1px solid #0093b3; }
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>


<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
function validateForm() { 
  $.validate({
    validateOnBlur : true, // disable validation when input looses focus
    scrollToTopOnError : true // Set this property to true on longer forms
  });
}
</script>
<script type="text/javascript">

$(document).ready(function(){
    $("#dato").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            obtenerDatos();
        }
    });
});

function obtenerDatos(){
	var as_valor = ($("#dato").val());
	var valorn = "";
	var j = 0;
	if (document.getElementById(as_valor).value == '')
	{
		document.getElementById(as_valor).value = as_valor;
	} else {
		while (j < 20)
		{
			 j = j + 1;
			 valorn = "";
			 valorn =  as_valor + j.toString();
			// alert(valorn);
			 if (document.getElementById(valorn) != null) {
				 	if (document.getElementById(valorn).value == '')
					{
				 		document.getElementById(valorn).value = valorn;
				 		break;
				 	}
			 	}
			}
  }
	document.getElementById('dato').value = "";
	document.getElementById('dato').focus();
}

</script>


</head>
<body>
  
  	<input type="text" id="dato" autofocus> LECTURA DE LOTE CON PISTOLA
  	<table align="center" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<form class="commentForm" action="http://www.aerometalls.com/entregasay/ok.html">
<?php

$query = $_GET['query']; 


$conn = mysqli_connect("*****", "****", "****", "****");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "SELECT Lote, Cantidad, Material FROM entregasay WHERE (`entrega` LIKE '%" . $query . "%')";
//echo "sql: " .$sql;
$result = mysqli_query($conn, $sql);;

while($row =  $result->fetch_assoc()){ 
			$lote = $row['Lote'];
			$cantidad = (int)$row['Cantidad'];
			$material = $row['Material'];
			
			?>
		<th><h2><?php echo $material;	?></h2></th>
		<tr>			
<?php
			while($cantidad>0){
?>
			
			<td align="center" >
			<label>
				
				<div><h3 id="code<?php echo "text";	?>"><?php echo $lote . "  ";	?></h3></div>
				<?php
					if($cantidad>1) {
				?>
					<input type="text" name="code" id="<?php echo $lote . $cantidad;	?>"  class='required' required data-validation="required"  data-validation-event="keyup change" class="error" data-validation-have-been-blurred="1" style="border-color: rgb(185, 74, 72);">
				<?php
					} else {
				?>
					<input type="text" name="code" id="<?php echo $lote?>"  class='required' required data-validation="required"  data-validation-event="keyup change" class="error" data-validation-have-been-blurred="1" style="border-color: rgb(185, 74, 72);">
				<?php
					} 
				?>
			</label>
			</td>

<?php
			$cantidad = $cantidad - 1;
			}
?>			
			</tr>
<?php
}

/* Free connection resources. */
mysql_close($conn);

?>
</table>
<br>
   <input class="submit" type="submit" value="Submit" />
     <!--<span onclick="validateForm()">VALIDAR</span>-->

</form>
	<br>
	<br>
	<br>
	<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.aerometalls.com/entregasay">Volver</a>

</body>
</html>
