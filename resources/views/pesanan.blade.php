<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center">
        <div class="block">
        <form method="POST" action="/pesanan/{{ $pesanan->id_postingan }}">
        @csrf
        <input name="id_postingan" id="id_postingan" type="hidden" value="{{ $pesanan->id_postingan }}"/>
    <label class="input input-bordered flex items-center gap-2 mt-56">
        Name
        <input name="name" id="name" type="text" class="grow" placeholder="John Doe" />
      </label>
      <label class="input input-bordered flex items-center gap-2">
        Email
        <input name="email" id="email" type="text" class="grow" placeholder="Johndoe123@gmail.com" />
      </label>
      <label class="input input-bordered flex items-center gap-2">
        No. Whatsapp
        <input name="phone" id="phone" type="text" class="grow" placeholder="08" />
      </label>
      <div class="flex justify-center">
      <button class="btn btn-success">Send</button>
      </div>

        </form>
        </div>
    </div>
</body>
</html>
