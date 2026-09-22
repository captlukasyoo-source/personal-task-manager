<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>
</head>

<body>

    <h1>Personal Task Manager</h1>

    <p>Welcome to your Task Manager!</p>

    <h2>Add New Task</h2>

    <form action="/tasks" method="POST">
        @csrf

        <label>Task Name:</label><br>
        <input type="text" name="task_name" required>
        <br><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea>
        <br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
        <br><br>

        <label>Due Date:</label><br>
        <input type="date" name="due_date">
        <br><br>

        <button type="submit">Add Task</button>
    </form>

    <hr>

    <h2>My Tasks</h2>

    @if ($tasks->count() > 0)

        @foreach ($tasks as $task)

            <div>
                <h3>{{ $task->task_name }}</h3>

                <p>{{ $task->description }}</p>

                <p>Status: <strong>{{ $task->status }}</strong></p>

                <p>
                    Due Date:
                    {{ $task->due_date ?? 'No due date' }}
                </p>

                <!-- Edit -->
                <a href="/tasks/{{ $task->id }}/edit">
                    <button type="button">Edit</button>
                </a>

                <!-- Delete -->
                <form
                    action="/tasks/{{ $task->id }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>

                <!-- Update Status -->
                <form
                    action="/tasks/{{ $task->id }}/status"
                    method="POST"
                    style="display:inline;"
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

                    <button type="submit">Update Status</button>
                </form>

            </div>

            <hr>

        @endforeach

    @else

        <p>No tasks yet.</p>

    @endif

</body>
</html>