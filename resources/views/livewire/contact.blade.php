@extends('layouts.master')
@section('title', 'اتصل بنا')
@section('contact')
    <div class="my-5" dir="rtl">
        <!-- معلومات الاتصال -->
        <div class="container">
            <!-- معلومات الاتصال -->
            <div class="shadow-sm mb-5 p-4 bg-light rounded">
                <div class="text-center">
                    <h1 class="mb-4">اتصل بنا</h1>
                    <p class="lead mb-4">نحن هنا لمساعدتك! إذا كان لديك أي استفسارات أو تحتاج إلى مساعدة، فلا تتردد في التواصل معنا عبر أي من الطرق التالية:</p>

                    <div class="row justify-content-center g-4">
                        <!-- البريد الإلكتروني -->
                        <div class="col-md-4 col-sm-6">
                            <div class="border rounded-3 p-4 text-center shadow-hover h-100">
                                <h2><i class="fas fa-envelope"></i> البريد الإلكتروني</h2>
                                <p>info@haraj.com</p>
                            </div>
                        </div>

                        <!-- رقم الهاتف -->
                        <div class="col-md-4 col-sm-6">
                            <div class="border rounded-3 p-4 text-center shadow-hover h-100">
                                <h2><i class="fas fa-phone"></i> رقم الهاتف</h2>
                                <p>+966 123 456 789</p>
                            </div>
                        </div>

                        <!-- العنوان -->
                        <div class="col-md-4 col-sm-6">
                            <div class="border rounded-3 p-4 text-center shadow-hover h-100">
                                <h2><i class="fas fa-map-marker-alt"></i> العنوان</h2>
                                <p>الرياض، المملكة العربية السعودية</p>
                            </div>
                        </div>
                    </div>

                    <!-- وسائل التواصل الاجتماعي -->
                    <h2 class="mt-5"><i class="fas fa-share-alt"></i> وسائل التواصل الاجتماعي</h2>
                    <p class="mt-3">
                        <a href="#" class="btn btn-outline-primary btn-lg me-2"><i class="fab fa-twitter"></i> تويتر</a>
                        <a href="#" class="btn btn-outline-primary btn-lg me-2"><i class="fab fa-instagram"></i> إنستغرام</a>
                        <a href="#" class="btn btn-outline-primary btn-lg"><i class="fab fa-facebook"></i> فيسبوك</a>
                    </p>
                </div>
            </div>

            <!-- نموذج الاتصال -->
            <div class="shadow-sm p-4 bg-light rounded">
                <div class="">
                    <h2 class="text-center mb-4">نموذج الاتصال</h2>
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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS for hover effects -->
    <style>
        .shadow-hover {
            transition: all 0.3s ease;

        }
        .shadow-sm:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transform: translateY(-5px);
            background-color: #f8f9fa;
        }
        .shadow-hover:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transform: translateY(-5px);
            background-color: #f8f9fa;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }
    </style>
@endsection
