<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <div class="col-xl-7 m-auto">
            <form action="{{ route('contact.update', ['id' => $editContact->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xl-6 mt-3">
                        <label for="">Contact Name:</label>
                        <input type="text" class="form-control" value="{{ $editContact->contact_name }}" name="contact_name" id="contact_name">
                    </div>
                    <div class="col-xl-6 mt-3">
                        <label for="">Contact Email:</label>
                        <input type="email" class="form-control" value="{{ $editContact->contact_email }}" name="contact_email" id="contact_email">
                    </div>
                    <div class="col-xl-6 mt-3">
                        <label for="">Contact Phone:</label>
                        <input type="number" class="form-control @error('contact_phone') is-invalid @enderror" value="{{ $editContact->contact_phone }}" name="contact_phone" id="contact_phone">
                    </div>
                    <div class="col-xl-6 mt-3">
                        <label for="">Contact Address:</label>
                        <input type="" class="form-control" value="{{ $editContact->contact_address }}" name="contact_address" id="contact_address">
                    </div>
                    <div class="col-xl-6 mt-3">
                        <label for="">Contact Company:</label>
                        <input type="text" class="form-control" value="{{ $editContact->company }}" name="company" id="company">
                    </div>
                    <div class="col-xl-6 mt-3">
                        <label for="">Contact Job:</label>
                        <input type="text" class="form-control" value="{{ $editContact->job_title }}" name="job_title" id="job">
                    </div>
                    <div class="col-xl-12 mt-3">
                        <label for="">Contact Note:</label>
                        <textarea placeholder="Add 'None' if there is no note" class="form-control" name="notes" id="notes" cols="30" rows="5">{{ $editContact->notes }}</textarea>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-info btn-md" type="submit" name="add-contact">Add contact</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
