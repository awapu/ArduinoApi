@extends('layouts.all')

@section('content')
    <section class="section">

        <div class="section-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">Listado de entradas leidas</h3>
                            </div>
                            <div class="col-md-6" align="center">
                                @can('crear-rol')
                                <a class="btn btn-success" href="{{ route('precios.create')}}">Cargar Precios</a>
                                @endcan</th>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-striped col-md-12">
                                    <thead style="background-color: #6777ef;">
                                        <th style="color:#fff">ID</th>
                                        <th style="color:#fff">Evento</th>
                                        <th style="color:#fff"># Boleta</th>
                                        
                                        @can('editar-rol')
                                        <th style="color:#fff">Acciones</th>
                                        @endcan

                                    </thead>
                                    <tbody>
                                        @foreach ($Validados as $Validado)
                                            <tr>
                                                <td>{{$Validado->id}}</td>
                                                <td>{{$Validado->Evento}}</td>
                                                <td>{{$Validado->nBoleta}}</td>
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


