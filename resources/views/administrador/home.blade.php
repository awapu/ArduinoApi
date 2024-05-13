@extends('layouts.app')
<style>
    .table th,
    .table td {
        padding: 0.25rem; /* Reduce el padding de las celdas */
    }
    
    .table td {
        white-space: nowrap; /* Evita que el texto se divida en múltiples líneas */
        overflow: hidden; /* Oculta el texto que desborda el ancho de la celda */
        text-overflow: ellipsis; /* Muestra puntos suspensivos (...) cuando el texto se corta */
    }
</style>
@section('content')


    <section class="section" >
        <div class="section-header success">
            <h3 class="page__heading ">Datos de ingreso al evento</h3>
        </div>
        <div class="section-body" >
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body"> 
                        
                            <div class="row">
                                <!-- Gráfico de Estadísticas con Gráfico de Torta -->
                                <div class="col-md-6">
                                    <div class="card p-4 mb-6">
                                        <div style="width: 100%; margin: auto;">
                                            <canvas id="pieChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="card bg-c-green order-card p-8 mb-2">
                                        <div class="card-block">
                                            <h5 class="mb-6">Boletas Validas</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style="color:#fff; max-width: 150px;">Codigo Boleta</th>
                                                            <th style="color:#fff; max-width: 150px;">Evento</th>
                                                            <th style="color:#fff; max-width: 150px;">Localidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Validados as $Validado)
                                                        <tr>
                                                            <td>{{$Validado->nBoleta}}</td>
                                                            <td>{{$Validado->Evento}}</td>
                                                            <td>{{$Validado->Localidad}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            
                                <!-- Tabla de Boletas Falsas -->
                                <div class="col-md-6">
                                    <div class="card p-8" style="background-color: #ff6347;">
                                        <div class="card-block">
                                            <h5 style="color:#fff" class="mb-6">Boletas Falsas</h5>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="color:#fff">Codigo Boleta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Falsos as $Falso)
                                                    <tr>
                                                        <td>{{$Falso->nBoleta}}</td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var totalEntradas = {{ $totalEntradas }};
        var entradasLeidas = {{ $entradasLeidas }};
        var porcentajeLeidas = {{ $porcentajeLeidas }};
        var porcentajeNoLeidas = {{ $porcentajeNoLeidas }};

        var data = {
            labels: ['Leídas (' + entradasLeidas + ')', 'No Leídas (' + (totalEntradas - entradasLeidas) + ')'],
            datasets: [{
                data: [porcentajeLeidas, porcentajeNoLeidas],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)', // Azul para boletas leídas
                    'rgba(255, 99, 132, 0.7)' // Rojo para boletas no leídas
                ]
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontColor: 'black'
                }
            }
        };

        var ctx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>

    <script>
        setTimeout('ReloadPage()', 1000);

        function ReloadPage() {
            $(".section1").load(location.href + " .element > *");
        }
    </script>

    




    
@endsection

