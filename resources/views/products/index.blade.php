@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <a class="nav-link"href="{{ route('product.create') }}">Add New </a>
    </div>
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $item)
              <tr>
                <th scope="row">{{$item['id']}}</th>
                <td>{{$item['name']}}</td>
                <td>{{$item['price']}}</td>
                <td style="display: flex;">
                  <a class="nav-link" href="{{route('product.edit', ['id' => $item->id])}}">Edit</a>
                  <a class="nav-link" href="{{ route('product.delete', ['id' => $item->id]) }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection