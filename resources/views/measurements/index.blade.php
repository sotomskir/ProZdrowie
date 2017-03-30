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
                        <dt>name</dt><dd>{{ $user->name }}</dd>
                        <dt>email</dt><dd>{{ $user->email }}</dd>
                        <table class="table">
                            <thead>
                                <th>sex</th>
                                <th>pal</th>
                                <th>weight</th>
                                <th>height</th>
                            </thead>
                            <tbody>
                            @foreach($measurements as $measurement)
                                <tr>
                                    <td>{{ $measurement->sex }}</td>
                                    <td>{{ $measurement->pal }}</td>
                                    <td>{{ $measurement->weight }}</td>
                                    <td>{{ $measurement->height }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
