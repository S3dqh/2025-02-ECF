-- traduction en anglais des différents termes
-- modifications de certains types car semblent plus approprié à la circonstance
-- codé pour database mysql utilisée via le logiciel PhpMyAdmin

CREATE TABLE configuration (
    configuration_id INT(10) PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE parameters (
    parameter_id INT(10) PRIMARY KEY AUTO_INCREMENT,
    property VARCHAR(50) NOT NULL,
    value VARCHAR(50) NOT NULL
);

CREATE TABLE users (
    user_id INT(10) PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL, -- VARCHAR(255) semble plus approprié pour email
    password VARCHAR(60) NOT NULL, -- VARCHAR(60) pour BCRYPT
    telephone_number VARCHAR(12), -- VARCHAR(12) pour formater les numéros -> ex : +33123456789
    address VARCHAR(255), -- VARCHAR(255) semble plus approprié que VARCHAR(50)
    date_of_birth DATE,
    picture BLOB,
    pseudo VARCHAR(50),
    credits INT(3) DEFAULT 20 -- Ajout d'un champ crédits
);

CREATE TABLE roles (
    role_id INT(10) PRIMARY KEY AUTO_INCREMENT,
    libel VARCHAR(50)
);

CREATE TABLE reviews ( -- review = traduction conseillé pour "avis"
    review_id INT(10) PRIMARY KEY AUTO_INCREMENT,
    comment VARCHAR(255), -- VARCHAR(255) suffisant ?
    note INT(2), -- Une note sera un nombre compris entre 0 et 20
    status VARCHAR(50)
);

CREATE TABLE cars (
    car_id INT(10) PRIMARY KEY AUTO_INCREMENT,
    model VARCHAR(50),
    registration_plates VARCHAR(50),
    energy VARCHAR(50),
    color VARCHAR(50),
    date_of_first_registration DATE
);

CREATE TABLE carpools (
    carpool_id INT(10) PRIMARY KEY AUTO_INCREMENT,
    departure_date DATE,
    departure_time TIME,
    departure_place VARCHAR(50),
    arrival_date DATE,
    arrival_time TIME,
    arrival_place VARCHAR(50),
    status TINYINT(1), -- Équivalent SQL pour un booléen ?
    number_of_places INT(1),
    price_of_a_place FLOAT(5, 2)
);

CREATE TABLE brands (
    brand_id INT(10) PRIMARY KEY AUTO_INCREMENT,
    libel VARCHAR(50)
);