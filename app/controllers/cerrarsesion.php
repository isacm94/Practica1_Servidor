<?php

session_unset();
session_destroy();

header('Location: index.php');  

//include_once CTRL_PATH.'principal.php';

