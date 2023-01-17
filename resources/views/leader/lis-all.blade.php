@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">

@section('content')


<div class="col-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped" id="table_1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم القائد </th>
                                <th>اسم الفريق</th>
                                <th>عدد السفراء </th>
                                <th>.....</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td>TITLE </td>
                                <td>TITLE </td>
                                <td>TITLE </td>
                                <td>
                                    <span class="badge bg-success">تعديل</span>
                                    <span class="badge bg-success">نقل</span>
                                </td>
                            </tr>
                            <tr>
                                <td> 2 </td>
                                <td>TITLE </td>
                                <td>TITLE </td>
                                <td>TITLE </td>
                                <td>
                                    <span class="badge bg-success">تعديل</span>
                                    <span class="badge bg-success">نقل</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
    <script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Simple Datatable
            let table1 = document.getElementById('table_1');
            let dataTable = new simpleDatatables.DataTable(table1);
        });
    </script>