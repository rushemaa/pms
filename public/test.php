<?php
require_once "includes/Enc.php";
echo $hash->encode("hello");
echo $hash->decode("hello");