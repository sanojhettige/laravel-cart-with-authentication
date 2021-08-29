@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <a class="nav-link"href="/">Add Items </a>
    </div>
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Item Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cart as $index=>$item)
              <tr>
                  <td>{{ $index }}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['price']}}</td>
                <td style="display: flex;">
                    <a class="nav-link" href="{{ route('cart.add', ['id' => $item['id'], 'remove' => true]) }}">-</a>
                    {{$item['qty']}}
                    <a class="nav-link" href="{{ route('cart.add', ['id' => $item['id']]) }}">+</a>
                </td>
                <td>
                  <a class="nav-link" href="{{ route('cart.remove', ['id' => $item['id']]) }}">Remove</a>
                </td>
              </tr>
              @endforeach
              <tfoot>
                  <td colspan="2"></td>
                  <td></td>
                  <td></td>
            </tbody>
          </table>
          
    </div>

    <div class="col-md-12">
        <a href="{{ route('cart.checkout') }}" class="btn btn-dark" >Place Order </a>
    </div>
</div>
@endsection