<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <h1>Search Results for "{{ $searchTerm }}"</h1>

    @if (count($searchResults) > 0)
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Company</th>
                    <th>Job Title</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($searchResults as $contact)
                    <tr>
                        <td>{{ $contact->contact_name }}</td>
                        <td>{{ $contact->contact_email }}</td>
                        <td>{{ $contact->contact_phone}}</td>
                        <td>{{ $contact->contact_address }}</td>
                        <td>{{ $contact->company }}</td>
                        <td>{{ $contact->job_title}}</td>
                        <td>{{ $contact->notes }}</td>
                        <td>
                            <a href="{{ url('editcontact/' . $contact->id) }}" class="btn btn-success btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No contacts found matching your search term.</p>
    @endif

    <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">Go Back</a>

</body>

</html>
