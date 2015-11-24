<?php
include_once MODEL_PATH.'login.php';
include_once HELP_PATH.'help_usuarios.php';

$usuarios = GetUsuarios();

include_once VIEW_PATH.'listausuarios.php';
