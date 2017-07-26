<?php

/**
 * Class File
 * User: yevhen
 * Date: 26.07.17
 * Time: 11:15
 *
 * class for work with files
 */
class File
{
    public function readLinesFile ($file)
    {
        if ($this->checkExistFile($file) && $this->checkAccess($file))
        {
            if ($readFile = fopen(PATH.$file, 'r'))
            {
                while(!feof($readFile))
                {
                    $arrayLines[] = htmlentities(fgets($readFile));

                }
                fclose($readFile);
                return implode('<br>', $arrayLines);
            }
            else
            {
                throw new Exception( $file.' not read');
            }

        }
    }

    public function readCharsFile ($file)
    {
        if ($this->checkExistFile($file) && $this->checkAccess($file))
        {
            if ($readFile = fopen(PATH.$file, 'r'))
            {
                $arrayChars = '';

                while (false !== ($char = fgetc($readFile)))
                {
                    $arrayChars .= $char;
                }

                fclose($readFile);
                $arrayChars = str_replace('.', '.<br>', $arrayChars);
                return $arrayChars;
            }
            else
            {
                throw new Exception( $file.' not read');
            }

        }
    }
    
    public function replaceTextFile ($search, $replace, $file)
    {
        if ($this->checkExistFile($file) && $this->checkAccess($file))
        {
            $content = PATH.$file;

            $fileContent = file_get_contents($content);

            $fileContent = str_replace($search, $replace, $fileContent);

            if(file_put_contents($content, $fileContent))
            {
                return $this->readLinesFile($file);
            }
            else
            {
                throw new Exception('Don\'t have permission');
            }
        }
    }


    private function checkExistFile ($file)
    {
        if (file_exists(PATH.$file))
        {
            return true;
        }
        else
        {
            throw new Exception('File '.$file.' does not exist');
        }
    }

    private function checkAccess ($file)
    {
        if (ACCESS == substr(sprintf('%o', fileperms(PATH.$file)), -3))
        {
            return true;
        }
        else
        {
            throw new Exception('Don\'t have permission');
        }
    }
}