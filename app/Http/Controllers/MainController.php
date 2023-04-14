<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class MainController extends Controller
{
    public function index()
    {
        return redirect()->route('deal-form');
    }

    public function DealForm()
    {

        return view('deal-form');

    }

    public function DealStore(Request $request)
    {

        $request->validate([
            'Deal_Name' => ['required', 'string', 'max:255'],
            'Stage' => ['required', 'string', 'max:255'],
        ]);

        $array = ['Deal_Name' => $request->Deal_Name , 'Stage' => $request->Stage];

        if($request->has('create_account')){

            $request->validate(['Account_Name' => ['required', 'string'],]);

                if($request->Account_website != null){
                    $request->validate([
                        'Account_website' => ['url'],
                    ]);
                }

                if($request->Account_phone != null){
                    $request->validate([
                        'Account_phone' => ['phone'],
                    ]);
                }

            $array = array_merge($array, ['Account_Name' => $request->Account_Name]);
            
            $account_data = ['Account_Name' => $request->Account_Name, 'Phone' => $request->Account_phone, 'Website' => $request->Account_website];

            ApiController::CreateAccount($account_data);
        }

        $responce = ApiController::CreateDeal($array);

        $status = $responce->data[0]->status;

        $message = $responce->data[0]->message;

        if($status != 'success'){
            return redirect()->back()->with('message', $message);
        }

        return redirect()->back()->with('message', trans('result.success'));

    }

    public function AccountForm()
    {
        return view('account-form');
    }

    public function AccountStore(Request $request)
    {

        $request->validate([
            'Account_Name' => ['required', 'string'],
        ]);

        if($request->Account_website != null){
            $request->validate([
                'Account_website' => ['url'],
            ]);
        }

        if($request->Account_phone != null){
            $request->validate([
                'Account_phone' => ['phone'],
            ]);
        }


        $array = ['Account_Name' => $request->Account_Name, 'Phone' => $request->Account_phone, 'Website' => $request->Account_website];

        $responce = ApiController::CreateAccount($array);

        $status = $responce->data[0]->status;

        $message = $responce->data[0]->message;

        if($status != 'success'){
            return redirect()->back()->with('message', $message);
        }

        return redirect()->back()->with('message', trans('result.success'));

    }

}
