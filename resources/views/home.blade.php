@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    @foreach ($items as $item)
    <div class="col-md-4">
      <div class="card">
        <div class="card-header bg-white">
          <img src="{{ asset('images/now_printing.jpg') }}" alt="" width="100%">
        </div>

        <div class="card-body">
          <div class="detail">
            <a href="">{{ $item['name'] }}</a>
            <p>
              ¥{{ number_format($item['price']) }}
            </p>
            <p class="row justify-content-center">
              <a href="" class="btn btn-outline-info">カートに入れる</a>
            </p>
          </div>
        </div>

      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection