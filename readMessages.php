<?php
	readfile('data/messages.txt');
?>

<?php
	
/*	$line = '';

$f = fopen('data/messages.txt', 'r');
$cursor = -1;

fseek($f, $cursor, SEEK_END);
$char = fgetc($f);


while ($char === "\n" || $char === "\r") {
    fseek($f, $cursor--, SEEK_END);
    $char = fgetc($f);
}

while ($char !== false && $char !== "\n" && $char !== "\r") {

    $line = $char . $line;
    fseek($f, $cursor--, SEEK_END);
    $char = fgetc($f);
}

echo $line;*/
?>
