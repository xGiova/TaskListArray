<?php
require "./vendor/testTools/testTool.php";
require "./searchFunctions.php";

$testCases = [
    [
        'searchText' => 'Latte',
        'expectedCount' => 2,
        'description' => 'ricerca testo Latte'
    ],
    [
        'searchText' => 'latte',
        'expectedCount' => 2,
        'description' => 'ricerca testo latte'
    ],
    [
        'searchText' => 'LATTE',
        'expectedCount' => 2,
        'description' => 'ricerca testo LATTE'
    ],
    [
        'searchText' => 'fare',
        'expectedCount' => 3,
        'description' => 'ricerca testo fare'
    ],
    [
        'searchText' => '  fare   ',
        'expectedCount' => 3,
        'description' => 'ricerca testo fare con spazi'
    ],
    [
        'searchText' => 'redmond',
        'expectedCount' => 1,
        'description' => 'ricerca testo redmond'
    ],
    [
        'searchText' => '',
        'expectedCount' => 9,
        'description' => 'ricerca testo vuoto'
    ],
    [
        'searchText' => '      ',
        'expectedCount' => 9,
        'description' => 'ricerca testo con spazi'
    ]
];

$mockTaskList = array(
    array("id"=>4574,"taskName"=>"Mangiare la verdura","status"=>"done","expirationDate"=>"2021-03-01"),
    array("id"=>6727,"taskName"=>"Fare esercizi di php","status"=>"todo","expirationDate"=>"2021-03-20"),
    array("id"=>4639,"taskName"=>"Latte detergente","status"=>"progress","expirationDate"=>"2021-09-02"),
    array("id"=>5718,"taskName"=>"Pizza e verdura da comprare","status"=>"done","expirationDate"=>"2021-09-02"),
    array("id"=>2637,"taskName"=>"Fare esercizi di java","status"=>"progress","expirationDate"=>"2021-09-02"),
    array("id"=>5497,"taskName"=>"Comprare il latte","status"=>"done","expirationDate"=>"2021-09-21"),
    array("id"=>5492,"taskName"=>"Fare preventivo per gestionale ACME","status"=>"todo","expirationDate"=>"2021-09-21"),
    array("id"=>6697,"taskName"=>"Onora il padre e  la madre","status"=>"todo","expirationDate"=>"2021-11-13"),
    array("id"=>6695,"taskName"=>"Tornare a Redmond (windows 10)","status"=>"todo","expirationDate"=>"2021-11-13")
);


foreach ($testCases as $testCase) {
    extract($testCase);
    
    // $searchText = $testCase['searchText'];
    // $expectedCount = $testCase['expectedCount'];
    // $description = $testCase['description'];

    $actual = array_filter($mockTaskList, searchText($searchText));
    
    assertEquals('array', gettype($actual),'il risultato è un ');
    assertEquals($expectedCount, count($actual), $description);
}