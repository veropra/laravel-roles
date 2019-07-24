@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class= "pull-left">Tutti i prodotti</h1>
    @if (Auth::user()->can('edit_product'))
      <a class="pull-right btn btn-primary" href="{{ route('products.create') }}">Inserisci nuovo prodotto</a>
    @endif
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
              <a href="{{ route('products.show', $product->id) }}" class="btn btn-dark">View</a>
                @if (Auth::user()->can('edit_product'))
                  <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                  </form>
                @endif
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
