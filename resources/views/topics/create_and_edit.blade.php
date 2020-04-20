@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h2>
          <i class="far fa-edit"></i>
          @if($topic->id)
            编辑
          @else
            创建
          @endif
        </h2>
      </div>

      <div class="card-body">
        @include('shared._error')

        @if($topic->id)
          <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
            <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
          	<input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required />
          </div>

          <div class="form-group">
            <select class="form-control" name="category_id" required>
              <option value="" hidden disabled selected>请选择分类</option>
              @foreach($categories as $value)
              <option value="{{ $value->id }}">{{ $value->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <textarea name="body" class="form-control" id=editer rows="6" placeholder="请输入至少3个字的内容" required>{{ old('body', $topic->body) }}</textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection
