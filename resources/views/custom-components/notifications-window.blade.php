    <div id="notifications_app" class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1000; min-width:400px;">
        <notification-item  v-for="notification in notifications" :title="notification.title" :text="notification.text" :link="notification.link"></notification-item>
    </div>
