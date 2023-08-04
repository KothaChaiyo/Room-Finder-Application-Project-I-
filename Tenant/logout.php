
<?php

session_start();

unset($_SESSION["tname"]);

unset($_SESSION["temail"]);
unset($_SESSION["tcontact"]);

?>


<script>
window.location="../Public/login.php";
</script>