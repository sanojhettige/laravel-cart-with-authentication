@extends('layout')

@section('content')
    <main class="home">
        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-3 mb-2" style="margin: 5px;">
                <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$item->name}}</h5>
                      <p class="card-text">$ {{$item->price}}</p>
                      <a href="{{ route('cart.add', ['id' => $item->id]) }}" class="btn btn-primary">Add to Card</a>
                    </div>
                  </div>
            </div>
            @endforeach
            
        </div>
    </main>
@endsection