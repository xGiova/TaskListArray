<?php
/**
 * NOTA: Il test deve essere lanciato dalla cartella lib
 */
declare(strict_types=1);
require "../../../vendor/testTools/testTool.php";
require "./JSONReader.php";

system("clear");

echo testHeader(__FILE__);

$dataset = [
    [
        'description' => 'Gestione dell\'errore per file inesistente',
        'filepath' => './ciccio.json',
        'error' => 'not-exists',
        'errorCode' => 404
    ],
    [
        'description' => 'Lettura dei dati di un array di 20 elementi',
        'filepath' => '../dataset/TaskList.json',
        'type' => 'array',
        'count' => 20
    ],
    [
        'description' => 'Gestione file con errori di sintassi',
        'filepath' => '../dataset/TaskList-error.json',
        'error' => 'syntax-error',
        'errorCode' => 123
    ],
    [
        'description' => 'Lettura di un file con un array vuoto',
        'filepath' => '../dataset/TaskList-zero.json',
        'type' => 'array',
        'count' => 0
    ],

];

foreach ($dataset as $key => $row) {

    echo datasetHeader($key, $dataset);

    try {
        
        $filepath = $row['filepath'];
        $actual = JSONReader($filepath);
        
        if (!isset($row['error']))
        {
            $type = $row['type'];
           
            assertEquals($type, gettype($actual), 'tipo di dato');
            assertEquals($row['count'], count($actual), 'numero di elementi');
        
        } else {

            assertEquals($row['error'], null, 'era attesa un eccezione');
            assertEquals($row['errorCode'], null, 'era attesa un eccezione');
            
        }
    
    } catch (Exception $e) {

            assertEquals($e->getMessage(), $row['error'], 'messaggio di errore');
            assertEquals($e->getCode(), $row['errorCode'], 'codice di errore');

    }
}
