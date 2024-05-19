<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body>
{{-- @include('layout.navbar') --}}

    @if(session()->has('success'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-end mr-4 mb-4">
      <form method="post" action="/logout">
        @csrf
        <button class="btn btn-warning mt-4">Logout</button>
      </form>
    </div>

    <div class="flex justify-center">
        <div class="join">
          <div>
            <div>
              <form action="/search">
              <input type="text" name="search" placeholder="Search" class="input input-bordered input-info w-full max-w-xs" />
            </div>
          </div>

          <div class="indicator">

            <button class="btn btn-outline btn-primary ml-3">Search</button>
          </form>
          </div>
          <div>
            <div class="ml-4">
              <a href="/add">
                <button class="btn btn-outline btn-accent">+</button>
              </a>
            </div>
          </div>
        </div>
    </div>

    <div class="flex justify-start mt-12">
      @forelse ($postingan as $item)
        <div class="card card-compact w-96 bg-base-100 shadow-xl mr-3">
          <figure><img src="{{ asset('storage/' . $item->gambar)}}" alt="Shoes" /></figure>
          <div class="card-body">
            <h2 class="card-title">TKO{{ $item->id }}</h2>
            <p>{{ $item->harga }}</p>
            <p>{{ $item->deskripsi }}</p>
            <div class="card-actions justify-end">
              <a href="{{ route('posts.detail', $item->id) }}">
                <button class="btn btn-info">View</button>
              </a>
              <a href="{{ route('posts.edit', $item->id) }}">
                <button class="btn btn-warning">Edit</button>
              </a>
              <form action="{{ route('posts.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-error">Sold</button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center">Tidak ada postingan ditemukan.</p>
      @endforelse
    </div>
</body>
</html>
