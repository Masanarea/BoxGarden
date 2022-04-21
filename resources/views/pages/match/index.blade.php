@extends('layouts.app')

@section('content')
    <div class="p-match-index">
        <div class="container">
            <div class="row">
            {{-- <?php dd($response) ?> --}}
            {{-- <?php dd($request) ?> --}}
            {{-- <?php dd($likedUserIds) ?> --}}
            {{-- <?php dd($matchedUsers) ?> --}}
                @foreach($matchedUsers as $matchedUser)
                {{-- <?php dd($matchedUser->toUser) ?> --}}
                {{-- <?php dd($matchedUser->toUser->img_url) ?> --}}
                <div class="col-md-12 mb-3">
                    <img src=" {{ $matchedUsers->toUser->img_url }} " class="rounded-circle" style="height:70px; width: 70px; object-fit: cover;">
                    <a href="#" class="stretched_link ml-3" style="font-size: 16px">
                        {{ $matchedUsers->toUser->name }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
