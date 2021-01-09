@php
$title = '商品編集';
@endphp
@extends('layouts.admin')

@section('contents')
<section>
  <form action="{{ route('admin.item.update', ['id' => $id]) }}" method="post">
    @csrf
    <button class="btn btn-primary">{{ __('Update') }}</button>
    <a href="{{ route('admin.item.index') }}" class="btn btn-outline-primary">{{ __('Back') }}</a>
  </form>
  <form action="{{ route('admin.item.destroy', ['id' => $id]) }}" method="post">
    @csrf
    <button class="btn btn-danger">{{ __('Delete') }}</button>
  </form>
</section>
@endsection