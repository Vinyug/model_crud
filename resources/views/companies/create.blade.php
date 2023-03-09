@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="pull-left mb-2">
                    <h2>Créer une entreprise</h2>
                </div>
                <div class="pull-right my-3">
                    <a class="btn btn-info" href="{{ route('companies.index') }}"> Retour</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">    
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom de l'entreprise : <span style="color: red;">*</span></strong>
                        <input type="text" name="name" class="form-control" placeholder="Nom de l'entreprise" value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse de l'entreprise : <span style="color: red;">*</span></strong>
                        <input type="text" name="address" class="form-control" placeholder="Adresse de l'entreprise" value="{{ old('address') }}">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Ville de l'entreprise : </strong>
                        <input type="text" name="city" class="form-control" placeholder="Ville de l'entreprise" value="{{ old('city') }}">
                        @error('city')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Code postal de l'entreprise : </strong>
                        <input type="text" name="zip_code" class="form-control" placeholder="Code postal de l'entreprise" value="{{ old('zip_code') }}">
                        @error('zip_code')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email de l'entreprise : <span style="color: red;">*</span></strong>
                        <input type="email" name="email" class="form-control" placeholder="Email de l'entreprise" value="{{ old('email') }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="text-danger mb-5">* les champs obligatoires</div>
            </div>

            <button type="submit" class="btn btn-outline-success ml-3">Créer</button>
        </form>
    </div>
@endsection