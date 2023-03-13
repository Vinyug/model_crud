@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="pull-left">
                <h2>Modifier un poste</h2>
            </div>
            <div class="pull-right my-3">
                <a class="btn btn-info" href="{{ route('jobs.index') }}"> Retour </a>
            </div>
        </div>
    </div>
    
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> something went wrong.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    
    {!! Form::model($listing, ['method' => 'PATCH','route' => ['jobs.update', $listing->id]]) !!}
    <div class="row">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Poste:</strong>
                    {!! Form::text('job', null, array('placeholder' => 'Nom du poste','class' => 'form-control')) !!}
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-outline-success">Modifier</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection