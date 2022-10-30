<section class="chat-area pb-0">
    <div class="container-fluid custom-container-fluid">
        <div class="row">
            <div class="col-12 d-flex flex-row-reverse" id="chats-center">
                <div id="live-chat-exp" class="live-chat-col hidden-chat">


                    <div class="chat-popup">
                        <div class="form-container">
                            <div class="live-chat-header">
                                <ul>
                                    <li>
                                        <p><img class="chat-profile-img" src="{{$default_profile_picture}}" alt=""><span class="username">Chat</span> {{-- <span class="is_online"></span> --}}</p>
                                    </li>
                                    {{-- <li><a href="#"><img src="/images-n/icons/call.png" alt=""></a> <a href="#"><img src="/images-n/icons/video.png" alt=""></a></li> --}} <li><a style="cursor: pointer"
                                            class="close-chat"><img src="/images-n/icons/close.png" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="live-chat-content">

                            </div>
                            <div class="live-chat-footer">
                                {{-- <div class="my-icon">
                                    <a href="#"><img src="/images-n/icons/file.png" alt=""></a>
                                </div>
                                <div class="my-icon">
                                    <a href="#"><img src="/images-n/icons/imoje.png" alt=""></a>
                                </div> --}}
                                <div class="input-group">
                                    <input type="text" class="form-control chat-input" placeholder="Write Here">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text button-send">
                                            <a style="cursor: pointer" class="static-anchor"><img
                                                    src="/images-n/icons/send.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


{{-- <div id="chats-center">
    <div id="chat-box" class="chat-box-baby chat-box-display-none" style="position: absolute; width: 300px;bottom: 0px;right:0px;">

        <div class="box box-warning direct-chat direct-chat-warning m-0 p-0">
            <div class="box-header with-border">
                <h3 class="box-title">Chat Messages</h3>
                <div class="box-tools pull-right"><span data-toggle="tooltip" title=""
                                                        class="badge bg-yellow"
                                                        data-original-title="3 New Messages">20</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title=""
                            data-widget="chat-pane-toggle" data-original-title="Contacts"><i
                            class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="direct-chat-messages">

                    <!--
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix"><span
                                class="direct-chat-name pull-left">Timona Siera</span>
                            <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span></div>
                        <img class="direct-chat-img"
                             src="https://img.icons8.com/color/36/000000/administrator-male.png"
                             alt="message user image">
                        <div class="direct-chat-text"> For what reason would it be advisable for me to think
                            about business content?
                        </div>
                    </div>
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix"><span
                                class="direct-chat-name pull-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span></div>
                        <img class="direct-chat-img"
                             src="https://img.icons8.com/office/36/000000/person-female.png"
                             alt="message user image">
                        <div class="direct-chat-text"> Thank you for your believe in our supports</div>
                    </div>
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix"><span
                                class="direct-chat-name pull-left">Timona Siera</span>
                            <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span></div>
                        <img class="direct-chat-img"
                             src="https://img.icons8.com/color/36/000000/administrator-male.png"
                             alt="message user image">
                        <div class="direct-chat-text"> For what reason would it be advisable for me to think
                            about business content?
                        </div>
                    </div>
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix"><span
                                class="direct-chat-name pull-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span></div>
                        <img class="direct-chat-img"
                             src="https://img.icons8.com/office/36/000000/person-female.png"
                             alt="message user image">
                        <div class="direct-chat-text"> I would love to.</div>
                    </div>
                </div>

                -->
                </div>
                <div class="box-footer">

                    <div class="input-group"><input  type="text" name="message"
                                                    placeholder="Type Message ..." class="form-control chat_message">
                        <span class="input-group-btn"> <button onclick="sendmessage()" type="button"
                                                               class="btn btn-warning btn-flat button-send">Send</button> </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> --}}
