<?php
    require_once 'config.php';
    require_once 'libs/File.php';

    try
    {
        $file = new File('test');
        $result_char = $file->readCharFile(2, 3);
        $result_line = $file->readLineFile(2);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }

    require_once 'templates/index.php';

?>