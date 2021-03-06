<?php
require __DIR__."/../../src/autoload.php";
$code = <<<CODE
    mov r9, rdi

	mov rsi, [r9] ; get parameter 6
    mov rsi, [rsi]
    add rsi, 24
	mov rax, 1
	mov rdi, 1
	mov rdx, 12
	syscall

	mov rsi, [r9+8] ; get parameter 5
    mov rsi, [rsi]
    add rsi, 24
	mov rax, 1
	mov rdi, 1
	mov rdx, 12
	syscall

	mov rsi, [r9+16] ; get parameter 4
    mov rsi, [rsi]
    add rsi, 24
	mov rax, 1
	mov rdi, 1
	mov rdx, 12
	syscall

	mov rsi, [r9+24] ; get parameter 3
    mov rsi, [rsi]
    add rsi, 24
	mov rax, 1
	mov rdi, 1
	mov rdx, 12
	syscall

	mov rsi, [r9+32] ; get parameter 2
    mov rsi, [rsi]
    add rsi, 24
	mov rax, 1
	mov rdi, 1
	mov rdx, 12
	syscall

	mov rsi, [r9+40] ; get parameter 1
    mov rsi, [rsi]
    add rsi, 24
	mov rax, 1
	mov rdi, 1
	mov rdx, 12
	syscall

	ret
CODE;

$x64 = new PhpNasm\Arch\x64($code);
$code = $x64->compile();

$a = "parameter 1\n";
$b = "parameter 2\n";
$c = "parameter 3\n";
$d = "parameter 4\n";
$e = "parameter 5\n";
$f = "parameter 6\n";

$exe = new PhpNasm\Executor($code);
$exe->execute($a, $b, $c, $d, $e, $f);
