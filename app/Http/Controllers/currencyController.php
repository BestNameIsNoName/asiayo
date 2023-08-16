<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class currencyController extends Controller
{
    private $currencies = [
        'TWD' => [
            'TWD' => 1,
            'JPY' => 3.669,
            'USD' => 0.03281
        ], 'JPY' => [
            'TWD' => 0.26956,
            'JPY' => 1,
            'USD' => 0.00885
        ], 'USD' => [
            'TWD' => 30.444,
            'JPY' => 111.801,
            'USD' => 1
        ]
    ];

    public function index(Request $request)
    {
        $rules = [
            'source' => 'string|required',
            'target' => 'string|required',
            'amount' => 'string|required',
        ];

        $_request = $request->only(
            'source',
            'target',
            'amount',
        );

        $validator = Validator::make($_request, $rules);

        if ($validator->fails()) return json_encode(['msg'=>'fail']);

        try {
            $source = strtoupper($_request['source']);
            $target = strtoupper($_request['target']);
            $amount = str_replace('$', '', $_request['amount']);
            $amount = (float)str_replace(',', '', $amount);

            if (empty($this->currencies[$source][$target])) return json_encode(['msg'=>'fail']);

            $transAmount = '$'.round(($this->currencies[$source][$target] * $amount), 2);
            return json_encode(['msg'=>'success', 'amount'=>$transAmount]);
        } catch(\Exception $e) {
            return json_encode(['msg'=>'fail']);
        }
    }
}
