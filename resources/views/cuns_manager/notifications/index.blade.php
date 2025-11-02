@extends('cuns_manager.layouts.main')

@section('title', 'Notifications - Construction Manager')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    
    <!-- Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold py-3 mb-0">
                    <span class="text-muted fw-light">Notifications /</span> Alerts & Messages
                </h4>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#notificationSettingsModal">
                        <span class="material-icons-round me-2">settings</span>
                        Settings
                    </button>
                    <button class="btn btn-primary" onclick="markAllAsRead()">
                        <span class="material-icons-round me-2">mark_email_read</span>
                        Mark All Read
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Statistics -->
    <div class="row mb-4">
        <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-info">
                        <h6 class="card-title text-muted mb-2">Total</h6>
                        <h4 class="text-primary mb-0">{{ $stats['total'] }}</h4>
                        <small class="text-muted">All Notifications</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-info">
                        <h6 class="card-title text-muted mb-2">Unread</h6>
                        <h4 class="text-warning mb-0">{{ $stats['unread'] }}</h4>
                        <small class="text-muted">Require Attention</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-info">
                        <h6 class="card-title text-muted mb-2">Today</h6>
                        <h4 class="text-info mb-0">{{ $stats['today'] }}</h4>
                        <small class="text-muted">New Today</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-info">
                        <h6 class="card-title text-muted mb-2">Critical</h6>
                        <h4 class="text-danger mb-0">{{ $stats['critical'] }}</h4>
                        <small class="text-muted">High Priority</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-info">
                        <h6 class="card-title text-muted mb-2">This Week</h6>
                        <h4 class="text-success mb-0">{{ $stats['this_week'] }}</h4>
                        <small class="text-muted">Weekly Count</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-info">
                        <h6 class="card-title text-muted mb-2">Archived</h6>
                        <h4 class="text-secondary mb-0">{{ $stats['archived'] }}</h4>
                        <small class="text-muted">Old Notifications</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-outline-primary active" onclick="filterNotifications('all')">
                            All ({{ $stats['total'] }})
                        </button>
                        <button class="btn btn-outline-warning" onclick="filterNotifications('unread')">
                            <span class="material-icons-round me-1" style="font-size: 16px;">mark_unread</span>
                            Unread ({{ $stats['unread'] }})
                        </button>
                        <button class="btn btn-outline-danger" onclick="filterNotifications('critical')">
                            <span class="material-icons-round me-1" style="font-size: 16px;">priority_high</span>
                            Critical ({{ $stats['critical'] }})
                        </button>
                        <button class="btn btn-outline-info" onclick="filterNotifications('tasks')">
                            <span class="material-icons-round me-1" style="font-size: 16px;">task</span>
                            Tasks ({{ $stats['tasks'] }})
                        </button>
                        <button class="btn btn-outline-success" onclick="filterNotifications('projects')">
                            <span class="material-icons-round me-1" style="font-size: 16px;">construction</span>
                            Projects ({{ $stats['projects'] }})
                        </button>
                        <button class="btn btn-outline-secondary" onclick="filterNotifications('system')">
                            <span class="material-icons-round me-1" style="font-size: 16px;">settings</span>
                            System ({{ $stats['system'] }})
                        </button>
                        <div class="ms-auto d-flex gap-2">
                            <button class="btn btn-outline-secondary" onclick="clearAllNotifications()">
                                <span class="material-icons-round me-2">delete_sweep</span>
                                Clear All
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <span class="material-icons-round me-2">sort</span>
                                    Sort By
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="sortNotifications('newest')">Newest First</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="sortNotifications('oldest')">Oldest First</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="sortNotifications('priority')">Priority</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="sortNotifications('type')">Type</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Notifications</h5>
                    <div class="d-flex gap-2">
                        <div class="input-group input-group-merge" style="width: 300px;">
                            <span class="input-group-text">
                                <span class="material-icons-round">search</span>
                            </span>
                            <input type="text" class="form-control" placeholder="Search notifications..." id="searchNotifications">
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="notifications-list">
                        @if(count($notifications) > 0)
                            @foreach($notifications as $notification)
                            <div class="notification-item border-bottom p-4 {{ $notification['is_read'] ? '' : 'bg-light' }}" 
                                 data-type="{{ $notification['type'] }}" data-priority="{{ $notification['priority'] }}">
                                <div class="d-flex align-items-start">
                                    <!-- Notification Icon -->
                                    <div class="notification-icon me-3">
                                        <span class="material-icons-round {{ $notification['icon_color'] }} p-2 rounded-circle" 
                                              style="background: {{ $notification['icon_bg'] }}; font-size: 20px;">
                                            {{ $notification['icon'] }}
                                        </span>
                                    </div>
                                    
                                    <!-- Notification Content -->
                                    <div class="notification-content flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-1 {{ $notification['is_read'] ? '' : 'fw-bold' }}">
                                                    {{ $notification['title'] }}
                                                    @if(!$notification['is_read'])
                                                    <span class="badge bg-warning ms-2">New</span>
                                                    @endif
                                                </h6>
                                                <p class="mb-2 text-muted">{{ $notification['message'] }}</p>
                                            </div>
                                            <div class="text-end">
                                                <small class="text-muted">{{ $notification['time_ago'] }}</small>
                                                @if($notification['priority'] == 'critical')
                                                <span class="badge bg-danger ms-1">Critical</span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <!-- Notification Meta -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-2">
                                                <span class="badge bg-light text-dark">{{ $notification['category'] }}</span>
                                                @if($notification['project_name'])
                                                <span class="badge bg-outline-primary">{{ $notification['project_name'] }}</span>
                                                @endif
                                                @if($notification['task_name'])
                                                <span class="badge bg-outline-info">{{ $notification['task_name'] }}</span>
                                                @endif
                                            </div>
                                            <div class="notification-actions">
                                                @if(!$notification['is_read'])
                                                <button class="btn btn-sm btn-outline-success me-1" onclick="markAsRead('{{ $notification['id'] }}')">
                                                    <span class="material-icons-round" style="font-size: 16px;">check</span>
                                                </button>
                                                @endif
                                                <button class="btn btn-sm btn-outline-primary me-1" onclick="viewNotificationDetails('{{ $notification['id'] }}')">
                                                    <span class="material-icons-round" style="font-size: 16px;">visibility</span>
                                                </button>
                                                @if($notification['action_url'])
                                                <button class="btn btn-sm btn-outline-info me-1" onclick="takeAction('{{ $notification['id'] }}', '{{ $notification['action_url'] }}')">
                                                    <span class="material-icons-round" style="font-size: 16px;">launch</span>
                                                </button>
                                                @endif
                                                <button class="btn btn-sm btn-outline-danger" onclick="deleteNotification('{{ $notification['id'] }}')">
                                                    <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <div class="text-center py-5">
                            <span class="material-icons-round text-muted mb-3" style="font-size: 64px;">notifications_off</span>
                            <h5 class="text-muted">No Notifications</h5>
                            <p class="text-muted">You're all caught up! No new notifications at the moment.</p>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Load More -->
                @if($hasMore)
                <div class="card-footer text-center">
                    <button class="btn btn-outline-primary" onclick="loadMoreNotifications()">
                        <span class="material-icons-round me-2">expand_more</span>
                        Load More Notifications
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions Panel -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="quick-action-card text-center p-3 border rounded" onclick="manageSubscription()">
                                <span class="material-icons-round text-primary mb-2" style="font-size: 48px;">notifications_active</span>
                                <h6>Manage Subscriptions</h6>
                                <small class="text-muted">Notification preferences</small>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="quick-action-card text-center p-3 border rounded" onclick="setPriorityRules()">
                                <span class="material-icons-round text-success mb-2" style="font-size: 48px;">priority_high</span>
                                <h6>Priority Rules</h6>
                                <small class="text-muted">Set alert rules</small>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="quick-action-card text-center p-3 border rounded" onclick="viewNotificationHistory()">
                                <span class="material-icons-round text-info mb-2" style="font-size: 48px;">history</span>
                                <h6>View History</h6>
                                <small class="text-muted">Past notifications</small>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="quick-action-card text-center p-3 border rounded" onclick="exportNotifications()">
                                <span class="material-icons-round text-warning mb-2" style="font-size: 48px;">download</span>
                                <h6>Export</h6>
                                <small class="text-muted">Download records</small>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="quick-action-card text-center p-3 border rounded" onclick="testNotification()">
                                <span class="material-icons-round text-danger mb-2" style="font-size: 48px;">campaign</span>
                                <h6>Test Alert</h6>
                                <small class="text-muted">Send test notification</small>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="quick-action-card text-center p-3 border rounded" onclick="openHelp()">
                                <span class="material-icons-round text-secondary mb-2" style="font-size: 48px;">help</span>
                                <h6>Help</h6>
                                <small class="text-muted">Get assistance</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Notification Settings Modal -->
<div class="modal fade" id="notificationSettingsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="notificationSettingsForm">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <h6 class="mb-3">Notification Channels</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                                        <label class="form-check-label" for="pushNotifications">
                                            Push Notifications
                                        </label>
                                    </div>
                                    <small class="text-muted">Receive real-time browser notifications</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                        <label class="form-check-label" for="emailNotifications">
                                            Email Notifications
                                        </label>
                                    </div>
                                    <small class="text-muted">Receive notifications via email</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="smsNotifications">
                                        <label class="form-check-label" for="smsNotifications">
                                            SMS Notifications
                                        </label>
                                    </div>
                                    <small class="text-muted">Receive critical alerts via SMS</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="desktopNotifications">
                                        <label class="form-check-label" for="desktopNotifications">
                                            Desktop Alerts
                                        </label>
                                    </div>
                                    <small class="text-muted">Show desktop notifications</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <h6 class="mb-3">Notification Types</h6>
                            <div class="row">
                                @foreach($notificationTypes as $type)
                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="type{{ $type['id'] }}" {{ $type['enabled'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type{{ $type['id'] }}">
                                            {{ $type['name'] }}
                                        </label>
                                    </div>
                                    <small class="text-muted">{{ $type['description'] }}</small>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <h6 class="mb-3">Quiet Hours</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="quietStart" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="quietStart" value="22:00">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quietEnd" class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="quietEnd" value="07:00">
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="criticalDuringQuiet">
                                        <label class="form-check-label" for="criticalDuringQuiet">
                                            Allow critical notifications during quiet hours
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <h6 class="mb-3">Auto-Cleanup</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="autoDeleteRead" class="form-label">Delete Read Notifications After</label>
                                    <select class="form-select" id="autoDeleteRead">
                                        <option value="7">7 days</option>
                                        <option value="30" selected>30 days</option>
                                        <option value="90">90 days</option>
                                        <option value="never">Never</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="autoArchiveOld" class="form-label">Archive Old Notifications After</label>
                                    <select class="form-select" id="autoArchiveOld">
                                        <option value="30">30 days</option>
                                        <option value="90" selected>90 days</option>
                                        <option value="180">180 days</option>
                                        <option value="365">1 year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveNotificationSettings()">Save Settings</button>
            </div>
        </div>
    </div>
</div>

<style>
.notification-item {
    transition: all 0.3s ease;
}

.notification-item:hover {
    background-color: #f8f9fa !important;
}

.notification-item.unread {
    background-color: #fffbeb !important;
    border-left: 4px solid #f59e0b;
}

.quick-action-card {
    transition: all 0.3s ease;
    cursor: pointer;
    background: white;
}

.quick-action-card:hover {
    border-color: #3b82f6 !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.bg-outline-primary {
    background-color: transparent;
    border: 1px solid #3b82f6;
    color: #3b82f6;
}

.bg-outline-info {
    background-color: transparent;
    border: 1px solid #06b6d4;
    color: #06b6d4;
}

.notification-actions .btn {
    padding: 4px 8px;
}

.form-switch .form-check-input:checked {
    background-color: #3b82f6;
    border-color: #3b82f6;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize search functionality
    const searchInput = document.getElementById('searchNotifications');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const items = document.querySelectorAll('.notification-item');
            
            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                item.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    }

    // Request notification permission
    if ('Notification' in window) {
        Notification.requestPermission();
    }

    // Check for new notifications every 30 seconds
    setInterval(checkNewNotifications, 30000);
});

function filterNotifications(filter) {
    const items = document.querySelectorAll('.notification-item');
    const filterButtons = document.querySelectorAll('.btn-outline-primary');
    
    // Update active button
    filterButtons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    items.forEach(item => {
        if (filter === 'all') {
            item.style.display = '';
        } else if (filter === 'unread') {
            item.style.display = item.classList.contains('bg-light') ? '' : 'none';
        } else {
            item.style.display = item.dataset.type === filter || item.dataset.priority === filter ? '' : 'none';
        }
    });
}

function sortNotifications(criteria) {
    console.log('Sorting notifications by:', criteria);
    // Implement sorting logic
    showToast(`Notifications sorted by ${criteria}`, 'info');
}

function markAsRead(notificationId) {
    console.log('Marking notification as read:', notificationId);
    
    // Update UI immediately
    const notificationItem = event.target.closest('.notification-item');
    notificationItem.classList.remove('bg-light');
    notificationItem.querySelector('.fw-bold')?.classList.remove('fw-bold');
    notificationItem.querySelector('.badge.bg-warning')?.remove();
    
    // Update stats
    updateUnreadCount(-1);
    
    // API call to mark as read
    // fetch(`/notifications/${notificationId}/read`, { method: 'POST' });
    
    showToast('Notification marked as read', 'success');
}

function markAllAsRead() {
    if (confirm('Are you sure you want to mark all notifications as read?')) {
        console.log('Marking all notifications as read');
        
        // Update UI
        document.querySelectorAll('.notification-item').forEach(item => {
            item.classList.remove('bg-light');
            item.querySelector('.fw-bold')?.classList.remove('fw-bold');
            item.querySelector('.badge.bg-warning')?.remove();
        });
        
        // Update stats
        updateUnreadCount(-{{ $stats['unread'] }});
        
        // API call to mark all as read
        // fetch('/notifications/mark-all-read', { method: 'POST' });
        
        showToast('All notifications marked as read', 'success');
    }
}

function viewNotificationDetails(notificationId) {
    console.log('Viewing notification details:', notificationId);
    // Implement view details functionality
    // window.location.href = `/notifications/${notificationId}`;
}

function takeAction(notificationId, actionUrl) {
    console.log('Taking action for notification:', notificationId);
    window.location.href = actionUrl;
}

function deleteNotification(notificationId) {
    if (confirm('Are you sure you want to delete this notification?')) {
        console.log('Deleting notification:', notificationId);
        
        // Remove from UI
        const notificationItem = event.target.closest('.notification-item');
        notificationItem.style.opacity = '0';
        setTimeout(() => notificationItem.remove(), 300);
        
        // Update stats
        updateTotalCount(-1);
        if (notificationItem.classList.contains('bg-light')) {
            updateUnreadCount(-1);
        }
        
        // API call to delete
        // fetch(`/notifications/${notificationId}`, { method: 'DELETE' });
        
        showToast('Notification deleted', 'success');
    }
}

function clearAllNotifications() {
    if (confirm('Are you sure you want to clear all notifications? This action cannot be undone.')) {
        console.log('Clearing all notifications');
        
        // Remove all from UI
        document.querySelectorAll('.notification-item').forEach(item => {
            item.style.opacity = '0';
            setTimeout(() => item.remove(), 300);
        });
        
        // Reset stats
        updateTotalCount(-{{ $stats['total'] }});
        updateUnreadCount(-{{ $stats['unread'] }});
        
        // API call to clear all
        // fetch('/notifications/clear-all', { method: 'POST' });
        
        showToast('All notifications cleared', 'success');
    }
}

function loadMoreNotifications() {
    console.log('Loading more notifications');
    // Implement load more functionality
    showToast('Loading more notifications...', 'info');
}

function manageSubscription() {
    console.log('Managing subscription');
    // Implement subscription management
    showToast('Opening subscription settings...', 'info');
}

function setPriorityRules() {
    console.log('Setting priority rules');
    // Implement priority rules
    showToast('Opening priority rules...', 'info');
}

function viewNotificationHistory() {
    console.log('Viewing notification history');
    window.location.href = '/notifications/history';
}

function exportNotifications() {
    console.log('Exporting notifications');
    // Implement export functionality
    showToast('Exporting notifications...', 'info');
}

function testNotification() {
    console.log('Sending test notification');
    
    if ('Notification' in window && Notification.permission === 'granted') {
        new Notification('Test Notification', {
            body: 'This is a test notification from Construction Manager',
            icon: '/favicon.ico',
            tag: 'test'
        });
    }
    
    showToast('Test notification sent!', 'success');
}

function openHelp() {
    console.log('Opening help');
    window.open('/help/notifications', '_blank');
}

function saveNotificationSettings() {
    const settings = {
        pushNotifications: document.getElementById('pushNotifications').checked,
        emailNotifications: document.getElementById('emailNotifications').checked,
        smsNotifications: document.getElementById('smsNotifications').checked,
        desktopNotifications: document.getElementById('desktopNotifications').checked,
        quietStart: document.getElementById('quietStart').value,
        quietEnd: document.getElementById('quietEnd').value,
        criticalDuringQuiet: document.getElementById('criticalDuringQuiet').checked,
        autoDeleteRead: document.getElementById('autoDeleteRead').value,
        autoArchiveOld: document.getElementById('autoArchiveOld').value
    };
    
    // Add notification types
    settings.notificationTypes = [];
    document.querySelectorAll('input[type="checkbox"][id^="type"]').forEach(checkbox => {
        settings.notificationTypes.push({
            id: checkbox.id.replace('type', ''),
            enabled: checkbox.checked
        });
    });
    
    console.log('Saving notification settings:', settings);
    // Implement settings save
    
    const modal = bootstrap.Modal.getInstance(document.getElementById('notificationSettingsModal'));
    modal.hide();
    
    showToast('Notification settings saved successfully!', 'success');
}

function checkNewNotifications() {
    console.log('Checking for new notifications...');
    // Implement check for new notifications
    // fetch('/notifications/check-new')
    // .then(response => response.json())
    // .then(data => {
    //     if (data.has_new) {
    //         showNewNotification(data.notification);
    //     }
    // });
}

function showNewNotification(notification) {
    if ('Notification' in window && Notification.permission === 'granted') {
        new Notification(notification.title, {
            body: notification.message,
            icon: '/favicon.ico',
            tag: notification.id
        });
    }
    
    // Play sound
    const audio = new Audio('/sounds/notification.mp3');
    audio.play().catch(() => {});
    
    // Update badge count
    updateUnreadCount(1);
    updateTotalCount(1);
}

function updateUnreadCount(change) {
    const unreadElement = document.querySelector('.btn-outline-warning');
    const currentCount = parseInt(unreadElement.textContent.match(/\d+/)[0]);
    const newCount = Math.max(0, currentCount + change);
    unreadElement.innerHTML = unreadElement.innerHTML.replace(/\d+/, newCount);
}

function updateTotalCount(change) {
    const totalElement = document.querySelector('.btn-outline-primary');
    const currentCount = parseInt(totalElement.textContent.match(/\d+/)[0]);
    const newCount = Math.max(0, currentCount + change);
    totalElement.innerHTML = totalElement.innerHTML.replace(/\d+/, newCount);
}

function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 1055; min-width: 300px;';
    toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey || e.metaKey) {
        switch(e.key) {
            case 'r':
                e.preventDefault();
                markAllAsRead();
                break;
            case 'd':
                e.preventDefault();
                clearAllNotifications();
                break;
            case 's':
                e.preventDefault();
                document.getElementById('notificationSettingsModal').click();
                break;
        }
    }
});

// Enable service worker for push notifications
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js')
    .then(registration => {
        console.log('Service Worker registered:', registration);
    })
    .catch(error => {
        console.log('Service Worker registration failed:', error);
    });
}
</script>
@endsection