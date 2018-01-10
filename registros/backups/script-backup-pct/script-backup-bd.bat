@echo off
 
echo --------------------------------------------------------
echo Setando os campos de data usando for, para no momento
echo de gravação o arquivo ser salvo com a data atual
echo precisando apenas usar o mydate e as outras
echo variaveis no nome do arquivo, conforme necessario
echo --------------------------------------------------------
 
for /f "tokens=1-4 delims=/ " %%a IN ('DATE /T') do (set MYDATE=%%a-%%b-%%c-%%d%)
for /f "tokens=1-2 delims=: " %%a in ('TIME /T') do (set MYTIME=%%ah%%bm)
 
echo ----------------------------------------------------------------------
echo executando o dump para gerar o arquivo de backup do banco 'pct'
echo ----------------------------------------------------------------------

mysqldump -u desenvolvedor -pcgeagt -h 10.50.119.149 --routines --opt -a -B --result-file="C:\xampp\htdocs\pct\registros\backups\bd\%mydate%%mytime%_pct_bd.sql" pct
 
@echo ## %date% %time% ## - backup banco concluido >>  C:\xampp\htdocs\pct\registros\backups\bd\log.txt
 
rar a C:\xampp\htdocs\pct\registros\backups\bd\%mydate%%mytime%_pct_bd.rar C:\xampp\htdocs\pct\registros\backups\bd\%mydate%%mytime%_pct_bd.sql
 
