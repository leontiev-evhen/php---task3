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
    /**
     * @var string $file
     * */
    private $file;

    /**
     * @param string $file
     * */
    public function __construct ($file)
    {
        if ($this->checkExistFile($file) && $this->checkAccess($file))
        {
            $this->file = file(PATH_FILE.$file);
        }
    }

    /**
     * get content file
     *
     * @return string
     * */
    public function readLinesFile ()
    {
        foreach($this->file as $line)
        {
            $arrayLines[] = $line;
        }
        return implode('<br>', $arrayLines);
    }

    /**
     * get file line’s
     * @param int $lineNumber
     * @return string
     * */
    public function readLineFile ($lineNumber)
    {
        if ($this->checkNumber($lineNumber))
        {
            $searchLine = false;
            $lenght = count($this->file);
            for ($i = 1; $i <= $lenght; $i++)
            {
                if ($lineNumber == $i)
                {
                    $searchLine = $this->file[$i - 1];
                    break;
                }
            }

            if ($searchLine)
            {
                return $searchLine;
            }
            else
            {
                throw new Exception( 'Line not found' );
            }
        }
    }

    /**
     * get file char’s
     * @param int $lineNumber
     * @param int $charNumber
     * @return string
     * */
    public function readCharFile ($lineNumber, $charNumber)
    {
        if ($this->checkNumber($charNumber))
        {
            $line = $this->readLineFile($lineNumber);
            if (isset($line[$charNumber - 1]))
            {
                return $line[$charNumber - 1];
            }
            else
            {
                throw new Exception('Char not found');
            }
        }
    }


    /**
     * replace text in the file
     * @param string $search
     * @param string $replace
     * @param string $file
     * @return string
     * */
    public function replaceTextFile ($search, $replace, $file)
    {
        if ($this->checkExistFile($file) && $this->checkAccess($file))
        {
            $content = PATH_FILE.$file;

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

    /**
     * check exist file
     * @param string $file
     * @return boolean
     * */
    private function checkExistFile ($file)
    {
        if (file_exists(PATH_FILE.$file))
        {
            return true;
        }
        else
        {
            throw new Exception('File '.$file.' does not exist');
        }
    }

    /**
     * check access to file
     * @param string $file
     * @return boolean
     * */
    private function checkAccess ($file)
    {
        if (ACCESS == substr(sprintf('%o', fileperms(PATH_FILE.$file)), -3))
        {
            return true;
        }
        else
        {
            throw new Exception('Don\'t have permission');
        }
    }

    /**
     * check number
     * @param string $number
     * @return boolean
     * */
    private function checkNumber ($number)
    {
        if (is_int($number))
        {
            return true;
        }
        else
        {
            throw new Exception( 'ERROR, not number, is '. gettype($number));
        }
    }
}