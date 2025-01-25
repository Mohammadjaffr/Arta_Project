<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اتصل بنا - حراج</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* تأثيرات التحويم للبطاقات */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        /* تأثيرات التحويم لأزرار وسائل التواصل الاجتماعي */
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
@include('layouts.navbar')
<div class="container my-5" dir="rtl">
    <!-- معلومات الاتصال -->
    <div class="card shadow-sm mb-5">
        <div class="card-body text-center">
            <h1 class="card-title mb-4">اتصل بنا</h1>
            <p class="lead mb-4">نحن هنا لمساعدتك! إذا كان لديك أي استفسارات أو تحتاج إلى مساعدة، فلا تتردد في التواصل معنا عبر أي من الطرق التالية:</p>

            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title"><i class="fas fa-envelope"></i> البريد الإلكتروني</h2>
                            <p class="card-text">info@haraj.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title"><i class="fas fa-phone"></i> رقم الهاتف</h2>
                            <p class="card-text">+966 123 456 789</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title"><i class="fas fa-map-marker-alt"></i> العنوان</h2>
                            <p class="card-text">الرياض، المملكة العربية السعودية</p>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="mt-4"><i class="fas fa-share-alt"></i> وسائل التواصل الاجتماعي</h2>
            <p class="mt-3">
                <a href="#" class="btn btn-outline-primary btn-lg me-2"><i class="fab fa-twitter"></i> تويتر</a>
                <a href="#" class="btn btn-outline-primary btn-lg me-2"><i class="fab fa-instagram"></i> إنستغرام</a>
                <a href="#" class="btn btn-outline-primary btn-lg"><i class="fab fa-facebook"></i> فيسبوك</a>
            </p>
        </div>
    </div>

    <!-- نموذج الاتصال -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">نموذج الاتصال</h2>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">الاسم:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الهاتف (اختياري):</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">الموضوع:</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">الرسالة:</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> إرسال</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layouts.footer')
</body>
</html>
