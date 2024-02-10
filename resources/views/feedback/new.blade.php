@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Feedback') }}</div>
                <div class="card-body">
                    <!-- Feedback Submission Form -->
                    <div class="mt-4">
                        <form action="{{ route('feedback.create') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                            <div  class="mb-3">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control  @error('title') is-invalid @enderror">
                                
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            
                            <div  class="mb-3">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror"></textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="category">Category:</label>
                                <select name="category" id="category" value="{{ old('category') }}" class="form-select @error('category') is-invalid @enderror" >
                                    <option value="">Select category</option>
                                    @foreach(App\Models\Feedback::$categories as $category)
                                        <option value="{{ $category }}">{{ ucfirst($category) }}</option>
                                    @endforeach
                                </select>

                                <span class="text-danger">
                                    @error('category')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Feedback Submission Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

