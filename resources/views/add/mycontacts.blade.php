<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="col-xl-11 text-center m-auto">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Contact Name</th>
                        <th scope="col">Contact Email</th>
                        <th scope="col">Contact Phone</th>
                        <th scope="col">Contact Address</th>
                        <th scope="col">Company</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @unless (count($mycontacts) == 0)
                        @foreach ($mycontacts as $contacts)
                            <tr style="font-size: 15px">
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $contacts->contact_name }}</td>
                                <td>{{ $contacts->contact_email }}</td>
                                <td>{{ $contacts->contact_phone }}</td>
                                <td>{{ $contacts->contact_address }}</td>
                                <td>{{ $contacts->company }}</td>
                                <td>{{ $contacts->job_title }}</td>
                                <td>{{ $contacts->notes }}</td>

                                <td>
                                    <a href="{{ url('editcontact/' . $contacts->id) }}" class="btn btn-success btn-sm">Edit</a>

                                        <div class="row">
                                            <div class="col-xl-3">
                                                <form action="{{ route('contact.destroy', $contacts->id) }} " method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endunless
                </tbody>
            </table>
            <a href="addcontact" class="btn btn-sm btn-danger mt-2">Add new contact</a>
        </div>
    </div>
</body>

</html>
