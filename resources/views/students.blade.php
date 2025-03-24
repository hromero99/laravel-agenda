@foreach ($students as $student)
    <p>{{ $student->name }}</p>
    <p>{{ $student->email }}</p>
    <p>{{ $student->is_active }}</p>
@endforeach
<form action="{{ route('students.create') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="checkbox" name="is_active" placeholder="Is Active">
    <button type="submit">Create</button>
</form>