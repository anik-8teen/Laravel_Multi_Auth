<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator; // Import Validator facade

class CustomerController extends Controller
{
    public function show()
    {

    
        // $customers = Customer::find(1);
    //    dd();
        $customers = Customer::with('cinfo')->get();

        $data["customers"] = $customers;

        return view("customers", $data);
    }
    public function Register()
    {
        return view("registration");
    }
    public function RegisterCustomer(Request $request)
    {
        $rules = [
            'customerName' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'dob' => 'required|date',
            'email' => 'required|string|email|max:255|unique:customers,email',
            'phone' => 'required|string|max:15',
        ];

        // Define custom error messages
        $messages = [
            'email.unique' => 'The email has already been taken.', // Customize the unique email error message
            'dob.required' => 'Date of Birth Required',
        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()

            ], 200);

        }
        // dd($request->all());
        $customers = Customer::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "registration Successful"
        ], 200);
        
        // return redirect("customers")->with("success",$data);
    }



    public function editCustomer(Request $request)
    {
        $customers = Customer::find($request->id);

        $data["customers"] = $customers;

        return view("editcustomer", $data);
    }

    public function UpdateCustomer(Request $request, $id)
    {
        //dd($request->all());
        $customers = Customer::find($id);
        $validatedData = $request->validate([
            'customerName' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
        ]);



        $customers->update($request->all());
        return redirect()->route("customer.list")->with("success", "Updated succesfully");
    }

    public function DeleteCustomer()
    {
        $customers = Customer::find(request()->id);
        $customers->delete();
        return response()->json([
            "status" => true,
            "message" => "customer Deleted",
        ]);
    }

}
