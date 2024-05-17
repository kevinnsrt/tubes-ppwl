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

    <div class="flex justify-end mr-4 mb-4">
      <form method="post" action="/logout" >
        @csrf
      <button class="btn btn-warning mt-4">Logout</button>
      </form>
      </div>

    <div class="flex justify-center">
        <div class="join">
          <div>
            <div>
              <input type="text" placeholder="Search" class="input input-bordered input-info w-full max-w-xs" />
            </div>
          </div>
        
          <div class="indicator">
            <button class="btn btn-outline btn-primary ml-3">Search</button>
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
          <figure><img src="https://media.karousell.com/media/photos/products/2023/8/11/riot_akun_valorant__league_of__1691744803_5530082f.jpg" alt="Shoes" /></figure>
          <div class="card-body">
            <h2 class="card-title">TKO{{ $item->id }}</h2>
            <p>{{ $item->harga }}</p>
            <p>{{ $item->deskripsi }}</p>
            <div class="card-actions justify-end">
              <button class="btn btn-info">View</button>
              <button class="btn btn-warning">Edit</button>
              <form action="/delete/{{$item->id }}" method="post">
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