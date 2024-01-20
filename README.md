# LaravelExam
In this project there is TravelAgent which is laravel backend and TravelAgentFrontend which vue js frontend.
To run the projects, clone the repository then for the laravel backend, ensure you create a database named travel_agents. 
The database password is Kamaramike8431.
You can edit the env file for configuration.
then run composer install
then run php artisan key:generate
then run php artisan migrate
then run php artisan db:seed
then php artisan serve

fot the front end, run npm install then run npm run dev.
Ensure that the laravel localhost is running on port 8000, otherwise you will have issues.

I did not implement user authentication as time caught up with me, so on the BookingForm.vue on line 34, you can copy a user id from the database from the seeded users. 
I also did not have enough time to work on the ui.

I used Routers in Vue js to navigate the user to different sections, and I decided to use backend and frontend each in their own repository to make it easier for the development process.
