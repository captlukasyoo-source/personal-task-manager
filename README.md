# Personal Task Manager

A simple Laravel web application for managing personal tasks.

## Project Information

**Project Code:** WST21-PM-2026-SF

**Student Name:** [Your Name]

**Course & Year:** [Your Course & Year]

**Database Used:** SQLite

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status
- Set task status as Pending or Completed
- Set a due date
- Add a task description

## Technologies Used

- Laravel
- PHP
- SQLite
- Blade
- HTML
- GitHub Codespaces

## Project Structure

This project demonstrates the basic Laravel flow:

**Routes → Controller → Model → Database → Blade**

## How It Works

1. The user accesses the task manager through the Laravel routes.
2. The `TaskController` handles task operations.
3. The `Task` model communicates with the database.
4. SQLite stores the task information.
5. Blade displays the task manager interface.

## Task Fields

- ID
- Task Name
- Description
- Status
- Due Date
- Created At
- Updated At