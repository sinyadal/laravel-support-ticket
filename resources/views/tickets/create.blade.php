@extends('layouts.app') @section('title', 'Open Ticket') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h3 class="mb-0">Open New Tickets</h3>
                </div>
                <div class="card-body">
                    @include('includes.flash')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/new_ticket') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"> @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" type="category" class="form-control" name="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <select id="priority" type="" class="form-control" name="priority">
                                <option value="">Select Priority</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            @if ($errors->has('priority'))
                            <span class="help-block">
                                <strong>{{ $errors->first('priority') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea rows="3" id="message" class="form-control" name="message"></textarea>
                            @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-ticket"></i> Open Ticket
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection