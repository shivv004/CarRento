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


INSERT INTO `booked_cars` (`id`, `user_id`, `car_id`, `num_of_days`, `start_date`) VALUES
(2, 15, 22, 17, '2028-08-20'),
(3, 15, 23, 17, '2027-06-28'),
(27, 12, 27, 11, '2024-06-13'),
(28, 12, 25, 3, '2024-04-18'),
(29, 12, 23, 18, '2024-06-17'),
(30, 12, 21, 9, '2025-04-17'),
(32, 15, 21, 8, '2024-10-16'),
(33, 15, 27, 15, '2026-08-16'),
(34, 15, 25, 12, '2024-10-17');



INSERT INTO `cars` (`id`, `user_id`, `vehicle_model`, `vehicle_number`, `seating_capacity`, `rent_per_day`) VALUES
(20, 14, 'Chevrolet Tahoe', 'JKL202', 7, 8000),
(21, 14, 'BMW X5', 'MNO303', 5, 10000),
(22, 14, 'Volkswagen Golf', 'PQR404', 4, 2500),
(23, 14, 'Mercedes-Benz E-Class', 'STU505', 5, 12000),
(24, 13, 'Toyota Camry', 'ABC123', 5, 3500),
(25, 13, 'Honda Civic', 'XYZ456', 4, 3000),
(26, 13, 'Ford Mustang', 'DEF789', 2, 5500),
(27, 13, 'Nissan Altima', 'GHI101', 5, 3000);



INSERT INTO `contact` (`id`, `email`, `question`) VALUES
(51, 'shiv.singh1104@gmail.com', 'example question'),
(52, 'shivshank019@gmail.com', 'example question 2');


INSERT INTO `users` (`id`, `name`, `agencyName`, `isAgency`, `email`, `password`) VALUES
(12, 'Shiv Shankar', '', 0, 'shivshank019@gmail.com', 'a3de1cb0b2e062608a7764f46eaa105ee0259e13'),
(13, 'John Doe', 'ABC Car Rentals', 1, 'john.doe@example.com', 'a3de1cb0b2e062608a7764f46eaa105ee0259e13'),
(14, 'Sarah Lee', 'Ocean Drive Rentals', 1, 'sarah.lee@example.com', 'a3de1cb0b2e062608a7764f46eaa105ee0259e13'),
(15, 'SK Singh', '', 0, 'shiv.singh1104@gmail.com', 'a3de1cb0b2e062608a7764f46eaa105ee0259e13');
