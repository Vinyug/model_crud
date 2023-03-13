@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="pull-left">
                <h2>Créer un nouveau poste</h2>
            </div>
            <div class="pull-right my-3">
                <a class="btn btn-info" href="{{ route('jobs.index') }}"> Retour </a>
            </div>
        </div>
    </div>
    
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    
    {!! Form::open(array('route' => 'jobs.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Poste:</strong>
                {!! Form::text('job', null, array('placeholder' => 'Nom du poste','class' => 'form-control')) !!}
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-outline-success">Créer</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection