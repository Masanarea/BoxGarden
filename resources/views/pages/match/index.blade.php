@extends('layouts.app')

@section('content')
    <div class="p-match-index">
        <div class="container">
            <div class="low">
                @foreach($matchedUsers as $matchedUser)
                <div class="col-md-12 mb-3"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
