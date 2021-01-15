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

### Bonus questions.

1. sometimes requesting data for the keyword takes a long time (> 5 seconds), what can be done to make it faster? What are downsides of your solution?
To make it faster one way we can use is using a cache like memecache, redis or other type of cache. We can also each time that we send a request to load the data from the api make a request with the current page and the next page 
   this will allow us to response to the customer in short time os period in case of it want to make the new request.
   
In my solution I didn't use any cache to make the application faster and the request to the external api can take more time that normally.

2. we’d like to add as many product feeds as possible, how would you structure a service with this requirement?

TO make this from my point of view the best way is use a queue to store all the request that comes to the api and store it on the cache. Once it will be stored on the cache then another process will be in charge to process the data in the cache and add the response in another queue.   






