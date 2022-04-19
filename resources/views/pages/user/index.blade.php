@extends('layouts.app')

@section('content')
<div class="p-user-index">
    {{-- <?php dd($user); ?> --}}
    {{-- <?php dd(Auth::check()); ?> --}}
    @if(is_null($user))
            <p class="text-center">お前の（周りの）ユーザー居ねえから！</p>
            {{-- <ul class="navbar-nav mr-auto"> --}}
                                    {{-- @auth --}}
                                        {{-- <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li> --}}
                                    {{-- @endauth --}}
                                {{-- </ul> --}}
    @endif

    @if(!is_null($user))
    <div class="tphoto">
    <img src="{{ $user->img_url}} " title="tphoto" alt="Tinder Photo" />
    <div class="tname">{{ $user->name }}</div>
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

@endif
</div>

@endsection
