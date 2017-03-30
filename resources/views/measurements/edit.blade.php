@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit measurement
                    </div>

                    <div class="panel-body">
                        <form action="{{  url('/measurements/'.$measurement->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="form-group{{ $errors->has('pal') ? ' has-error' : '' }}">
                                <label>PAL</label>
                                <div class="">
                                    <input type="text" name="pal" class="form-control" value="{{ old('pal', $measurement->pal) }}"/>
                                    @if ($errors->has('pal'))
                                        <span class="help-block"><strong>{{ $errors->first('pal') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                                <label>Height</label>
                                <div class="">
                                    <input type="text" name="height" class="form-control" value="{{ old('height', $measurement->height) }}"/>
                                    @if ($errors->has('height'))
                                        <span class="help-block"><strong>{{ $errors->first('height') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                                <label>Weight</label>
                                <div class="">
                                    <input type="text" name="weight" class="form-control" value="{{ old('weight', $measurement->weight) }}"/>
                                    @if ($errors->has('weight'))
                                        <span class="help-block"><strong>{{ $errors->first('weight') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
