<html>

<head>
  <title></title>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>

<body>

<?php

echo "<h1>".time()."</h1>";

// The message
$message = "test line... see if PHP will mail me.  IT WORKS!!!";

// Send
mail('larry@americanhypnosisclinic.com', 'Test subject', $message);


?>

</body>

</html>