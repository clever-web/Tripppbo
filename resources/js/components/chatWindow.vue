<template>
    <div v-on:click="isMinimized = false" class="message_box_sm"
        :class="{ message_box_sm_active: isMinimized, chat_hidden: isHidden }">
        <div class="message_box_sm_header justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <a href="#" class="profile_img_sm me-3">
                    <img :src="profile_pic" alt="">
                    <span class="chat_user_status chat_user_status_online me-0"></span>
                </a>
                <a href="#" class="h5 mb-0 text_dark_blue_a text-decoration-none fw_gilroy_bold d-inline-block me-4">
                    {{ username }}</a>
            </div>
            <!--    <a href="#" class="me-3 d-inline-block"><img src="/img/icons8_video_call.svg" alt=""></a>
            <a href="#" class="me-4 d-inline-block"><img src="/img/icons8_call.svg" alt=""></a> -->

            <div>
                <span v-on:click.stop="isMinimized = true" id="message_box_btn_collapse"
                    class="me-3 d-inline-block message_box_action_btn"><img src="/img/icons8_minus.svg" alt=""></span>
                <span v-on:click.stop="isHidden = true" id="message_box_btn_close"
                    class="d-inline-block message_box_action_btn"><img src="/img/icons8_multiply.svg" alt=""></span>
            </div>
        </div>
        <div ref="message_box" class="row_users_charts">
            <!-- 1 -->

            <div v-for="message in messages">
                <div v-if="message.sender_id !== my_user_id" class="user_chart_box">
                    <a href="#"><img :src="profile_pic" alt=""></a>

                    <div class="user_message_box ms-2">
                        <p class="mb-0 text_silver user_txt">{{ message.message.message.message }}</p>
                        <p class="mb-0 text_silver fs_14 ms-2 mt-2">
                            {{ formatDateTime(message.message.message.created_at) }}</p>
                    </div>
                </div>
                <!-- 2 -->
                <div v-if="message.sender_id == my_user_id" class="user_chart_box user_chart_box2">
                    <a href="#"><img :src="my_profile_pic_url" alt=""></a>

                    <div class="user_message_box me-2">
                        <p class="mb-0 text_silver user_txt">{{ message.message.message.message }}
                        </p>
                        <p class="mb-0 text_silver fs_14 me-2 text-end mt-2">{{
                                formatDateTime(message.message.message.created_at)
                        }}</p>
                    </div>
                </div>
            </div>

            <!--       <div v-for="message in messages" class="user_chart_box"
                :class="{ user_chart_box2: message.sender_id !== my_user_id }">
                <a href="#"><img src="/img/user_1_review.svg" alt=""></a>

                <div class="user_message_box"
                    :class="{ 'ms-2': message.sender_id == my_user_id, 'me-2': message.sender_id !== my_user_id }">
                    <p class="mb-0 text_silver user_txt">{{ message.message.message.message }}</p>
                    <p class="mb-0 text_silver fs_14  mt-2"
                        :class="{ 'ms-2': message.sender_id == my_user_id, 'me-2': message.sender_id !== my_user_id, 'text-end': message.sender_id !== my_user_id }">
                        05:40pm</p>
                </div>
            </div> -->


        </div>
        <form onsubmit="return false;" class="user_message_form">
            <!--  <button class="chat_file_btn me-3">
                <img src="/img/icons8_attach.svg" alt="">
                <input type="file" multiple="">
            </button> -->
            <input v-on:keyup.enter.prevent="sendMessage" v-model="currentMessage"
                class="input_user_message fw_gilroy_medium" type="text" placeholder="Type here...">
            <!--        <button class="user_message_emoji me-3"><img src="/img/icons8_happy.svg" alt=""></button> -->
            <button v-on:click.prevent="sendMessage" class="user_message_submit"><img src="/img/icons8_email_send.svg"
                    alt=""></button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';







export default {

    vuetify: new Vuetify(),
    data: function () {
        return {

            username: '',
            profile_pic: '',
            messages: [],
            currentMessage: '',
            isMinimized: false,
            isHidden: false,
            sendingMessage: false,
        };
    },
    props: {

        user_id: null,
        my_user_id: null,
        my_profile_pic_url: null,

    },

    mounted: async function () {

        await this.getChatDetails();
        await this.getChatHistory();


    },

    methods: {
        getChatDetails: async function () {


            try {
                const response = await axios.get('/getChatDetails?user_id=' + this.user_id);
                this.username = response.data.name
                this.profile_pic = response.data.picture_url



                if (this.profile_pic == "no-picutre") {
                    this.profile_pic = '/images-n/profile-picture-place-holder.png'
                }

                if (this.my_profile_pic_url == "/storage/null") {
                    this.my_profile_pic_url = '/images-n/profile-picture-place-holder.png'
                }





            } catch (error) {
                console.log(error);
            }


        },

        getChatHistory: async function () {
            const response = await axios.get('/getChatHistory?user_id=' + this.user_id);
            let messages = response.data.messages
            console.log("from comp")
            console.log(messages)

            for (let c = 0; c < messages.length; c++) {
                this.handleNewMessage({ "message": { "message": messages[c].message, "created_at": messages[c].created_at }, scroll: false }, messages[c].user_id)
            }
            this.scrollToBottom(false);

        },

        scrollToBottom: function (smoothly) {
            if (smoothly) {
                this.$nextTick(() => {

                    this.$refs.message_box.scrollTo({ top: this.$refs.message_box.scrollHeight, behavior: 'smooth' });
                })
            }
            else {
                this.$nextTick(() => {

                    this.$refs.message_box.scrollTo({ top: this.$refs.message_box.scrollHeight });
                })
            }
        },

        handleNewMessage: function (event, user_id) {
            this.messages.push({ sender_id: user_id, message: event });

            if (event.scroll == false) {

            }
            else {
                this.scrollToBottom(true);
            }
        },

        sendMessage: async function () {
            if (this.sendingMessage == true) {
                return
            }
            this.sendingMessage = true;
            if (this.currentMessage == '') {
                return
            }
            let f = new FormData();
            f.append('message', this.currentMessage)
            f.append('receiver_id', this.user_id)
            try {
                await axios.post('/sendchatmessage', f)
                this.handleNewMessage({ "message": { "message": this.currentMessage, 'created_at': moment().format() } }, this.my_user_id)
                let conversation_id = ""
                if (this.user_id > this.my_user_id)
                {
                    conversation_id = this.my_user_id + "_" + this.user_id
                }
                else
                {
                    conversation_id = this.user_id + "_" + this.my_user_id
                }

                this.$emit('messagesent', { "message": {"conversation_id": conversation_id, "message": this.currentMessage, 'time': moment().format(), id: 0, receiver_id: this.user_id, user_id: this.my_user_id } })
                this.currentMessage = ''
            }
            catch (ex) {

            }
            this.sendingMessage = false;

        },
        formatDateTime: function (datetime) {
            let m = moment(datetime)
            return m.format('hh:mm')
        },


        showChat() {
            this.isHidden = false
        }
    },
};
</script>

<style scoped>
</style>

