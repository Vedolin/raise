<?php

ini_set('display_errors', 1);
include 'RequestTest.php';

$tester = new RequestTester();

//$tester->testInsertClient(); 
//$tester->testInsertClientwithoutChannel();
//$tester->testListAllClients();
$tester->testAutoRegister(); 
echo '<br><br><br>'."Testando POST Client Invalido".'<br><br>';
$tester->invalidPostTest();
echo '<br><br><br>'."Testando POST Service Invalido".'<br><br>';
$tester->invalidPostTest();
//$tester->registerServices("80ad313c43dbfe095cc5d76c4029f499");