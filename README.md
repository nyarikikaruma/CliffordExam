# LaravelExam
In this project there is LaravelBackendAndFrontend folder, which is the folder with project.
When you open this folder open the above named folder and open it in your IDE of choice. 
Then run npm install to install all the Vue Js node packages.

then run composer install to install php packages for Laravel,

then run php artisan key:generate
then run cp .env.example .env to make a copy of the env file
then add the database name on the env file 
then run php artisan migrate
then run php artisan db:seed
then php artisan serve



I used Routers in Vue js to navigate the user to different sections,
I used database seeders to easien the process of testing the project, 
I also made the project in the same repo to avoid CORS issues when the projects are in different domains,
