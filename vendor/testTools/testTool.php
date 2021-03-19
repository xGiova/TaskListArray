<?php 
/**
 * @var $expected    Valore atteso per superare il test
 * @var $actual      Valore da confrontare con quello atteso
 * @var $description Descrizione facoltativa del test
 * @var $line        Possibiità di indicare la linea di codice del test interessato
 */
function assertEquals($expected,$actual,$description = '',$line ='')
{

    if($expected === $actual)
    {
        $output = green("✌PASS  \t$description $actual");
        echo $output;

    } else {

        $output  = red(" FAIL: \t$description")."🤷‍♂️🤣🤷‍♂️\n";
        $output .= " atteso:   \t$expected (".gettype($expected).")";
        $output .= "\n ottenuto: \t$actual (".gettype($actual).")";
        $output .= "\n ".($line ? "line:$line" : "");
        
        echo $output;
        //die();
    }

}


function red($string)
{
    return "\e[1;37;41m$string\e[0m\n";
}

function green($string)
{
    return "\e[1;32;40m$string\e[0m\n";
}

function datasetHeader($key, array $dataset)
{
    $output  = "--------------------------------------"."\n";
    $output .= " dataset $key di ".count($dataset)."\n";
    return $output;
}

function testHeader($file)
{
    $output  = "\n--------------------------------------"."\n";
    $output .= basename($file, 'php')."\n";
    return $output;
}