<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php
function userSort($a, $b)
{
    // smarts is all-important, so sort it first
    if ($b == "smarts") {
        return 1;
    }
    else if ($a == "smarts") {
        return −1;
    }
    return ($a == $b) ? 0 : (($a < $b) ? −1 : 1);
}

$values = array(
    'name' => "Buzz Lightyear",
    'email_address' => "buzz@starcommand.gal",
    'age' => 32,
    'smarts' => "some"
);

if ($_POST['submitted']) {
    $sortType = $_POST['sort_type'];
if ($sortType == "usort" || $sortType == "uksort" || $sortType == "uasort") {
    $sortType($values, "user_sort");
} else {
    $sortType($values);
}
 
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">

<input type="radio" name="sort_type"
value="sort" checked="checked" /> Standard<br />
<input type="radio" name="sort_type" value="rsort" /> Reverse<br />
<input type="radio" name="sort_type" value="usort" /> User-defined<br />
<input type="radio" name="sort_type" value="ksort" /> Key<br />
<input type="radio" name="sort_type" value="krsort" /> Reverse key<br />
<input type="radio" name="sort_type"
value="uksort" /> User-defined key<br />
<input type="radio" name="sort_type" value="asort" /> Value<br />
<input type="radio" name="sort_type"
value="arsort" /> Reverse value<br />
<input type="radio" name="sort_type"
value="uasort" /> User-defined value<br />
</p>
<p align="center"><input type="submit" value="Sort" name="submitted" /></p>
<p>Values <?= $_POST['submitted'] ? "sorted by {$sortType}" : "unsorted"; ?>:</p>
<ul>
<?php foreach ($values as $key => $value) {
echo "<li><b>{$key}</b>: {$value}</li>";
} ?>
</ul>
</form>
</body>
</html>