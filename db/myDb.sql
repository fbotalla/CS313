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

INSERT INTO person_schedule

INSERT INTO coach (name,age,email,phone_number)
VALUES ('Fabrizio Botalla','24','something@gmail.com','808-999-9999');

SELECT * FROM coach;

SELECT * FROM person_schedule;

ALTER TABLE coach
ADD COLUMN description TEXT;

ALTER TABLE coach
ADD COLUMN image TEXT;

UPDATE coach
SET name = 'Fabrizio Botalla',
    age = '24',
    email = 'something@gmail.com',
    phone_number = '808-999-9999',
    description = 'Hi, My name is Fabrizio, I got by Fab for short. I love to play soccer.',
    image = 'fab.png'
WHERE 
    coach_id = 1;
    

UPDATE coach
SET description = 'Hi, My name is Fabrizio, I go by Fab for short. I love to play soccer, I played it my entire life since I was 5 years old. Growing up in Italy made me have a real passion for this sport. I have
    been lucky enough to have the opporunity to play for a semi-professional team: Pro Vercelli. My position throughout my career has been of a striker. My main foot is right '
WHERE 
    coach_id = 1;

INSERT INTO coach (name,age,email,phone_number,description, image)
VALUES ('Cristiano Ronaldo','34','something@gmail.com','808-988-8888', 'Hi, I am Cristiano Ronaldo, a Portuguese professional footballer who has played for Manchester United, Real Madrid, Juventus and Portugal. Along with Lionel Messi, I am regularly considered to be one of the top two players in the world. I became the world’s most expensive player when Real Madrid signed me for 94 million Euros in 2009 from Manchester United. My sustained performance has enabled me to break numerous records for goal scoring and I have been named FIFA player of the year (Ballon d’Or) five times. I have become an iconic figure in the sport.' , 'cr7.png');

INSERT INTO coach (name,age,email,phone_number,description, image)
VALUES ('Zlatan Ibrahimovic','37','something@gmail.com','808-988-7777', 'Zlatan Ibrahimović is a Swedish footballer. He is currently playing for Paris Saint Germain in the French Ligue 1. He was the former captain of Swedish National Team. Zlatan Ibrahimovic is one of the best strikers in the modern day game. He has won the Puskas award for his awesome bicycle kick from 30 yards out against England. He is one of the most popular football players in the world. Ibrahimovic is swedens all-time top scorer in international matches.' , 'ibra.png');

SELECT * FROM coach;

DELETE FROM coach
WHERE coach_id = '3';

INSERT INTO coach (name,age,email,phone_number, image)
VALUES ('Cristiano Ronaldo','34','something@gmail.com','808-988-8888', 'cr7.png');

UPDATE coach
SET description = 'Hi, I am Cristiano Ronaldo, a Portuguese professional footballer who has played for Manchester United, Real Madrid, Juventus and Portugal. Along with Lionel Messi, I am regularly considered to be one of the top two players in the world. I became the worlds most expensive player when Real Madrid signed me for 94 million Euros in 2009 from Manchester United. My sustained performance has enabled me to break numerous records for goal scoring and I have been named FIFA player of the year (Ballon dOr) five times. I have become an iconic figure in the sport.'
WHERE 
coach_id = 2;



SELECT * FROM person_schedule;

GRANT SELECT, INSERT, UPDATE ON ALL TABLES IN SCHEMA public TO Administrator;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO Administrator;

ALTER TABLE person
DROP COLUMN age;

SELECT email from person WHERE email = 'fake@gmail.com';


DELETE FROM person_schedule;



ALTER TABLE person
RENAME name TO username;

INSERT INTO person(username, email, password)
VALUES('user', 'fake_email@gmail.com','default');

SELECT * FROM time;


ALTER TABLE time
ALTER COLUMN hour TYPE text;

INSERT INTO time(hour, date)
VALUES('4PM-5PM', 'Monday');
INSERT INTO time(hour, date)
VALUES('5PM-6PM', 'Tuesday');

INSERT INTO time(hour, date)
VALUES('6PM-7PM', 'Tuesday');

INSERT INTO time(hour, date)
VALUES('7PM-8PM', 'Tuesday');

INSERT INTO time(hour, date)
VALUES('4PM-5PM', 'Wednesday');

INSERT INTO time(hour, date)
VALUES('6PM-7PM', 'Wednesday');

INSERT INTO time(hour, date)
VALUES('5PM-6PM', 'Thursday');

INSERT INTO time(hour, date)
VALUES('8PM-9PM', 'Thursday');

INSERT INTO time(hour, date)
VALUES('4PM-5PM', 'Friday');

INSERT INTO time(hour, date)
VALUES('5PM-6PM', 'Friday');

INSERT INTO time(hour, date)
VALUES('6PM-7PM', 'Friday');

INSERT INTO time(hour, date)
VALUES('5PM-6PM', 'Saturday');

SELECT hour, date FROM time WHERE time_id = 1


INSERT INTO location(name_of_place)
VALUES('Kapolei');

INSERT INTO location(name_of_place)
VALUES('Honolulu');

INSERT INTO location(name_of_place)
VALUES('Waipahu');

INSERT INTO location(name_of_place)
VALUES('Waikiki');

INSERT INTO location(name_of_place)
VALUES('Pearl City');

SELECT person_id FROM person WHERE username = 'user';

INSERT INTO person_schedule VALUES ("person_id", "instructor_id", "location_id", "time_id");

SELECT * from time;


SELECT location_id FROM location WHERE name_of_place = 'Honolulu';

SELECT coach_id FROM coach WHERE name = 'Fabrizio Botalla';