<?php
//Написать функцию, которая возвращает количество дней, оставшихся до нового года.
//Функция должна корректно работать при запуске в любом году, т. е. грядущий год должен вычисляться программно.

function new_year()
{
	$dates = date('L') == 1 ?  366 - date('z') : 365 - date('z');
	return $dates;
}
echo new_year() .' Дней осталось до НГ' . "\n";


//Написать функцию, которая проверяет, является ли переданное число или строка палиндромом и возвраащет true. В противном случаи возвращает false.
//Палиндром — это число или текст, который читается одинаково и слева, и справа: 939; 49094; 11311.

function palindrome($slovo = '1234-4321')
{
    //$a = strlen($slovo);
    $arr = str_split($slovo);
    for ($i=0, $n = count($arr); $i < $n; $i++) {
        if ($arr[$i-1] == $arr[$n-$i])
        {
            $result+=1;
        }
        else {
            $result=0;
        }
    }
    return $result_final = $result ==  count($arr) ? 'true' : 'false';
}
echo palindrome() ."\n";


//Написать функцию, которая принимает в качестве единственного аргумента, дату и время.
//Допустим мы передали дату 12.03.2016 19:50
//Функция должна вернуть строку, которая содержит отформатированную дату согласно правилам:
//- если дата - текущий день, то возвращает "сегодня в 19:50"
//- если дата - вчерашнее число, то возвращает "вчера в 19:50"
//- иначе возвращает дату на русском языке - "12 марта 2016 года в 19:50"

function dateReturn($dateF='11.01.2017 02:38')
{
//Fix encoding for russian locale on windows
//$locale = setlocale(LC_ALL, 'ru_RU.CP1251', 'rus_RUS.CP1251', 'Russian_Russia.1251');

    $date_ins= explode(' ', $dateF);
    $act_date= explode(' ', date("d.m.Y H:i"));
    $date_ins2= explode('.', $date_ins[0]);
    $act_date2= explode('.', $act_date[0]);
    if ($date_ins[0] == $act_date[0])
    {
        $a= "сегодня в " . date("H:i");
    }
    elseif ((int)$date_ins2[0] == (int)$act_date2[0]-1 && $date_ins2[1] == $act_date2[1] && $date_ins2[2] == $act_date2[2])
    {
        $a= "вчера в " . date("H:i");
    }
    else {
        $a= date(" d F Y года в h:m");
    }
    return $a;
}
echo dateReturn();