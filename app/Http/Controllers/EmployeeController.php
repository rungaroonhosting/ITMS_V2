<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $req)
    {
        $q = $req->string('q');
        $employees = Employee::query()
            ->with(['branch','department'])
            ->when($q, fn($qq)=>$qq->where(function($w) use ($q){
                $w->where('full_name','like',"%$q%")
                  ->orWhere('email','like',"%$q%")
                  ->orWhere('code','like',"%$q%");
            }))
            ->when($req->branch_id, fn($qq)=>$qq->where('branch_id',$req->branch_id))
            ->when($req->department_id, fn($qq)=>$qq->where('department_id',$req->department_id))
            ->latest()->paginate(12);

        return view('employees.index', [
            'employees'=>$employees,
            'branches'=>Branch::orderBy('name')->get(),
            'departments'=>Department::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('employees.create', [
            'branches'=>Branch::orderBy('name')->get(),
            'departments'=>Department::orderBy('name')->get(),
        ]);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'code'=>'required|max:50',
            'full_name'=>'required|max:150',
            'nickname'=>'nullable|max:50',
            'email'=>'nullable|email|max:150',
            'phone'=>'nullable|max:50',
            'position'=>'nullable|max:100',
            'branch_id'=>'nullable|exists:branches,id',
            'department_id'=>'nullable|exists:departments,id',
            'is_active'=>'nullable|boolean',
        ]);
        $data['is_active'] = $r->boolean('is_active', true);
        Employee::create($data);
        return redirect()->route('employees.index')->with('success','บันทึกพนักงานแล้ว');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee'=>$employee,
            'branches'=>Branch::orderBy('name')->get(),
            'departments'=>Department::orderBy('name')->get(),
        ]);
    }

    public function update(Request $r, Employee $employee)
    {
        $data = $r->validate([
            'code'=>'required|max:50',
            'full_name'=>'required|max:150',
            'nickname'=>'nullable|max:50',
            'email'=>'nullable|email|max:150',
            'phone'=>'nullable|max:50',
            'position'=>'nullable|max:100',
            'branch_id'=>'nullable|exists:branches,id',
            'department_id'=>'nullable|exists:departments,id',
            'is_active'=>'nullable|boolean',
        ]);
        $data['is_active'] = $r->boolean('is_active');
        $employee->update($data);
        return redirect()->route('employees.index')->with('success','แก้ไขข้อมูลแล้ว');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with('success','ลบแล้ว');
    }
}
