@extends('layouts.index')




@section('content')
    <div class="col md-6 sm-3 lg-12">
        <div class="card ">
            <div class="card-header justify-content-center">
                <h2 class="text-center" style="color: rgb(62, 99, 223)"><b>contacts
                        Create</b></h2>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center form-control">
                    <form action="{{route('contacts.store')}}" method="POST">
                        @csrf
                        <div class="form-control">
                            <label for="">Name<span style="color: rgb(163, 9, 9)">*</span>:</label>
                            <input name="name" type="text" required>
                        </div>
                        <div class="form-control">
                            <label for="">Email<span style="color: rgb(163, 9, 9)">*</span>:</label>
                            <input name="email" type="text" required>
                        </div>
                        <div class="form-control">
                            <label for="">Phone:</label>
                            <input name="phone" type="text" >
                        </div>
                        <div class="form-control">
                            <label for="">Address:</label>
                            {{-- <textarea name="w3review" rows="2" cols="25"> --}}
                            <input name="address" type="text">
                        </div>
                        <button type="submit" class="btn btn-info">Create</button>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
