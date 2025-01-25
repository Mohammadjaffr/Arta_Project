@extends('layouts.master')
@section('title', 'من نحن')
@section('contact')

    <style>
        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .d {
            color: #01496B;
        }
    </style>

    <div id="d" class="container rounded-5 my-5" dir="rtl" style="background-color: rgba(255,255,255,0.36)">
        <div class="">
            <div class="col-md-12 d ">
                <div class="d rounded-3 hover-effect">
                    <h1 class="text-center mb-4">من نحن</h1>
                    <p class="lead text-center">مرحبًا بكم في <strong>عرطه</strong>، المنصة الرائدة في [البلد أو المنطقة] التي تهدف إلى تسهيل عملية البيع والشراء بين الأفراد والشركات. نقدم لكم مساحة آمنة وسهلة الاستخدام للعثور على ما تبحثون عنه أو لعرض منتجاتكم وخدماتكم بكل سلاسة.</p>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 mb-4 hover-effect rounded-3">
                        <div class="h-100">
                            <div class="d rounded-3">
                                <h2><i class="fas fa-eye"></i> رؤيتنا</h2>
                                <p>رؤيتنا في <strong>عرطه</strong> هي أن نكون الوجهة الأولى للأفراد والشركات الذين يبحثون عن حلول سريعة وموثوقة للبيع والشراء في [البلد أو المنطقة]. نطمح إلى إنشاء مجتمع رقمي متكامل يلبي احتياجات المستخدمين بكل كفاءة واحترافية.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 hover-effect rounded-3">
                        <div class="h-100">
                            <div class="d rounded-3">
                                <h2><i class="fas fa-bullseye"></i> مهمتنا</h2>
                                <p>مهمتنا في <strong>عرطه</strong> هي توفير منصة سهلة الاستخدام وآمنة تمكن المستخدمين من التواصل بسلاسة، مع ضمان تجربة مستخدم ممتازة وجودة عالية للخدمات المقدمة. نحرص على توفير بيئة موثوقة ومريحة لجميع المستخدمين.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 mb-4 hover-effect rounded-3">
                        <div class="h-100">
                            <div class="d rounded-3">
                                <h2><i class="fas fa-handshake"></i> قيمنا</h2>
                                <p>نؤمن في <strong>عرطه</strong> بالشفافية، الأمان، والجودة. نحرص على توفير بيئة آمنة ومريحة لجميع المستخدمين، مع ضمان تجربة تسوق ممتعة وفعالة. نلتزم بتقديم أفضل الخدمات والدعم الفني لضمان رضاكم التام.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 hover-effect rounded-3">
                        <div class="h-100 rounded-3">
                            <div class="d rounded-3">
                                <h2><i class="fas fa-users"></i> فريق العمل</h2>
                                <p>نحن في <strong>عرطه</strong> فريق من المحترفين الذين يعملون بجد لتطوير وتحسين المنصة لتلبية احتياجاتكم. نهدف دائمًا إلى تقديم أفضل الخدمات والدعم الفني، مع التركيز على تجربة المستخدم والابتكار المستمر.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12 hover-effect rounded-3">
                        <div class="d rounded-3">
                            <div class="rounded-3">
                                <h2><i class="fas fa-star"></i> لماذا نحن؟</h2>
                                <p>نتميز في <strong>عرطه</strong> بسهولة الاستخدام، الأمان، والدعم الفني المتواصل. نقدم لكم تجربة فريدة ومميزة في عالم البيع والشراء، مع ضمان جودة عالية للخدمات المقدمة. نحرص على توفير منصة متكاملة تلبي جميع احتياجاتكم.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12 hover-effect rounded-3">
                        <div class="d">
                            <div class="">
                                <h2><i class="fas fa-cogs"></i> خدماتنا</h2>
                                <p>نقدم في <strong>عرطه</strong> مجموعة واسعة من الخدمات التي تشمل:</p>
                                <ul>
                                    <li>بيع وشراء المنتجات الجديدة والمستعملة.</li>
                                    <li>عرض الخدمات المحلية بكل سهولة.</li>
                                    <li>دعم فني متواصل على مدار الساعة.</li>
                                    <li>بيئة آمنة ومحمية لجميع المعاملات.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12 hover-effect rounded-3">
                        <div class="d ">
                            <div class="">
                                <h2><i class="fas fa-heart"></i> التزامنا تجاه المجتمع</h2>
                                <p>نحن في <strong>عرطه</strong> نؤمن بأهمية المساهمة في تنمية المجتمع. لذلك، نحرص على دعم المبادرات المحلية وتشجيع الأعمال الصغيرة من خلال توفير منصة سهلة الوصول لجميع المستخدمين.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
