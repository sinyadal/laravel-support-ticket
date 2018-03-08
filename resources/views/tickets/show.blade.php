@extends('layouts.app') @section('title', $ticket->title) @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h3 class="mb-0">#{{ $ticket->ticket_id }} - {{ $ticket->title }}</h3>
                </div>
                <div class="card-body">

                    @include('includes.flash')

                    <div class="ticket-info">
                        <p>Message: {{ $ticket->message }}</p>
                        <p>Category: {{ $category->name }}</p>
                        <p>
                            @if ($ticket->status === 'Open') Status:
                            <span class="badge badge-success">{{ $ticket->status }}</span>
                            @else Status:
                            <span class="badge badge-danger">{{ $ticket->status }}</span>
                            @endif
                        </p>
                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>

                    <hr>

                    <div class="comments">
                        @foreach ($comments as $comment)
                        <div class="panel panel-@if($ticket->user->id === $comment->user_id) {{" default "}}@else{{"success "}}@endif">
                            <div class="panel panel-heading">
                                {{ $comment->user->name }}
                                <span class="pull-right">{{ $comment->created_at->format('d-m-Y') }}</span>
                            </div>

                            <div class="panel panel-body">
                                {{ $comment->comment }}
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>

                    <div class="comment-form">
                        <form action="{{ url('comment') }}" method="POST" class="form">
                            {!! csrf_field() !!}

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="3" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection