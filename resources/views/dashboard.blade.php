<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('apexcharts-bundle/dist/apexcharts.js') }}"></script>
    <link rel="stylesheet"  href="{{asset('apexcharts-bundle/dist/apexcharts.css')}}"/>
</head>
<body>
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

            <div class="card-body">
              <div id="chart"></div>
            </div>


            <script>
                var options = {
                    series: [{
                        name: 'Total Models',
                        data: {!! json_encode(array_column($chartDataPesanan, 'y'))!!},
                        stroke:{
                            colors:['	#FF4560']
                        }
                    }],
                    chart: {
                        type: 'area',
                        stacked: false,
                        height: 350,
                        zoom: {
                            type: 'x',
                            enabled: true,
                            autoScaleYaxis: true
                        },

                        toolbar: {
                            autoSelected: 'zoom'
                        }
                    },
                    dataLabels: {
                        colors:['#FF4560'],
                        enabled: false
                    },
                    markers: {
                        colors:['#FF4560'],
                        size: 0,
                    },
                    title: {
                        text: 'Pesanan 666 Consignment',
                        align: 'left',
                    },
                    fill: {
                        type: 'gradient',
                        colors: ['#FF4560'],
                        gradient: {
                            shadeIntensity: 1,
                            inverseColors: false,
                            opacityFrom: 0.5,
                            opacityTo: 0,
                            stops: [0, 90, 100]
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function (val) {
                                return val;
                            },
                        },
                        title: {
                            text: 'Total Pesanan'
                        },
                    },

                    xaxis: {
                        type: 'datetime',
                        categories: {!! json_encode(array_column($chartDataPesanan, 'x'))!!}
                    },
                    tooltip: {
                        shared: false,
                        y: {
                            formatter: function (val) {
                                return val;
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            </script>




    </x-app-layout>
</body>
</html>

