<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomType = $_POST['roomType'];
    // Отримати інші дані...
    $roomSize = $_POST['roomSize'];
    $clientName = $_POST['clientName'];
    $phoneNumber = $_POST['phoneNumber'];

    $message = "Інформація про замовлення:\n";
    $message .= "Тип приміщення: $roomType\n";
    // Додати інші дані...
    $message .= "Площа: $roomSize м²\n";
    $message .= "Ім'я клієнта: $clientName\n";
    $message .= "Телефон клієнта: $phoneNumber";

    // Відправка електронної пошти
    $to = 'sofienko2933@gmail.com'; // Вкажіть свою електронну адресу
    $subject = 'Опитувальник про натяжну стелю';
    $headers = "From: webmaster@example.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo "Заявка відправлена!";
    } else {
        echo "Сталася помилка при відправці.";
    }
} else {
    echo "Некоректний запит.";
}
?>