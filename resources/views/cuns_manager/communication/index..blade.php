@extends('cuns_manager.layouts.main')

@section('title', 'Communication Center - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Communication /</span> Messages & Collaboration
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#broadcastModal">
                            <span class="material-icons-round me-2">campaign</span>
                            Broadcast Message
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newMessageModal">
                            <span class="material-icons-round me-2">add</span>
                            New Message
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Communication Overview Stats -->
        <div class="row mb-4">
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-primary bg-gradient-primary rounded-circle mb-2">
                            <span class="material-icons-round text-white">chat</span>
                        </div>
                        <h3 class="card-title mb-1">47</h3>
                        <small class="text-muted">Unread Messages</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-success bg-gradient-success rounded-circle mb-2">
                            <span class="material-icons-round text-white">groups</span>
                        </div>
                        <h3 class="card-title mb-1">12</h3>
                        <small class="text-muted">Active Groups</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-warning bg-gradient-warning rounded-circle mb-2">
                            <span class="material-icons-round text-white">campaign</span>
                        </div>
                        <h3 class="card-title mb-1">8</h3>
                        <small class="text-muted">Pending Announcements</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-info bg-gradient-info rounded-circle mb-2">
                            <span class="material-icons-round text-white">priority_high</span>
                        </div>
                        <h3 class="card-title mb-1">5</h3>
                        <small class="text-muted">Urgent Messages</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-danger bg-gradient-danger rounded-circle mb-2">
                            <span class="material-icons-round text-white">schedule</span>
                        </div>
                        <h3 class="card-title mb-1">3</h3>
                        <small class="text-muted">Overdue Replies</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-secondary bg-gradient-secondary rounded-circle mb-2">
                            <span class="material-icons-round text-white">attach_file</span>
                        </div>
                        <h3 class="card-title mb-1">24</h3>
                        <small class="text-muted">Shared Files</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Urgent Alerts -->
        <div class="row mb-4">
            <div class="col-md-8">
                <!-- Urgent Messages Alert -->
                <div class="card border-warning">
                    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">
                            <span class="material-icons-round me-2">priority_high</span>
                            Urgent Messages Requiring Attention
                        </h6>
                        <span class="badge bg-dark">5 Unread</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start p-3 border rounded bg-light-warning">
                                    <img src="/assets/img/avatars/avatar-1.png" class="rounded-circle me-3" width="40"
                                        height="40">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <h6 class="mb-0">Site Safety Issue</h6>
                                            <span class="badge bg-danger">URGENT</span>
                                        </div>
                                        <p class="mb-1 small text-muted">Safety concerns reported at Site B requiring
                                            immediate attention...</p>
                                        <small class="text-muted">
                                            <span class="material-icons-round" style="font-size: 14px;">schedule</span>
                                            10 minutes ago • Site Manager
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start p-3 border rounded bg-light-warning">
                                    <img src="/assets/img/avatars/avatar-2.png" class="rounded-circle me-3" width="40"
                                        height="40">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <h6 class="mb-0">Material Delivery Delay</h6>
                                            <span class="badge bg-danger">URGENT</span>
                                        </div>
                                        <p class="mb-1 small text-muted">Concrete delivery delayed due to transportation
                                            strike...</p>
                                        <small class="text-muted">
                                            <span class="material-icons-round" style="font-size: 14px;">schedule</span>
                                            25 minutes ago • Procurement
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Quick Actions -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary text-start"
                                onclick="window.location.href='{{ route('communication.announcement') }}'">
                                <span class="material-icons-round me-2">campaign</span>
                                Create Announcement
                            </button>
                            <button class="btn btn-outline-success text-start" data-bs-toggle="modal"
                                data-bs-target="#createGroupModal">
                                <span class="material-icons-round me-2">group_add</span>
                                Create New Group
                            </button>
                            <button class="btn btn-outline-warning text-start" data-bs-toggle="modal"
                                data-bs-target="#scheduleMessageModal">
                                <span class="material-icons-round me-2">schedule_send</span>
                                Schedule Message
                            </button>
                            <button class="btn btn-outline-info text-start" onclick="exportChatHistory()">
                                <span class="material-icons-round me-2">history</span>
                                Export Chat History
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Sidebar - Conversations & Groups -->
            <div class="col-md-4">
                <!-- Search & Filter -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search conversations..."
                                id="conversationSearch">
                            <button class="btn btn-outline-primary" type="button">
                                <span class="material-icons-round">search</span>
                            </button>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <select class="form-select form-select-sm" id="conversationFilter">
                                    <option value="all">All Chats</option>
                                    <option value="unread">Unread</option>
                                    <option value="groups">Groups</option>
                                    <option value="important">Important</option>
                                    <option value="archived">Archived</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select form-select-sm" id="siteFilter">
                                    <option value="all">All Sites</option>
                                    <option value="site1">Site A</option>
                                    <option value="site2">Site B</option>
                                    <option value="site3">Site C</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Conversations List -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Conversations</h5>
                        <span class="badge bg-primary rounded-pill">12</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush" id="conversationsList">
                            @foreach ($conversations as $conversation)
                                <a href="#"
                                    class="list-group-item list-group-item-action conversation-item {{ $conversation['active'] ? 'active' : '' }} {{ $conversation['unread'] ? 'unread' : '' }}"
                                    data-conversation-id="{{ $conversation['id'] }}"
                                    onclick="loadConversation({{ $conversation['id'] }})">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="d-flex align-items-center w-100">
                                            <div class="position-relative me-3">
                                                <img src="{{ $conversation['avatar'] }}" class="rounded-circle"
                                                    width="45" height="45">
                                                @if ($conversation['online'])
                                                    <span
                                                        class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white"
                                                        style="width: 12px; height: 12px;"></span>
                                                @endif
                                                @if ($conversation['is_group'])
                                                    <span
                                                        class="position-absolute top-0 end-0 bg-info rounded-circle border border-2 border-white"
                                                        style="width: 16px; height: 16px; display: flex; align-items: center; justify-content: center;">
                                                        <span class="material-icons-round text-white"
                                                            style="font-size: 10px;">groups</span>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 me-2" style="min-width: 0;">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <h6 class="mb-0 text-truncate">{{ $conversation['name'] }}</h6>
                                                    <small class="text-muted">{{ $conversation['time'] }}</small>
                                                </div>
                                                <p
                                                    class="mb-0 small text-truncate {{ $conversation['unread'] ? 'fw-medium text-dark' : 'text-muted' }}">
                                                    @if ($conversation['last_sender'] && !$conversation['is_group'])
                                                        <span class="fw-medium">{{ $conversation['last_sender'] }}:</span>
                                                    @endif
                                                    {{ $conversation['last_message'] }}
                                                </p>
                                                @if ($conversation['is_group'])
                                                    <small class="text-muted">{{ $conversation['member_count'] }}
                                                        members</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end">
                                            @if ($conversation['unread'])
                                                <span
                                                    class="badge bg-primary rounded-pill mb-1">{{ $conversation['unread'] }}</span>
                                            @endif
                                            @if ($conversation['important'])
                                                <span class="material-icons-round text-warning"
                                                    style="font-size: 16px;">star</span>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($conversation['attachments'] > 0)
                                        <div class="mt-1">
                                            <small class="text-muted">
                                                <span class="material-icons-round"
                                                    style="font-size: 14px;">attach_file</span>
                                                {{ $conversation['attachments'] }} files
                                            </small>
                                        </div>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Active Groups -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Active Groups</h6>
                    </div>
                    <div class="card-body">
                        @foreach ($activeGroups as $group)
                            <div class="d-flex align-items-center mb-3 group-item">
                                <div class="avatar avatar-sm bg-{{ $group['color'] }} rounded-circle me-3">
                                    <span class="material-icons-round text-white" style="font-size: 16px;">groups</span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 small">{{ $group['name'] }}</h6>
                                    <small class="text-muted">{{ $group['online'] }}/{{ $group['total'] }} online</small>
                                </div>
                                <span class="badge bg-{{ $group['activity_color'] }}">{{ $group['activity'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Content - Chat Area -->
            <div class="col-md-8">
                <div class="card h-100">
                    <!-- Chat Header -->
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <div class="d-flex align-items-center">
                            <div class="position-relative me-3">
                                <img src="/assets/img/avatars/avatar-team.png" class="rounded-circle" width="45"
                                    height="45">
                                <span
                                    class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white"
                                    style="width: 12px; height: 12px;"></span>
                            </div>
                            <div>
                                <h6 class="mb-0">Site Managers Group</h6>
                                <small class="text-muted">
                                    <span class="badge bg-success">12 online</span>
                                    <span class="ms-2">Last active: 2 min ago</span>
                                </small>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" title="Voice Call">
                                <span class="material-icons-round">call</span>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" title="Video Call">
                                <span class="material-icons-round">video_call</span>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip"
                                title="Search in Chat">
                                <span class="material-icons-round">search</span>
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-round">more_vert</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#groupInfoModal">
                                            <span class="material-icons-round me-2" style="font-size: 16px;">info</span>
                                            Group Info
                                        </a></li>
                                    <li><a class="dropdown-item" href="#" onclick="exportGroupChat()">
                                            <span class="material-icons-round me-2"
                                                style="font-size: 16px;">download</span>
                                            Export Chat
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span class="material-icons-round me-2"
                                                style="font-size: 16px;">notifications_off</span>
                                            Mute Notifications
                                        </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">
                                            <span class="material-icons-round me-2"
                                                style="font-size: 16px;">exit_to_app</span>
                                            Leave Group
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Messages Area -->
                    <div class="card-body position-relative" style="height: 500px; overflow-y: auto;" id="chatMessages">
                        <!-- Date Separator -->
                        <div class="text-center my-4">
                            <span class="badge bg-light text-dark">Today</span>
                        </div>

                        <!-- Messages will be loaded here -->
                        @foreach ($messages as $message)
                            <div class="d-flex mb-4 message-item {{ $message['outgoing'] ? 'justify-content-end' : '' }}"
                                data-message-id="{{ $message['id'] }}">
                                @if (!$message['outgoing'])
                                    <img src="{{ $message['avatar'] }}" class="rounded-circle me-3" width="40"
                                        height="40" data-bs-toggle="tooltip" title="{{ $message['sender'] }}">
                                @endif
                                <div class="message-content {{ $message['outgoing'] ? 'text-end' : '' }}"
                                    style="max-width: 70%;">
                                    @if (!$message['outgoing'] && $message['is_group'])
                                        <small class="text-muted fw-medium mb-1 d-block">{{ $message['sender'] }}</small>
                                    @endif
                                    <div
                                        class="message-bubble {{ $message['outgoing'] ? 'bg-primary text-white' : 'bg-light' }} p-3 rounded position-relative">
                                        @if ($message['important'])
                                            <span
                                                class="position-absolute top-0 start-0 translate-middle material-icons-round text-warning"
                                                style="font-size: 14px;">star</span>
                                        @endif
                                        <p class="mb-1">{{ $message['text'] }}</p>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <small class="{{ $message['outgoing'] ? 'text-white-50' : 'text-muted' }}">
                                                {{ $message['time'] }}
                                            </small>
                                            @if ($message['outgoing'])
                                                <div class="d-flex align-items-center">
                                                    @if ($message['read'])
                                                        <span class="material-icons-round text-white-50"
                                                            style="font-size: 14px;">done_all</span>
                                                    @elseif($message['delivered'])
                                                        <span class="material-icons-round text-white-50"
                                                            style="font-size: 14px;">done_all</span>
                                                    @else
                                                        <span class="material-icons-round text-white-50"
                                                            style="font-size: 14px;">check</span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    @if ($message['attachment'])
                                        <div class="mt-2">
                                            <div
                                                class="card border-0 bg-{{ $message['outgoing'] ? 'primary' : 'light' }}">
                                                <div class="card-body py-2">
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="material-icons-round {{ $message['outgoing'] ? 'text-white' : 'text-primary' }} me-2">
                                                            {{ $message['attachment']['icon'] }}
                                                        </span>
                                                        <div class="flex-grow-1">
                                                            <small
                                                                class="{{ $message['outgoing'] ? 'text-white' : 'fw-medium' }} d-block">
                                                                {{ $message['attachment']['name'] }}
                                                            </small>
                                                            <small
                                                                class="{{ $message['outgoing'] ? 'text-white-50' : 'text-muted' }}">
                                                                {{ $message['attachment']['size'] }}
                                                            </small>
                                                        </div>
                                                        <button
                                                            class="btn btn-sm {{ $message['outgoing'] ? 'btn-light' : 'btn-outline-primary' }}"
                                                            onclick="downloadAttachment({{ $message['id'] }})">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">download</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Message Reactions -->
                                    @if ($message['reactions'])
                                        <div class="mt-1">
                                            @foreach ($message['reactions'] as $reaction)
                                                <span class="badge bg-light text-dark small me-1">
                                                    {{ $reaction['emoji'] }} {{ $reaction['count'] }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                @if ($message['outgoing'])
                                    <div class="dropdown ms-2">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown">
                                            <span class="material-icons-round" style="font-size: 16px;">more_vert</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="editMessage({{ $message['id'] }})">Edit</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="replyToMessage({{ $message['id'] }})">Reply</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="forwardMessage({{ $message['id'] }})">Forward</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-danger" href="#"
                                                    onclick="deleteMessage({{ $message['id'] }})">Delete</a></li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <!-- Typing Indicator -->
                        <div class="d-flex mb-4 typing-indicator" style="display: none !important;">
                            <img src="/assets/img/avatars/avatar-1.png" class="rounded-circle me-3" width="40"
                                height="40">
                            <div>
                                <div class="message-bubble bg-light p-3 rounded">
                                    <div class="typing-dots">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reply Preview -->
                    <div class="border-top" id="replyPreview" style="display: none;">
                        <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                            <div>
                                <small class="fw-medium">Replying to <span id="replySender">User</span></small>
                                <p class="mb-0 small text-muted" id="replyText">Message text...</p>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" onclick="cancelReply()">
                                <span class="material-icons-round" style="font-size: 16px;">close</span>
                            </button>
                        </div>
                    </div>

                    <!-- Message Input Area -->
                    <div class="card-footer">
                        <form id="messageForm" class="d-flex align-items-center">
                            <input type="hidden" id="replyTo" name="reply_to">

                            <!-- Attachment Button -->
                            <div class="dropdown me-2">
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                    <span class="material-icons-round">attach_file</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="triggerFileInput('document')">
                                            <span class="material-icons-round me-2"
                                                style="font-size: 16px;">description</span>
                                            Document
                                        </a></li>
                                    <li><a class="dropdown-item" href="#" onclick="triggerFileInput('image')">
                                            <span class="material-icons-round me-2" style="font-size: 16px;">image</span>
                                            Image
                                        </a></li>
                                    <li><a class="dropdown-item" href="#" onclick="triggerFileInput('video')">
                                            <span class="material-icons-round me-2"
                                                style="font-size: 16px;">videocam</span>
                                            Video
                                        </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="showLocationPicker()">
                                            <span class="material-icons-round me-2"
                                                style="font-size: 16px;">location_on</span>
                                            Location
                                        </a></li>
                                </ul>
                            </div>

                            <!-- File Input (Hidden) -->
                            <input type="file" id="fileInput" multiple class="d-none" accept="*/*">

                            <!-- Message Input -->
                            <div class="flex-grow-1 me-2">
                                <textarea class="form-control" id="messageInput" name="message" rows="1" placeholder="Type your message..."
                                    style="resize: none;"></textarea>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip"
                                    title="Emoji">
                                    <span class="material-icons-round">mood</span>
                                </button>
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip"
                                    title="Mark Important">
                                    <span class="material-icons-round">star_border</span>
                                </button>
                                <button type="submit" class="btn btn-primary" id="sendButton">
                                    <span class="material-icons-round">send</span>
                                </button>
                            </div>
                        </form>

                        <!-- File Preview -->
                        <div id="filePreview" class="mt-2" style="display: none;">
                            <div class="d-flex align-items-center border rounded p-2 bg-light">
                                <span class="material-icons-round text-primary me-2">description</span>
                                <div class="flex-grow-1">
                                    <small class="fw-medium d-block" id="fileName">file.name</small>
                                    <small class="text-muted" id="fileSize">0 KB</small>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFile()">
                                    <span class="material-icons-round" style="font-size: 16px;">close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modals -->
    @include('cuns_manager.communication.modals.new-message')
    @include('cuns_manager.communication.modals.broadcast')
    @include('cuns_manager.communication.modals.create-group')
    @include('cuns_manager.communication.modals.schedule-message')
    @include('cuns_manager.communication.modals.group-info')

    <style>
        .conversation-item {
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
        }

        .conversation-item:hover {
            background-color: #f8f9fa;
            border-left-color: #3b82f6;
        }

        .conversation-item.active {
            background-color: #e7f1ff;
            border-left-color: #3b82f6;
        }

        .conversation-item.unread {
            background-color: #f0f7ff;
            border-left-color: #0d6efd;
        }

        .message-bubble {
            max-width: 100%;
            position: relative;
        }

        .message-bubble.bg-primary:after {
            content: '';
            position: absolute;
            right: -8px;
            top: 10px;
            border: 8px solid transparent;
            border-left-color: #3b82f6;
        }

        .message-bubble.bg-light:after {
            content: '';
            position: absolute;
            left: -8px;
            top: 10px;
            border: 8px solid transparent;
            border-right-color: #f8f9fa;
        }

        .typing-dots {
            display: flex;
            align-items: center;
        }

        .typing-dots span {
            height: 8px;
            width: 8px;
            background-color: #6c757d;
            border-radius: 50%;
            display: block;
            margin: 0 1px;
            animation: typing 1s infinite ease-in-out;
        }

        .typing-dots span:nth-child(1) {
            animation-delay: 0.2s;
        }

        .typing-dots span:nth-child(2) {
            animation-delay: 0.4s;
        }

        .typing-dots span:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes typing {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .message-item {
            transition: all 0.2s ease;
        }

        .message-item:hover {
            background-color: #fafafa;
        }

        .group-item {
            transition: all 0.2s ease;
            padding: 8px;
            border-radius: 6px;
        }

        .group-item:hover {
            background-color: #f8f9fa;
        }

        #chatMessages::-webkit-scrollbar {
            width: 6px;
        }

        #chatMessages::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #chatMessages::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        #chatMessages::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        .bg-light-warning {
            background-color: #fffbf0 !important;
            border-color: #ffeeba !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeCommunication();
            loadInitialData();
        });

        function initializeCommunication() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Auto-resize textarea
            const messageInput = document.getElementById('messageInput');
            messageInput.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Message form submission
            document.getElementById('messageForm').addEventListener('submit', function(e) {
                e.preventDefault();
                sendMessage();
            });

            // Conversation search
            document.getElementById('conversationSearch').addEventListener('input', function() {
                filterConversations(this.value);
            });

            // Load first conversation
            if (document.querySelector('.conversation-item')) {
                const firstConversation = document.querySelector('.conversation-item');
                loadConversation(firstConversation.dataset.conversationId);
            }

            // Auto-scroll to bottom of chat
            scrollToBottom();
        }

        function loadInitialData() {
            // Simulate loading unread counts and other initial data
            updateUnreadCounts();
            checkUrgentMessages();
        }

        function loadConversation(conversationId) {
            console.log('Loading conversation:', conversationId);

            // Update active state
            document.querySelectorAll('.conversation-item').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelector(`[data-conversation-id="${conversationId}"]`).classList.add('active');

            // Show loading state
            const chatMessages = document.getElementById('chatMessages');
            chatMessages.innerHTML = `
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2 text-muted">Loading messages...</p>
        </div>
    `;

            // Simulate API call
            setTimeout(() => {
                // In real implementation, load messages from server
                chatMessages.innerHTML = `
            <div class="text-center my-4">
                <span class="badge bg-light text-dark">Today</span>
            </div>
            <!-- Messages would be loaded here -->
        `;
                scrollToBottom();
                markConversationAsRead(conversationId);
            }, 1000);
        }

        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const message = messageInput.value.trim();
            const replyTo = document.getElementById('replyTo').value;
            const fileInput = document.getElementById('fileInput');

            if (!message && !fileInput.files.length) {
                showToast('Please enter a message or attach a file', 'warning');
                return;
            }

            // Show sending state
            const sendButton = document.getElementById('sendButton');
            const originalContent = sendButton.innerHTML;
            sendButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span>';
            sendButton.disabled = true;

            // Simulate sending
            setTimeout(() => {
                // In real implementation, send to server
                console.log('Sending message:', {
                    message,
                    replyTo,
                    files: fileInput.files
                });

                // Clear input
                messageInput.value = '';
                messageInput.style.height = 'auto';
                document.getElementById('replyTo').value = '';
                document.getElementById('replyPreview').style.display = 'none';
                document.getElementById('filePreview').style.display = 'none';
                fileInput.value = '';

                // Reset button
                sendButton.innerHTML = originalContent;
                sendButton.disabled = false;

                showToast('Message sent successfully', 'success');
                scrollToBottom();
            }, 500);
        }

        function filterConversations(searchTerm) {
            const items = document.querySelectorAll('.conversation-item');
            const term = searchTerm.toLowerCase();

            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(term)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function scrollToBottom() {
            const chatMessages = document.getElementById('chatMessages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function markConversationAsRead(conversationId) {
            // Update UI
            const conversationItem = document.querySelector(`[data-conversation-id="${conversationId}"]`);
            conversationItem.classList.remove('unread');

            // Remove unread badge
            const badge = conversationItem.querySelector('.badge');
            if (badge) {
                badge.remove();
            }

            // Update counts
            updateUnreadCounts();
        }

        function updateUnreadCounts() {
            // Update header badge and other counts
            const unreadCount = document.querySelectorAll('.conversation-item.unread').length;
            console.log('Unread conversations:', unreadCount);
        }

        function checkUrgentMessages() {
            // Check for urgent messages that need attention
            console.log('Checking for urgent messages...');
        }

        function triggerFileInput(type) {
            const fileInput = document.getElementById('fileInput');

            // Set accept attribute based on type
            switch (type) {
                case 'image':
                    fileInput.accept = 'image/*';
                    break;
                case 'video':
                    fileInput.accept = 'video/*';
                    break;
                case 'document':
                    fileInput.accept = '.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx';
                    break;
                default:
                    fileInput.accept = '*/*';
            }

            fileInput.click();

            fileInput.onchange = function() {
                if (this.files.length > 0) {
                    const file = this.files[0];
                    showFilePreview(file);
                }
            };
        }

        function showFilePreview(file) {
            const filePreview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');

            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            filePreview.style.display = 'block';
        }

        function removeFile() {
            document.getElementById('fileInput').value = '';
            document.getElementById('filePreview').style.display = 'none';
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function replyToMessage(messageId) {
            const messageElement = document.querySelector(`[data-message-id="${messageId}"]`);
            const messageText = messageElement.querySelector('.message-bubble p').textContent;
            const sender = messageElement.querySelector('[data-bs-toggle="tooltip"]')?.title || 'User';

            document.getElementById('replyTo').value = messageId;
            document.getElementById('replySender').textContent = sender;
            document.getElementById('replyText').textContent = messageText;
            document.getElementById('replyPreview').style.display = 'block';

            // Scroll to input
            document.getElementById('messageInput').focus();
        }

        function cancelReply() {
            document.getElementById('replyTo').value = '';
            document.getElementById('replyPreview').style.display = 'none';
        }

        function editMessage(messageId) {
            const messageElement = document.querySelector(`[data-message-id="${messageId}"]`);
            const messageText = messageElement.querySelector('.message-bubble p').textContent;

            // Replace message with edit input
            const messageBubble = messageElement.querySelector('.message-bubble');
            messageBubble.innerHTML = `
        <div class="d-flex gap-2">
            <input type="text" class="form-control form-control-sm" value="${messageText}">
            <button class="btn btn-sm btn-success" onclick="saveEdit(${messageId})">
                <span class="material-icons-round" style="font-size: 16px;">check</span>
            </button>
            <button class="btn btn-sm btn-secondary" onclick="cancelEdit(${messageId})">
                <span class="material-icons-round" style="font-size: 16px;">close</span>
            </button>
        </div>
    `;
        }

        function saveEdit(messageId) {
            // Save edited message
            console.log('Saving edited message:', messageId);
            showToast('Message updated successfully', 'success');
        }

        function cancelEdit(messageId) {
            // Cancel editing
            console.log('Canceling edit for message:', messageId);
        }

        function forwardMessage(messageId) {
            console.log('Forwarding message:', messageId);
            // Show forward modal
            showToast('Select recipients to forward message', 'info');
        }

        function deleteMessage(messageId) {
            if (confirm('Are you sure you want to delete this message?')) {
                console.log('Deleting message:', messageId);
                showToast('Message deleted successfully', 'success');
            }
        }

        function downloadAttachment(messageId) {
            console.log('Downloading attachment for message:', messageId);
            showToast('Download started...', 'info');
        }

        function exportGroupChat() {
            console.log('Exporting group chat');
            showToast('Preparing chat export...', 'info');
        }

        function exportChatHistory() {
            console.log('Exporting chat history');
            showToast('Preparing chat history export...', 'info');
        }

        // Quick Actions
        function createAnnouncement() {
            window.location.href = '{{ route('communication.announcement') }}';
        }

        // Utility Functions
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            toast.style.cssText = 'top: 20px; right: 20px; z-index: 1060; min-width: 300px;';
            toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 4000);
        }

        // Auto-check for new messages
        setInterval(() => {
            if (document.visibilityState === 'visible') {
                checkNewMessages();
            }
        }, 30000);

        function checkNewMessages() {
            console.log('Checking for new messages...');
            // In real implementation, this would poll the server for new messages
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl + K for search
            if (e.ctrlKey && e.key === 'k') {
                e.preventDefault();
                document.getElementById('conversationSearch').focus();
            }

            // Escape to cancel reply
            if (e.key === 'Escape') {
                cancelReply();
            }
        });
    </script>
@endsection
