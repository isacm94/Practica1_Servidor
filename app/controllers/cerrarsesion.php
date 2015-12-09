<?php

/**
 * CONTROLADOR que cierra la sesión
 */
session_unset();
session_destroy();

header('Location: index.php');



