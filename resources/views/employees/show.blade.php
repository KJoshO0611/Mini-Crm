@extends('layouts.adminlte')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <br><br>
        <div class="feature-1 border person text-center ">
            <img src="/storage/logos/{{$employees->logo}}" alt="Image" class="img-fluid">
            <div class="feature-1-content">
            <h1>{{$employees->first_name.' '.$employees->last_name}}</h1>
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Company</a>
                    </li>
                </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>{{$employees->EmpEmail}}</td>
                            </tr>
                            <tr>
                                <td>{{$employees->phone}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>{{$employees->name}}</td>
                            </tr>
                            <tr>
                                <td>{{$employees->ComEmail}}</td>
                            </tr>
                            <tr>
                                <td>{{$employees->website}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#employeeDelete"><span class="fa fa-trash"> Delete</span></button>
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#employeesEdit"><span class="fa fa-edit"> Edit</span></button>
        </div>
    </div>
</div>
@include('modals.employeesModal')
@stop

@push('scripts')
<script>
    'use strict';

    ;( function ( document, window, index )
    {
        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input )
        {
            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                    label.querySelector( 'span' ).innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });

            // Firefox bug fix
            input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
            input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
        });
    }( document, window, 0 ));
</script>

@endpush
