  <template>
    <div class="trippbo-dropdown" v-if="visible">
      <div>
        <div class="d-flex align-items-center justify-content-between">
          <div class="w-60"><span class="gilroy-medium font-12">Adult</span></div>
          <div class="w-40">
            <div id="children-increament" class="increamentor">
              <div v-on:click="removeAdult()">
                <i
                  class="fa fa-minus-circle increamentor-minus"
                  :class="{
                    'increamentor-not-allowed': adult_count == 1,
                    'increamentor-opacity': adult_count == 1,
                  }"
                ></i>
              </div>
              <div>
                <input
                  type="text"
                  class="increamentor-number"
                  v-bind:value="adult_count"
                  readonly="readonly"
                />
              </div>
              <div v-on:click="addAdult()">
                <i
                  class="fa fa-plus-circle increamentor-plus"
                  :class="{
                    'increamentor-not-allowed': adult_count == 9,
                    'increamentor-opacity': adult_count == 9,
                  }"
                ></i>
              </div>
            </div>
          </div>
        </div>
        <div
          v-if="child_visible"
          class="d-flex align-items-center justify-content-between"
        >
          <div class="w-60"><span class="gilroy-medium font-12">Child</span></div>
          <div class="w-40">
            <div id="children-increament" class="increamentor">
              <div v-on:click="removeChild()">
                <i
                  class="fa fa-minus-circle increamentor-minus"
                  :class="{
                    'increamentor-not-allowed': child_count == 0,
                    'increamentor-opacity': child_count == 0,
                  }"
                ></i>
              </div>
              <div>
                <input
                  type="text"
                  class="increamentor-number"
                  v-bind:value="child_count"
                  readonly="readonly"
                />
              </div>
              <div v-on:click="addChild()">
                <i
                  class="fa fa-plus-circle increamentor-plus"
                  :class="{
                    'increamentor-not-allowed': child_count == 9,
                    'increamentor-opacity': child_count == 9,
                  }"
                ></i>
              </div>
            </div>
          </div>
        </div>
        <div
          v-if="infant_visible"
          class="d-flex align-items-center justify-content-between"
        >
          <div class="w-60">
            <span class="gilroy-medium font-12">Infant</span>
          </div>
          <div class="w-40">
            <div id="children-increament" class="increamentor">
              <div v-on:click="removeInfant()">
                <i
                  class="fa fa-minus-circle increamentor-minus"
                  :class="{
                    'increamentor-not-allowed': infant_count == 0,
                    'increamentor-opacity': infant_count == 0,
                  }"
                ></i>
              </div>
              <div>
                <input
                  type="text"
                  class="increamentor-number"
                  v-bind:value="infant_count"
                  readonly="readonly"
                />
              </div>
              <div v-on:click="addInfant()">
                <i
                  class="fa fa-plus-circle increamentor-plus"
                  :class="{
                    'increamentor-not-allowed': infant_count == 9,
                    'increamentor-opacity': infant_count == 9,
                  }"
                ></i>
              </div>
            </div>
          </div>
        </div>

        <div v-on:click="$emit('hide')">
          <button type="button" class="btn btn-block btn-000941 font-12">
            Done
          </button>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    data: function () {
      return {
        adult_count: 1,
        child_count: 0,
        infant_count: 0,
      };
    },
    props: {
      visible: false,
      child_visible: false,
      infant_visible: false,
    },

    methods: {
      removeAdult: function () {
        if (this.adult_count > 1) {
          this.adult_count -= 1;
          this.$emit("update_adult_count", this.adult_count);
          if (this.adult_count == 1) {
          }
        }
      },
      addAdult: function () {
        if (this.adult_count < 9) {
          this.adult_count += 1;
          this.$emit("update_adult_count", this.adult_count);
        }
      },
      removeChild: function () {
        if (this.child_count > 0) {
          this.child_count -= 1;
          this.$emit("update_child_count", this.child_count);
          if (this.child_count == 1) {
          }
        }
      },
      addChild: function () {
        if (this.child_count < 9) {
          this.child_count += 1;
          this.$emit("update_child_count", this.child_count);
        }
      },
      removeInfant: function () {
        if (this.infant_count > 0) {
          this.infant_count -= 1;
          this.$emit("update_infant_count", this.infant_count);
          if (this.infant_count == 1) {
          }
        }
      },
      addInfant: function () {
        if (this.infant_count < 9) {
          this.infant_count += 1;
          this.$emit("update_infant_count", this.infant_count);
        }
      },
    },
    mounted() {},
  };
  </script>

  <style scoped>
  .btn-000941 {
    color: #fff !important;
    background-color: #000941 !important;
    border-color: #000941 !important;
    border-radius: unset !important;
  }
  .trippbo-dropdown > button {
    border: none;
    text-decoration: none;
    text-align: center;
    position: relative;
    padding: 10px;
    cursor: pointer;
    color: black;
    background-color: white;
    white-space: nowrap;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  .trippbo-dropdown > div {
    box-shadow: 0px 0px 6px #00000028;
    cursor: auto;
    background-color: #fff;

    position: absolute;
    right: 0;
    min-width: 250px;
    margin: 0;
    padding: 1rem;
    z-index: 2;
  }
  .trippbo-dropdown > button:hover {
    color: black;
    background-color: white;
  }
  .trippbo-dropdown > div > ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }
  .trippbo-dropdown > div > ul > li {
  }
  .trippbo-dropdown > div > ul > li > a {
    width: 100%;
    text-align: left;
  }
  .trippbo-dropdown > div > ul > li > a:hover {
    color: #fe2f70;
    background-color: #fe2f7010;
  }
  .increamentor {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
  }
  .increamentor > div {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
  }
  .increamentor > div:nth-of-type(1) {
  }
  .increamentor > div:nth-of-type(2) {
  }
  .increamentor > div:nth-of-type(3) {
    text-align: end;
  }
  .increamentor > div > img {
    height: 18px;
    cursor: pointer;
  }
  .increamentor > div > img.increamentor-not-allowed {
    cursor: not-allowed;
  }
  .increamentor > div > i {
    font-size: 18px;
    cursor: pointer;
  }
  .increamentor > div > i.increamentor-not-allowed {
    cursor: not-allowed;
  }
  .increamentor > div > img.increamentor-opacity,
  .increamentor > div > i.increamentor-opacity,
  .increamentor > div > input.increamentor-opacity {
    opacity: 0.5;
  }
  .increamentor > div > input {
    width: 2em;
    padding: 0;
    margin: 0;
    border: 0;
    text-align: center;
    font-family: "Gilroy-SemiBold";
  }
  </style>
