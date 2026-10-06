<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <a href="{{ route('contacts.index') }}">Back to List</a>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" style="margin-top:10px;">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name', $contact->name) }}">
            @error('name') <p style="color:red;">{{ $message }}</p> @enderror
        </div>
        <br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email', $contact->email) }}">
            @error('email') <p style="color:red;">{{ $message }}</p> @enderror
        </div>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
