<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

<div class="container">

    <!-- Header -->
    <div class="header">
        <h1>Personal Task Manager</h1>
        <p>Organize your tasks, track your progress, and stay productive.</p>
    </div>

    <!-- Add Task -->
    <div class="form-card">
        <h2>Add New Task</h2>

        <form action="/tasks" method="POST">
            @csrf

            <div class="form-group">
                <label>Task Name</label>
                <input type="text" name="task_name" placeholder="Enter task name" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" placeholder="Enter task description"></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label>Due Date</label>
                <input type="date" name="due_date">
            </div>

            <button type="submit" class="add-button">
                + Add Task
            </button>
        </form>
    </div>

    <!-- Task List -->
    <h2 class="tasks-title">My Tasks</h2>

    @if ($tasks->count() > 0)

        @foreach ($tasks as $task)

            <div class="task-card">

                <h3>{{ $task->task_name }}</h3>

                <p>
                    {{ $task->description ?: 'No description provided.' }}
                </p>

                <p>
                    Status:

                    @if ($task->status == 'Completed')
                        <span class="completed">Completed</span>
                    @else
                        <span class="pending">Pending</span>
                    @endif
                </p>

                <p>
                    <strong>Due Date:</strong>
                    {{ $task->due_date ?? 'No due date' }}
                </p>

                <div class="actions">

                    <!-- Edit -->
                    <a
                        href="/tasks/{{ $task->id }}/edit"
                        class="button edit-button"
                    >
                        Edit
                    </a>

                    <!-- Delete -->
                    <form
                        action="/tasks/{{ $task->id }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-button"
                        >
                            Delete
                        </button>
                    </form>

                    <!-- Update Status -->
                    <form
                        action="/tasks/{{ $task->id }}/status"
                        method="POST"
                        class="status-form"
                    >
                        @csrf
                        @method('PATCH')

                        <select name="status">
                            <option value="Pending"
                                {{ $task->status == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Completed"
                                {{ $task->status == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>

                        <button
                            type="submit"
                            class="status-button"
                        >
                            Update Status
                        </button>
                    </form>

                </div>

            </div>

        @endforeach

    @else

        <div class="no-tasks">
            <p>No tasks yet. Add your first task above!</p>
        </div>

    @endif

</div>

</body>
</html>