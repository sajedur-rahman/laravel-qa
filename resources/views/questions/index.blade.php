@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Question') }}</div>

                <div class="card-body">
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{$question->url }}">{{$question->title}}</a></h3>
                                <p class="lead">
                                    Asked By
                                    <a href="{{$question->user->url }}">{{$question->user->name }} </a>
                                    <small class="text-muted">{{$question->created_date}}</small>

                                </p>
                                {{Str::limit($question->body,250)}}
                                <hr>
                            </div>
                            
                        </div>
                    @endforeach
                   
                        {{-- {{$questions->links('pagination::bootstrap-4') }}  --}}

                        {{$questions->links() }} 
                   
                                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
