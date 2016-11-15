declare @bypname varchar(20),@byp int,  @cl int, @oi int,@r tinyint
set @bypname='20161006_112103'
set @byp=349761
set @oi=1
set @cl=1376

exec bypasjson @bypname,@byp,@oi,@cl,@r output
select @r
IF (@r = 0)  
   PRINT 'Ok'  
ELSE  
   PRINT 'ne OK';  