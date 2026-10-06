<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>
</head>
<body>
    <h1>Contact Details</h1>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone Numbers:</strong></p>
    <ul>
        @forelse($contact->phones as $phone)
            <li>{{ $phone->phone_number }}</li>
        @empty
            <li>No Phone Number Available</li>
        @endforelse
    </ul>
    <a href="{{ route('contacts.index') }}">Back to List</a>
</body>
</html>
