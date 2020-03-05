<?php
/*Работа с массивами.*/
/*
2) Дан массив с элементами 26, 17, 136, 12, 79, 15. С помощью цикла
foreach найдите сумму квадратов элементов этого массива.
*/
$task2arr = [26, 17, 136, 12, 79, 15];
function squareRoot($arr){
  $sum = 0;
  foreach ($arr as $valArr) {
    $sum+= pow($valArr, 2);
  }
  return $sum;
}
echo 'task2 sqrt=',squareRoot($task2arr), "<br>";

/*
4) Напишите функцию get_order($string), которая отсортирует все
слова в заданном предложении $string в алфавитном порядке.
*/
$stringtask4 = "ноты акустика гитара балалайка";
function get_order($string) {
  $a = explode(' ', $string);
  sort($a);
   return implode(' ', $a);
}
var_dump(get_order($stringtask4));

/*
6) С помощью цикла for необходимо создать массив чисел от 5 до 1000
(должен получиться массив на 995 элементов). Полученный массив
необходимо обработать таким образом, чтоб каждый элемент данного массива увеличился в 2 раза. Из второго массива вывести с
помощью echo 5 рандомных значений.
*/
function arrRandTask6(){
  $arr1 = []; $arr2 = [];
  for($i = 5; $i < 1001; $i++){
    $arr1[] = $i;
  }
  for($i = 5; $i < 1001; $i++){
    $arr2[] = $arr1[$i]*2;
  }
  $rand_keys = array_rand($arr2, 5);
  for($i = 0; $i < 5; $i++){
    echo "<br> $i = ",$arr2[$rand_keys[$i]] . "\n";
  }
  return;
}
echo arrRandTask6();
echo "<br>";

/*
5) Напишите функцию, которая определяет есть ли в заданном массиве
повторяющие элементы, функция должна вернуть true или false
*/
function arrUnicData($arr): bool{
  $unicArr = array_unique($arr);
  if(count($unicArr) == count($arr)) {return true;}
    else {return false;}

}
$arr1Task5=[5,6,4,2,5];
var_dump( arrUnicData($arr1Task5));

/*
1) Написать функцию pluck(), которая принимает массив ассоциативных массивов первым параметром, 
а вторым найменование ключа. На выходе мы должны получить массив значений данного ключа из каждого подмассива.
*/
$users=[
    ['id'=>1,
    'name'=>'first'],
    ['id'=>2,
    'names'=>'second'],
    ['id'=>3,
    'name'=>'third']
];
function pluck($users, $name){
    $resultArray;
    foreach ($users as $user) {
        if(key_exists($name,$user)){
        $resultArray[]=$user[$name];}
    }
    return $resultArray;
}
echo"<br>";
var_dump(pluck($users, 'name'));
/*
3) Создать массив и наполнить его через цикл следующим рядом чисел 1+4+7+10+...+112
*/
for ($i = 1; $i < 113; $i +=3) {
    $arrTask3[] = $i;
}
echo "<br>";
var_dump($arrTask3); 

/*Работа с классами.*/
class DateFunctionsClass{
    private $date1 = '';
    private $date2 = '';
    public function setDate1($date1)
    {
        $this->date1 = $date1;
    }
    public function setDate2($date2)
    {
        $this->date2 = $date2;
    }
    public function getDateInTimestamp($date = ''):int
    {  
        if(empty($date)){
            return strtotime($this->date1);
        }
        else{
            return strtotime($date);
        }
    }
    public function getDifferentDate ($date1 = '', $date2 = ''):int
    {
        if(empty($date1) || empty($date2)){
            $d1 = $this->getDateInTimestamp($this->date1);
            $d2 = $this->getDateInTimestamp($this->date2);
            return abs($d1 - $d2)/60/60/24;
        }   
        else{
            $d1 = $this->getDateInTimestamp($date1);
            $d2 = $this->getDateInTimestamp($date2);
            return abs($d1 - $d2)/60/60/24;
        }
    }
    public function isWorkDate($date = ''):bool
    {
        $days = ['Воскресеньек','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'];
        if(empty($date)){
            $d = $this->getDateInTimestamp($date1);
            $dateWeek = date('w',$d);
            if($dateWeek == 0 || $dateWeek == 6) {return false;} else return true;
        }
        else{
            $d = $this->getDateInTimestamp($date);
            $dateWeek = date('w',$d);
            if($dateWeek == 0 || $dateWeek == 6) {return false;} else return true;
        }
        return true;
    }
    public function getNameDayOfWeek($date = ''): string
    {
        $days = ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'];
        if(empty($date)){
            $d=strtotime($this->date1);
            $dateWeek = date('w',$d);
            return $days[$dateWeek];
    }
        else{
            $d=strtotime($date);
            $dateWeek = date('w',$d);
            return $days[$dateWeek];
        }
    }
}
$inst2 = new DateFunctionsClass();
$inst2->setDate1('2020-02-02');
$inst2->setDate2('2020-02-25');
echo "<br>", $inst2->getDifferentDate();
echo "<br>",$inst2->getNameDayOfWeek();
echo "<br> Рабочий день? ";
var_dump($inst2->isWorkDate('2020-02-02'));



/*Работа cо строками.*/

/*1) Написать функцию, которая будет формировать аббревиатуру
заданного выражения. Например Донбасская государственная
машиностроительная академия – ДГМА*/
$strAbrv = 'Донбасская государственная машиностроительная академия';
function abbrevString($str){
  $pieces = explode(" ", $str);
  foreach ($pieces as $val) {
    $result .= mb_strtoupper(mb_substr($val, 0, 1));
  }
  return $result;
}
echo "<br>", abbrevString($strAbrv);

/*2) Напишите функцию truncate_string($str, $maxsymbol), которая
проверяет длину строки $str, и если она превосходит $maxsymbol –
заменяет конец $str на &quot;...&quot;, так чтобы ее длина стала равна $maxsymbol*/
function truncate_string($str, $maxsymbol){
  if(mb_strlen($str) > $maxsymbol){
    $str = mb_strimwidth($str, 0, $maxsymbol, "...");
  }
  return $str;
}
echo "<br>";
var_dump(truncate_string($strAbrv, 15));

/*3) Необходимо написать функцию, которая считает в заданной строке
количество заданного символа.*/
function getCountSymbol($str,$symb){
  return substr_count($str, $symb);
}
echo "<br>",getCountSymbol('еутелефоне','е');

/*4) Необходимо написать функцию, которая будет обрабатывать строку
из формы, а именно функция должна выполнять следующее:
-удалить концевые пробелы;
-удалить все html теги
-спец символы преобразовать в html сущности
Функция должна вернуть обработанную строку.*/
function procString($str){
  $str = trim($str);
  $str = strip_tags($str);
  $str = htmlspecialchars($str, ENT_QUOTES);
  return $str;
}
echo "<br>",procString("    <a href='test'>Test<br></a>   ");
/*5) Необходимо написать функцию, которая сокращает полное ФИО в
краткое, например getShortFio (&#39;Иванов Иван Ивановчи&#39;)//результат
Иванов И.И.*/
function getShortFio($str){
    $pieces = explode(" ", $str);
    $result .= $pieces[0]." ".mb_substr($pieces[1], 0, 1).".".mb_substr($pieces[2], 0, 1).".";
    return $result;
}
echo "<br>",getShortFio ('Иванов Иван Ивановчи');

/*6) Необходимо в заданном имени файла выделить расширение файла
(без точки)*/   
function fileExtension($str){
    $pos = strripos($str, '.');
    $result = mb_substr($str, $pos+1, 3);
    return $result;
}
echo "<br>",fileExtension('fdefefe/fdd/txt.php');
?>
