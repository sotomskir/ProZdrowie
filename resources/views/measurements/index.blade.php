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
                                    <th>pal</th>
                                    <th>weight [kg]</th>
                                    <th>height [cm]</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($measurements as $measurement)
                                <tr>
                                    <td>{{ $dict->translate('PAL', $measurement->pal) }}</td>
                                    <td>{{ $measurement->weight }}</td>
                                    <td>{{ $measurement->height }}</td>
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
