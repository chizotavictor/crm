@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <a href="{{ route('add-company') }}" class="btn btn-success mb-2" style="float: right;">Add Employees</a>
                    <div>
                        <label for="" >Select company</label>
                        <select name="" id="" class="form-control mb-3" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                           
                            <option></option>
                            @foreach ($companies as $c)
                               
                                <option value="{{route('employees', ['company_id' => $c->id])}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td>S/N</td>
                                <td>Employee</td>
                                <td>Email</td>
                                <td>Phone Number</td>
                                <td>Company</td>
                                <td>Added</td>
                            </tr>
                            @foreach ($employees as $rec => $c)
                            <tr>
                                <td>{{$rec + 1}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->phone_number}}</td>
                                
                                <td>{{$c->company->name}}</td>
                                <td>{{$c->created_at->format('d M, Y')}}</td>
                            </tr>
                            @endforeach
                        </table>
                        {{$employees->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
