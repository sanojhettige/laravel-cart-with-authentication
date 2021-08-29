@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Item Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cart as $index=>$item)
              <tr>
                  <td>{{ $index }}</td>
                <td>{{$item['name']}}</td>
                <td>${{$item['price']}}</td>
                <td style="display: flex;">{{$item['qty']}}</td>
                <th>${{$item['qty'] * $item['price']}}</th>
              </tr>
              @endforeach
              <tfoot>
                  <td colspan="2"></td>
                  <td></td>
                  <td></td>
            </tbody>
          </table>
          
    </div>

    <form method="post" action="{{ route('cart.order') }}">
      @csrf
    <div class="col-md-12">
        <button type="submit" class="btn btn-dark" >Confirm & Order </button>
    </div>
    </form>
</div>
@endsection