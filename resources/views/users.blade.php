<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>666 Consignment</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="bg-[url('/background.jpg')]">
   @include('layout.navbarUsers')

  <div class="flex justify-center">
      <div class="join">
          <div>
              <form action="/searchusers">
                  <input type="text" name="search" placeholder="Search" class="input input-bordered input-info w-full max-w-xs" />
          </div>
          <button type="submit" class="btn btn-outline btn-primary ml-3">Search</button>
        </form>
      </div>
  </div>

  <div class="grid grid-cols-3 mt-8 ml-20">
    @forelse ($akun as $item)
      <div class="card card-compact w-96 bg-stone-900 shadow-xl mb-20">
        <figure><img src="{{ asset('storage/' . $item->gambar)}}" alt="Shoes" /></figure>
        <div class="card-body">
          <h2 class="card-title">{{ $item->judul }}</h2>
          <p>{{ $item->harga }}</p>
            <div class="card-actions justify-end">
              <a href="{{ route('posts.detailpostingan', $item->id) }}">
                <button class="btn btn-info">View</button>
              </a>
            </div>
        </div>
      </div>
    @empty
      <p class="text-center">Tidak ada postingan ditemukan.</p>
    @endforelse
  </div>
</div>

</body>
</html>
