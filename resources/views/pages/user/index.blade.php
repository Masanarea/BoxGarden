@extends('layouts.app')

@section('content')
<div class="p-user-index">
    {{-- <?php dd($user); ?> --}}
    @if(is_null($user))
    <p class="text-center">お前の（周りの）ユーザー居ねえから！</p>
    @endif

    @if(!is_null($user))
    <div class="tphoto">
    <img src="{{ $user->img_url}} " title="tphoto" alt="Tinder Photo" />
    <div class="tname">{{ $user->name}}</div>
  </div>

  <div class="tcontrols">
    <div class="container">
      <div class="row">
          <div class="col-md-6 mb-1">
              <form action=" {{ route('swipes.store') }}" method="POST">
                @csrf

                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                <input type="hidden" name="is_like" value="0">
                <button class="tno" type="submit">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </button>
              </form>
          </div>
          <div class="col-md-6 mb-1">
              <form action=" {{ route('swipes.store') }}" method="POST">
                @csrf

                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                <input type="hidden" name="is_like" value="1">
                <button class="tyes" type="submit">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                </button>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>@endif

@endsection
