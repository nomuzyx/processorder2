<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
	<title>
		Noman's Auto Parts
	</title>

</head>
<body>
	<h1>Noman's Auto Parts.</h1>
	<h2>Customer Order</h2>
	<?php
		 $fp =fopen("$DOCUMENT_ROOT/processorder/rootdoc.txt",'r');

		if (!$fp)
		{
			echo"<p><strong>Please Try Again Later.</strong></p></body></html>";
			exit;
		}

		while(!feof($fp))
		{
			$order=fgets($fp,999);
			echo $order."</br>";
		}
		fclose($fp);
	?>
</body>
</html>