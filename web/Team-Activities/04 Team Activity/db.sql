CREATE TABLE speaker (
   speaker_id serial primary key not null
   , fName text NOT NULL
   , lName text NOT NULL
);
​
CREATE TABLE conference (
   conference_id serial primary key NOT NULL
   , year int NOT NULL
   , Month int NOT NULL
);
​
CREATE TABLE Note (
   note_id serial PRIMARY KEY NOT NULL
   , speaker_id Int REFERENCES speaker(speaker_id)
   , conference_id INT REFERENCES conference(conference_id)
   , note text NOT NULL
);