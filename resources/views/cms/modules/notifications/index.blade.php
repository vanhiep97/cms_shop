@extends('cms.layouts.app')
@section('content')
    <div class="notification">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Send push to Users</div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Oke ban oi</td>
                        <td>
                            <form action="{{ route('send-push') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" />

                                <input class="btn btn-primary" type="submit" value="Send Push">
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

