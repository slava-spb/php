<?php
//Спросить количество тарелок и количество моющего средства.
//Моющее средство расходуется из расчета 0.5 на одну тарелку.
//В цикле выводить сколько моющего средства осталось после мытья каждой тарелки.
//В конце вывести сколько тарелок осталось, когда моющее средство закончилось или наоборот.

$cap = 11;
$fairy = 2;
while ($cap>0 && $fairy>0){
	$cap--;
	$fairy=$fairy-0.5;
	echo 'тарелок осталось ' . $cap ."\n" ;
	echo 'фейри осталось ' . $fairy ."\n" ;

	}
	echo 'Всего тарелок осталось ' . $cap ."\n" ;
	echo 'Всего фейри осталось ' . $fairy ."\n" ;

	
	
//На входе имеем массив из целых чисел, например - [1, 2, 3, 8, 14, 89, 45]
//На выходе должен быть массив с обратным порядком элементов: “перевертыш”.
//Т.е. первый элемент массива будет последним, а последний - первым и т.д.
//Полученный на выходе массив: [45, 89, 14, 8, 3, 2, 1]
//Нельзя использовать:
//- конструкцию подобную такой - ​element = array[1]
//- встроенные функции для работы с массивами
//- добавлять или удалять элементы массива

$arr =  [1, 2, 3, 8, 14, 89, 45];
for($i=0, $n = count($arr); $i < $n/2; $i++){
		//var_dump ($arr[$i]);
		$arr[$i]=$arr[$i]+$arr[$n-$i];
		$arr[$n-$i]=$arr[$i]-$arr[$n-$i];
		$arr[$i]=$arr[$i]-$arr[$n-$i];
		//echo $arr[$i] . "\t";
		//var_dump($arr[$i]);
		//var_dump($arr[$n-$i]);
		}
	var_dump ($arr);

//На входе имеем массив из целых чисел, например - [1, 2, 3, 8, 14, 89, 45]
//Выполнить сортировку массива по возрастанию методом пузырька.
//Запрещено использовать встроенные возможности языка для сортировки.

$arr1 = [111, 2, 3, 8, 14, 89, 45];
for($ii=0, $nn = count($arr1); $ii <= $nn; $ii++){
			for ($iii=0, $nnn = count($arr1); $iii < $nnn; $iii++ )
			{
			if ($arr1[$iii-1] > $arr1[$iii]){
					$mod = $arr1[$iii-1];
                    $arr1[$iii-1] = $arr1[$iii];
					$arr1[$iii] = $mod;
				}
		}
}
var_dump ($arr1);

//Написать программу для перевода числа из десятичной системы счисления в двоичную и наоборот.
$number = 100;
$number= decbin ( $number );
echo 'двоичная ' . $number . "\n"; 
$number= bindec ( $number );
echo 'десятичная ' . $number . "\n"; 



