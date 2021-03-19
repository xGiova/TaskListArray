<?php
/**
 * Funzione di ordine superiore funzione che restituisce una funzione
 * Programmazione Funzionale - dichiarativo 
 */
function searchText($searchText) {
return function ($taskItem) use ($searchText) 
{
$cleanedSpaced = preg_replace('/[ ]+/m', '', $searchText);
$stringToLower = strtolower($taskItem['taskName']);
$searchToLower = trim(strtolower($cleanedSpaced));
if ($searchToLower !== '') {
$result = strpos($stringToLower,$searchToLower) !== false;
} else {
    $result = true;
}
return $result;
};
    
   
}

/**
 * @var string $status è la stringa che corrisponde allo status da cercare
 * (progress|done|todo)
 * @return callable La funzione che verrà utilizzata da array_filter
 */
function searchStatus(string $_status) : callable
{
    return function ($mockTaskItem) use ($_status) {
        if (($_status === '') || ($_status === 'all'))
       {
        $result = true;   
       } else {
        $result = strpos($mockTaskItem['status'], $_status) !== false;
       }
       return $result;
    };
    
       
    

}

   
   




