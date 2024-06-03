<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-app-layout>


    @if(session()->has('success'))
    <div role="alert" class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <div class="mt-40">
        <div class="flex justify-center">
            <form action="{{ route('posts.update', $postingan->id_postingan) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <label class="input input-bordered flex items-center gap-2">
                    Judul
                    <input type="text" class="grow" name="judul" id="judul" />
                  </label>

                <label class="input input-bordered flex items-center mt-4 gap-2">
                    Harga
                    <input type="text" class="grow" name="harga" id="harga" value="{{ $postingan->harga }}" />
                </label>
                <textarea class="textarea textarea-bordered w-full mt-4 " placeholder="Deskripsi" name="deskripsi" id="deskripsi">{{ $postingan->deskripsi }}</textarea>
                <input type="file" name="gambar" id="gambar" class="file-input file-input-bordered w-full mt-4 " />



                <div class="flex justify-center mt-4">
                    <button class="btn btn-info">Edit</button>
                </div>
            </form>
        </div>
    </div>
    </x-app-layout>
</body>
</html>
