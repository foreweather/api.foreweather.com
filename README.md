# Foreweather
Foreweather is a paid service that sends daily weather information to its subscribers. Users can register to this service via REST API and receive daily weather information. Users who register for this service are paid subscribers. Users can complete their subscription registration for free with gift codes defined in the system.
 
## Installation
If you want to explore Foreweather, using the development environment might be a good choice.
### Docker
A quick way to start the development version of Foreweather is to clone the github repository and run the following commands:
#### Docker Swarm 
You can use a scalable infrastructure with Docker swarm.
```bash
docker swarm init
docker stack deploy --compose-file docker-compose.yml foreweather
```
### Database
The SQL script you need to run has been uploaded to [this address](https://raw.githubusercontent.com/foreweather/api.foreweather.com/master/docker/database.sql).
## Log Management
 * Centralized log aggregation: ELK
### 
Since the application configuration is distributed, centralized log management has been established.
Logs collected with Syslog are filtered through logstash and stored in Elasticsearch.
## Application Components
The components of the Foreweather software development architecture are listed below.
### Foreweather Api
The RESTful API service for end users that provides the services of the Foreweather application.
#### Usage
##### API Reference
API documentation is automatically generated during docker configuration. After setting up the project, you can access the API reference source from the following address.
```
http://localhost:8888/documentation/index.html
```
##### Postman Support
You can find the Postman import file in the main project directory.
[Postman Import File](https://raw.githubusercontent.com/foreweather/api.foreweather.com/master/ForeweatherProject.postman_collection.json)
#### [Foreweather Publisher](https://github.com/foreweather/publisher)
Foreweather Publisher is a service that groups daily weather information according to the registered time zone of the user and broadcasts it to subscribers.
#### [Foreweather Notify](https://github.com/foreweather/notify)
Foreweather Notify is a service that sends daily notifications to Foreweather Subscribers.
## Checklist
### Restful API
- [x] User registration
- [x] OAuth2 support
    - [x]  Request Headers
- [x] Activation with coupon code
- [x] Updating user information
    - [x] User photo
- [x] Management of users' subscriptions to certain cities
### Expectations
- [ ] PHP 7.2 support
    - [x] PHP 7.3
- [x] Github platform version control support
- [x] Standardization of Restful Api requests and responses
- [x] Database design and preparation of guidelines
- [x] Object-oriented programming
- [x] Definition and standardization of API errors and warnings
- [x] Error catching and warning support
- [x] Use of PSR2 coding standards
- [x] Composer support
- [x] General information documentation
- [x] Docker Compose support
- [x] Sharing the database schema
- [x] API documentation
### Bonus
- [x] Git commit messages
- [x] In-code comments and guidelines
- [ ] Restful API best practices guidelines
- [x] Logging and error catching
- [ ] Writing unit and behavioral tests
- [ ] Rest API version support
- [x] Phalcon Framework usage
## License
Foreweather is open for use and development under the [MIT license](https://opensource.org/licenses/MIT).
