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
VALUES ('Zlatan Ibrahimovic','37','something@gmail.com','808-988-7777', 'Zlatan Ibrahimović is a Swedish footballer. He is currently playing for Paris Saint Germain in the French Ligue 1. He was the former captain of Swedish National Team. Zlatan Ibrahimovic is one of the best strikers in the modern day game. He has won the Puskas award for his awesome bicycle kick from 30 yards out against England. He is one of the most popular football players in the world. Ibrahimovic is sweden’s all-time top scorer in international matches.' , 'ibra.png');

SELECT * FROM coach;

DELETE FROM coach
WHERE coach_id = '3';

INSERT INTO coach (name,age,email,phone_number, image)
VALUES ('Cristiano Ronaldo','34','something@gmail.com','808-988-8888', 'cr7.png');

UPDATE coach
SET description = 'Hi, I am Cristiano Ronaldo, a Portuguese professional footballer who has played for Manchester United, Real Madrid, Juventus and Portugal. Along with Lionel Messi, I am regularly considered to be one of the top two players in the world. 
I became'
WHERE 
    coach_id = 2;