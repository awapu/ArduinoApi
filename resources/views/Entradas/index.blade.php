@extends('layouts.all')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Entradas Vendidas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a class="btn btn-warning" href="{{ route('Entradas.create')}}">Insertar Boleta</a>

                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                    <thead style="background-color: #6777ef;">
                                        <th style="color:#fff">ID</th>
                                        <th style="color:#fff">Evento</th>
                                        <th style="color:#fff">Localidad</th>
                                        <th style="color:#fff"># Boleta</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($Entradas as $Entrada)
                                            <tr>
                                                <td >{{$Entrada->id}}</td>
                                                <td>{{$Entrada->Evento}}</td>
                                                <td>{{$Entrada->Localidad}}</td>
                                                <td>{{$Entrada->nBoleta}}</td>
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
    </section>
@endsection

