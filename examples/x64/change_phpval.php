<?php
require __DIR__."/../../src/autoload.php";
$code = <<<CODE

	ret
CODE;
$x64 = new PhpNasm\Arch\x64($code);
$code = $x64->compile();
$a = "PHP Indonesia for Student abcdef";
$exe = new PhpNasm\Executor($code);
unset($code);
$exe->execute($a);
var_dump($a); // Must be "Hello World!!!!!!!"
