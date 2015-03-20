Hair Salon App


Copyright 2015, Reid Baldwin

Language: PHP with Silex and Twig, using PSQL for the database.

License: Creative Commons

Description: a hair salon app that allows the owner to create a database that includes entries for each added hair stylist and a list of the stylists' clients for each entry.

Instructions: Run a php server from the 'web' folder. Run the website using local host. It should load from the root.

PSQL entries:

Guest=# CREATE DATABASE hair_salon;
CREATE DATABASE
Guest=# \c hair_salon;
You are now connected to database "hair_salon" as user "Guest".
hair_salon=# CREATE TABLE stylists (id serial PRIMARY KEY, name varchar);
CREATE TABLE
hair_salon=# CREATE TABLE clients (id serial PRIMARY KEY, name varchar, phone varchar, stylist_id int);
CREATE TABLE
hair_salon=# CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon;
CREATE DATABASE
hair_salon=# \c hair_salon_test;
You are now connected to database "hair_salon_test" as user "Guest".
