<x-app-layout>

    @if(session()->has('success'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="stats shadow flex justify-center mt-12 bg-blue-950">

        <div class="stat place-items-center">
          <div class="stat-title">Jumlah akun</div>
          <div class="stat-value">{{ $totalAkun }}</div>

        </div>

        <div class="stat place-items-center">
          <div class="stat-title">Pesanan</div>
          <div class="stat-value">{{ $totalPesanan }}</div>
        </div>

        <div class="stat place-items-center">
          <div class="stat-title">Total Harga Akun</div>
          <div class="stat-value text-yellow-600 ">@money($totalHarga )</div>

        </div>

      </div>

</x-app-layout>
