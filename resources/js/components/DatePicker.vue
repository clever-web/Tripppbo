    <template>


        <div class="ticket_box_row_bottom" style="min-width:400px;">

            <!-- 2 / 3 -->
            <div class="wrap_date_input wrap_date_input_sign_in">
                <div v-if="!full_width" class="wrap_date_after_box"></div>

                <!-- calendar box -->
                <div class="wrap_calendar wrap_calendar_2">
                    <div class="calendar_top">
                        <div class="trip_date">
                            <h5 class="trip_start mb-0 h6"><span class="start_day">{{start_day}}</span>, <span
                                    class="start_month">{{start_month}}</span> <span
                                    class="start_date">{{start_date}}</span></h5>
                            <span v-if="isRange"><i class="fas fa-long-arrow-alt-right mx-4"></i></span>
                            <h5 v-if="isRange" class="trip_end mb-0 h6"><span class="end_day">{{end_day}}</span>, <span
                                    class="end_month">{{end_month}}</span> <span class="end_date">{{end_date}}</span></h5>
                        </div>
                        <div class="calendar_top_child">
                            <div class="lowest_fare me-3">
                                <p class="mb-0 d-flex align-items-center fs_14"><span></span> Lowest fare
                                </p>
                            </div>
                            <div class="holidays">
                                <p class="mb-0 d-flex align-items-center fs_14"><span></span> Holidays</p>
                            </div>
                        </div>
                        <div class="reset_calendar d-flex justify-content-end py-2">
                            <p class="mb-0">reset</p>
                        </div>
                    </div>
                    <div :id="'calendar_box' + unique_id" class="calendar_box">
                    </div>
                </div>
            </div>

        </div>
    </template>
    <script>


    export default {
        data: function () {
            return {
                day_active: 2,
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                current_date: null,
                current_date_object: null,
                first_date_object: null,
                first_date: null,
                second_date_object: null,
                second_date: null,
                should_scroll: true,
                input_element: null,
                isRange: false,
                full_width: false,





                start_day: '',
                start_month: '',
                start_date: '',
                end_day: '',
                end_month: '',
                end_date: '',

            };
        },
        props: {
            range: true,
            unique_id: 0,
            holiday_days: 0,
            is_for_holiday: false


        },
        watch: {
            range: function (val) {
                this.switchMode(val);
            }
        },

        methods: {


            selectSecondDate: function (date) {
                let m_date = moment(date, 'YYYY-MM-DD')


                this.end_trip('11', '11', '2022')
                this.configure_calendar();
                this.day_active = 2;
            },

            switchMode: function (isRange) {

                this.isRange = isRange;

                this.activate_date_picker(this.input_element, this.first_date, this.second_date);


            },

            activate_date_picker: function (input_element, initial_first_date = null, initial_second_date = null, is_attached = true) {

                let self = this
                this.resetCalendar();
                if (this.isRange == false) {
                    this.day_active = 1;

                }

                this.current_date = moment().format('YYYY-MM-DD')
                this.current_date_object = moment()
                if (initial_first_date == null) {
                    this.first_date_object = moment().add('3', 'days');
                    this.first_date = this.first_date_object.format('YYYY-MM-DD');
                }
                else {
                    this.first_date_object = moment(initial_first_date)
                    this.first_date = this.first_date_object.format('YYYY-MM-DD');
                }


                if (this.isRange) {
                    this.day_active = 2;
                    if (initial_second_date == null) {
                        this.second_date_object = moment().add('10', 'days');
                        this.second_date = this.second_date_object.format('YYYY-MM-DD');
                    }
                    else {
                        this.second_date_object = moment(initial_second_date)
                        this.second_date = this.second_date_object.format('YYYY-MM-DD');
                    }



                }
                $('#calendar_box' + this.unique_id).off('jqyc.dayChoose');
                $('#calendar_box' + this.unique_id).on('jqyc.dayChoose', function (event) {





                    let choosenDay = $(this).data('day-of-month');
                    let choosenMonth = $(this).data('month');
                    let choosenYear = $(this).data('year');


                    let current_day_object = moment(choosenYear + '-' + choosenMonth + '-' + choosenDay, 'YYYY-MM-DD')
                    if (current_day_object.diff(this.current_date_object, 'days') < 0) {
                        console.log("cancelled")
                        return;
                    }



                    if (self.isRange) {
                        if (self.day_active == 2) {

                            self.resetCalendar(self);

                        }
                    }
                    else {
                        if (self.day_active == 1) {

                            self.resetCalendar(self);

                        }
                    }



                    choosenDay = $(this).data('day-of-month');
                    choosenMonth = $(this).data('month');
                    choosenYear = $(this).data('year');


                    /*     if ($(".day_active").length == 2) {
                            $(".reset_calendar").addClass("reset_calendar_active");
                            $(".reset_calendar").on("click", () => {

                            })
                        } */
                    /*     if ($(".day_active").length == 0) {
                            this.day_active = 0;
                        } */


                    if (self.day_active == 1) {
                        let sday = choosenDay;
                        let smonth = choosenMonth;
                        let syear = choosenYear;
                        self.end_trip(sday, smonth, syear);
                        self.configure_calendar();
                        self.day_active = 2;
                    }
                    if (self.day_active == 0) {

                        let sday = choosenDay;
                        let smonth = choosenMonth;
                        let syear = choosenYear;
                        self.start_trip(sday, smonth, syear);
                        self.configure_calendar();
                        self.day_active = 1;


                        if (self.is_for_holiday == true) {
                            let sday = choosenDay;
                            let smonth = choosenMonth;
                            let syear = choosenYear;


                            let my_date = moment(`${syear}-${smonth}-${sday}`, "YYYY-MM-DD");

                            my_date.add(parseInt(self.holiday_days), 'days');

                            self.end_trip(my_date.date(), my_date.month() + 1, my_date.year());

                            self.configure_calendar();
                            self.day_active = 2;
                        }

                    }



                });





                this.configure_calendar();
                console.log("done")
                let self2 = this;

                $('#calendar_box' + this.unique_id).on('jqyc.changeYearToNext', function (event) {

                    self.configure_calendar();
                });


                $('#calendar_box' + this.unique_id).on('jqyc.changeYearToPrevious', function (event) {
                    console.log("xxx")

                    self.configure_calendar();
                });
            },

            attach_date_picker: function (input_element, initial_first_date = null, initial_second_date = null, is_attached = true, full_width = false) {


                this.full_width = full_width;
                if (is_attached == true) {

                    // calendar show when focus
                    this.input_element = input_element;
                    let input__date = input_element;
                    let wrap_calendar = document.querySelector(".wrap_calendar");
                    let wrap_date_after_box = document.querySelector(".wrap_date_after_box");

                    for (let i = 0; i < input__date.length; i++) {
                        input__date[i].addEventListener("focus", (e) => {
                            input__date[0].setAttribute("style", `position: relative;z-index: 42;`)
                            if (input__date.length > 1) {
                                input__date[1].setAttribute("style", `position: relative;z-index: 42;`)

                            }
                            wrap_calendar?.classList.add("wrap_calendar_active");
                            wrap_date_after_box?.classList.add("wrap_date_after_box_active");
                        })

                        wrap_date_after_box.addEventListener("click", (e) => {
                            input__date[0].removeAttribute("style");
                            if (input__date.length > 1) {
                                input__date[1].removeAttribute("style");
                            }

                            wrap_calendar?.classList.remove("wrap_calendar_active");
                            e.target?.classList.remove("wrap_date_after_box_active")
                        })
                    }



                    $('#calendar_box' + this.unique_id).calendar({
                        startFromSunday: true,
                        l10n: {
                            // months
                            jan: "January",
                            feb: "February",
                            mar: "March",
                            apr: "April",
                            may: "May",
                            jun: "June",
                            jul: "July",
                            aug: "August",
                            sep: "September",
                            oct: "October",
                            nov: "November",
                            dec: "December",
                            // days
                            mn: "M",
                            tu: "T",
                            we: 'W',
                            th: 'TH',
                            fr: 'F',
                            sa: 'SA',
                            su: 'S'
                        }
                    });
                    this.activate_date_picker(input_element, initial_first_date, initial_second_date)

                }
                else {


                    // calendar show when focus
                    this.input_element = input_element;
                    let input__date = input_element;
                    let wrap_calendar = document.querySelector(".wrap_calendar");
                    let wrap_date_after_box = document.querySelector(".wrap_date_after_box");




                    wrap_calendar?.classList.add("wrap_calendar_active");
                    wrap_date_after_box?.classList.add("wrap_date_after_box_active");




                    $('#calendar_box' + this.unique_id).calendar({
                        startFromSunday: true,
                        l10n: {
                            // months
                            jan: "January",
                            feb: "February",
                            mar: "March",
                            apr: "April",
                            may: "May",
                            jun: "June",
                            jul: "July",
                            aug: "August",
                            sep: "September",
                            oct: "October",
                            nov: "November",
                            dec: "December",
                            // days
                            mn: "M",
                            tu: "T",
                            we: 'W',
                            th: 'TH',
                            fr: 'F',
                            sa: 'SA',
                            su: 'S'
                        }
                    });

                    this.activate_date_picker(input_element, initial_first_date, initial_second_date, false)
                }

            },

            configure_calendar() {



                let elements = $(".jqyc-not-empty-td")

                for (let counter = 0; counter < elements.length; counter++) {
                    let element_day = elements[counter].dataset.dayOfMonth;
                    let element_month = elements[counter].dataset.month;
                    let element_year = elements[counter].dataset.year;
                    let current_day_object = moment(element_year + '-' + element_month + '-' + element_day, 'YYYY-MM-DD')
                    if (current_day_object.diff(this.current_date_object, 'days') >= 0) {


                    }
                    else {
                        $(elements[counter]).addClass('disabled_date')
                    }
                    if (current_day_object.diff(this.current_date_object, 'days') == 0) {
                        if (this.should_scroll) {
                            this.should_scroll = false;
                            //   $(".jqyc").scrollTo(elements[counter]);

                        }

                    }

                    if (this.first_date == current_day_object.format('YYYY-MM-DD')) {

                        console.log(this.first_date_object.diff(current_day_object, 'days', true))

                        $(elements[counter]).addClass('day_active');
                        this.start_trip(element_day, element_month, element_year)

                    }
                    if (this.second_date == current_day_object.format('YYYY-MM-DD')) {
                        $(elements[counter]).addClass('day_active');
                        this.end_trip(element_day, element_month, element_year)

                    }

                    if (this.isRange) {


                        if (this.first_date_object?.diff(current_day_object, true) < 0 && this.second_date_object?.diff(current_day_object, true) > 0) {
                            $(elements[counter]).addClass('day_in_range');

                        }
                    }
                }

            },
            resetCalendar(self_instance = this) {

                self_instance.first_date = '';
                self_instance.first_date_object = null;
                self_instance.second_date = '';
                self_instance.second_date_object = null;


                $(".day_active").each((index, element) => {
                    element?.classList.remove("day_active")

                })
                $(".day_in_range").each((index, element) => {
                    element?.classList.remove("day_in_range")

                })
                $(".jqyc-month").each((index, element) => {
                    $(element).css("height", 'auto')

                })


                $(".reset_calendar").removeClass("reset_calendar_active")
                this.start_date = ''
                this.end_date = ''
                self_instance.day_active = 0;
            },
            start_trip(s_d, s_m, s_y) {
                console.log("worked 11");
                let d_a = s_d < 10 ? `0${s_d}` : s_d;
                let m_a = s_m < 10 ? `0${s_m}` : s_m;


                this.first_date_object = moment(`${s_y}-${m_a}-${d_a}`, 'YYYY-MM-DD');
                this.first_date = this.first_date_object.format('YYYY-MM-DD');
                this.start_date = `${s_y}-${m_a}-${d_a}`  //   $("#start_date").val(`${s_y}-${m_a}-${d_a}`)


                let date = new Date(`${s_y} ${m_a}-${d_a}`)

                /*           let startDay = $(".start_day").html(this.getDayName(date))
                        let startMonth = $(".start_month").html(this.months[s_m - 1])
                        let startDate = $(".start_date").html(s_d) */

                this.$emit('first_date_changed', this.first_date)
            },
            end_trip(s_d, s_m, s_y) {

                let d_a = s_d < 10 ? `0${s_d}` : s_d;
                let m_a = s_m < 10 ? `0${s_m}` : s_m;

                this.second_date_object = moment(`${s_y}-${m_a}-${d_a}`, 'YYYY-MM-DD');
                this.second_date = this.second_date_object.format('YYYY-MM-DD');

                if (this.second_date_object.diff(this.first_date_object, 'days') < 0) {
                    let temp = this.second_date_object
                    this.second_date_object = this.first_date_object
                    this.first_date_object = temp
                    this.second_date = this.second_date_object.format('YYYY-MM-DD');
                    this.first_date = this.first_date_object.format('YYYY-MM-DD');
                    let date = new Date(this.first_date)
                    /*
                                    let startDay = $(".start_day").html(this.getDayName(date))
                                    let startMonth = $(".start_month").html(this.months[s_m - 1])
                                    let startDate = $(".start_date").html(s_d) */

                    this.start_date = this.first_date;
                    this.end_date = this.second_date;

                    /*      $("#start_date").val(this.first_date)
                        $("#end_date").val(this.second_date) */

                    date = new Date(this.second_date)
                    /*       startDay = $(".end_day").html(this.getDayName(date))
                        startMonth = $(".end_month").html(this.months[s_m - 1])
                        startDate = $(".end_date").html(s_d) */
                    this.$emit('first_date_changed', this.first_date)
                    this.$emit('second_date_changed', this.second_date)
                    return;

                }
                // let date = new Date(`${d_a}/${m_a}/2022`);

                this.end_date = `${s_y}-${m_a}-${d_a}`


                /*    let date = new Date(`${s_y} ${m_a}-${d_a}`) */
                /*     let startDay = $(".end_day").html(this.getDayName(date))
                    let startMonth = $(".end_month").html(this.months[s_m - 1])
                    let startDate = $(".end_date").html(s_d) */
                this.$emit('second_date_changed', this.second_date)
            },
            getDayName(date = new Date(`${s_y} ${m_a}-${d_a}`), locale = 'en-US') {
                let current_day;
                let dd = date.toLocaleDateString(locale, { weekday: 'long' });
                switch (dd) {
                    case "Sunday":
                        current_day = "Sun";
                        break;
                    case "Monday":
                        current_day = "Mon";
                        break;
                    case "Tuesday":
                        current_day = "Tue";
                        break;
                    case "Wednesday":
                        current_day = "Wed";
                        break;
                    case "Thursday":
                        current_day = "Thu";
                        break;
                    case "Friday":
                        current_day = "Fri";
                        break;
                    case "Saturday":
                        current_day = "Sat";
                }
                return current_day;
            }
        },
        mounted() {
            this.isRange = this.range;
        },
    };
    </script>

    <style>
    .limited_width {
        width: 315px;
    }

    .disabled_date {
        color: #ababab !important;
        cursor: default !important;
    }

    .jqyc-th {
        font-weight: bold !important;
    }

    .jqyc-year-chooser {
        position: sticky;
        top: 0px;
        background-color: white;
        z-index: 100;
    }

    .jqyc {
        position: relative;
    }

    .col.text-right {
        display: flex;
        justify-content: flex-end;
    }

    .jqyc-year.col {
        font-weight: bold !important;
    }

    .day_in_range {
        background-color: #fe2f7099 !important;
        color: white;
    }

    .calendar_box .jqyc {
        max-height: 400px;
    }
    </style>
