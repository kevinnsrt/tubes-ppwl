<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New</title>
    @vite('resources/css/app.css')
</head>
<body>
    {{-- @include('layout.navbar') --}}

    <div  class="flex ml-4 mb-4">
      <a href="/home"><button class="btn btn-warning mt-4">Back</button>
      </a>
      </div>

    @if(session()->has('success'))

    <div role="alert" class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>
            {{ session('success') }}
        </span>
      </div>

    @endif


    <div class="mt-32">

        <div class="flex justify-center">
            <form action="/create" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="input input-bordered flex items-center gap-2">
                Judul
                <input type="text" class="grow" name="judul" id="judul" />
              </label>

              <label class="input input-bordered flex items-center gap-2">
                Harga
                <input type="text" class="grow" name="harga" id="harga" />
              </label>

              <input type="file" name="gambar" id="gambar" class="file-input file-input-bordered w-full max-w-xs" />

              <textarea class="textarea textarea-bordered" placeholder="Deskripsi" name="deskripsi" id="deskripsi"></textarea>

              <div class="flex justify-center mt-4">
                <button class="btn btn-info">Create</button>
              </div>

        </div>

        </div>
    </div>

</body>
</html>
