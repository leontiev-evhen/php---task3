<?php

    require_once 'config.php';
    require_once 'libs/File.php';
    require_once 'libs/Main.php';

    try
    {
       $file = new File('test');
       // $result_char = $file->readCharFile(2, 3);
       // $result_line = $file->readLineFile(2);
       
       $file2 = new Main($file);
       $result_line = $file2->getLinesFile();
       $result_char = $file2->getCharsFile();
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }

    require_once 'templates/index.php';

?>
