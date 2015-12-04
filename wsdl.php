<?php
$base_url = implode(array(
    $_SERVER['REQUEST_SCHEME'] . '://',
    $_SERVER['HTTP_HOST'],
    dirname($_SERVER['REQUEST_URI']) . '/'
));

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
             xmlns:tns="http://<?php print $_SERVER['HTTP_HOST']; ?>/"
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
                   targetNamespace="http://<?php print $_SERVER['HTTP_HOST']; ?>/">
            <!-- Complex types definition -->
            <xs:complexType name="IncomePlan">
                <xs:sequence>
                    <element name="entry_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="brand_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="brand_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="year" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="month" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="value" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="comment" type="string" minOccurs="1" maxOccurs="1" />
                </xs:sequence>
            </xs:complexType>

            <xs:complexType name="IncomeFact">
                <xs:sequence>
                    <element name="entry_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="brand_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="brand_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="year" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="month" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="value" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="comment" type="string" minOccurs="1" maxOccurs="1" />
                </xs:sequence>
            </xs:complexType>


            <xs:complexType name="ExpensePlan">
                <xs:sequence>
                    <element name="entry_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="brand_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="brand_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="date" type="dateTime" minOccurs="1" maxOccurs="1" />
                    <element name="value" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="comment" type="string" minOccurs="1" maxOccurs="1" />
                </xs:sequence>
            </xs:complexType>

            <xs:complexType name="ExpenseFact">
                <xs:sequence>
                    <element name="entry_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="unit_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="brand_id" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="brand_title" type="string" minOccurs="1" maxOccurs="1" />
                    <element name="date" type="dateTime" minOccurs="1" maxOccurs="1" />
                    <element name="value" type="decimal" minOccurs="1" maxOccurs="1" />
                    <element name="comment" type="string" minOccurs="1" maxOccurs="1" />
                </xs:sequence>
            </xs:complexType>

            <!-- Collections definition -->
            <xs:complexType name="IncomePlanList">
                <xs:sequence>
                    <xs:element minOccurs="1" maxOccurs="unbounded" name="incomePlan" type="IncomePlan"/>
                </xs:sequence>
            </xs:complexType>

            <xs:complexType name="IncomeFactList">
                <xs:sequence>
                    <xs:element minOccurs="1" maxOccurs="unbounded" name="incomeFact" type="incomeFact"/>
                </xs:sequence>
            </xs:complexType>


            <xs:complexType name="ExpensesPlanList">
                <xs:sequence>
                    <xs:element minOccurs="1" maxOccurs="unbounded" name="expensePlan" type="ExpensePlan"/>
                </xs:sequence>
            </xs:complexType>

            <xs:complexType name="ExpensesFactList">
                <xs:sequence>
                    <xs:element minOccurs="1" maxOccurs="unbounded" name="expenseFact" type="ExpenseFact"/>
                </xs:sequence>
            </xs:complexType>

            <!-- Request/Response envelope definition -->
            <xs:element name="IncomePlanRequest">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="token" type="string" minOccurs="1" maxOccurs="1" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>
            <xs:element name="IncomePlanResponse">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="incomePlanList" type="IncomePlanList" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>


            <xs:element name="IncomeFactRequest">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="token" type="string" minOccurs="1" maxOccurs="1" />
                        <xs:element name="incomeFactList" type="IncomeFactList" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>
            <xs:element name="IncomeFactResponse">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="status" type="xs:boolean" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>


            <xs:element name="ExpensesPlanRequest">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="token" type="string" minOccurs="1" maxOccurs="1" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>
            <xs:element name="ExpensesPlanResponse">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="expensesPlanList" type="ExpensesPlanList" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>


            <xs:element name="ExpensesFactRequest">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="expensesFactList" type="ExpensesFactList" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>
            <xs:element name="ExpensesFactResponse">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="token" type="string" minOccurs="1" maxOccurs="1" />
                        <xs:element name="status" type="xs:boolean" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>
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