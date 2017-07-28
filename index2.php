<?php
    require_once 'config.php';
    require_once 'libs/File.php';

    try
    {
        $file = new File('test');
        $result = $file->replaceTextFile('', '', 'test');
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }


    require_once 'templates/index2.php';

?>