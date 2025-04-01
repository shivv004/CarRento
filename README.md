Car Rental Website [PHP]

----------------Complete database schema----------------------

CREATE TABLE booked_cars (
  id int NOT NULL,
  user_id int NOT NULL,
  car_id int NOT NULL,
  num_of_days int NOT NULL,
  start_date date NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (car_id) REFERENCES cars (id)
);


CREATE TABLE cars (
  id int NOT NULL,
  user_id int NOT NULL,
  vehicle_model varchar(100) NOT NULL,
  vehicle_number varchar(30) NOT NULL,
  seating_capacity int NOT NULL,
  rent_per_day int NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(user_id) REFERENCES users(id)
);


CREATE TABLE contact (
  id int NOT NULL,
  email varchar(100) NOT NULL,
  question varchar(500) NOT NULL,
  PRIMARY KEY(id)
);


CREATE TABLE users (
  id int NOT NULL,
  name varchar(100) NOT NULL,
  agencyName varchar(100) NOT NULL,
  isAgency boolean NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY(id)
);
