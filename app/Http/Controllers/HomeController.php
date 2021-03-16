<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $records = \App\Company::paginate(15);
        return view('home')->with(['records' => $records]);
    }

    public function addCompany()
    {
        return view('add-company');
    }

    public function addCompanySubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'logo' => 'mimes:jpeg,png'
        ]);

        $extension = $request->logo->extension();
        $request->logo->storeAs('/public', time().".".$extension);
        $url = Storage::url(time().".".$extension);
        \App\Company::create([
            'name' => $request->name,
            'logo' => $url,
            'address' => $request->address
        ]);
        $request->session()->flash('success', "Company record added successfully!");
        return redirect()->route('home');
    }

    public function addEmployee(Request $request)
    {
        $companies = \App\Company::all();
        return view('add-employee')->with(['companies' => $companies]);
    }

    public function employees(Request $request)
    {
        if(!isset($request->company_id)) {
            $request->session()->flash('success', "No company specified!");
            return redirect()->back();
        }

        $employees = \App\Employee::where(['company_id' => $request->company_id])
            ->with(['company'])
            ->paginate(10);
        $companies = \App\Company::all();

        return view('employees')->with(['companies' => $companies, 'employees' => $employees]);
        // return $employees;
    }

    public function addEmployeeSubmit(Request $request)
    {

        $this->validate($request, [
            'company_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);
        \App\Employee::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number
        ]);
        $request->session()->flash('success', "Employee record added successfully!");
        return redirect()->route('employees', ['company_id' => $request->company_id]);
    }
}
