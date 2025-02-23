@extends("layout")

@section("sadrzajStranice")


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allContacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->subject}}</td>
                <td>{{$contact->message}}</td>
                <td>
                    <a href="/admin/delete-contact/{{$contact->id}}">Delete</a>
                    <a>Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
