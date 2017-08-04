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
    $i = 0;

    while ($this->file->readLineFile($i))
    {
        $result .= $this->file->readLineFile($i);
        $i++;
    }
    return $result;
}

public function getCharsFile ()
{
  
    $lenght = count($this->file);
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
