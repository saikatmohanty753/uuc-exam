<div>
    <a href="javascript:void(0);" class="header-icon" data-toggle="dropdown"
        title="You got {{ Auth::user()->unreadNotifications->count() }} notifications">
        <i class="fal fa-bell"></i>
        <span class="badge badge-icon">{{ Auth::user()->unreadNotifications->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-animated dropdown-xl">
        <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top mb-2">
            <h4 class="m-0 text-center color-white">
                <small class="mb-0">{{ Auth::user()->unreadNotifications->count() }} New
                    Notifications</small>
            </h4>
        </div>
        <div class="custom-scroll" style="height: 350px">
            <ul class="notification">

                @foreach (Auth::user()->unreadNotifications as $notification)
                    <li class="unread">
                        <div class="d-flex align-items-center show-child-on-hover">
                            @php
                                $url = url('view-notice/' . $notification['data']['notice_id'] . '/' . $notification->id);
                            @endphp
                            <a href="{{ $url }}">
                                <span class="d-flex flex-column flex-1">
                                    <span
                                        class="name d-flex align-items-center">{{ $notification['data']['notice_type'] }} ({{ $notification['data']['notice_name'] }})
                                        <span class="badge badge-success fw-n ml-1">New</span></span>
                                    <span class="msg-a fs-sm">
                                        {{ Str::limit($notification['data']['details'], 100) }}
                                    </span>
                                    <span class="fs-nano text-muted mt-1">{{ App\Helpers\Helpers::noticeTime($notification['data']['notice_id']) }} ago</span>
                                </span>
                            </a>

                        </div>
                    </li>
                @endforeach
                @foreach (Auth::user()->readNotifications as $notification)
                    <li>
                        <div class="d-flex align-items-center show-child-on-hover">
                            @php
                                $url = url('view-notice/' . $notification['data']['notice_id'] . '/' . $notification->id);
                            @endphp
                            <a href="{{ $url }}">
                                <span class="d-flex flex-column flex-1">
                                    <span
                                        class="name d-flex align-items-center">{{ $notification['data']['notice_type'] }} ({{ $notification['data']['notice_name'] }})</span>

                                    <span class="msg-a fs-sm">
                                        {{ Str::limit($notification['data']['details'], 100) }}
                                    </span>
                                    <span class="fs-nano text-muted mt-1">{{ noticeTime($notification['data']['notice_id']) }} ago</span>
                                </span>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        
    </div>
</div>
