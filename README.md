
App Setup

compser update

DB Configation

Add .env file to the App
Update below database setting.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_db
DB_USERNAME=root
DB_PASSWORD=

Run Migration

php artisan migrate 

Created default admin user
Email : admin@example
Password : demo@123

Below feature completed

1. User Authentication -- breeze functionality implemented
Implement user registration, login, and logout functionality.   
Use Laravel's built-in authentication features.   
Include social media login (Google, Facebook).  
2. User Roles and Permissions  -- Policy model implemented
Implement two types of users: Admin and Regular User.
Admins can manage posts and users.
Regular users can create, edit, and delete their own posts.
3. Post Management  --  Implement
Create CRUD operations for posts.
Each post should have a title, content, author, and timestamp.
Use Eloquent ORM for database interactions.
Implement soft deletes for posts.
4. Comments	--  Implement
Users can comment on posts.
Implement CRUD operations for comments.
Use Eloquent relationships to manage post and comment relations.
5. Admin Panel	--  Admin middleware Implement
Create an admin panel for managing users and posts.
Use middleware to restrict access to the admin panel.
Implement a dashboard showing statistics (number of posts, users, comments).
6. Advanced Routing  -- Implmented
Group routes using route groups and middleware.
Implement route model binding.
Use named routes
7. Middleware 	-- Implmented
Create custom middleware to log user activities.
Implement middleware to check user roles and permissions.

8. Service Providers -- Implmented	
Create a custom service provider for handling specific business logic.
Register the service provider in config/app.php.
9. Performance Optimization -- Implmented
Implement caching for posts and comments.
Use query optimization techniques.
Implement Eager Loading to reduce the number of queries.
10. Testing -- Implmented
Write unit tests for models, controllers, and middleware.
Use Laravel's testing features to ensure code quality and functionality.
Bonus (Optional)
Implement real-time notifications using Laravel Echo and Pusher.
Make the Api for mobile application
Deliverables
A GitHub repository with the complete source code.
A README file with installation instructions and explanations of the implemented features.
A short video (5-10 minutes) demonstrating the application and key features.
Evaluation Criteria -- Implmented
Code quality and best practices.
Proper use of Laravel features and Eloquent ORM.
Documentation and clarity.