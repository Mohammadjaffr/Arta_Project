<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>من نحن - عرطة</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* تنسيق خاص للبطاقات */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
@include('layouts.navbar')
<div class="container my-5" dir="rtl">
    <h1 class="text-center mb-4">من نحن</h1>
    <p class="lead text-center mb-5">مرحبًا بكم في موقع عرطة، منصتكم المفضلة للتواصل والمشاركة.</p>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-info-circle"></i> رؤيتنا</h5>
                    <p class="card-text">نسعى إلى أن نكون المنصة الرائدة في مجال التواصل الاجتماعي وتبادل المعلومات، حيث يمكن للجميع التعبير عن آرائهم ومشاركة أفكارهم.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> مهمتنا</h5>
                    <p class="card-text">توفير بيئة آمنة ومريحة لكل المستخدمين، وتعزيز التواصل الفعال والمثمر بين الأفراد والمجتمعات.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-check-circle"></i> قيمنا</h5>
                    <p class="card-text">نؤمن بالقيم الأساسية مثل النزاهة، الاحترام، والشفافية. نحن ملتزمون بتقديم محتوى ذو جودة عالية ومفيد للجميع.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-heart"></i> لماذا تختار عرطة؟</h5>
                    <p class="card-text">لأننا نضع مستخدمينا في المقام الأول، ونقدم لهم كل ما يحتاجونه لتحقيق تجربة متميزة ومفيدة.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layouts.footer')
</body>
</html>
