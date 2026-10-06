<!DOCTYPE html>
<html>
<head>
    <title>Contact List</title>
</head>
<body>
    <h1>Contacts</h1>
    <a href="{{ route('contacts.create') }}">Create New Contact</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" style="margin-top:10px;">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phones</th>
            <th>Actions</th>
        </tr>
        @forelse ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>
                @forelse($contact->phones as $phone)
                    <div>{{ $phone->phone_number }}</div>
                @empty
                    <span>No Phone</span>
                @endforelse
            </td>
            <td>
                <a href="{{ route('contacts.show', $contact->id) }}">View</a> |
                <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a> |
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No contacts found.</td>
        </tr>
        @endforelse
    </table>
</body>
</html>
