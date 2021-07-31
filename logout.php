<?php
include "includes/studentMenu.php";
include "includes/databaseConnection.php";
?>

<div class="container">
 
 <?php

session_destroy();
header("Location:index.php");
?>

</div>


</div>
</body>
</html>

