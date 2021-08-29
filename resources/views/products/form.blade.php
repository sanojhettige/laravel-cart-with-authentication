@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="post" action="{{ route('product.submit', ['id' => $product->id ?? '']) }}">
            @csrf
            <div class="form-block mb-2">
                <input type="text" placeholder="Name" value="{{$product->name ?? ''}}" name="name" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name')}} </span>
                @endif
            </div>

            <div class="form-block mb-2">
                <input type="text" placeholder="Price" value="{{$product->price ?? ''}}" name="price" class="form-control">
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price')}} </span>
                @endif
            </div>

            <div class="form-block mb-2">
                <textarea class="form-control" name="description" placeholder="Description">{{$product->description ?? ''}}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description')}} </span>
                @endif
            </div>

            <div>
                <button type="submit" class="btn btn-blocl btn-dark">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection