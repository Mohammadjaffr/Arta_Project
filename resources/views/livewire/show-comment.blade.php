<div>
    <div class="container mt-3">
        <h2>التعليقات</h2>
        @if ($comments->isNotEmpty())
            <div class="comments-section mt-3 p-1">
                @foreach ($comments as $comment)

                    <div class="comment-card p-4 mb-3">
                        <div class="user-info d-flex align-items-center mb-3">
                            <img src="http://127.0.0.1:8000/{{$comment->user->image}}" class="img-fluid" alt="صورة المستخدم">
                            <div class="d-flex flex-column">
                                <span class="user-name fw-bold">{{$comment->user->name}}</span>
                                <span class="comment-date">{{ $comment->created_at->translatedFormat('j F Y - H:i')}}</span>
                            </div>
                        </div>
                        <div class="comment-content">
                            <p>{{$comment->content}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                لا توجد تعليقات على هذا الإعلان.
            </div>
        @endif

        @if($showLoadMore)
        <div class="text-center">
            <button wire:click="loadMoreComments" class="btn btn-primary mt-3">عرض المزيد</button>
        </div>
        @endif
    </div>
</div>
