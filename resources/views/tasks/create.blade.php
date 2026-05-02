<h1>Tambah Task</h1>

<form action="/tasks" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Judul">
    <textarea name="description"></textarea>
    <button type="submit">Simpan</button>
</form>