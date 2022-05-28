<?php

/**
 * Front Controller
 */

require_once __DIR__.'/app/bootstrap.php'; 

// Process form input
if (isset($_POST['btnSubmit'])) {

    // VALIDATION SECTION

    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_VALIDATE_EMAIL);
    if ((false === $user_email) || (null === $user_email)) {
        $validation_errors['user_email'] = [
            'old_value' => $_POST['user_email'],
            'error_text' => "Поле `Email` повинно містити коректиний email і не бути пустим.",
        ];
    } else {
        $application_data['user_email'] = $user_email;
    }


    $is_admin = filter_input(INPUT_POST, 'is_admin', FILTER_VALIDATE_BOOLEAN);
    if (false === $is_admin || (null === $is_admin)) {
        $validation_errors['is_admin'] = [
            'old_value' => $is_admin,
            'error_text' => "поле `is_admin` обовязкове для заповнення і повинно містити значення булевого типу",
        ];
    } else {
        $application_data['is_admin'] = (true === (bool)$is_admin)? 'так':'ні'; 
    }


    $application_data['questions'] = [
        'two' => [
            'text' => $questions['question_two'],
            'answers' => $_POST['question_two_answers'] // потрібно зробити валідацію перед зберіганням
        ], 
    ];

    // зберігаємо завантажений файл
    if (UPLOAD_ERR_OK === $_FILES['user_photo']['error']) {
        $img_file_extension = pathinfo($_FILES['user_photo']['name'], PATHINFO_EXTENSION);
        $img_file_name = sha1_file($_FILES['user_photo']['tmp_name']).".{$img_file_extension}";
        $image_file_path = APP_UPLOADS_PATH."/{$img_file_name}";
        $moved = move_uploaded_file($_FILES['user_photo']['tmp_name'], $image_file_path);
        
        $application_data['user_photo'] = [
            'file' => $img_file_name,
            'moved' => $moved
        ];
    } else {
        // prepare validation errors
        $validation_errors['user_photo'] = $file_upload_validation_errors[$_FILES['user_photo']['error']];
    }

    if (count($validation_errors)) {
        // повертаємо користувача до форми
        require_once VIEWS_PATH.'/form.php';
    } else {
        // // 1. зберігаємо дані анкети користувача.
        $file_path = QUESTIONNARIES_PATH."/{$application_data['user_email']}.json";
        $file_content = json_encode($application_data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        file_put_contents($file_path, $file_content);

        // 3. відображаємо сторінку "Успіх"
        require_once VIEWS_PATH.'/success.php';
    }
    
    // завершуємо виконання скрипта
    exit;
}

/**
 * поведінка скрипта по замовчуванню,
 * коли відкрили index.php 
 * і не натискали на кнопку відправки форми
 */
require_once VIEWS_PATH.'/form.php';
