### Simple TODO App Built with Symfony Framework

#### Database Setup
in this app I am using Doctrine.

To connect to the database you need to update the `DATABASE_URL` in the `.env` file
 with your own Database credentials.
 
##### 1) Run this command to create a Database (the name of the database will be the same as the name specified in the .env file)

 ` php bin/console doctrine:database:create `
 
 ##### 2.)  Create Schema (Generates new migration class)
 
  ` php bin/console doctrine:migrations:diff `
  
 ##### 3.) Run Migration
  
    ` php bin/console doctrine:migrations:migrate `

 
 
 
 
 
 


