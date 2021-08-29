@extends('layout')

@section('content')
    
<div class="row justify-content-center">
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Order Date</th>
                <th scope="col">Item Count</th>
                <th scope="col">Order Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $index=>$item)
              <tr>
                  <td>{{ $item->id }}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item['itemCount']}}</td>
                <td>{{$item['order_total']}}</td>
              </tr>
              @endforeach
          </table>
          
    </div>
</div>

@endsection