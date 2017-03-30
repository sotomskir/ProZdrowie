@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create measurement
                    </div>

                    <div class="panel-body">
                        <form action="{{  url('/measurements') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <div class="form-group{{ $errors->has('pal') ? ' has-error' : '' }}">
                                <label>PAL</label>
                                <div class="">
                                    <input type="text" name="pal" class="form-control" value="{{ old('pal') }}"/>
                                    @if ($errors->has('pal'))
                                        <span class="help-block"><strong>{{ $errors->first('pal') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                                <label>Height</label>
                                <div class="">
                                    <input type="text" name="height" class="form-control" value="{{ old('height') }}"/>
                                    @if ($errors->has('height'))
                                        <span class="help-block"><strong>{{ $errors->first('height') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                                <label>Weight</label>
                                <div class="">
                                    <input type="text" name="weight" class="form-control" value="{{ old('weight') }}"/>
                                    @if ($errors->has('weight'))
                                        <span class="help-block"><strong>{{ $errors->first('weight') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
