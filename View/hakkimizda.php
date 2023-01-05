<?

Core\View::require("1.php");

print "<title>Hakkımızda</title>";

print "<div class=tablo>";

print "<h3>Hakkımızda</h3>";
print "<p>";

$hakkimizda = Api\Meta::get("hakkimizda");
print nl2br($hakkimizda);

print "</p>";
print "</div>";

Core\View::require("2.php");
