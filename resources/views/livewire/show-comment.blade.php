<div>
    <div class="container mt-3">
        <h2>التعليقات</h2>
        @if ($Comments->isNotEmpty())
            <div class="row">
                @foreach ($Comments as $comment)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <div class="comment-box shadow-hover p-3 border rounded">
                            <h5 class="mb-0">{{ $comment->user->name }}</h5>
                            <p>{{ $comment->content }}</p>
                            <div class="text-muted">
                                <small>تم النشر في {{ $comment->created_at->format('d M Y - H:i') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- زر "عرض المزيد" --}}
            <div class="text-center">
                <button wire:click="loadMore" class="btn btn-primary mt-3">عرض المزيد</button>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                لا توجد تعليقات على هذا الإعلان.
            </div>
        @endif
    </div>
</div>
