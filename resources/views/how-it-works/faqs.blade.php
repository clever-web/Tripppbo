    @extends('master')

    @section('content')
    <div class="wrap_body pt-4">
        <!-- 1 -->
            <div class="container-lg pad_lg pt-3">
                <h2 class="h5 text_dark_blue mb-2 text-center">Welcome to the Contact Center</h2>
                <h3 class="h6 text_dark_blue mb-2 text-center">How Can We Help You?</h3>
                <!-- form faq search -->
                    <form class="form_faq_search mt-4">
                        <input class="box_shadow" type="text" placeholder="Type your question here">
                        <button type="submit"><img src="/img/faq_search_icon.svg" alt=""></button>
                    </form>
                    <div class="faq_recent_tag mt-3">
                        <p class="text_dark_blue mb-3">Recent Search</p>
                        <div class="faq_tags">
                            <a href="#" class="faq_tag me-2 box_shadow fs_14">Tags</a>
                            <a href="#" class="faq_tag me-2 box_shadow fs_14">Tags</a>
                        </div>
                    </div>
            </div>

        <!-- 2 -->
            <div class="container-lg pad_lg py-md-5 py-4 pt-5">
                <div class="faq_box_2">
                    <!-- faq box_2 left -->
                        <div class="faq__menu box_shadow">
                            <ul id="faq_ul" class="list-unstyled">
                                <!-- 1 -->
                                    <li>
                                        <a class="faq_link_active" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.119 50.157">
                                                <path id="icons8_airport" d="M47.094.187c-3.787,0-10.248,4.53-11.577,5.946l-6.8,6.8L4.561,9.657a1.01,1.01,0,0,0-.849.315L.283,13.495a.994.994,0,0,0-.252.912.976.976,0,0,0,.6.724l18.624,7.3L9.658,32.212H5.033a1.023,1.023,0,0,0-.661.252l-4.027,3.4a1.017,1.017,0,0,0-.315,1.007,1,1,0,0,0,.724.755l9.595,2.359,2.359,9.595a1.034,1.034,0,0,0,.692.724.971.971,0,0,0,.944-.22l3.429-3.02a1.019,1.019,0,0,0,.346-.755v-5.6L28,31.08,35.2,49.7a.976.976,0,0,0,.723.6,1.063,1.063,0,0,0,.22.031.979.979,0,0,0,.692-.283l3.523-3.429a1.011,1.011,0,0,0,.315-.849L37.4,21.611l6.8-6.8C45.591,13.424,52.418,4.2,49.327.974A3.115,3.115,0,0,0,47.094.187Z" transform="translate(-0.003 -0.188)"/>
                                            </svg>
                                            <span>Flights</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 2 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.615 50.157">
                                                <path id="icons8_hotel_star" d="M11.538,3a.488.488,0,0,0-.473.341L9.92,6.74l-3.586.038a.5.5,0,0,0-.294.907L8.914,9.828l-1.069,3.42a.5.5,0,0,0,.771.558l2.926-2.07,2.926,2.07a.5.5,0,0,0,.771-.558L14.17,9.828l2.875-2.142a.5.5,0,0,0-.3-.907L13.161,6.74l-1.146-3.4A.493.493,0,0,0,11.538,3ZM26.808,3a.493.493,0,0,0-.477.341l-1.146,3.4L21.6,6.778a.5.5,0,0,0-.294.907l2.879,2.142-1.069,3.42a.5.5,0,0,0,.767.558l2.926-2.07,2.926,2.07a.5.5,0,0,0,.771-.558l-1.069-3.42L32.31,7.685a.5.5,0,0,0-.294-.907L28.43,6.74l-1.146-3.4A.493.493,0,0,0,26.808,3ZM42.073,3a.493.493,0,0,0-.477.341L40.45,6.74l-3.586.038a.5.5,0,0,0-.294.907l2.879,2.142-1.069,3.42a.5.5,0,0,0,.767.558l2.926-2.07L45,13.806a.5.5,0,0,0,.771-.558L44.7,9.828l2.875-2.142a.5.5,0,0,0-.294-.907L43.7,6.74l-1.146-3.4A.493.493,0,0,0,42.073,3ZM7.181,18.265a2.181,2.181,0,1,0,0,4.362v30.53H20.265v-10.9H33.35v10.9H46.434V22.627a2.181,2.181,0,1,0,0-4.362Zm4.361,6.542H15.9v4.361H11.542Zm8.723,0h4.361v4.361H20.265Zm8.723,0H33.35v4.361H28.988Zm8.723,0h4.361v4.361H37.711ZM11.542,33.53H15.9v4.361H11.542Zm8.723,0h4.361v4.361H20.265Zm8.723,0H33.35v4.361H28.988Zm8.723,0h4.361v4.361H37.711ZM11.542,42.253H15.9v4.361H11.542Zm26.169,0h4.361v4.361H37.711Z" transform="translate(-5 -3)"/>
                                            </svg>
                                            <span>Hotels</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 3 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.098 36.813">
                                                <path id="icons8_credit_card_cash_withdrawal" d="M6.489,9A4.494,4.494,0,0,0,2,13.489V33.243a4.494,4.494,0,0,0,4.489,4.489H20.855V30.549H43.3V13.489A4.494,4.494,0,0,0,38.813,9ZM3.8,15.285H41.507v4.489H3.8Zm4.489,7.183H22.651v1.8H8.285Zm14.366,9.877V45.813H45.1V32.345Zm3.514,1.8h15.42A1.342,1.342,0,0,0,43.3,35.857V42.3a1.347,1.347,0,0,0-1.719,1.719H26.164A1.342,1.342,0,0,0,24.447,42.3V35.859a1.347,1.347,0,0,0,1.719-1.719Zm7.709,1.8a3.132,3.132,0,0,0-2.355,1,3.3,3.3,0,0,0,0,4.279,3.266,3.266,0,0,0,4.71,0,3.3,3.3,0,0,0,0-4.279A3.132,3.132,0,0,0,33.875,35.936Zm-6.285,1.8a1.311,1.311,0,1,0,1.347,1.31A1.329,1.329,0,0,0,27.589,37.732Zm6.285,0a1.22,1.22,0,0,1,1.012.4,1.506,1.506,0,0,1,0,1.894,1.48,1.48,0,0,1-2.024,0,1.506,1.506,0,0,1,0-1.894A1.22,1.22,0,0,1,33.875,37.732Zm6.285,0a1.311,1.311,0,1,0,1.347,1.31A1.329,1.329,0,0,0,40.16,37.732Z" transform="translate(-2 -9)"/>
                                            </svg>
                                            <span>eCash</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 4 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.882 50.157">
                                                <path id="icons8_subway" d="M16.3,2.5A7.657,7.657,0,0,0,8.5,9.986v29.6a7.525,7.525,0,0,0,5.432,7.138l-4,4a1.133,1.133,0,0,0,1.6,1.6l5.257-5.258H38.1l5.258,5.258a1.133,1.133,0,0,0,1.6-1.6l-4-4a7.525,7.525,0,0,0,5.432-7.138V9.986a7.657,7.657,0,0,0-7.8-7.486Zm2.228,4.457H36.354a1.114,1.114,0,1,1,0,2.228H18.527a1.114,1.114,0,1,1,0-2.228Zm-7.8,6.685h15.6V28.126h-15.6Zm17.827,0h15.6V28.126h-15.6ZM17.413,33.7a3.342,3.342,0,1,1-3.342,3.342A3.343,3.343,0,0,1,17.413,33.7Zm20.055,0a3.342,3.342,0,1,1-3.342,3.342A3.343,3.343,0,0,1,37.468,33.7Z" transform="translate(-8.5 -2.5)"/>
                                            </svg>
                                            <span>Trains</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 5 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.076 50.157">
                                                <path id="icons8_skiing" d="M47.16,2a4.907,4.907,0,1,0,4.907,4.907A4.908,4.908,0,0,0,47.16,2ZM13.01,5.288a1.09,1.09,0,0,0-.792,1.985l11.351,7.432-.175.119v.009a5.988,5.988,0,0,0-.673,9.856l0,.026,8.216,5.8-5.286,6.052a2.682,2.682,0,0,0-.571,3.118L4.619,28.3a1.056,1.056,0,0,0-.52-.141,1.083,1.083,0,0,0-1.073.809,1.1,1.1,0,0,0,.537,1.239L41.5,51.317a.793.793,0,0,0,.085.043,10.655,10.655,0,0,0,3.292.779,6.607,6.607,0,0,0,5.929-2.556,1.108,1.108,0,0,0,.145-1.1,1.091,1.091,0,0,0-1.9-.192,4.239,4.239,0,0,1-4.029,1.67,8.434,8.434,0,0,1-2.53-.584L27.84,41.223a2.7,2.7,0,0,0,1.878-1.082l0,0,7.513-8.565,0-.021a2.67,2.67,0,0,0,.66-1.755,2.718,2.718,0,0,0-1.222-2.27l-7.032-5.5,2.666-1.61-8.736-5.716,1.972-1.316,8.838,5.784,1.333-.8v2.79a3.143,3.143,0,0,0,1.427,2.632l6,3.948,0,0a2.173,2.173,0,1,0,2.308-3.667l0-.009L40.073,20.7V11.813A4.345,4.345,0,0,0,33.156,8.3l-7.615,5.09L13.41,5.45A1.02,1.02,0,0,0,13.01,5.288Z" transform="translate(-2.991 -2)"/>
                                            </svg>
                                            <span>Activities</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 6 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.95 49.911">
                                                <path id="icons8_statue" d="M24.975,0a3.394,3.394,0,0,0-2.589,1.029,5.051,5.051,0,0,0-1,3.962,1.937,1.937,0,0,0,.468,1.31,4.925,4.925,0,0,0,.468,1.123c.058.113.1.214.125.281-.254.129-.733.3-1.092.437a6.124,6.124,0,0,0-3.182,3.213l-.218.468a11.336,11.336,0,0,0-1.373,3.962c0,1.111,1.092,2.156,2.9,3.775.117.105.23.211.343.312a24.9,24.9,0,0,0,.873,7.143c.1,1.864.3,4.153.5,6.395.109,1.228.226,2.437.312,3.525h7.05c.086-1.092.171-2.293.281-3.525.2-2.238.433-4.531.53-6.395a24.448,24.448,0,0,0,.842-7.175c.179-.172.37-.351.561-.53,1.614-1.509,2.589-2.472,2.589-3.525a12.112,12.112,0,0,0-1.591-4.43,6.19,6.19,0,0,0-3.182-3.213l-.25-.094c-.316-.113-.643-.226-.842-.312a2.082,2.082,0,0,1,.125-.312,5.133,5.133,0,0,0,.468-1.185,2.706,2.706,0,0,0,.468-1.123,5.018,5.018,0,0,0-.936-4.024A3.425,3.425,0,0,0,24.975,0ZM16.989,38.93a1,1,0,0,0-1,1v2H33.959v-2a1,1,0,0,0-1-1ZM12,43.922a1,1,0,0,0-1,1v3.993a1,1,0,0,0,1,1H37.952a1,1,0,0,0,1-1V44.92a1,1,0,0,0-1-1Z" transform="translate(-11)"/>
                                            </svg>
                                            <span>Monuments</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 7 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.029 50.157">
                                                <path id="icons8_holiday" d="M22.972,2.781l-7.21,16.881h14.7Zm2.773.8,7.071,15.91,10.33-.936a1.135,1.135,0,0,0,.971-.832,1.086,1.086,0,0,0-.416-1.179Zm-5.615.208L2.451,16.542a1.083,1.083,0,0,0-.416,1.179,1.134,1.134,0,0,0,.971.832l10.4.936Zm1.837,16.985V30.65c.16.108.334.221.485.347l1.733,1.456V20.771ZM45.26,24.1a4.437,4.437,0,1,0,0,8.874,4.492,4.492,0,0,0,1.109-.173L30.563,40.737H3.11A1.109,1.109,0,0,0,2,41.846v3.328A1.109,1.109,0,0,0,3.11,46.283H51.915a1.106,1.106,0,0,0,1.109-1.109V41.846a1.106,1.106,0,0,0-1.109-1.109h-2.5l-1.733-6.1L51.152,32.9a1.113,1.113,0,0,0-.693-2.114,1.07,1.07,0,0,0-.277.1L48,31.967a4.37,4.37,0,0,0,1.7-3.432A4.44,4.44,0,0,0,45.26,24.1ZM36.7,29.645a3.888,3.888,0,0,0-1.491.416L22.694,36.3H7.547A2.2,2.2,0,0,0,5.64,39.628H30.32l10.364-5.2A3.853,3.853,0,0,0,36.7,29.645ZM18.881,31.863a3.605,3.605,0,0,0-2.218.659l-3.778,2.669h9.567l.971-.485L21.03,32.7A3.568,3.568,0,0,0,18.881,31.863Zm26.76,3.813L47.1,40.737H35.554ZM5.328,48.5v3.328a1.109,1.109,0,0,0,1.109,1.109h4.437a1.109,1.109,0,0,0,1.109-1.109V48.5Zm37.713,0v3.328a1.109,1.109,0,0,0,1.109,1.109h4.437A1.109,1.109,0,0,0,49.7,51.829V48.5Z" transform="translate(-1.995 -2.781)"/>
                                            </svg>
                                            <span>Holidays</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 8 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.911 49.911">
                                                <path id="icons8_steering_wheel" d="M26.955,2A24.955,24.955,0,1,0,51.911,26.955,24.983,24.983,0,0,0,26.955,2Zm0,6.51A18.445,18.445,0,1,1,8.51,26.955,18.437,18.437,0,0,1,26.955,8.51Zm0,9.765c-6.772,0-8.024,4.845-15.936,5.372a16.039,16.039,0,0,0,.267,7.648h5.9a5.306,5.306,0,0,1,5.425,5.425v5.9a15.842,15.842,0,0,0,8.68,0v-5.9A5.513,5.513,0,0,1,36.721,31.3h5.9a16.013,16.013,0,0,0,.265-7.652C35.447,23.089,33.7,18.275,26.955,18.275Zm0,4.34a4.34,4.34,0,1,1-4.34,4.34A4.34,4.34,0,0,1,26.955,22.615Z" transform="translate(-2 -2)"/>
                                            </svg>
                                            <span>Self Drive</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 9 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.631 44.041">
                                                <path id="icons8_taxi" d="M25.339,12a3.5,3.5,0,0,0-3.477,3.513V17a15.861,15.861,0,0,0-4.02.869c-1.8.611-4.459,1.526-5.614,3.767-.783,1.526-5.935,15.248-6.519,16.805l-.072.217V52.564a3.484,3.484,0,0,0,3.477,3.477h4.636a3.484,3.484,0,0,0,3.477-3.477V51.405h23.18v1.159a3.484,3.484,0,0,0,3.477,3.477h4.636A3.484,3.484,0,0,0,52,52.564V38.657l-.072-.217c-.122-.326-1.77-4.631-3.4-8.837a1.019,1.019,0,0,1-.036-.109c-1.358-3.5-2.689-6.886-3.115-7.859-.973-2.2-3.654-3.205-5.614-3.767A16.16,16.16,0,0,0,35.77,17V15.513A3.5,3.5,0,0,0,32.293,12Zm3.477,6.954c7.592,0,10.023,1.046,10.033,1.05l.181.072c.874.249,3.545,1,4.2,2.5.389.883,1.589,3.966,2.861,7.244l.109.217c.018.045.014.091.036.145.032.081.077.172.109.254a3.069,3.069,0,0,1,.145,2.535c-.466.688-1.793,1.05-3.767,1.05H14.908c-1.974,0-3.377-.466-3.839-1.159-.543-.806.045-2.246.326-2.934l.109-.217c1.345-3.509,2.5-6.429,2.789-6.99.738-1.431,2.9-2.191,4.346-2.68L18.747,20C18.77,20,21.223,18.954,28.816,18.954ZM5.745,29.385C2.24,29.385,1,31.54,1,33.55c0,.978.439,2.553,3.042,2.753.729-1.933,1.666-4.45,2.608-6.918Zm45.164,0C51.959,32.1,53,34.763,53.589,36.3c2.612-.195,3.042-1.77,3.042-2.753,0-2.01-1.24-4.165-4.745-4.165ZM12.59,38.657h4.636a3.477,3.477,0,1,1,0,6.954c-1.942,0-2.517-.493-4.527-1.63-1.345-.761-2.427-1.49-2.427-3.006A2.317,2.317,0,0,1,12.59,38.657Zm27.816,0h4.636a2.317,2.317,0,0,1,2.318,2.318c0,1.517-1.082,2.246-2.427,3.006-2.006,1.136-2.585,1.63-4.527,1.63a3.477,3.477,0,1,1,0-6.954Z" transform="translate(-1 -12)"/>
                                            </svg>
                                            <span>Cabs</span>
                                        </a>
                                        <span class="faq_line"></span>
                                    </li>
                                <!-- 10 -->
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.676 46.676">
                                                <path id="icons8_bus" d="M11.2,0C5.076,0,2.8,2.024,2.8,7.468V38.274a4.294,4.294,0,0,0,.934,2.859v2.742a2.806,2.806,0,0,0,2.8,2.8h3.734a2.806,2.806,0,0,0,2.8-2.8v-.934H33.607v.934a2.806,2.806,0,0,0,2.8,2.8h3.734a2.806,2.806,0,0,0,2.8-2.8V41.133a4.294,4.294,0,0,0,.934-2.859V8.4c0-4.066-.5-8.4-6.535-8.4ZM14,3.734h19.6a.933.933,0,0,1,.934.934V6.535a.933.933,0,0,1-.934.934H14a.935.935,0,0,1-.934-.934V4.668A.935.935,0,0,1,14,3.734Zm-3.734,6.535H36.407a2.475,2.475,0,0,1,2.8,2.8v11.2a2.891,2.891,0,0,1-2.8,2.742l-26.138.058a2.475,2.475,0,0,1-2.8-2.8v-11.2A2.475,2.475,0,0,1,10.269,10.269Zm-8.4.934A1.871,1.871,0,0,0,0,13.069v7.468A1.871,1.871,0,0,0,1.867,22.4Zm42.942,0V22.4a1.868,1.868,0,0,0,1.867-1.867V13.069A1.868,1.868,0,0,0,44.809,11.2ZM10.735,31.74a3.267,3.267,0,1,1-3.267,3.267A3.267,3.267,0,0,1,10.735,31.74Zm25.2,0a3.267,3.267,0,1,1-3.267,3.267A3.267,3.267,0,0,1,35.94,31.74Z"/>
                                            </svg>
                                            <span>Bus</span>
                                        </a>
                                    </li>
                            </ul>
                            <button class="faq_menu_expand"><img id="faq_btn_img" width="15" src="/img/arrow_down_c.svg" alt=""></button>
                        </div>
                    <!-- faq box_2 right -->
                        <div class="faq_box_2_right box_shadow">
                            <!-- 1 -->
                                <div class="accordion acc_after_border mb-4">
                                    <div class="accordion-item border-0">
                                    <h4 class="mb-0" id="faq_heading_1">
                                        <button class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16 pt-0 pb-2" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_1" aria-expanded="true" aria-controls="faq_collapse_1">
                                            Voluptate fugit deserunt quia a adipisci provident.
                                        </button>
                                    </h4>
                                    <div id="faq_collapse_1" class="accordion-collapse collapse show" aria-labelledby="faq_heading_1">
                                        <div class="accordion-body pt-0 pb-0 px-0">
                                            <p class="fs_14 text_silver mb-0 pb-2">Voluptas sint ipsum nobis amet alias voluptatem. Animi veniam quisquam qui quia aliquid iusto. Non animi unde excepturi dignissimos libero. Quo impedit omnis quia commodi ex. Excepturi quaerat laudantium provident aliquid officia id nihil libero dicta. Qui</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <!-- 2 -->
                                <div class="accordion acc_after_border mb-4">
                                    <div class="accordion-item border-0">
                                    <h4 class="mb-0" id="faq_heading_2">
                                        <button class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16 pt-0 pb-2" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_2" aria-expanded="true" aria-controls="faq_collapse_2">
                                            Debitis rerum dolore qui.
                                        </button>
                                    </h4>
                                    <div id="faq_collapse_2" class="accordion-collapse collapse show" aria-labelledby="faq_heading_2">
                                        <div class="accordion-body pt-0 pb-0 px-0">
                                            <p class="fs_14 text_silver mb-0 pb-2">Cupiditate repellendus aut ab nisi et dolorum praesentium quibusdam. Eos dolores earum labore qui et. Occaecati est corrupti et dignissimos dolores suscipit quidem quo. Molestias at neque. Quam quod aut.</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <!-- 3 -->
                                <div class="accordion acc_after_border mb-4">
                                    <div class="accordion-item border-0">
                                    <h4 class="mb-0" id="faq_heading_3">
                                        <button class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16 pt-0 pb-2" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_3" aria-expanded="true" aria-controls="faq_collapse_3">
                                            Qui blanditiis neque delectus.
                                        </button>
                                    </h4>
                                    <div id="faq_collapse_3" class="accordion-collapse collapse show" aria-labelledby="faq_heading_3">
                                        <div class="accordion-body pt-0 pb-0 px-0">
                                            <p class="fs_14 text_silver mb-0 pb-2">Sint eaque culpa fugit cum facilis. Est voluptatum quo officia enim accusamus eum et. Ipsam qui quas voluptatem perspiciatis ratione consequatur dolorum. Ad omnis sunt blanditiis. Odit voluptatem ipsa et.
                                                Commodi maiores sapiente voluptatem quibusdam at minus temporibus.</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <!-- 4 -->
                                <div class="accordion acc_after_border mb-4">
                                    <div class="accordion-item border-0">
                                    <h4 class="mb-0" id="faq_heading_4">
                                        <button class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16 pt-0 pb-2" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_4" aria-expanded="true" aria-controls="faq_collapse_4">
                                            Quo aut voluptas suscipit harum.
                                        </button>
                                    </h4>
                                    <div id="faq_collapse_4" class="accordion-collapse collapse" aria-labelledby="faq_heading_4">
                                        <div class="accordion-body pt-0 pb-0 px-0">
                                            <p class="fs_14 text_silver mb-0 pb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <!-- 5 -->
                                <div class="accordion acc_after_border mb-4">
                                    <div class="accordion-item border-0">
                                    <h4 class="mb-0" id="faq_heading_5">
                                        <button class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16 pt-0 pb-2" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_5" aria-expanded="true" aria-controls="faq_collapse_5">
                                            Eius blanditiis ratione qui enim quis qui ad non.
                                        </button>
                                    </h4>
                                    <div id="faq_collapse_5" class="accordion-collapse collapse" aria-labelledby="faq_heading_5">
                                        <div class="accordion-body pt-0 pb-0 px-0">
                                            <p class="fs_14 text_silver mb-0 pb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <!-- 6 -->
                                <div class="accordion acc_after_border mb-4">
                                    <div class="accordion-item border-0">
                                    <h4 class="mb-0" id="faq_heading_6">
                                        <button class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16 pt-0 pb-2" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_6" aria-expanded="true" aria-controls="faq_collapse_6">
                                            Laudantium et fugit consequuntur molestiae.
                                        </button>
                                    </h4>
                                    <div id="faq_collapse_6" class="accordion-collapse collapse" aria-labelledby="faq_heading_6">
                                        <div class="accordion-body pt-0 pb-0 px-0">
                                            <p class="fs_14 text_silver mb-0 pb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <!-- 7 -->
                                <div class="accordion acc_after_border mb-4">
                                    <div class="accordion-item border-0">
                                    <h4 class="mb-0" id="faq_heading_7">
                                        <button class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16 pt-0 pb-2" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_7" aria-expanded="true" aria-controls="faq_collapse_7">
                                            Animi a consequatur tempora commodi.
                                        </button>
                                    </h4>
                                    <div id="faq_collapse_7" class="accordion-collapse collapse" aria-labelledby="faq_heading_7">
                                        <div class="accordion-body pt-0 pb-0 px-0">
                                            <p class="fs_14 text_silver mb-0 pb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>

        <!-- 3 -->
            <div class="container-lg pad_lg pt-md-5 pt-4 pb-3">
                <h2 class="text_dark_blue h5 text-center mb-2">Still Problem? How Can We Help You?</h2>
                <p class="text_dark_blue h6 text-center mb-4">Still Problem? How Can We Help You?</p>
                <a href="#" class="btn_c_center_faq text-decoration-none text-center">Contact us</a>
            </div>

            <div class="contact_city_box">
                <img src="/img/contact_city.svg" alt="">
            </div>
    
    </div>
    @endsection

    @section('scripts-links')
    <script>
        if(document.getElementsByClassName('child_select_box').length > 0){
            let select_box = document.querySelectorAll(".child_select_box");
            for(let i = 0;i < select_box.length;i++){
                NiceSelect.bind(select_box[i]);
            }
        }

        let faq_menu_expand = document.querySelector(".faq_menu_expand");
        let faq_ul = document.querySelector("#faq_ul");
        let faq_btn_img = document.querySelector("#faq_btn_img");

        faq_menu_expand.addEventListener("click", (e) => {
            faq_ul.classList.toggle("faq_ul_active");

            if(faq_ul.classList.contains("faq_ul_active")){
                faq_btn_img.style.marginTop = `-5px`;
                faq_btn_img.src = `img/arrow_up_c.svg`;
            }else{
                faq_btn_img.style.marginTop = `0`;
                faq_btn_img.src = `img/arrow_down_c.svg`;
            }
        })

    </script>
    @endsection
