# Working Databases With PDO

This repo was created to learn how to persist data in relational database using **PDO**, an PHP extension many used on real world applications and by the PHP community.

## Techs

- PHP 8
- Composer
- Docker
- SQLite and MySQL

## What I learned?

- How to connect by database with PDO object;
- Use the `exec()` function to create table and insert data on table;
- Use the `query()` function to execute `SELECT` queries;
- Use the `fetchAll()` function to get the rows of data on table;
- Use the `fetch` function to get the specific register on table and get all the registers no consumes memory doing a loop.
- What's the SQL injection and how to do attack our application.
- Adding params at string SQL is dangerous!
- To solve this problem using **_Prepared Statement_**.
- That _prepared statement_ can even help the performance of application.
- The difference between `bindValue` and `bindParam` to link parameters to _prepared statement_.
- We can inform the data type passes through the `PDO`, using the third parameter of `bindValue` and `bindParam`: `PDO::PARAM_INT`.
- The best practices and design patterns with object orientation.
- The **_Entity_** pattern, and it's already been applied this project.
- The **_Creation Method_** pattern that create a connection so don't need repeat this code on application.
- The **_Repository_** pattern allow to extract the persistence logic for the specific class.
- To abstract the repository implementation through an interface that can change implementation on future, case necessary.
- The dependency injection concept and yours several advantages at development.
- The importance of handle errors in our application.
- By default, the **PDO** don't emit any error type.
- To recover the error information by `errorInfo` method.
- How to inform to **PDO** throw exceptions in error case.
- Other attributes to configure the database connection using **PDO**.
- To relate data on database in our object oriented application.
- The **_Aggregate_** pattern where the objects access is controlled by others objects.
- The **N + 1** problem that is a big performance problem.
- How to solve the **N + 1** queries problem.
- There are differences between the relational world (database) and the object oriented world (application).
- The ORM's can help us to scan between these two worlds.
- How it is easy to migrate database system using **PDO**.
