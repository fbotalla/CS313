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
   , session_day_and_time int
   , FOREIGN KEY (session_day_and_time) REFERENCES session(session_id)
);
​
CREATE TABLE Note (
   note_id serial PRIMARY KEY NOT NULL
   , speaker_id Int REFERENCES speaker(speaker_id)
   , conference_id INT REFERENCES conference(conference_id)
   , note text NOT NULL
);

CREATE table session(
    session_id serial PRIMARY KEY NOT NULL,
    day text NOT NULL,
    time text NOT NULL
)

INSERT INTO speaker (fName,lName)
VALUES ('David','Bednar');

INSERT INTO speaker (fName,lName)
VALUES ('Jeffrey','Holland');

INSERT INTO speaker (fName,lName)
VALUES ('Dieter','Utchdorf');

INSERT INTO session(day, time)
VALUES ('Saturday', 'Morning');

INSERT INTO conference (year,month, session_day_and_time)
VALUES ('2019','4','1');

INSERT INTO Note(speaker_id, conference_id, note)
VALUES ('1','1','I thought it was great!');

INSERT INTO Note(speaker_id, conference_id, note)
VALUES ('2','1','I thought it was awesome!');

INSERT INTO Note(speaker_id, conference_id, note)
VALUES ('3','1','I thought it was amazing!');

SELECT * FROM Note;
SELECT * FROM conference;
SELECT * FROM session;

DROP TABLE session;
DROP TABLE speaker;
DROP TABLE conference;
DROP TABLE Note;