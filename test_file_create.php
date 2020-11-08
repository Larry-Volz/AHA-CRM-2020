<?

$filename="mydata.txt";
$newfile=fopen($filename, "w+") or die ("Couldnt create the file");
fclose($newfile);
$msg = "<P>File Created!</P>";
?>
<HTML>
<HEAD>
<TITLE>Creating a New File</TITLE>
</HEAD>
<BODY>
<? ECHO "$msg"; ?>
</body>
</html>