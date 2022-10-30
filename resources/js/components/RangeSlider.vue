<template>

    <div class='range-slider'>

        <input type="range" :min="min_value" :max="max_value" step="1" v-model="sliderMin">

        <input type="range" :min="min_value" :max="max_value" step="1" v-model="sliderMax">

    </div>
</template>

<script>



export default {

    data: function () {
        return {
            minAngle: 10,
            maxAngle: 100,
            min_value: 0,
            max_value: 100
        };
    },
    watch: {

    },

    methods: {
        updateSelectedMinMax: function (min, max) {
            this.sliderMax = max
            this.sliderMin = min

        },
        updateMinMax: function (min, max) {
            this.max_value = max
            this.min_value = min

        }


    },
    mounted() {


    },
    computed: {
        sliderMin: {
            get: function () {
                var val = parseInt(this.minAngle);
                return val;
            },
            set: function (val) {
                val = parseInt(val);
                if (val > this.maxAngle) {
                    this.maxAngle = val;
                }
                this.minAngle = val;

                this.$emit("min_changed", val);
            }
        },
        sliderMax: {
            get: function () {
                var val = parseInt(this.maxAngle);
                return val;
            },
            set: function (val) {
                val = parseInt(val);
                if (val < this.minAngle) {
                    this.minAngle = val;
                }
                this.maxAngle = val;
                this.$emit("max_changed", val);
            }
        }
    },
};
</script>

<style scoped>
.range-slider {
    width: 200px;
    margin: auto;
    text-align: center;
    position: relative;
    height: 3em;
}

.range-slider input[type=range] {
    position: absolute;
    left: 0;
    bottom: 0;
}

input[type=number] {
    border: 1px solid #ddd;
    text-align: center;
    font-size: 1.6em;
    -moz-appearance: textfield;
}

input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

input[type=number]:invalid,
input[type=number]:out-of-range {
    border: 2px solid #ff6347;
}

input[type=range] {
    -webkit-appearance: none;
    width: 100%;
}

input[type=range]:focus {
    outline: none;
}

input[type=range]:focus::-webkit-slider-runnable-track {
    background: #000941;
}

input[type=range]:focus::-ms-fill-lower {
    background: #000941;
}

input[type=range]:focus::-ms-fill-upper {
    background: #000941;
}

input[type=range]::-webkit-slider-runnable-track {
    width: 100%;
    height: 5px;
    cursor: pointer;
    animate: 0.2s;
    background: #000941;
    border-radius: 1px;
    box-shadow: none;
    border: 0;
}

input[type=range]::-webkit-slider-thumb {
    z-index: 2;
    position: relative;
    box-shadow: 0px 0px 0px #000;
    border: 1px solid #000941;
    height: 18px;
    width: 18px;
    border-radius: 25px;
    background: #000941;
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -7px;
}
</style>
