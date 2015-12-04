<?php
$base_url = implode(array(
    $_SERVER['REQUEST_SCHEME'] . '://',
    $_SERVER['HTTP_HOST'],
    dirname($_SERVER['REQUEST_URI']) . '/'
));

header("Content-Type: text/html; charset=utf-8");
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

class IncomePlanRequest {
    public $token;
}

class IncomeFactRequest {
	public $token;
    public $incomeFactList;
}

class IncomeFactList {
	public $incomeFact;
}

class IncomeFact {
	public $entry_id;
	public $unit_id;
	public $unit_title;
	public $brand_id;
	public $brand_title;
	public $year;
	public $month;
	public $value;
	public $comment;
}

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кеширование WSDL-файла для тестирования

$client = new SoapClient(   $base_url . 'wsdl.php',
                            array( 'soap_version' => SOAP_1_2));


$incPlanReq = new IncomePlanRequest();
$incPlanReq->token = 'SomeTestToken';
var_dump($client->getIncomePlan($incPlanReq));


$incFactReq = new IncomeFactRequest();
$incFactReq->token = 'SomeTestToken';
$incFactReq->incomeFactList = new IncomeFactList();
$incFactReq->incomeFactList->incomeFact = new IncomeFact();
$incFactReq->incomeFactList->incomeFact->entry_id = 1;
$incFactReq->incomeFactList->incomeFact->unit_id = 100;
$incFactReq->incomeFactList->incomeFact->unit_title = "unit 1";
$incFactReq->incomeFactList->incomeFact->brand_id = 200;
$incFactReq->incomeFactList->incomeFact->brand_title = "brand 2";
$incFactReq->incomeFactList->incomeFact->year = 2015;
$incFactReq->incomeFactList->incomeFact->month = 10;
$incFactReq->incomeFactList->incomeFact->value = 1000;
$incFactReq->incomeFactList->incomeFact->comment = "comment 1";
var_dump($client->sendIncomeFact($incFactReq));

