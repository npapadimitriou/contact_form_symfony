# contact_form_symfony

a contact form in symfony

Project runs with commands 
$cd /"project repository"

$php./bin/console server:run

In the index page("/") we have the initialization of our departments and  their emails. Then itredirects to our contact form
("/contacts"). We fill in the form and when we submit it we put users in our database and we send an email according to the chosen department.

<h1>How to configure the project</h1>

Firstly we have to create our database. I used doctrine for the database management. 
In the .env we fill in the DATABASE_URL
For creating the database we use the command
php bin/console doctrine:database:create
Thehen we create the entities
php bin/console make:entity
Entities are listed in /src/Entity . We have two DepartmenEmail.php and UserCredentials.php . The first is for the departments(Name and email
)and the second is for the users and their data(all fields of our form). For finalising we execute
php bin/console make:migration
php bin/console make:migration:migrate

Our database is now ready. Check the variable names used in project to match with the database in 



 We can  go to scr/Controller/DepartmentController.php and add new departments and their email. Just copy paste
already existing code , and pass your data in setEmail() and setNameDepartment() .

scr/Controller/FirstController.php deals with the management of the page of our form. The UI is done with twig template 
which is in templates/Contact/contform.html.twig . The form is created in src/Form/ContactType.php and it is injected in our 
twig file.


 Go to .env where you have to fill in the variable MAILER_URL following the guideline from above. It is checked with 
@gmail address and it works well.For  the email , we send a twig template containing all information of the user. We can find it in 
temlates/email/newUserEmail.html.twig
