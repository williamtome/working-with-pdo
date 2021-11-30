# Working Databases With PDO

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
