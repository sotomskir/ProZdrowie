@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                    <a href="/measurements/create" class="btn btn-xs btn-primary pull-right">Dodaj pomiar</a>
                </div>

                <div class="panel-body">
                    You are logged in!
                    <dl>
                        <dt>name</dt><dd>{{ $user->name }}</dd>
                        <dt>email</dt><dd>{{ $user->email }}</dd>
                        <dt>sex</dt><dd>{{ $personData->sex }}</dd>
                        <dt>pal</dt><dd>{{ $personData->pal }}</dd>
                        <dt>weight</dt><dd>{{ $personData->weight }}</dd>
                        <dt>height</dt><dd>{{ $personData->height }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
