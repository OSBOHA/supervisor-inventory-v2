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
                                <th>تعديل حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaders as $leader)
                            <tr>
                                <td>#</td>
                                <td>{{$leader->name}} </td>
                                <td>{{$leader->team}}</td>
                                <td>10</td>
                                <td>
                                    <span ></span>
                                    <a href="{{route('manipulatLeader',['update',$leader->id])}}">
                                        <span class="badge bg-success">تعديل</span>
                                    </a>
                                    <a href="{{route('transferLeader',[$leader->id])}}">    
                                        <span class="badge bg-success">نقل</span>
                                    </a>
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
    <script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Simple Datatable
            let table1 = document.getElementById('table_1');
            let dataTable = new simpleDatatables.DataTable(table1);
        });
    </script>