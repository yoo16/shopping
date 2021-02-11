@extends('layouts.app')

@section('content')
<div class="container">
  @include ('cart.components.confirm_item_list')
  
  @include ('cart.components.confirm_control')
</div>
@endsection