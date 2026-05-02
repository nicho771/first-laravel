<h1>Todo List</h1>

<a href="/tasks/create">Tambah Task</a>

@foreach($tasks as $task)
    <div>
        <h3>{{ $task->title }}</h3>
        <p>{{ $task->description }}</p>

        <a href="/tasks/{{ $task->id }}/edit">Edit</a>

        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </div>
@endforeach