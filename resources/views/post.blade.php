@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div id="accordion" class="col-md-8">

    </div>
    <div class="card-columns">
      @foreach($postList as $post)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Name:{{$post->username}}</h5>
          <h6 class="card-submit mb-2 text-muted">Soft:{{$post->soft}}</h6>
          <h6 class="card-submit mb-2 text-muted">Skill:{{$post->skill}}</h6>
          <h6 class="card-submit mb-2 text-muted">Desired unit price:{{$post->price}}</h6>
          <h6 class="card-submit mb-2 text-muted">Current situation:{{$post->situation}}</h6>
          <p class="card-text">Greeting:{{$post->description}}</p>
          <button style="border-radius:5px;" type="button" name="button"><a style="font-weight:bold;" href="/index/">Send Message</a></button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
