<template>

    <div v-on:click.stop=""  tabindex="0">

        <div  class="d-flex flex-row custom_1">
            <div class="  custom_1 w-100 ">
                <div class="d-flex w-100 h-100 justify-content-around" style="gap:10px;">
                    <div  v-on:click="showList" class="d-flex justify-content-end h-100 " style="flex-shrink: 0; flex-grow: 0; width: 45px;">
                        <img class="phone_number_flag_style" :src="selectedItem?.flag?.image">
                    </div>
                    <div v-on:click="showList" class="h-100" style="flex-shrink: 0;flex-grow: 1; width:45px;">
                        <input v-on:blur="checkForCode"  type="text"
                            :value="phone_number_code" @input="user_entered_code = $event.target.value" class="h-100 w-100"  />
                    </div>
                    <div style="flex-shrink: 1; flex-grow: 1; width:100%;">
                        <input type="text" v-on:click="hideList" v-model="phone_number" @blur="broadcastNewValue()" placeholder="Mobile Nr." class="h-100 w-100" />
                    </div>
                </div>
                <div v-if="listVisible" style="position: relative" class="custom_1 h-100 w-100">
                    <div class="w-100 custom_1 container_border scrollable"
                        style="max-height: 400px;position: absolute;overflow-x: hidden; overflow-y: scroll;">


                        <div class="w-100" style="position:sticky;  top: 0px;">
                            <input placeholder="Search..." type="text" class="w-100 custom_search_bar"
                                v-model="searchKeyword" @input="updateFilter" />
                        </div>

                        <div v-on:click="selectItem(country)"
                            class=" custom_select_item  custom_1 on_hover_on_item mt-1" v-for="country in filteredList">
                            <img class="phone_number_flag_style" :src="country?.flag?.image">
                            ({{  country?.phone_code?.dial_code  }}) {{  country.name  }}
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</template>

<script>

export default {

    data: function () {
        return {
            countries: null,
            listVisible: false,
            searchKeyword: '',
            filteredList: [],
            selectedItem: null,
            phone_number: null,
            phone_number_code: null,
            last_number_code: '',
            user_entered_code: '',
            user_entered_code_old: '',
        };
    },
    props: {
        current_phone_number: null,
    },
    watch: {

    },

    methods: {
        checkForCode: function () {

            if (this.user_entered_code == this.user_entered_code_old)
            {
                return;
            }
            this.user_entered_code_old = this.user_entered_code


            let temp = this.user_entered_code;

            if (temp.substring(0, 2) == '00') {
                temp = temp.replace('00', '+');
            }

            console.log('temp')
            console.log(temp);
            let matches = this.countries.data.filter(c => {

                return c.phone_code?.dial_code === temp
            })
            if (matches.length == 1) {
                this.selectedItem = matches[0];
                this.phone_number_code = temp
                this.broadcastNewValue();

            }

            console.log('matches')
            console.log(matches)
            this.hideList();
        },
        showList: function () {
            this.listVisible = true;
        },
        hideList: function () {

            this.listVisible = false;
        },
        updateFilter: function () {
            if (this.searchKeyword == '') {
                this.filteredList = [...this.countries.data]
                return;
            }
            let temp = this.countries.data;
            this.filteredList = temp.filter(c => {
                return (c.name.toLowerCase().includes(this.searchKeyword.toLowerCase()))
            })

        },
        selectItem: function (country) {
            this.phone_number_code = country.phone_code.dial_code
            this.selectedItem = country
            this.broadcastNewValue();
            this.hideList();

        },


        broadcastNewValue: function()
        {
            this.$emit('phone_number_updated', this.phone_number_code + this.phone_number )
        }


    },
    async mounted() {
        let countries = await axios.post('/getCountries');
        this.countries = countries;
        this.filteredList = [...countries.data];
        this.selectedItem = this.filteredList[0];
        this.phone_number_code = this.selectedItem.phone_code.dial_code;
      /*   this.phone_number = this.current_phone_number; */
    },
};
</script>

<style scoped>
input {
    outline: none;
    border: none;
 /*    border: solid 1px; */
    border-radius: 2px;
    padding: 5px;
    border-color: #d6d6d6;
    background-color: #e9ecef;
}

.custom_1 {
    background-color: white;
    z-index: 1000;
}

.phone_number_flag_style {

    height: 30px;
    -o-object-fit: cover;
    object-fit: cover;
}

.on_hover_on_item:hover {
    background-color: #ff92b5;

}

.item_style {}

.custom_select_item {

    padding: 1px;
    border-radius: 5px;
    cursor: pointer;
    border: none;
    font-size: 12px;
    font-weight: 100;
    font-family: gilroy_medium;

}

img {
    border: none;
}

.custom_select_item:hover {
    color: white;

    border-radius: 5px;
    cursor: pointer;
}

.container_border {
    border-color: #0009415e;
    border-radius: 10px;
    padding: 20px;
    border: solid #0009415e 2px;
    padding-top: 0px;
}

.custom_select_item_border {
    background-color: white;

    border-color: #dbdbdb;
    outline: none;
    border-radius: 5px;
    border: solid 1px;
    padding: 5px;
    text-align: center;

}

.custom_search_bar {
    border: none;
    background-color: white;
    border-color: #ffffff;
    border-radius: 5px;
    border-bottom: solid 1px;
    padding: 15px;
    text-align: center;
}

* {
    border-radius: 5px;

}


</style>
