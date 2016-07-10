# INTER-Mediator for docker-compose

Author: sakadonohito

Include

- data-container
- MySQL(5.6)
- php5.6.23(apache)

## Abount

```
docker-compose up -d
```

### data-container

include directory */var/lib/mysql*

### MySQL

- version: 5.6
- Environment
  - root password
  - Database: test_db
  - user for IM
  - password for IM user
- volume_from: data-container

#### additional db data 

INTER-Mediator startup sql put to mysql/tmp/
ex. sample_schema_mysql.sql
*require file extention ".sql"*
then docker execute sql

### PHP5.6.23

- timezone: Asia/Tokyo

### Apache

- volume: webroot:/var/www/html
  - webroot include INTER-Mediator directory

