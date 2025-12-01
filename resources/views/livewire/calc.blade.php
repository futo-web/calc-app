<?php

use function Livewire\Volt\{state, mount};

state(['number1', 'operator', 'number2', 'answer', 'symbol']);

mount(function ($number1, $operator, $number2) {
    $this->number1 = $number1;
    $this->number2 = $number2;
    $this->operator = $operator;

    if ($operator === 'addition') {
        $this->symbol = '+';
        $this->answer = $number1 + $number2;
    } elseif ($operator === 'subtraction') {
        $this->symbol = '-';
        $this->answer = $number1 - $number2;
    } elseif ($operator === 'multiplication') {
        $this->symbol = '×';
        $this->answer = $number1 * $number2;
    } elseif ($operator === 'division') {
        if ($number2 == 0) {
            $this->symbol = '÷';
            $this->answer = '計算できません';
        } else {
            $this->symbol = '÷';
            $this->answer = $number1 / $number2;
        }
    } else {
        $this->symbol = '?';
        $this->answer = '無効な演算子です';
    }
});

?>

<div>
    <h1>計算結果</h1>

    <div>
        {{ $number1 }} {{ $symbol }} {{ $number2 }} = {{ $answer }}
    </div>
</div>
