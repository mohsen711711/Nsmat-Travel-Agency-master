<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // البريد الإلكتروني للوكالة
    $to_agency = "730534342m@gmail.com"; // بريد الوكالة
    $subject_agency = "رسالة من $fname $lname";
    $body_agency = "الاسم: $fname $lname\nالبريد الإلكتروني: $email\n\nالرسالة:\n$message";
    $headers_agency = "From: $email";

    // إرسال البريد الإلكتروني للوكالة
    $agency_mail_sent = mail($to_agency, $subject_agency, $body_agency, $headers_agency);

    // إرسال رسالة تأكيد إلى المستخدم
    $subject_user = "تأكيد إرسال الرسالة";
    $body_user = "مرحبًا $fname,\n\nلقد تم إرسال رسالتك بنجاح. شكرًا لتواصلك معنا.\n\nتفاصيل الرسالة:\n$message";
    $headers_user = "From: no-reply@example.com"; // استخدم بريدًا إلكترونيًا موثوقًا

    $user_mail_sent = mail($email, $subject_user, $body_user, $headers_user);

    // تحقق من نجاح الإرسال
    if ($agency_mail_sent && $user_mail_sent) {
        http_response_code(200); // نجاح
    } else {
        http_response_code(500); // خطأ
    }
}
?>