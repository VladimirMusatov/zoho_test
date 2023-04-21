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

        $this->validate($request, [
            'Deal_Name' => ['required', 'string', 'max:255'],
            'Stage' => ['required', 'string', 'max:255'],
            'Account_Name' => ['required', 'string'],
            'Account_website' => ['url', 'nullable'],
            'Account_phone' => ['phone', 'nullable'],
        ]);

        $account_data = ['Account_Name' => $request->Account_Name, 'Phone' => $request->Account_phone, 'Website' => $request->Account_website];

        $create_account = ApiController::CreateAccount($account_data);

        $status_account = $create_account->data[0]->status;

        $message_account = $create_account->data[0]->message;


        if($status_account != 'success'){
            return response()->json([            
                'success' => false,
                'message' => $message_account,
            ]);
        }


        $array = ['Deal_Name' => $request->Deal_Name , 'Stage' => $request->Stage];

        $array = array_merge($array, ['Account_Name' => $request->Account_Name]);

        $response = ApiController::CreateDeal($array);

        $status = $response->data[0]->status;

        $message = $response->data[0]->message;

        if($status != 'success'){
            return response()->json([            
                'success' => false,
                'message' => $message,

            ]);
        }


        return response()->json([            
            'success' => true,
            'message' => trans('result.success'),

        ]);

    }

    public function AccountForm()
    {
        return view('account-form');
    }

    public function AccountStore(Request $request)
    {

        $this->validate($request, [
            'Account_Name' => ['required', 'string'],
            'Account_website' => ['url', 'nullable'],
            'Account_phone' => ['phone', 'nullable'],
        ]);

        $array = ['Account_Name' => $request->Account_Name, 'Phone' => $request->Account_phone, 'Website' => $request->Account_website];

        $response = ApiController::CreateAccount($array);

        $status = $response->data[0]->status;

        $message = $response->data[0]->message;

        if($status != 'success'){

            return response()->json([
                'success' => false,
                'message' => $message,
            ]);

        }

        return response()->json([
            'success' => true,
            'message' => trans('result.success'),
        ]);

    }

}
