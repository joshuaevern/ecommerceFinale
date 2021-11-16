<?php

//session start
session_start();

//destroy session
session_destroy();

header("Location: ../view/index.php");
?>