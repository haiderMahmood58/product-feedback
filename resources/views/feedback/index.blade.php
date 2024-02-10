@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <a href="{{ route('feedback.new') }}" class="btn btn-success btn-lg mb-3">Add Feedback</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Listing') }}</div>

                @if ($feedback->isEmpty())
                    <div class="alert alert-info">
                        No feedback items found.
                    </div>
                @else
                    <div class="card-body">
                        @foreach ($feedback as $item)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $item->title }}</h4>
                                    <p class="card-text"><strong>Category:</strong> {{ ucfirst($item->category) }}</p>
                                    <p class="card-text"><strong>User:</strong> {{ $item->user->name }}</p>
                                </div>
                                <!-- Form for adding comment -->
                                <div class="card-footer">
                                    <form action="{{ route('comment.create') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="feedback_id" value="{{ $item->id }}">
                                        <div class="input-group">
                                            <input type="text" name="content" class="form-control" placeholder="Add a comment...">
                                            <button type="submit" class="btn btn-primary">Comment</button>
                                        </div>
                                    </form>
                                    <!-- Button to trigger modal -->
                                    <button type="button" class="btn btn-primary view-comments-btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                        View All Comments 
                                    </button>
                                </div>
                            </div>
                        @endforeach
                        {{ $feedback->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal for displaying comments -->
@foreach ($feedback as $item)
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comments for {{ $item->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($item->comments->isEmpty())
                    <div class="alert alert-info">
                        No comment found.
                    </div>
                @else
                    @foreach($item->comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ asset('images/user-icon.png') }}" alt="User Icon" class="rounded-circle me-2 user-image" >
                                    <h5 class="card-title user-name">{{ $comment->user->name }}</h5>
                                </div>
                                <p class="card-text">{{ $comment->content }}</p>
                                <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
