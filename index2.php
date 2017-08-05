<?php
    require_once 'config.php';
    require_once 'libs/File.php';
    require_once 'libs/Main.php';

    try
    {
        $file = new File('test');
        $file->replaceTextFile('I', 'i', 'test');

        $main = new Main($file);
        $result_line = $main->getLinesFile();
        $result_char = $main->getCharsFile();
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }


    require_once 'templates/index2.php';

?>