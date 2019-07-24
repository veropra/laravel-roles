@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class= "pull-left">Tutti i prodotti</h1>
    <a class="pull-right btn btn-primary" href="{{ route('products.create' )}}">Inserisci nuovo prodotto</a>
    <table class="table">
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
      </thead>
      <tbody>
        @forelse ($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
              <a href="{{ route('products.show', $product->id) }}">View</a>
              <a href="{{ route('products.edit', $product->id) }}">Edit</a>
              <form action="{{ route('products.destroy')}}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-danger" value="Delete">
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5">Non ci sono prodotti!</td>
          </tr>
        @endforelse
      </tbody>
    </table>

  </div>

@endsection
