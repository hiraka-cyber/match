@extends('layouts.app')

@section('content')
<div class="container">
  <div class="roe justify-content-center">
    <div id="accordion" class="col-md-8">
      @if(isset($edit))
      <div class="alert alert-primary" role="alert">
        投稿済み
      </div>
      @endif
      <div class="card my-4">
        <div id="headingReg" class="card-header">動画編集者
          <!--<h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#reg" aria-expended="false" aria-controls"=reg>自分も投稿</button>
        </h5> -->
        </div>
        <div id="reg" class="card-body" aria-labelledby="headingReg" data-parent="#accordion">
          @auth
          <form action="{{ route('etube')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label>使える編集ソフト</label>
              <input type="text" class="form-control" name="soft" placeholder="Premier Pro,Vyond..." value="{{ isset($edit) ? $edit->soft : ''}}"></input>
            </div>
            <div class="form-group">
              <label>編集スキル</label>
              <input type="text" class="form-control" name="skill" placeholder="telop,bgm,effect..." value="{{ isset($edit) ? $edit->skill : ''}}"></input>
            </div>
            <div class="form-group">
              <label>希望単価</label>
              <select class="form-control" name="price" value="{{ isset($edit) ? $edit->price : ''}}">
                <option value="{{isset($edit) ? $edit->price : ''}}" selected>{{isset($edit) ? $edit->price : '希望単価'}}</option>
                <option value="1件1000円(税込)">1件1000円(税込)</option>
                <option value="1件3000円(税込)">1件3000円(税込)</option>
                <option value="1件5000円(税込)">1件5000円(税込)</option>
                <option value="1件10000円(税込)">1件10000円(税込)</option>
              </select>
            </div>
            <div class="form-group">
              <label>現在の状況</label>
              <select class="form-control" name="situation" value="{{ isset($edit) ? $edit->situation : ''}}">
                <option value="{{isset($edit) ? $edit->situation : ''}}" selected>{{isset($edit) ? $edit->situation : '仕事状況'}}</option>
                <option value="仕事できます！">仕事できます！</option>
                <option value="今忙しいです！">今忙しいです！</option>
              </select>
              </div>
            <div class="form-group">
              <label>自己紹介</label>
              <textarea class="form-control" name="description">{{isset($edit) ? $edit->description : ''}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{$edit ? 'update' : 'Single'}}</button>
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
