<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;


class HelloValidator extends Validator {
    public function  validateHello($attribute, $value, $parameters) { //helloという名前のバリデーション
        return $value % 2 == 0;
        //チェックする値が2の倍数だったらPass
    }
}
