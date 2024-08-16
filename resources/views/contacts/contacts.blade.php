@extends('layouts.index')
<!-- SweetAlert CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

@section('content')
    <div class="col md-6 sm-3 lg-12">
        <div class="card">
            <div class="card-header  justify-content-center">
                <h2 class="text-center" style="color: rgb(62, 99, 223)"><a href="{{ route('contacts') }}"><b> List all
                            contacts</b></a></h2>
            </div>
            <div class="d-flex justify-content-between">

                <div>
                    <button type="button" class="btn btn-primary"><a href="{{ route('contacts.create') }}">Create new
                            contact</a></button>

                </div>


                <form method="GET" action="{{ route('contacts') }}" class="d-none d-lg-block app-search"
                    style="border: 2px">
                    <div class="position-relative">
                        <input type="text" name="search" placeholder="Search by name or email"
                            value="{{ request('search') }}">
                        <button type="submit">Search</button>
                    </div>
                </form>


            </div>


        <div class="dropdown ">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Sort by
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item"
                        href="?sort_by=name&order={{ request('order') == 'asc' ? 'desc' : 'asc' }}">Name</a></li>
                <li><a class="dropdown-item"
                        href="?sort_by=created_at&order={{ request('order') == 'asc' ? 'desc' : 'asc' }}">Created At</a>
                </li>

            </ul>
        </div>

        @if (session('create'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('create') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
        @if (session('update'))
            <script>
                Swal.fire({
                    title: 'Updated!',
                    text: "{{ session('update') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        @if (session('delete'))
            <script>
                Swal.fire({
                    title: 'Delete!',
                    text: "{{ session('delete') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
        <div>

            @if ($noResults)
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">

                        <p><b>No Data found. Please try again</b></p>

                    </div>

                </div>
            @else
                <div class="card-body">
                    <div class="table table-striped">
                        <table class="table col md-6 sm-3 lg-12">
                            <thead>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th>Name</th>
                                    <th><b>Email</b></th>
                                    <th><b>Number</b></th>
                                    <th><b>Address</b></th>
                                    <th>Created At</th>
                                    <th><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_contact as $data)
                                    <tr>
                                        <td>{{ $data->id }} </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <a class="btn btn-outline-info"
                                                href="{{ route('contacts.show', $data->id) }}">view</a>
                                            <a class="btn btn-outline-info"
                                                href="{{ route('contacts.edit', $data->id) }}">Edit</a>
                                            <a class="btn btn-outline-danger"
                                                onclick="return confirm('Do you want to Delete')"
                                                href=" {{ route('contacts.destroy', $data->id) }} ">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if (request()->input('search'))
                <div class="d-flex justify-content-center align-items-center">
                    <button class="btn btn-primary" type="submit"> <a href="{{ route('contacts') }}">Back to
                            Home</a></button>
                </div>
            @endif
        </div>
    </div>

    {{-- {{ $all_contact->links() }} --}}
@endsection
