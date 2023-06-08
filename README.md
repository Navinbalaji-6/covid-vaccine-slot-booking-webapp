# covid-vaccine-slot-booking-webapp
INTRODUCTION:
	Basically, I have created a web application which can perform the above tasks using MYSQL database and PHP. This documentation gives you an overall perspective of creating web application for covid vaccination booking.
  
OVERVIEW:
	The Web application was created using MYSQL as the database, which is used for storing and retrieving the details and PHP as the server-side scripting language, which connects with MYSQL with a basic interaction user interface.
  
TECH STACK:

1.MYSQL:
	MYSQL is a popular open-source Relational database management system which provides a structured setup for storing data and retrieving it. It was used for storing details of users and centres.
  
2.PHP:
	PHP is a widely-used server-side scripting language designed for web development. In this project, PHP will handle the backend logic, including data processing, validation, and communication with the MySQL database.

FEATURES:
1.Separate login for users and Admins:
I have developed separate login for both users and admins having different privileges in the web app and in accessing data stored in the database.
Users will be able to book a specific slot for vaccination while the admins will be able to add or remove the centres and see users who have signed up.

2.Authentication and Login:
It makes sure that users who have signed up, for login to the web app to book slots from the centres available and they can book their slots. Authentication involves data validation and logging in those who signed up alone and they can perform operations based on their privileges. Session in PHP is used to make sure that the user logged in for performing tasks.

3.Data Storage and Retrieval:
The Users data and the available centres data will be stored in the MYSQL database in which users will be able to book slots for vaccines and they can see their details alone. Admins will be able to add or remove vaccination centres and they can see the users who have booked up.

4.Search filters:
Users will be able to find specific centres and timings using search box so that they can able to find centres which they find better comfortable. Admins can find the users with their names.

4.Database design:
The MYSQL database contains three tables, one for users, another for available centres and the one for storing the list of users who have booked slots in different centres.

DATABASE SCHEMA:

Tables: 

Users:
•	User id
•	Name
•	Username
•	 Password
•	Role (Admin or User)

Centres:
•	Slot id
•	Area
•	Dosage Availability
•	Slot starting 
•	Slot Ending

Users_Centers:
•	ID
•	Slot ID
•	Area
•	User ID
•	Username
•	Age 
•	Gender
•	Phone
