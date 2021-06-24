<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;
    public static function historyTransaction($data = []){
        if(isset($data['transaction'])){
            $db = DB::table('transaction')
                ->where('id_transaction', '=', $data['id_transaction'])
                ->where('id_user', '=', $data['id_user'])
                ->first();
            return $db;
        }else{
            $db = DB::table('transaction')
                ->where('id_user', '=', $data['id_user'])
                ->get();
            return $db;
        }
    }
    public static function topUp($data = []){
        $date = date("Y-m-d H:i:s");
        $transaction = DB::table('transaction')->insert([
            'id_user' => $data['id_user'],
            'id_transaction' => $data['id_transaction'],
            'product_name' => $data['product_name'],
            'product_value' => $data['product_value'],
            'address' => $data['address'],
            'status' => 'Pending',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        return $transaction;
    }
    public static function product(){
        $date = date("Y-m-d H:i:s");
        $transaction = DB::table('transaction')->insert([
            'id_user' => $data['id_user'],
            'id_transaction' => $data['id_transaction'],
            'product_name' => $data['product_name'],
            'product_value' => $data['product_value'],
            'address' => $data['address'],
            'status' => 'Pending',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        return $transaction;
    }
    public static function updatePayment($data = []){
        $date = date("Y-m-d H:i:s");
        $transaction = DB::table('transaction')
              ->where('id_transaction', $data['id_transaction'])
              ->update(
                  ['updated_at' => $date, 'status' => $data['status']],
                );
        return $transaction;
    }
}
