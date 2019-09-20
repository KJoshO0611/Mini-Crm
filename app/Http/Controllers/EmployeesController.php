<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->OrderBy('name','ASC')->get();

        return view('employees.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

            'firstname' => 'required',
            'lastname' => 'required',
            'company'=>'required',
            'email' => 'required|unique:employees,email',
            'phone' => 'required|unique:employees,phone',
        ];

        $customMessages = [
            'firstname.required' => 'Please Enter A First Name',
            'lastname.required' => 'Please Enter A Last Name',
            'company.required'=>'Please Select A Company',
            'email.required' => 'Please Enter An Email',
            'email.unique'=>'Email Already Exists',
            'phone.required' => 'Please Enter A Phone Number',
            'phone.unique'=>'Phone number Already Exists'
        ];

        $this->validate($request, $rules, $customMessages);

        Employees::create([
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'company_id'=>$request->input('company'),
            'email' => $request->input('email'),
            'phone' => '+63'.$request->input('phone'),
        ]);

        return back()->with('update','update');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = DB::table('employees')
        ->leftjoin('companies','companies.id','=','employees.company_id')
        ->select('*','companies.id as ComId','employees.id as EmpId','employees.email as EmpEmail','companies.email as ComEmail')
        ->selectRaw('TRIM("+63" From employees.phone) as PhoneNumber')
        ->where('employees.id','=',$id)
        ->first();

        //dd($employees);
        $companies = DB::table('companies')->get();

        return view('employees.show',compact('employees','companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $rules = [

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];

        $customMessages = [
            'firstname.required' => 'Please Enter A First Name',
            'lastname.required' => 'Please Enter A Last Name',
            'email.required' => 'Please Enter An Email',
            'phone.required' => 'Please Enter A Phone Number',
        ];

        $this->validate($request, $rules, $customMessages);

        Employees::where('id',$id)
        ->update([
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'company_id'=>$request->input('company'),
            'email' => $request->input('email'),
            'phone' => '+63'.$request->input('phone'),
        ]);

        return back()->with('update','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Employees::where('id',$id)->delete();

        return redirect('/employees');
    }

    public function data(){
        $employees = DB::table('employees')
        ->leftjoin('companies','companies.id','=','employees.company_id')
        ->select('employees.*','companies.name as ComName')
        ->get();


        return response()->json(array('data'=> $employees), 200);
    }
}
