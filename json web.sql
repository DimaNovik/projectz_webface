declare @b int, @r tinyint
set @b=349761

exec jsonbypasses @b, @r output
IF (@r = 0)  
   PRINT 'Ok'  
ELSE  
   PRINT 'ne Ok';  