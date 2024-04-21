<h1>Laravel Post Office API</h1>

## Introduction

The test task involves creating a Laravel application to handle the requests and process information about each user, package, delivery service. 

## Project structure

Post Office Api project follows a standard Laravel structure:
- Controllers: Handle incoming API requests
- Services: Contains business logic and functionality to interact with delivery services API
- Models: Represents database entities
- Enums: Define constants across applications
- Requests: Validate incoming data

## Patterns 
I have used a Factory Pattern to create services for different delivery providers. The main reason for using this pattern was flexibility and scalability if more delivery providers will be added in the future.

## Usage 
1. Clone the repo.
2. Run 
```composer install```
3. Set up Laravel environmental variables, db configuration and run 
```php artisan migrate```
4. To run application use
```php artisan serve ```
5. Use Postman Collection to test how the API works