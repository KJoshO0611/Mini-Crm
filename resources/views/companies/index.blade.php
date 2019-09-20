@extends('layouts.adminlte')

@section('content')
<div class="card">
    <div class="card-header">Companies Table  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#companyNew"><span class="fa fa-plus"></span></button></div>
    <div class="card-body">
        <table class="table" style="width:100%" id="table">
            <thead class="thead-dark">
                <th>Name</th>
                <th>Email</th>
                <th>website</th>
                <th>Tools</th>
            </thead>
        </table>
    </div>
</div>
@include('modals.companycreateModal')
@endsection

@push('scripts')
<script>
   $(document).ready(function() {
    $('#table').DataTable( {
        "ajax": "/data",
        "columns":[
            { "data": "name"  },
            { "data": "email"  },
            { "data": "website"  },
            { "data": "id",
            "render": function(data, type, row, meta){
                if(type === 'display'){
                   // data =  "<a class='btn btn-primary' href='/companies/"+ data + "><span class='fa fa-eye'></span></a> <button class='btn btn-danger'><span class='fa fa-trash'></span></button>"
                    data = '<a class="btn btn-primary" href=/companies/' + data + '><span class="fa fa-eye"></span></a>';
                }

                return data;
                }
            },
        ],
    } );
} );
</script>

@endpush
