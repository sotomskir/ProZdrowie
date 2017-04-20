@extends('layouts.app')

@inject('dict', 'App\Services\DictionaryService')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Measurements
                        <a href="/measurements/create" class="btn btn-xs btn-primary pull-right">Add measurement</a>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>weight [kg]</th>
                                    <th>height [cm]</th>
                                    <th>waist [cm]</th>
                                    <th>biceps [cm]</th>
                                    <th>hips [cm]</th>
                                    <th>thigh [cm]</th>
                                    <th>chest [cm]</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($measurements as $measurement)
                                <tr>
                                    <td>{{ $measurement->weight }}</td>
                                    <td>{{ $measurement->height }}</td>
                                    <td>{{ $measurement->waist }}</td>
                                    <td>{{ $measurement->biceps }}</td>
                                    <td>{{ $measurement->hips }}</td>
                                    <td>{{ $measurement->thigh }}</td>
                                    <td>{{ $measurement->chest }}</td>
                                    <td>
                                        <form action="/measurements/{{ $measurement->id }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <a href="/measurements/{{ $measurement->id }}" class="btn btn-xs btn-primary">Edit</a>
                                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
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
