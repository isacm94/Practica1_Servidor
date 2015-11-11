<?php
if (!isset($_GET['page'])) {
    include("/views/principal.html");
} else {
    include($_GET['page'].".php");
}
?>