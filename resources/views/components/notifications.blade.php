<div>
    @forelse (Auth::user()->unreadNotifications as $notification)
    <a class="dropdown-item" href="{{ route("markAsRead", ["nId" =>  $notification->id]) }}"><strong>{{ $notification->data['user']['name'] }}</strong> create a new post "{{ Str::limit($notification->data['post']['post'], 20) }}</a>
    @empty
    <a id="no-notification-available" class="dropdown-item" href="#">No notification available</a>
    @endforelse
    <hr class="mb-0"/>
    <a id="no-notification-available" class="dropdown-item text-right" href="{{ route("markAsAllRead") }}">Clear</a>
</div>