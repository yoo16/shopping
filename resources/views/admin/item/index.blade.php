@php
$title = '商品一覧';
@endphp
@extends('layouts.admin')

@section('contents')
<section>
  <p>
    <a href="{{ route('admin.item.create') }}" class="btn btn-outline-primary">新規追加</a>
  </p>
  <p>
    商品一覧ページです。
  </p>
</section>
@endsection