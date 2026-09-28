# Amusement Park Database Management System

A database-driven web application developed as a four-person team project for CSC 355. The system models the operations of an amusement park and provides a web-based interface for retrieving, searching, and analyzing information stored in a relational database.

The project was designed to help model and manage amusement park data involving guests, staff, rides, games, food stands, menu items, purchases, and park visits.

## Features

The application provides functionality for:

- Viewing guests, staff, rides, games, food stands, and menu items
- Searching for guests and staff by name
- Filtering rides by operational status
- Finding rides that meet a specified minimum thrill level
- Tracking which guests rode particular rides
- Tracking which guests played particular games
- Viewing staff assigned to rides and food stands
- Identifying staff members working at the same food stand
- Monitoring menu item inventory
- Identifying low-stock menu items
- Tracking menu item purchase counts
- Calculating sales counts by food stand
- Tracking park attendance by date
- Viewing ride statistics such as capacity and height requirements
- Automatically updating inventory after purchases

## Technologies Used

- PHP
- SQL
- MySQL
- HTML
- PDO (PHP Data Objects)
- Git
- GitHub

## Database Concepts Demonstrated

This project applies several relational database concepts, including:

- Relational database design
- Primary and foreign keys
- Composite primary keys
- Multi-table joins
- Self-joins
- Aggregate functions
- `GROUP BY`
- `HAVING`
- Subqueries
- Prepared statements
- Parameterized queries
- Stored functions
- Stored procedures
- Database triggers

## Database Structure

The database models several aspects of amusement park operations.

### Guests

Stores information about park guests, including their names and dates of birth. Guest activity is connected to other tables to represent park visits, ride experiences, games, and purchases.

### Staff

Stores staff information such as employee names, positions, and work areas. Relationship tables associate staff members with rides, games, and food stands.

### Rides

Stores ride information including:

- Ride name
- Required height
- Thrill level
- Operational status
- Capacity

### Games

Stores information about amusement park games, including:

- Game name
- Minimum age
- Status
- Player capacity

### Food Stands and Menu Items

Stores information about food stands and their available menu items, including:

- Stand name
- Cuisine type
- Operating hours
- Menu item names
- Prices
- Inventory quantities

The database also tracks relationships between food stands, menu items, staff, and purchases.

## Example Functionality

### Guest Age Calculation

The database contains a stored function called `GetGuestAge` that calculates a guest's age based on their date of birth.

The PHP interface accepts a date of birth from the user and calls the stored function through PDO using a parameterized query.

### Thrill Ride Search

The `GetThrillRides` stored procedure accepts a minimum thrill level and returns rides that meet or exceed that level.

The PHP interface allows a user to enter a minimum thrill level and displays matching rides along with information such as ride name, thrill level, and capacity.

### Automatic Inventory Updates

The `DecreaseMenuItemStock` trigger automatically updates menu item inventory after a purchase is recorded.

When a new purchase is inserted, the trigger subtracts the purchased quantity from the corresponding menu item's stock quantity.

### Search Functionality

The application includes browser-based forms for searching database information, including:

- Guest search by first or last name
- Staff search by first or last name
- Ride search by operational status
- Ride search by minimum thrill level

Parameterized and prepared queries are used for database searches that accept user input.

### Reporting and Analytics

The project also contains queries and reports for analyzing amusement park operations, including:

- Park attendance by date
- Food stand sales counts
- Menu item purchase counts
- Low-stock inventory
- Ride capacity statistics
- Minimum and maximum ride height requirements
- Guest participation in rides and games
- Staff assignments

## My Contributions

As part of the four-person development team, my documented contributions included:

- Developed the `GetGuestAge` SQL stored function to calculate guest ages from dates of birth
- Developed the `GetThrillRides` stored procedure to retrieve rides based on a specified minimum thrill level
- Created the `DecreaseMenuItemStock` database trigger to automatically reduce inventory after purchases
- Contributed to the relational database schema, including the `GuestVisitDate`, `FoodOperates`, and `Sells` tables
- Worked with PHP/PDO interfaces that call database functionality using parameterized queries

## Team

Developed collaboratively by:

- Anna Knowles
- Madison Barrier
- LeighAnna Valenzuela
- Malorie Leonard

## Project Context

This project was developed for CSC 355 as a collaborative database project.

The goal was to design a relational database capable of representing amusement park operations and use SQL and a PHP-based interface to retrieve and analyze park data.

The system demonstrates both database design and application-level database interaction, including relational queries, stored database routines, triggers, and web-based access to database information.
