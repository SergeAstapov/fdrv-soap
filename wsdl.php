<?php
    $is_https = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on';
    $http_protocol = $is_https ? 'https' : 'http';
    $targetNamespace =

    $base_url = $http_protocol . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/';

    $targetNamespace = $http_protocol . '://' . $_SERVER['HTTP_HOST'] . '/';

    header("Content-Type: text/xml; charset=utf-8");
    header('Cache-Control: no-store, no-cache');
    header('Expires: ' . date('r'));

    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);

    print '<?xml version="1.0" encoding="utf-8"?>';
?>

<definitions xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/"
             xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
             xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
             xmlns:mime="http://schemas.xmlsoap.org/wsdl/mime/"
             xmlns:tns="<?php print $targetNamespace; ?>"
             xmlns:xs="http://www.w3.org/2001/XMLSchema"
             xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/"
             xmlns:http="http://schemas.xmlsoap.org/wsdl/http/"
             name="TimeBudgetWsdl"
             xmlns="http://schemas.xmlsoap.org/wsdl/">
    <types>
        <xs:schema xmlns:tns="http://schemas.xmlsoap.org/wsdl/"
                   xmlns="http://www.w3.org/2001/XMLSchema"
                   xmlns:xs="http://www.w3.org/2001/XMLSchema"
                   elementFormDefault="qualified"
                   xmlns:tb="<?php print $targetNamespace; ?>"
                   targetNamespace="<?php print $targetNamespace; ?>">
            <!-- Complex types definition -->
            <complexType name="IncomePlan">
                <sequence>
                    <element name="entry_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="client_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="client_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="brand_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="brand_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="year" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="month" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="value" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="comment" type="string" minOccurs="1" maxOccurs="1" />
                </sequence>
            </complexType>

            <complexType name="IncomeFact">
                <sequence>
                    <element name="entry_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="client_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="client_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="brand_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="brand_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="year" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="month" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="value" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="comment" type="string" minOccurs="1" maxOccurs="1" />
                </sequence>
            </complexType>


            <complexType name="ExpensePlan">
                <sequence>
                    <element name="entry_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="client_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="client_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="brand_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="brand_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="product_type" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="date" type="dateTime" minOccurs="1" maxOccurs="1" />
                    <element name="value" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="comment" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="author_email" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="currency" type="string" minOccurs="1" maxOccurs="1" />
                </sequence>
            </complexType>

            <complexType name="ExpenseFact">
                <sequence>
                    <element name="entry_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="client_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="client_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="brand_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="brand_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="date" type="dateTime" minOccurs="1" maxOccurs="1" />
                    <element name="value" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="comment" type="string" minOccurs="1" maxOccurs="1" />
                </sequence>
            </complexType>

            <!-- Collections definition -->
            <complexType name="IncomePlanList">
                <sequence>
                    <element minOccurs="1" maxOccurs="unbounded" name="incomePlan" type="tb:IncomePlan"/>
                </sequence>
            </complexType>

            <complexType name="IncomeFactList">
                <sequence>
                    <element minOccurs="1" maxOccurs="unbounded" name="incomeFact" type="tb:IncomeFact"/>
                </sequence>
            </complexType>


            <complexType name="ExpensesPlanList">
                <sequence>
                    <element minOccurs="1" maxOccurs="unbounded" name="expensePlan" type="tb:ExpensePlan"/>
                </sequence>
            </complexType>

            <complexType name="ExpensesFactList">
                <sequence>
                    <element minOccurs="1" maxOccurs="unbounded" name="expenseFact" type="tb:ExpenseFact"/>
                </sequence>
            </complexType>

            <!-- Request/Response envelope definition -->
            <element name="IncomePlanRequest">
                <complexType>
                    <sequence>
                        <element name="token" type="string" minOccurs="1" maxOccurs="1" />
                    </sequence>
                </complexType>
            </element>
            <element name="IncomePlanResponse">
                <complexType>
                    <sequence>
                        <element name="incomePlanList" type="tb:IncomePlanList" />
                    </sequence>
                </complexType>
            </element>


            <element name="IncomeFactRequest">
                <complexType>
                    <sequence>
                        <element name="token" type="string" minOccurs="1" maxOccurs="1" />
                        <element name="incomeFactList" type="tb:IncomeFactList" />
                    </sequence>
                </complexType>
            </element>
            <element name="IncomeFactResponse">
                <complexType>
                    <sequence>
                        <element name="status" type="boolean" />
                    </sequence>
                </complexType>
            </element>


            <element name="ExpensesPlanRequest">
                <complexType>
                    <sequence>
                        <element name="token" type="string" minOccurs="1" maxOccurs="1" />
                    </sequence>
                </complexType>
            </element>
            <element name="ExpensesPlanResponse">
                <complexType>
                    <sequence>
                        <element name="expensesPlanList" type="tb:ExpensesPlanList" />
                    </sequence>
                </complexType>
            </element>


            <element name="ExpensesFactRequest">
                <complexType>
                    <sequence>
                        <element name="expensesFactList" type="tb:ExpensesFactList" />
                    </sequence>
                </complexType>
            </element>
            <element name="ExpensesFactResponse">
                <complexType>
                    <sequence>
                        <element name="token" type="string" minOccurs="1" maxOccurs="1" />
                        <element name="status" type="boolean" />
                    </sequence>
                </complexType>
            </element>
        </xs:schema>
    </types>

    <!-- Messages of procedure getIncomePlan -->
    <message name="getIncomePlanRequest">
        <part name="IncomePlanRequest" element="tns:IncomePlanRequest" />
    </message>
    <message name="getIncomePlanResponse">
        <part name="IncomePlanResponse" element="tns:IncomePlanResponse" />
    </message>


    <message name="sendIncomeFactRequest">
        <part name="IncomeFactRequest" element="tns:IncomeFactRequest" />
    </message>
    <message name="sendIncomeFactResponse">
        <part name="IncomeFactResponse" element="tns:IncomeFactResponse" />
    </message>


    <message name="getExpensesPlanRequest">
        <part name="ExpensesPlanRequest" element="tns:ExpensesPlanRequest" />
    </message>
    <message name="getExpensesPlanResponse">
        <part name="ExpensesPlanResponse" element="tns:ExpensesPlanResponse" />
    </message>


    <message name="sendExpensesFactRequest">
        <part name="ExpensesFactRequest" element="tns:ExpensesFactRequest" />
    </message>
    <message name="sendExpensesFactResponse">
        <part name="ExpensesFactResponse" element="tns:ExpensesFactResponse" />
    </message>

    <!-- Procudere binding to messages -->
    <portType name="TimeBudgetServicePortType">
        <operation name="getIncomePlan">
            <input message="tns:getIncomePlanRequest" />
            <output message="tns:getIncomePlanResponse" />
        </operation>
        <operation name="sendIncomeFact">
            <input message="tns:sendIncomeFactRequest" />
            <output message="tns:sendIncomeFactResponse" />
        </operation>
        <operation name="getExpensesPlan">
            <input message="tns:getExpensesPlanRequest" />
            <output message="tns:getExpensesPlanResponse" />
        </operation>
        <operation name="sendExpensesFact">
            <input message="tns:sendExpensesFactRequest" />
            <output message="tns:sendExpensesFactResponse" />
        </operation>
    </portType>

    <!-- Service procedure format -->
    <binding name="TimeBudgetServiceBinding" type="tns:TimeBudgetServicePortType">
        <soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http" />

        <operation name="getIncomePlan">
            <soap:operation soapAction="" />
            <input>
                <soap:body use="literal" />
            </input>
            <output>
                <soap:body use="literal" />
            </output>
        </operation>

        <operation name="sendIncomeFact">
            <soap:operation soapAction="" />
            <input>
                <soap:body use="literal" />
            </input>
            <output>
                <soap:body use="literal" />
            </output>
        </operation>

        <operation name="getExpensesPlan">
            <soap:operation soapAction="" />
            <input>
                <soap:body use="literal" />
            </input>
            <output>
                <soap:body use="literal" />
            </output>
        </operation>

        <operation name="sendExpensesFact">
            <soap:operation soapAction="" />
            <input>
                <soap:body use="literal" />
            </input>
            <output>
                <soap:body use="literal" />
            </output>
        </operation>
    </binding>

    <!-- Service definition -->
    <service name="TimeBudgetService">
        <port name="TimeBudgetServicePort" binding="tns:TimeBudgetServiceBinding">
            <soap:address location="<?php print $base_url . 'service.php'; ?>" />
        </port>
    </service>
</definitions>
