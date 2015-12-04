<?php
$base_url = implode(array(
    $_SERVER['REQUEST_SCHEME'] . '://',
    $_SERVER['HTTP_HOST'],
    dirname($_SERVER['REQUEST_URI']) . '/'
));

/**
 * smsservice.php
 */
header("Content-Type: text/xml; charset=utf-8");
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

/**
 * Пути по-умолчанию для поиска файлов
 */
// set_include_path(get_include_path()
//      . PATH_SEPARATOR . 'classes'
//      . PATH_SEPARATOR . 'objects');

/**
 * Путь к конфигурационному файлу
 */
const CONF_NAME = "config.ini";

/**
 ** Функция для автозагрузки необходимых классов
 */
// function __autoload($class_name){
//     include $class_name.'.class.php';
// }

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кеширование WSDL-файла для тестирования

//Создаем новый SOAP-сервер
$server = new SoapServer( $base_url . 'wsdl.php');
//Регистрируем класс обработчик
$server->setClass("SoapTimeBudgetGateWay");
//Запускаем сервер
$server->handle();


class IncomePlanResponse {
    public $incomePlanList;
}

class IncomePlanList {
	public $incomePlan;
}

class IncomePlan {
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

class SoapTimeBudgetGateWay {

    public function getIncomePlan ($incomePlanData) {
        $rawPost  = "Input:\r\n";
        $rawPost .= file_get_contents('php://input');
        $rawPost .= "\r\n---\r\nincomePlanData:\r\n";
        $rawPost .= serialize($incomePlanData);

        file_put_contents("log.txt", $rawPost);

		$incPlanRes = new IncomePlanResponse();
		$incPlanRes->incomePlanList = new IncomePlanList();
		$incPlanRes->incomePlanList->incomePlan = new IncomePlan();
		$incPlanRes->incomePlanList->incomePlan->entry_id = 2;
		$incPlanRes->incomePlanList->incomePlan->unit_id = 100;
		$incPlanRes->incomePlanList->incomePlan->unit_title = "unit 2";
		$incPlanRes->incomePlanList->incomePlan->brand_id = 210;
		$incPlanRes->incomePlanList->incomePlan->brand_title = "brand 1";
		$incPlanRes->incomePlanList->incomePlan->year = 2015;
		$incPlanRes->incomePlanList->incomePlan->month = 11;
		$incPlanRes->incomePlanList->incomePlan->value = 2000;
		$incPlanRes->incomePlanList->incomePlan->comment = "comment 2";

		return $incPlanRes;
    }

    public function sendIncomeFact ($incomeFactData) {
        $rawPost  = "Input:\r\n";
        $rawPost .= file_get_contents('php://input');
        $rawPost .= "\r\n---\r\nincomeFactData:\r\n";
        $rawPost .= serialize($incomeFactData);

        file_put_contents("log.txt", $rawPost);

        return array("status" => "true");
    }
}


