<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class NotificationsNav extends Component
{
    use WithPagination;

    public $perPage = 1;
    public $showAll = false;
    public $isDropdownOpen = false;

    public function loadMore()
    {
        $this->perPage += 1;
    }

    public function showAllNotifications()
    {
        $this->showAll = true;
        $this->perPage = Auth::user()->unreadNotifications->count();
        $this->isDropdownOpen = true;
    }

    public function toggleDropdown()
    {
        $this->isDropdownOpen = !$this->isDropdownOpen;
    }

    public function render()
    {
        $query = Auth::user()->unreadNotifications()
            ->whereNotNull('data->user_id')
            ->orderByDesc('created_at');

        if (!$this->showAll) {
            $query->limit($this->perPage);
        }

        $notifications = $query->get()
            ->groupBy('data.user_id')
            ->map(function ($notifications) {
                $latest = $notifications->first();
                $user = User::find($latest->data['user_id']);

                return [
                    'notification' => $latest,
                    'user' => $user,
                    'count' => $notifications->count(),
                    'is_online' => optional($user)->isOnline() ?? false,
                    'message' => Str::limit($latest->data['message'] ?? __('New notification'), 60)
                ];
            });

        return view('livewire.notifications-nav', [
            'notifications' => $notifications,
            'totalUnread' => Auth::user()->unreadNotifications->count(),
            'hasMore' => Auth::user()->unreadNotifications->count() > $this->perPage && !$this->showAll
        ]);
    }
}
