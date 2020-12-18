<html>
<head>
<link rel="stylesheet" href="picStyle.css" />

</head>
<body>

<?php

$image = $_GET['picture'];

echo "<img class='bigPic' src='".$image."' alt='large image'>";

?>

<h1 style="text-align:center"><a href="javascript:history.back()">Go Back</a></h1>
</body>
</html>