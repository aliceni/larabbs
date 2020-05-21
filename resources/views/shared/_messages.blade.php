@foreach(['danger', 'warning', 'success', 'info'] as $msg)
  @if(session()->has($msg))
    <div>
      <p class="alert alert-{{ $msg }}">
        {{ session()->get($msg) }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </p>
    </div>
  @endif
@endforeach
