## Product Feedback

## Description

This project is a web application that allows users to submit feedback on various aspects of the application. It includes features for user authentication, feedback submission, listing feedback, and commenting on feedback items.

## Features
User Authentication
Users can register, log in, and log out.
Authentication is implemented using Laravel's built-in authentication system.

## Feedback Submission
Users can submit feedback through a user-friendly form.
Feedback includes a title, description, and category (e.g., bug report, feature request, improvement, etc.).
Validation ensures that required fields are filled out.

## Feedback Listing
Feedback items are displayed in a paginated list.
Each feedback item displays its title, category, and the user who submitted it.

## Commenting System
Users can leave comments on feedback items.
Comments include the user's name, date, and content.
Basic formatting options (e.g., bold, italic, code blocks) are implemented for comments.
Users can mention other users in comments using the "@" symbol (bonus feature).

## Technologies Used
Laravel 10
PHP 8.2.12
MySQL
Vite (optional if implementing frontend)

## Getting Started
Clone the repository: git clone https://github.com/haiderMahmood58/product-feedback.git
Install dependencies: composer install && npm install
Configure your environment variables: Copy the .env.example file to .env and configure your database settings and other environment variables.
Generate an application key: php artisan key:generate
Migrate the database: php artisan migrate
Run the comand: npm install && npm run dev
Serve the application: php artisan serve
Access the application in your browser at http://localhost:8000 