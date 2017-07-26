<?php
require_once 'config.php';
require_once 'libs/File.php';

try
{
    $file = new File();
    $result = $file->replaceTextFile('', '', 'test');
}
catch (Exception $e)
{
    $result = $e->getMessage();
}


require_once 'templates/index.php';

?>