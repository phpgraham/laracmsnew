<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="heading{{ $x }}">
    <h4 class="panel-title">
      <a role="button" data-toggle="collapse" data-parent="#accordion{{ $x }}" href="#collapse{{ $child->id }}" aria-expanded="true" aria-controls="collapse{{ $child->id }}">
        {{ $child->title }}
        <span class="badge pull-right">{{ count($child->children) }}</span>
      </a>
    </h4>
  </div>
  <div id="collapse{{ $child->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $child->id }}">
    <div class="panel-body">
      <ul class="list-group">
        @foreach($child->children as $child)
            @include('Backend.menus.partials.submenu', [$child, $x+100])
        @endforeach
      </ul>
    </div>
  </div>
</div>
