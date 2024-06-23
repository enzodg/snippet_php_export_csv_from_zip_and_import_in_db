# STRUTTURA PROGETTO
import_csv/
  employees.csv
  employees.zip
  functions.php
  leggimi.md
  main.php
  README.md


# INFO
1. La cartella del progetto, 'import_csv' deve avere permessi 777. 
   Dare permessi tramite il terminale.
2. Il file CSV sarà estreatto nella cartella 'import_csv/'
3. Il file CSV salverà nel db 5 records. 
   Per cancellare i 5 records inseriti nel db e riprovare la procedura eseguire questa query:

    DELETE 
    FROM employees
    WHERE employeeNumber IN ( 
      SELECT employeeNumber FROM (
        SELECT * 
        FROM employees
        ORDER BY employeeNumber DESC
        LIMIT 5
      ) AS B
    )


# USAGE
1. Viene estratto un CSV da un file ZIP
2. Il contenuto di questo CSV viene inserito nel database


# TUTORIAL LETTI PER LO SVOLGIMENTO DI QUESTO PROGETTO
- https://stackoverflow.com/questions/8889025/unzip-a-file-with-php
- https://stackoverflow.com/questions/37361786/php-read-csv-file-line-by-lines
- https://ricard.dev/how-to-delete-with-limit-and-offset-in-mysql/

