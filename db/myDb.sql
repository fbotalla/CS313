CREATE TABLE person(
    person_id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    age INT NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL
);

CREATE TABLE coach (
    coach_id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    age INT NOT NULL,
    email TEXT NOT NULL,
    phone_number VARCHAR(50) NOT NULL
);

CREATE TABLE location (
    location_id SERIAL PRIMARY KEY,
    name_of_place TEXT NOT NULL
);

CREATE TABLE time (
    time_id SERIAL PRIMARY KEY,
    hour TIMESTAMP NOT NULL,
    date DATE NOT NULL
);

CREATE TABLE person_schedule (
    person_id INT,
    instructor_id INT,
    location_id INT,
    time_id INT,
    FOREIGN KEY (person_id) REFERENCES person (person_id),
    FOREIGN KEY (instructor_id) REFERENCES coach (coach_id),
    FOREIGN KEY (location_id) REFERENCES location (location_id),
    FOREIGN KEY (time_id) REFERENCES time (time_id)
);

INSERT INTO coach (name,age,email,phone_number)
VALUES ('Fabrizio Botalla','24','something@gmail.com','808-999-9999');

SELECT * FROM coach;