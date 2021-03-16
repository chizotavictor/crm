@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <a href="{{ route('add-company') }}" class="btn btn-success mb-2">Add Company</a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td>S/N</td>
                                <td>Logo</td>
                                <td>Name</td>
                                <td>Address</td>
                                <td>Added</td>
                                <td>Employee</td>
                                <td>Add Employee</td>
                            </tr>
                            @foreach ($records as $rec => $c)
                            <tr>
                                <td>{{$rec + 1}}</td>
                                <td><img src="{{env('IMAGE_URL') . $c->logo}}" style="width: 50px"></td>
                                <td>{{$c->name}}</td>
                                <td>{{$c->address}}</td>
                                <td>{{$c->created_at->format('d M, Y')}}</td>
                                <td><a href="{{ route('employees', ['company_id' => $c->id]) }}" class="btn btn-warning">Check Employees</a></td>
                                <td><a href="{{ route('add-employee') }}" class="btn btn-warning">Add Employees</a></td>
                            </tr>
                            @endforeach
                        </table>
                        {{$records->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
