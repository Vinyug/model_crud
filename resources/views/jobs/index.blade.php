@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="pull-left">
                <h2>Liste des postes</h2>
            </div>
            <div class="pull-right my-3">
            {{-- @can('job-create') --}}
                <a class="btn btn-info" href="{{ route('jobs.create') }}"> Créer un nouveau poste </a>
            {{-- @endcan --}}
            </div>
        </div>
    </div>
    
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    
    <table class="table table-bordered">
      <tr>
         <th>No</th>
         <th>Name</th>
         <th width="280px">Action</th>
      </tr>
        @foreach ($listings as $key => $listing)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $listing->job }}</td>
            <td>
                {{-- @can('job-edit') --}}
                    <a class="btn btn-primary" href="{{ route('jobs.edit', $listing->id) }}">Edit</a>
                {{-- @endcan --}}
                {{-- @can('job-delete') --}}
                {!! Form::open(['method' => 'DELETE','route' => ['jobs.destroy', $listing->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                    {!! Form::close() !!}
                {{-- @endcan --}}
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $listings->links() !!}
</div>
@endsection