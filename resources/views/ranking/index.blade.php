@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ranking
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Stracone<br>kilogramy</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>sex</th>
                                    <th>pal</th>
                                    <th>weight</th>
                                    <th>height</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="{{ $user->id ==$logged->id ? 'active' : '' }}">
                                    <td>{{ $user->weightDiff }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->sex }}</td>
                                    <td>{{ $user->pal }}</td>
                                    <td>{{ $user->weight }}</td>
                                    <td>{{ $user->height }}</td>
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
