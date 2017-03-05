### Pig Latin translator API using Silex framework

#### Current available endpoints:

- /translate/{string} - Translates {string} to pig latin.


#### To run the apllication:

- Use PHP inbuilt web server functionality to run the API. Navigate to the `/web` folder and run the following command. 
 
 ```bash
php -S localhost:8080

 ```

 Then access the webpage at `http://localhost:8080/translate/`

 In the root directory you can use:

 ```bash
 php -S localhost:8080 -t web\
 ```
#### Testing

- To run the testsuite execute the following command:
 
 ```bash
 ./vendor/phpunit/phpunit/phpunit --testdox
 ```

- To generate code coverage run one of the following commands:

 ```bash
./vendor/phpunit/phpunit/phpunit --testdox --coverage-text

./vendor/phpunit/phpunit/phpunit --testdox --coverage-html <directory>
 ```
