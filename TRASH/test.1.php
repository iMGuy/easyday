(select * 
 from `NUT_DATA` left join `NUTR_DEF` using (Nutr_No)
 WHERE
 NDB_No = 01001
) 
union 
(select table2.fruit fruit, table1.number number1, table2.number number2 from table2 left join table1 using (fruit));

