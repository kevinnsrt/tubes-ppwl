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
<x-app-layout>


<div class="bg-[url('/background.jpg')]">

    @if(session()->has('success'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif


    <div class="flex justify-center mt-8">
        <div class="join">
          <div>
            <div>
              <form action="/search">
              <input type="text" name="search" placeholder="Search" class="input input-bordered border-yellow-600 w-full max-w-xs" />
            </div>
          </div>

          <div class="indicator">

            <button class="btn btn-outline border-yellow-600 text-yellow-600 ml-3">Search</button>
          </form>
          </div>
          <div>

          </div>
        </div>
    </div>


        <div class="grid grid-cols-3 mt-8 ml-20">
            @forelse ($postingan as $item)
              <div class="card card-compact w-96 bg-indigo-950 shadow-xl mb-20">
                <figure><img src="{{ asset('storage/' . $item->gambar)}}" alt="Shoes" /></figure>
                <div class="card-body">
                  <h2 class="card-title">{{ $item->judul }}</h2>
                  <p>{{ $item->harga }}</p>
                  <p>{{ $item->deskripsi }}</p>
                  <div class="card-actions justify-end">
                    <a href="{{ route('posts.detail', $item->id_postingan) }}">
                      <button class="btn btn-info">View</button>
                    </a>
                    <a href="{{ route('posts.edit', $item->id_postingan) }}">
                      <button class="btn btn-warning">Edit</button>
                    </a>
                    <form action="{{ route('posts.destroy', $item->id_postingan) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-error">Sold</button>
                    </form>
                  </div>
                </div>
              </div>
            @empty
            <div class="flex justify-center">
              <p class="text-center">Tidak ada postingan ditemukan.</p>
            @endforelse
          </div>

</div>
</x-app-layout>
</body>
</html>
