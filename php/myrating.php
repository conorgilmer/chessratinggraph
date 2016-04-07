<?php session_start(); ?>
<html>
<head><title>My Rating</title></head>
<body>

<H1> My Rating </H1>

<?php $_SESSION['variable'] = "blaber";  ?>
<img src="rating.php?param=jumble"/>
<p>
Gradual decline....
</p>

<?php $_SESSION['variable'] = "petron";  ?>
<img src="rating.php?param=boogie"/>
<p>
Gradual decline....
</p>

</body>
</html>
