@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

<div class="row">
  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card">
      <img class="card-img-top" src="{{ $user->avatar }}?imageView2/1/w/600/h/600" alt="{{ $user->name }}">
      <div  class="card-body">
        <h5><strong>个人简介</strong></h5>
        <p>{{ $user->introduction }}</p>
        <hr>
        <h5><strong>注册于</strong></h5>
        <p>{{ $user->created_at->diffForHumans() }}</p>
      </div>
    </div>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="card">
      <div class="card-body">
        <h1 class="mb-0" style="front-size:22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
      </div>
    </div>
    <hr>

    {{-- 用户发布的内容 --}}
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link bg-transparent {{ active_class(if_query('list', 'topic')) }}" href="{{ Request::url() }}?list=topic">Ta 的话题</a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{ active_class(if_query('list', 'reply')) }}" href="{{ Request::url() }}?list=reply">Ta 的回复</a>
          </li>
        </ul>
        @if (Request()->list === 'topic')
        @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])
        @elseif (Request()->list === 'reply')
        @include('users._topics', ['topics' => $user->topics()->recentReplied()->paginate(5)])
        @endif
      </div>
    </div>
  </div>
</div>

@stop
