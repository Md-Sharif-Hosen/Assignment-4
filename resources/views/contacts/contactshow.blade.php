@extends('layouts.index')

@section('content')
    <div class="col md-6 sm-3 lg-12">
        <div class="card ">
            <div class="card-header justify-content-center">
                <h2 class="text-center" style="color: rgb(62, 99, 223)"><b>contacts
                        Details</b></h2>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center form-control">
                    <p class=""><strong>Name: </strong> {{ $contacts->name }}</p>
                    <p><strong>Email: </strong> {{ $contacts->email }}</p>
                    <p><strong>Phone: </strong>  {{ $contacts->phone }}</p>
                    <p><strong>Address: </strong> {{ $contacts->address }}</p>
                    <p><strong>Created At: </strong> {{ $contacts->created_at }}</p>
                    <p><strong>Updated At: </strong> {{ $contacts->updated_at }}</p>
                    <a href="{{ route('contacts') }}" class="btn btn-info">Back to Contacts</a>
                </div>

            </div>

        </div>
    </div>
@endsection
