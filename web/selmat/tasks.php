<?php

/*

1) Написать алгоритм решения задачи:
В классе 28 учеников. 75% из них занимаются спортом.
Сколько учеников в классе занимаются спортом и сколько всего учеников в классе?

 */

$students_all = 28;
$students_do_sport_percent = 0.75;
$students_do_sport_count = $students_all * $students_do_sport_percent;
echo '<h2>Задание 1</h2>';
echo '<p>Занимаются спортом: ' . $students_do_sport_count . ' учеников.' . '<br>';
echo 'Всего учеников в классе: ' . $students_all . '</p>';

/*

2) Реализовать алгоритм извлечения числовых значений со строки:
This server has 386 GB RAM and 5000 GB storage

 */

$str = 'This server has 386 GB RAM and 5000 GB storage';
$words = explode(' ', $str);
$word_is_number = [];
foreach ($words as $word)
{
	if (is_numeric($word))
	{
		$word_is_number[] = $word;
	}
}

$word_is_number = implode(', ', $word_is_number);

echo '<h2>Задание 2</h2>';
echo '<p>Строка: ' . $str . '<br>';
echo 'Числа в строке: ' . $word_is_number . '</p>';

/*

3) Как получить первый элемент массива [2,3,56,65,56,44,34,45,3,5,35,345,3,5]​?

 */

$arr_full = [2,3,56,65,56,44,34,45,3,5,35,345,3,5];
$arr_first_item = $arr_full[0];

echo '<h2>Задание 3</h2>';
echo '<p>Массив: ';
foreach ($arr_full as $arr_item)
{
	echo $arr_item . ',';
}
echo '<br>Первый элемент: ' . $arr_first_item . '</p>';

/*

4) Как вычислить остаток от деления 10/3

 */

$remainder_of_division = 10 % 3;
echo '<h2>Задание 4</h2>';
echo '<p>Массив: Остаток от деления 10/3 == ' . $remainder_of_division . '</p>';

/*

5) Нужно поменять 2 переменные местами без использования третьей:
$a = [1,2,3,4,5];
$b = ‘Hello world’;

 */

$a = [1,2,3,4,5];
$b = 'Hello world';

echo '<h2>Задание 5</h2>';
echo '<p>Данные до обмена: $a == ' . implode(',', $a) . ', $b == ' . $b . '<br>';

list($a, $b) = [$b, $a]; // обмениваем данные

echo 'Данные после обмена: $a == ' . $a . ', $b == ' . implode(',', $b) . '</p>';

/*

6) Чем отличается оператор == от === ?

Ответ:

Оператор == - это сравнение не строгое, а оператор === - выполняет сравнение по значению и типу данных (строгое сравнение).

 */

// Пример:

$item1 = 5;
$item2 = '5';

var_dump($item1 == $item2); // true
var_dump($item1 === $item2); // false

/*

7) Чем отличается require от include ?

Ответ:

require - подключить в обязательном порядке, иначе (если файл ненайден) завершить дальнейшее выполнение скрипта.
include - подключить файл, иначе - вывести предупреждение но скрипт при этом продолжит выполнятся.

Вообще, лучше использовать конструкции:
include_once и require_once - небудет ошибок повторного подключения одного и того же файла.
Либо если используем ООП, PSR стандарты (namespace, классы и т.д.), то лучше использовать autoload (spl_autoload) - Автозагрузка классов.

 */

/*

8) Какие данные пользователя сайта из перечисленных можно считать на 100%
достоверными: cookie, данные сессии, IP-адрес пользователя , User-Agent? Почему?

Данные сессии и IP-адрес пользователя полагаю.
Все другие данные можно подменить, скажем куки - потому что они хранятся на клиенте.
IP чтобы определить более менее правильный то полагаю вот такая функция может помочь:

 */

// Get the client IP address.
function getIpAddress() {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		return trim($ips[count($ips) - 1]);
	} else {
		return $_SERVER['REMOTE_ADDR'];
	}
}

/*

9) Что выведет следующий код на JavaScript и почему:
for(var i = 0; i < 10; i++) {
	setTimeout(function () {
		console.log(i);
	}, 100);
}

Ответ:

функция setTimeout создаёт функцию (замыкание), у которой есть доступ к внешней по отношению к ней области видимости,
представленной в данном случае циклом, в котором объявляется и используется переменная i.
После того, как пройдут 0.1 секунды, функция выполняется и выводит значение i, которое,
после окончания работы цикла, остаётся доступным и равняется 10-ти.
Переменная, в ходе работы цикла, последовательно принимает значения 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 причём,
последнее значение оказывается сохранённым в ней и после выхода из цикла.
Если бы мы работали с массивом - то мы бы на выходе обращались бы к последнему 10 по индексу элементу которого несуществует,
так как всего их с 0-9 было бы и в итоге у нас было бы значение undefined.
Решение проблемы:
1 вариант - начиная с ES6 можно внутри цикла использовать не var а let:

for(let i = 0; i < 10; i++) {
	setTimeout(function () {
		console.log(i);
	}, 100);
}

2 вариант - передать функции переменную i, в результате у каждой функции будет доступ к правильному значению индекса:

for(var i = 0; i < 10; i++) {
	setTimeout(function (i) {
		console.log(i);
	}(i), 100);
}

 */

/*
MySQL

1. Миграции (смотрите в проекте Yii2 Simple Blog)

2. Напишите запрос, который выберет имя пользователя (bids.name) с самой высокой ценой заявки (bids.price)

Решение:

SELECT `bids`.`name`, `bids`.`price`
FROM `bids`
ORDER BY `bids`.`name` DESC
LIMIT 1

или так:

SELECT `bids`.`name`, `bids`.`price`
FROM `bids`
WHERE `bids`.`price` = (
    select max(`bids`.`price`)
    from `bids`
);

3. Напишите запрос, который выберет название мероприятия (events.caption), по которому нет заявок

Решение:

// попробовал так но ненашел правильного решения.

SELECT `events`.`caption`, COUNT(`bids`.`id_event`) AS ev_no_bids_count
FROM `bids`
JOIN `events` on `bids`.`id_event` = `events`.`id`
GROUP BY `events`.`caption`
HAVING ev_no_bids_count < 1;

// как вариант может сделать надо было бы еще колонку в таблице
// events где бы был бы колличество заявок. Тогда можно было бы легко
// получить. Но по заданию дано было только 2 таблицы, я так понял
// что нужно найти решение не создавай 3-ю колонку.
// И тогда бы получилось чтото вроде этого:

SELECT `events`.`caption` WHERE bids_count = 0;

4. Напишите запрос, который выберет название мероприятия (events.caption), по которому больше трех заявок

Решение:

SELECT `events`.`caption`, COUNT(`bids`.`id_event`) AS ev_bids_count
FROM `bids`
JOIN `events` on `bids`.`id_event` = `events`.`id`
GROUP BY `events`.`caption`
HAVING ev_bids_count > 3;

5. Напишите запрос, который выберет название мероприятия (events.caption), по которому больше всего заявок

Решение:

SELECT `events`.`caption`, COUNT(`bids`.`id_event`) AS ev_bids_max_count
FROM `bids`
JOIN `events`
ON `bids`.`id_event` = `events`.`id`
GROUP BY `events`.`caption`
ORDER BY ev_bids_max_count DESC
LIMIT 1;

 */