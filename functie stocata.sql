CREATE OR REPLACE FUNCTION cautaIdan( v_pilot VARCHAR(50)) 
RETURNS INTEGER 
RETURN (SELECT idan FROM angajati WHERE numean = v_pilot)