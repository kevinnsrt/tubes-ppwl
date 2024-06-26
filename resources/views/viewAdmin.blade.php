<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    @vite('resources/css/app.css')
</head>
<body>
  <div class="flex justify-center">
  <div class="card w-fit bg-base-100 shadow-xl">
    <figure><img src="{{ asset('storage/' . $postingan->gambar)}}" alt="Shoes" /></figure>
    <div class="card-body">
      <h2 class="card-title">{{ $postingan->judul }}</h2>
      <p>{{ $postingan->harga }}</p>
      <p>{{ $postingan->deskripsi }}</p>
      <div class="card-actions justify-end">

        <a href="/home">
          <button class="btn btn-primary">Back</button>
          </a>


      </div>
    </div>
  </div>
</div>

</body>
</html>
