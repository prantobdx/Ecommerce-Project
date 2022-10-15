<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use Session;
use Hash;

class CustomerController extends Controller
{
    public function CustomerRegister()
    {
        return view('frontEnd.customer.register');
    }

    public function saveCustomer(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        $customer->image = $this->saveImage($request);
        $customer->address = $request->address;
        $customer->save();
        return redirect('/')->with('meesage','Your account created successfully');
    }

    private function saveImage($request)
    {
        $image=$request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'CustomerInfo/customers/';
        $imgUrl = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imgUrl;
    }

    public function customerLogin()
    {
        return view('frontEnd.customer.login');
    }

    public function checkLogin(Request $request)
    {

        $customerInfo = Customer::where('email',$request->user_name)
            ->orWhere('phone',$request->user_name)
            ->first();

        if($customerInfo)
        {
            $exPassword = $customerInfo->password;
            if (password_verify($request->password,$exPassword))
            {
                Session::put('customerId',$customerInfo->id);
                Session::put('customerName',$customerInfo->name);

                return redirect('/');
            }
            else
            {
                return back()->with('messege','Provide Valid Password');
            }
        }
        else
        {
            return back()->with('messege','Use valid email or Phone');
        }
    }
    public function Logout()
    {
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }
}
