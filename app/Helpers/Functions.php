
<?php
// Khi viết ra file helper thì cần phải sửa lại autoload trong composer.json
// Vì đây không phải là class nên cần phải thêm vào để laravel có thể nhận biết
function isUppercase($value, $message, $fail) {
    if ($value != mb_strtoupper($value, 'UTF-8')) {
        $fail($message);
    }
}