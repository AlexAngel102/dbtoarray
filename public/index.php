<?php
$start = microtime(true);
use App\DB;
use App\Psr4Autoloader;
use App\Tree;

require_once __DIR__."/../Classes/Psr4Autoloader.php";

$autoloader = new Psr4Autoloader();
$autoloader->addNamespace("App", __DIR__ . '/../Classes');
$autoloader->register();

$query = "
    SELECT SQL_NO_CACHE *
    FROM categories;
";

$db = new DB();
$result = $db->makeQuery($query);

$tree = new Tree();
$tree->prepareResult($result);
$tree = $tree->makeTree();

print_r($tree);

echo 'Script execution time take :' . round(microtime(true) - $start, 3) . ' сек.';


