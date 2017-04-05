<?php

setcookie('pseudo', $_SESSION['pseudo'], time() + 365*24*3600, null, null, false, true);

?>