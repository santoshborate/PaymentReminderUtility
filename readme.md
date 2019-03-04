Payment reminder Utility

It will calculate payment date and bonus date for all month of given year. 

command : 
php index.php report_2019.csv  // For current year and current month
php index.php report_2019.csv  2019  // For given year and all month 
php index.php report_2019.csv  2019 1 // For given year and from given month to end of year

Code coverage :
On windows command to run phpunit:
PaymentReminderUtility>vendor\bin\phpunit --bootstrap "./vendor/autoload.php" --testdox tests --coverage-html "./output"


