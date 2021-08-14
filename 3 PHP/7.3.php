<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>7.3</title>
</head>
<body>
<?php
$str = 'Hello World';
function myStrShuffle (string $str):string 
{
    $arr15=str_split ($str);
    shuffle ($arr15);
    $str=join ($arr15);
    return $str;
}
?>
</body>
</html> 