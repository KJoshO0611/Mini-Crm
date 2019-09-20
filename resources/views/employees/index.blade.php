@extends('layouts.adminlte')

@section('content')
<div class="card">
        <div class="card-header">Employees Table<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#employeesNew"><span class="fa fa-plus"></span></button></div>
        <div class="card-body">
        <table class="table" id="table" style="width:100%">
                <thead class="thead-dark">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Tools</th>
                </thead>
            </table>
        </div>
</div>
@include('modals.createModal')
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#table').DataTable( {
        "ajax": "/dataEmployees",
        "columns":[
            { "data": "first_name"  },
            { "data": "last_name"  },
            { "data": "ComName"  },
            { "data": "email"  },
            { "data": "phone"  },
            { "data": "id",
            "render": function(data, type, row, meta){
                if(type === 'display'){
                // data =  "<a class='btn btn-primary' href='/companies/"+ data + "><span class='fa fa-eye'></span></a> <button class='btn btn-danger'><span class='fa fa-trash'></span></button>"
                    data = '<a class="btn btn-primary" href=/employees/' + data + '><span class="fa fa-eye"></span></a>';
                }

                return data;
                }
            },
        ],
    } );
} );


</script>
@endpush
