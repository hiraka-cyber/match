@extends('layouts.app')

@section('content')
    <div class="chat-container row justify-content-center">
        <div class="chat-area">
            <div class="card">
                <div class="card-header">Chat</div>
                <div class="card-body chat-card">
                  <div id="comment-data"></div>
                </div>
              </div>
            </div>
          </div>
            <form action="{{route('add')}}" method="post">
              @csrf
              <div class="comment-container row justify-content-center">
                <div class="input-group comment-area">
                  <textarea name="comment" id="comment" class="form-control" plechefolder="push message(shift + Enter)" aria-label="With textarea" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false;}"></textarea>
                  <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">Submit</button>
                </div>
              </div>
            </form>
@endsection
@section('js')
<script src="{{ asset('js/comment.js' )}}"></script>
@endsection
