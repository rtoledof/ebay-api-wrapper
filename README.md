#Compado test case

## Structure

The project is structure in the following way.

```
root
│   README.md
│   composer.json
|   composer.lock
|   docker-compose.yml
|   .env
|   .env.dist
|---docker
|   |---nginx
|   |   | api.conf
|   |   | Dockerfile
|   |---php
|   |   | Dockerfile
└───src
│   │   app.php
│   └───Controller
│   |   │   IndexController.php
│   |   │   SearchController.php
|   |___Models
|   |   |  Product.php
|   |---Service
|   |   |   Constants.php
|   |   |   Error.php
|   |   |   QueryRequest.php
|   |   |   Response.php
|   |   |   Service.php
└───web
    │   index.php
```

The docker folder contains all the configs required to deploy the application on docker.

The src folder contains the application code. Tha app.php is the file that is loading the composer packages and routings.

### Controller folder
Controllers has two class one is the welcome to the api and the other one is the one that is initializing the service in charge to send the request to ebay api.

### Models folder
The models folder contain the Product wit the attributes that should be handled in the API.

### Service
The service contain the clases in charge to create the request and process the response returner from ebay api to render the items. Also contain all the constant required to the api.
QueryRequest is the request class that receive the request sent by the user and translate it to the request to be sent to the API.

The error file contain the Error class used to throw the exceptions.

Constants contain all the constants that can be used on the application.

Response is the class tha receive the response from the backend and return it in an array of products.

Service is the class in charge to create the request, then send the request to ebay find api and retrieve the response and process it to populate the required data.



The folder web contain the index.php that is the one to initialize the whole application process.

### Dependencies used

I used some dependencies from symfony to use the 


