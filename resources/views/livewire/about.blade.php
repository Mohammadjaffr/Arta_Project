@extends('layouts.master')
@section('title', 'من نحن')
@section('contact')

    <style>
        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;

        }
    </style>

    <div id="d" class="container rounded-5 my-5" dir="rtl" style="background-color: rgba(188,210,218,0.69)">
        <div class="">
            <div class=" p-4">
                <h1 class="text-center mb-4">من نحن</h1>
                <p class="lead text-center">مرحبًا بكم في <strong>حراج</strong>، المنصة الأولى التي تهدف إلى تسهيل عملية البيع والشراء بين المستخدمين في [البلد أو المنطقة]. نحن نقدم لكم مساحة آمنة وسهلة الاستخدام للعثور على ما تبحثون عنه أو لعرض منتجاتكم وخدماتكم.</p>

                <div class="row mt-4">
                    <div class=" col-md-6 mb-4 hover-effect">
                        <div class="h-100">
                            <div class="">
                                <h2><i class="fas fa-eye"></i> رؤيتنا</h2>
                                <p>رؤيتنا هي أن نكون الوجهة الأولى للأفراد والشركات الذين يبحثون عن حلول سريعة وموثوقة للبيع والشراء في [البلد أو المنطقة].</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 mb-4 hover-effect">
                        <div class="h-100">
                            <div class="">
                                <h2><i class="fas fa-bullseye"></i> مهمتنا</h2>
                                <p>مهمتنا هي توفير منصة سهلة الاستخدام وآمنة تمكن المستخدمين من التواصل بسلاسة، مع ضمان تجربة مستخدم ممتازة وجودة عالية للخدمات المقدمة.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 mb-4 hover-effect">
                        <div class="h-100">
                            <div class="">
                                <h2><i class="fas fa-handshake"></i> قيمنا</h2>
                                <p>نؤمن بالشفافية، الأمان، والجودة. نحرص على توفير بيئة آمنة ومريحة لجميع المستخدمين.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 hover-effect">
                        <div class="h-100">
                            <div class="">
                                <h2><i class="fas fa-users"></i> فريق العمل</h2>
                                <p>نحن فريق من المحترفين الذين يعملون بجد لتطوير وتحسين المنصة لتلبية احتياجاتكم. نهدف دائمًا إلى تقديم أفضل الخدمات والدعم الفني.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12 hover-effect">
                        <div class="">
                            <div class="">
                                <h2><i class="fas fa-star"></i> لماذا نحن؟</h2>
                                <p>نحن نتميز بسهولة الاستخدام، الأمان، والدعم الفني المتواصل. نقدم لكم تجربة فريدة ومميزة في عالم البيع والشراء.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
