@extends('layouts.app') @section('title', 'Dashboard') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card mt-4 mb-4">
                <div class="card-header"><h3 class="mb-0">Dashboard</h3></div>
                <div class="card-body">

                    <p>You are logged in!</p>

                    @if(!Auth::user()->is_admin)
                    <p>
                        See all
                        <a href="{{ url('admin/tickets') }}">tickets</a>
                    </p>
                    @else
                    <p>
                        See all your
                        <a href="{{ url('my_tickets') }}">tickets</a> or
                        <a href="{{ url('new_ticket') }}">open new ticket</a>
                    </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endsection