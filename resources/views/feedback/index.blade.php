@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <a href="{{ route('feedback.new') }}" class="btn btn-success btn-lg mb-3">Submit Feedback</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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
                            </div>
                        @endforeach
                        {{ $feedback->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
