@extends('layouts.all')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de Boletas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Crear Boleta</h3>


                            {!! Form::open(array('route'=>'Entradas.store', 'method'=>'POST')) !!}
                                <div class="row" >
                                    <div class="col-xs-12 col-sm-12 col-md-12" >
                                        <div class="form-group" >
                                            <label for="Evento">Evento</label>
                                            {!! Form::text('Evento', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12" >
                                        <div class="form-group" >
                                            <label for="nBoleta">Boleta</label>
                                            {!! Form::text('nBoleta', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12" >
                                        <div class="form-group" >
                                            <label for="Localidad">Localidad</label>
                                            
                                            {!! Form::text('Localidad', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12" >
                                        <button type="submit" class="btn btn-primary" >Guardar</button>
                                    </div>

                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

