<!doctype html>
<html lang="ua">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>5 - Робота з формами; Завантаження файлів; Валідація Вхідних даних;</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6">
                <h2 class="mb-4">Приклад роботи з елементами форми</h2>
                
                <form action="<?= $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    
                    <!-- приховане поле -->
                    <input type="hidden" name="is_admin" value="true">
                    <?php if (isset($validation_errors['is_admin'])):?>
                        <div class="is-invalid">
                            <p class="text-danger">
                                <?= $validation_errors['is_admin']['error_text'] ?>
                            </p>
                        </div>
                    <?php endif; ?>
                                        
                    <!-- емейл -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Ваш email</label>
                        <?php $old_value = isset($validation_errors['user_email'])? $validation_errors['user_email']['old_value']:''; ?>
                        <?php $is_invalid_css = (isset($validation_errors['user_email'])? 'is-invalid': ''); ?>
                        <input type="text" name="user_email" value="<?= $old_value ?>" id="email" placeholder="john@doe.com" maxlength="200" class="form-control <?= $is_invalid_css ?>" aria-describedby="emailHelp">
                        <?php if (isset($validation_errors['user_email'])):?>
                            <!-- стилі див тут: https://getbootstrap.com/docs/4.0/components/forms/#validation -->
                            <div class="invalid-feedback">
                                <?= $validation_errors['user_email']['error_text'] ?>
                            </div>
                        <?php endif; ?>
                        <div id="emailHelp" class="form-text">Ми не передаємо ваші приватні дані третій стороні.</div>
                    </div>
                    
                    <!-- пароль -->
                    <div class="mb-3">
                        <label for="user_password" class="form-label">Пароль:</label>
                        <input type="password" name="user_password" value="" id="user_password" maxlength="200" class="form-control">
                    </div>

                    <hr>

                    <h4><?= $questions['question_two'] ?></h4>
                    <?php foreach($answer_options['question_two']['option'] as $key => $value): ?>
                        <div class="form-check">
                            <?php $q2_label_uniq = "q2_label_{$key}";?>
                            <!-- зверніть увагу на атрибу name="" -->
                            <input type="checkbox" name="question_two_answers[]" value="<?= "$value" ?>" class="form-check-input" id="<?= $q2_label_uniq ?>"<?=($key===$answer_options['question_two']['checked'])?"checked":""?>>
                            <label class="form-check-label" for="<?= $q2_label_uniq ?>">
                                <?= $value ?> 
                            </label>
                        </div>
                    <?php endforeach; ?>

                    <hr mt-3 mb-3>

                    <h4><?= $questions['question_three'] ?></h4>
                    <?php foreach($answer_options['question_three']['option'] as $key => $value): ?>

                    <div class="form-check">                        
                        <input type="radio" name="question_three_answer" value="<?= "$value" ?>" class="form-check-input" id="q3_label_uniq_1" <?=($key===$answer_options['question_three']['checked'])?"checked":"" ?>>
                        <label class="form-check-label" for="q3_label_uniq_1">
                        <?= $value ?> 
                        </label>
                    </div>

                        <?php endforeach; ?>
                    

                    <hr mt-3 mb-3>

                    <h4><?= $questions['question_four'] ?></h4>
                    <select name="question_four_answer" class="form-select" aria-label="size 3 select example">
                    <?php foreach($answer_options['question_four'] as $key => $value): ?>
                        <option value="<?= "$value" ?>"><?= "$value" ?></option>
                        <?php endforeach; ?>
                    </select>

                    <hr mt-3 mb-3>

                    <h4><?= $questions['question_five'] ?></h4>
                    <!-- особливу увагу звертаємо на атрибут multiple та назву цього поля -->
                    <select name="question_five_answer[]" class="form-select" aria-label="size 3 select example" multiple>
                    <?php foreach($answer_options['question_five'] as $key => $value): ?>
                        <option value="<?= "$value" ?>" selected><?= "$value" ?></option>
                        <?php endforeach; ?>
                    </select>

                    <hr mt-3 mb-3>

                    <div class="mb-5 p-5 bg-warning bg-gradient bg-opacity-25">
                        <h4>Додайте зображення із бюстом Цицерона</h4>
                        <label for="formFile" class="form-label">Оберіть файл</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                        <input type="file" name="user_photo" class="form-control" id="formFile">
                    </div>
                    
                    <!-- Submit -->
                    <input type="submit" name="btnSubmit" value="Відправити" class="btn btn-primary">
                                                            
                </form>

                </div>
            </div>

        </div>

        <!-- JS includes -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>