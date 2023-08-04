
<?php

session_start();

unset($_SESSION["lname"]);

unset($_SESSION["lemail"]);
unset($_SESSION["lcontact"]);

?>


<script>
window.location="../Public/login.php";
</script>