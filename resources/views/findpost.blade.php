@extends('layouts.app')

@section('content')
<div class="container">
  <div class="roe justify-content-center">
    <div id="accordion" class="col-md-8">
      @if(isset($post))
      <div class="alert alert-primary" role="alert">
        投稿済み
      </div>
      @endif
      <div class="card my-4">
        <div id="headingReg" class="card-header">動画投稿者
          <!--<h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#reg" aria-expended="false" aria-controls"=reg>自分も投稿</button>
        </h5> -->
        </div>
        <div id="reg" class="card-body" aria-labelledby="headingReg" data-parent="#accordion">
          @auth
          <form action="{{ route('tuber')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label>希望する編集ソフト</label>
              <input type="text" class="form-control" name="soft" placeholder="Premier Pro,Vyond..." value="{{ isset($post) ? $post->soft : ''}}"></input>
            </div>
            <div class="form-group">
              <label>希望する編集スキル</label>
              <input type="text" class="form-control" name="skill" placeholder="telop,bgm,effect..." value="{{ isset($post) ? $post->skill : ''}}"></input>
            </div>
            <div class="form-group">
              <label>希望単価</label>
              <select class="form-control" name="price" value="{{ isset($post) ? $post->price : ''}}">
                <option value="{{isset($post) ? $post->price : ''}}" selected>{{isset($post) ? $post->price : '希望単価'}}</option>
                <option value="1件1000円(税込)">1件1000円(税込)</option>
                <option value="1件3000円(税込)">1件3000円(税込)</option>
                <option value="1件5000円(税込)">1件5000円(税込)</option>
                <option value="1件10000円(税込)">1件10000円(税込)</option>
              </select>
            </div>
            <div class="form-group">
              <label>希望する納品ペース</label>
              <select class="form-control" name="situation" value="{{ isset($post) ? $post->situation : ''}}">
                <option value="{{isset($post) ? $post->situation : ''}}" selected>{{isset($post) ? $post->situation : '希望する納品ペース'}}</option>
                <option value="1本以上/月">1本以上/月</option>
                <option value="1本以上/月">1本以上/週</option>
                <option value="1本以上/月">1本以上/日</option>
              </select>
              </div>
            <div class="form-group">
              <label>自己紹介</label>
              <textarea class="form-control" name="description">{{isset($post) ? $post->description : ''}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{$post ? 'update' : 'Single'}}</button>
          </form>
          @else
          <div>
            投稿するにはログインが必要です。
            <a href="{{route('login')}}" class="btn btn-primary">login</a>
            @endauth
          </div>
        </div>
        @endsection
      </div>
    </div>
  </div>
</div>
