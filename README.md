## Getting Started
- Clone the project on your local machine
- cd to the project folder and open in terminal
- Run *composer update* command to install the necessary packages
- Create your development database
- cp .env.example .env
- Add database name and database user credentials to .env
- Run *php artisan config:cache* command
- Run *php artisan migrate* command
- Run *php artisan db:seed* command
- Run *php artisan storage:link* to create the symbolic link if necessary. (So as to be able to create URLs to files)

  **DO NOT PUSH TO THIS REPO USE IT AS A STARTER FOR A PROJECT. REMOVE THE REMOTE URL POINTING TO THIS REPO AND ADD THE REMOTE FOR YOUR PROJECT REPO**

## Testing

To run tests against MySQL database:

### Test Enviroment setup

- cp .env .env.testing
- Set APP_ENV=testing and DB_CONNECTION=testing
- Create test database and add the test database name on .env.testing

### Running Tests
- php artisan config:cache --env=testing
- php artisan test or ./vendor/bin/pest

### Creating Tests
- To create a feature test run the following command:<br>
*php artisan pest:test SampleTest*
- To create a unit test run the following command:<br>
*php artisan pest:test SampleTest --unit*

## Important Notice
To switch back to the .env parameters run *php artisan config:cache* or *php artisan config:cache --env=local*
