<?php

/**
 * Список директив ini-файла
 * https://www.php.net/manual/ru/ini.list.php
 * 
 */
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

ini_set('log_errors', true);
ini_set('error_log', __DIR__.'/storage/logs/error.log');
error_reporting(E_ALL);

define('VIEWS_PATH', __DIR__.'/views');
define('QUESTIONNARIES_PATH', __DIR__.'/storage/questionnairies');
define('APP_UPLOADS_PATH', __DIR__.'/storage/uploads');

//error_log('put some error into the application log file.');
//phpinfo();
//exit;

// ОГОЛОШЕННЯ ГЛОБАЛЬНИХ ЗМІННИХ
// дані із заповненої форми
$applicatio_data = [];      

// помилки валідації у форматі
$validation_errors = [      
    // 'form_field1_name' => [
    //     'old_value' => 'old_value',
    //     'error_text' => 'error_text',
    // ],
    // 'form_field2_name' => [
    //     'old_value' => 'old_value',
    //     'error_text' => 'error_text',
    // ],
    // ...
];    

$questions = [
    'question_two' => 'Запитання №2 Чому ми ним користуємося?',
    'question_three' => 'Запитання №3 Як правило рибний контент мені потрібен декілька разів на міс. Це?',
    'question_four' => 'Запитання №4 Звідки він походить?',
    'question_five' => 'Запитання №5 Я можу згенерувати собі декілька параграфів',
];

$answer_options = [
    'question_two' => [
        'checked' => 2,
        'option'=>[
           1 => "тому що це зручно",
           2 => "він максимально схожий на реальний текст",
           3 => "звичка",
           4 => "вимагає замовник",
        ],
    ],

    // додати решту варіантів відповідей для кожгого із запитань
    'question_three' => [
        'checked' => 2,
        'option'=>[
            1=> "1 раз в місяць",
            2=> "2-3 рази, не частіше",
            3=> "користуюся разово, коли стартую новий проект",
            4=> "не користуюся бо забуваю про Цицерона і його Lorem Ipsum",
        ],
    ],

    'question_four' => [
            1 => "походження невідоме",
            2 => "Трактат теорії етики, цицеронівських часів 45р. до н.е",

    ],

    'question_five' => [
        1 => "5 слів",
        2 => "одне речення",
        3 => "декілька речень",
        4 => "декілька параграфів",

],
];

$file_upload_validation_errors = array(
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);


