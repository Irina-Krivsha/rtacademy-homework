<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>7.5</title>
</head>
<body>

<form action="" method="GET">
    <label for="cityname">Місто</label>
    <input type="text" id="cityname" name="city" value="<?php echo(htmlspecialchars($city = $_GET ['city']));?>">
    <button type="submit">Надіслати</button>
</form>
<?php
function cityname(string $city):string
    {
        $city=strip_tags($city);
        $city=trim ($city);
        $city=strtolower($city);
        $city=ucfirst ($city);
        return ($city);
    }
if ($city!=null)
{
    var_dump(cityname($city));
}
?>
</body>
</html>