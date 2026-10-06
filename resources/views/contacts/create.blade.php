<!DOCTYPE html>
<html>
<head>
    <title>Create Contact</title>
</head>
<body>
    <h1>Add New Contact</h1>
    <a href="{{ route('contacts.index') }}">Back to List</a>

    <form action="{{ route('contacts.store') }}" method="POST" style="margin-top:10px;">
        @csrf
        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <p style="color:red;">{{ $message }}</p> @enderror
        </div>
        <br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <p style="color:red;">{{ $message }}</p> @enderror
        </div>
        <br>
        <div>
            <label>Phone Number:</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
