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
    <x-app-layout>
    <div class="overflow-x-auto mt-12">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th>id_pesanan</th>
              <th>id_postingan</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            <tr>
           @foreach ($pesanan as $data )
              <th>{{ $data->id_pesanan }}</th>
              <td>{{ $data->id_postingan }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->phone }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </x-app-layout>
</body>
</html>
