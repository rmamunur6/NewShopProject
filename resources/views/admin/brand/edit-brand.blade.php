@extends('admin.master')
@section('title')
    Edit Brand
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center text-success">Edit Brand Form</h4>
                    </div>
                    <div class="panel-body">
                        <h4 class="text-success text-center">{{ Session::get('message') }}</h4>
                        {!! Form::open(['route'=>'update-brand','method'=>'POST','class'=>'form-horizontal']) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="brand_name" value="{{ $brand->brand_name }}" />
                                <input type="hidden" class="form-control" name="brand_id" value="{{ $brand->id }}" />
                                <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Brand Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="brand_description">{{ $brand->brand_description }}</textarea>
                                <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' '}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Publication Status</label>
                            <div class="col-md-8 radio">
                                <label><input type="radio"  name="publication_status" {{ $brand->publication_status ==1 ? 'checked' : '' }} value="1" />Published</label>
                                <label><input type="radio"  name="publication_status" {{ $brand->publication_status ==0 ? 'checked' : '' }} value="0" />Unpublished</label>
                                <br>
                                <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' '}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-lg-offset-4">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Brand Info" />
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection