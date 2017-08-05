<?php
                
class Main
{

    private $file;

    public function __construct (File $obj)
    {
        $this->file = $obj;
    }

     public function getLinesFile ()
     {
         $i = 1;
         $result = '';
         while ($this->file->readLineFile($i))
         {
             $result .= $this->file->readLineFile($i);
             $i++;
         }

        return $result;
    }

    public function getCharsFile ()
    {
        $result = '';
        $lenght = count($this->file->getFile());
        for ($i = 1; $i <= $lenght; $i++)
        {
            $line = strlen($this->file->readLineFile($i));

            for ($y = 1; $y <= $line; $y++)
            {
                $result .= $this->file->readCharFile($i, $y);
            }
       }
       return $result;
    }
}
?>
