<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Transaction;
use Validator;

class HomeController extends Controller
{
    public function index(){
        return view('home/home');
    }
    public function prepaidBalance(){
        return view('home/prepaid_balance');
    }
    public function product(){
        return view('home/product');
    }
    public function payment(Request $request){
        $data = [
            'id_transaction' => $request->id_transaction
        ];
        return view('home/payment')->with($data);
    }
    public function paymentFinish(Request $request){
        $data = [
            'id_transaction' => $request->id_transaction,
            'status' => "Success"
        ];  
        $db = Transaction::updatePayment($data);
        return redirect()->route('history');
    }
    public function history(Request $request){
        $query = [
            'id_user' => Auth::id(),
            'id_transaction' => $request->id_transaction
        ];
        $db = Transaction::historyTransaction($query);
        $data = [
            'history' => $db
        ];
        return view('home/history')->with($data);
    }
    public function payNow(Request $request){
        $data = [
            'id_transaction' => $request->id_transaction,
            'status' => 'Success'
        ];
        Transaction::updatePayment($data);
        return redirect()->back();
    }
    public function transaction(Request $request){
        switch ($request->type_order) {
            case 'topup':
                $rules = [
                    'mobile_number'                 => 'required|between:7,12|regex:/(081)[0-9]{9}/',
                    'value'                         => 'required|'.Rule::in(['10000', '50000', '100000']),
                ];
                $messages = [
                    'mobile_number.required'        => 'Mobile Number wajib diisi',
                    'mobile_number.between'         => 'Masukan nomor telepon yang benar',
                    'mobile_number.regex'           => 'Masukan nomor telepon diawali dengan 081',
                    'value.required'                => 'Isi jumlah top up',
                    'value.in'                      => 'Hanya boleh mengisi 10.000 , 50.000 dan 100.000'
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }
                $id_transaction = rand(1000000, 9999999);
                $data = [
                    'id_user' => Auth::id(),
                    'id_transaction' => $id_transaction,
                    'type_order' => 'topup',
                    'product_name' => $request->mobile_number,
                    'product_value' => $request->value,
                    'address' => NULL
                ];
                Transaction::topUp($data);
                return view('home/success_order')->with($data);
                break;
            case 'product':
                $rules = [
                    'product'                 => 'required|min:10|max:150',
                    'address'                 => 'required|min:10|max:150',
                    'price'                   => 'required'
                ];
                $messages = [
                    'product.required'    => 'TOLONG ISI PRODUCT!',
                    'product.min'         => 'MIN PRODUCT 10 KARAKTER',
                    'product.max'         => 'MAX PRODUCT 150 KARAKTER',
                    'address.required'    => 'TOLONG ISI PRODUCT!',
                    'address.min'         => 'MIN PRODUCT 10 KARAKTER',
                    'address.max'         => 'MAX PRODUCT 150 KARAKTER',
                    'price.required'      => 'TOLONG PRICE DI ISI',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }
                $id_transaction = rand(1000000, 9999999);
                $data = [
                    'id_user' => Auth::id(),
                    'id_transaction' => $id_transaction,
                    'type_order' => 'product',
                    'product_name' => $request->product,
                    'product_value' => $request->price,
                    'address' => $request->address
                ];
                Transaction::topUp($data);
                return view('home/success_order')->with($data);
                break;
            default:
                # code...
                break;
        }
    }
}
