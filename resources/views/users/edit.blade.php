@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-8 offset-md-2">
    <div class="card">
      <div class="card-header">
        <h4>
          <i class="glphicon glyphicon-edit"></i> 编辑个人资料
        </h4>
      </div>

      <div class="card-body">
        <form action="{{ route('users.update', $user) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          @include('shared._error')

          <div class="form-group">
            <label for="name">用户名</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
          </div>

          <div class="form-group">
            <label for="email">邮 箱</label>
            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', $user->email) }}">
          </div>

          <div class="form-group">
            <label for="introduction">个人简介</label>
            <textarea name="introduction" id="introduction" class="form-control" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
          </div>

          <div class="form-group mb-4">
            <label for="avatar" class="avatar">用户头像</label>
            <input type="file" name="avatar" class="form-control-file">
            @if($user->avatar)
              <br>
              <img class="thumbnail img-responsive" src="{{ $user->avatar }}">
            @endif
          </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@stop
