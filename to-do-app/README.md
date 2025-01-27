[EXERCISE]: Practise everything you have done in Laravel so far by making the API for a Todo App for everything you need to do after you finish the course.
Use Postman to test your API routes. Making a frontend for this application is a different exercise.
To start, each todo should have: - a name - whether or not it is completed (boolean, 0/1)
Create API routes for the following: - get all todos - add a todo - delete a todo - complete a todo
You have not been shown explicitly, but you should be able to figure out PUT and DELETE requests based on what you have already been shown
Stretch goals:
Add the ability to filter the all todos route by completed/uncompleted
Add a category and create a one-to-many relationship with a todo
Make sure that you can assign a category when adding a todo
Make sure you update the get todos route so that it includes the category in each todo
Add the ability to also filter the todos route by category (do this by providing a category id in the url as get data).
Make sure it works in conjunction with the completed/uncompleted filter
