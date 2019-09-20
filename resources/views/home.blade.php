@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Companies</span>
                    <span class="info-box-number">{{$comp}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Employees</span>
                    <span class="info-box-number">{{$emp}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
</div>
@endsection
