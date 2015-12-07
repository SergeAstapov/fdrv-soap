#Entity *IncomePlan*

Is created in **Time & Budget** system by unit managers/top managers from page **Yolka**.
Exported *from* **Time & Budget** *into* **1C** by invoking *getIncomePlan* operation.

####*IncomePlan* entity fields:
* *entry_id* (decimal): unique budget plan entity ID, assigned internally in **Time & Budget** DB
* *unit_id* (decimal): unique unit ID, assigned internally in **Time & Budget** DB
* *unit_title* (string): human-redable unit title, assigned in **Time & Budget** system
* *brand_id* (decimal): unique brand ID, assigned internally in **Time & Budget** DB
* *brand_title* (string): human-redable brand title, assigned in **Time & Budget** system
* *year* (decimal): a year income plan entity is created for, used in combination with *month* field
* *month* (decimal): a month income plan entity is created for, used in combination with *year* field
* *value* (decimal): an income plan value as entered by unit manager/top manager
* *comment* (string): extra comment left by unit manager/top manager during entering plan *value*

####Example request about actual income sent from 1C to **Time & Budget** system:

```xml
<incomePlan>
  <entry_id>1</entry_id>
  <unit_id>100</unit_id>
  <unit_title>unit 1</unit_title>
  <brand_id>200</brand_id>
  <brand_title>brand 2</brand_title>
  <year>2015</year>
  <month>10</month>
  <value>1000</value>
  <comment>comment 1</comment>
</incomePlan>
```

####Example from **Time & Budget** system
![Budget Plan preview example](http://astapov.in.ua/screenshots/BudgetPlan.jpg)

####Connection between request fields and **Time & Budget** system screen:
*unit_id* - based on **1**, used internally  
*unit_title* - **1**  
*brand_id* - based on **2**, used internally  
*brand_title* - **2**  
*year*, *month* - made by **3**  
*value* - **5**  
*comment* - **6**  
