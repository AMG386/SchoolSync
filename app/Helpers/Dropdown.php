<?php
namespace App\Helpers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\User;
use App\Models\Student;



class Dropdown
{
 
    //employees
    public static function customers()
    {
        return  Customer::orderBy('customer_name', 'ASC')->get()
            ->pluck('customer_name', 'id');
    }
    
    public static function employees()
    {
         return Employee::orderBy('first_name', 'ASC')->get()
        ->mapWithKeys(function ($employee) {
            return [$employee->id => $employee->first_name . ' (' . $employee->email . ')'];
        });
    }
    public static function vendors()
    {
        return Vendor::orderBy('vendor_name', 'ASC')->get()
            ->pluck('vendor_name', 'id');
    }
    

    public static function users()
    {
        return  User::orderBy('Name', 'ASC')->get()
        ->pluck('Name', 'id');
    }
 
    public static function students()
    {
        return  Student::orderBy('first_name', 'ASC')->get()
        ->pluck('first_name', 'id');
    }
}