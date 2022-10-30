<div id="chat_app" class="d-flex flex-row row-reverse" style="gap:20px;position: fixed; bottom:0px;right:100px;z-index:100;" >
  <chat-window @messagesent="messageSentHandler" v-for="chat in chat_windows" :my_profile_pic_url="my_profile_pic" :user_id="chat.user_id" :my_user_id="chat.my_user_id" :ref="'user_' + chat.user_id" ></chat-window>

</div>
