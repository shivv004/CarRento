# CarRento

CarRento is a simple Core PHP, SQL based project showcasing online car rental service.

## Installation

Use the Xampp and initialize the Apache and MySQL server.

## Database schema

```
CREATE TABLE booked_cars ( id int NOT NULL, user_id int NOT NULL, car_id int NOT NULL, num_of_days int NOT NULL, start_date date NOT NULL, PRIMARY KEY(id), FOREIGN KEY (user_id) REFERENCES users (id), FOREIGN KEY (car_id) REFERENCES cars (id) );

CREATE TABLE cars ( id int NOT NULL, user_id int NOT NULL, vehicle_model varchar(100) NOT NULL, vehicle_number varchar(30) NOT NULL, seating_capacity int NOT NULL, rent_per_day int NOT NULL, PRIMARY KEY(id), FOREIGN KEY(user_id) REFERENCES users(id) );

CREATE TABLE contact ( id int NOT NULL, email varchar(100) NOT NULL, question varchar(500) NOT NULL, PRIMARY KEY(id) );

CREATE TABLE users ( id int NOT NULL, name varchar(100) NOT NULL, agencyName varchar(100) NOT NULL, isAgency boolean NOT NULL, email varchar(100) NOT NULL, password varchar(100) NOT NULL, PRIMARY KEY(id) );
```
[Download (import)](https://github.com/shivv004/CarRento/blob/main/carrento.sql)

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://github.com/shivv004/CarRento/blob/main/LICENSE)
