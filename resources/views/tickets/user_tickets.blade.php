@extends('layouts.app') @section('title', 'My Tickets') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 mb-4">
                <div class="card-header">My Tickets</div>
                <div class="card-body">

                    @if ($tickets->isEmpty())
                    <p>You have not created any tickets.</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    @foreach ($categories as $category) @if ($category->id === $ticket->category_id) {{ $category->name }} @endif @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                        #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                    </a>
                                </td>
                                <td>
                                    @if ($ticket->status === 'Open')
                                    <span class="badge badge-success text-white">{{ $ticket->status }}</span>
                                    @else
                                    <span class="badge badge-danger text-white">{{ $ticket->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $ticket->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $tickets->render() }} @endif
                </div>
            </div>
        </div>
    </div>
    @endsection