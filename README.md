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

