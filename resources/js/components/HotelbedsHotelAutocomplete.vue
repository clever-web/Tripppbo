<template>
  <div v-show="isVisible" id="flight-destination-results" class="p-2 container">
    <div class="px-3 pb-3">
      <div
        v-for="(r, index) in results" v-bind:key="index"

        class="
          autocomplete-item
          d-flex
          flex-row
          justify-content-start
          align-items-center
        "
        v-on:click="selectResult(r)"
      >
        <div class="mr-3">
          <img src="/images-n/location.svg" width="20px" height="20px" />
        </div>
        <div>
          <div style="font-size: 12px">
          {{r.country}},   {{ r.name }}
          </div>
        </div>
        <hr />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      results: [],
      cancelSource: null,
      isVisible: false,
    };
  },
  props: {
    keyword: "",

  },
  watch: {
    keyword: async function (newKeyword, oldKeyword) {
        if (newKeyword.length < 1)
        {
            this.isVisible = false;
            return;
        }


      await this.performAutocomplete(newKeyword);
    },
  },

  methods: {
    performAutocomplete: async function (keyword) {

      this.cancelSource = axios.CancelToken.source();
      const resp = await axios
        .get("/autocomplete/byCity?keyword=" + keyword, {
          cancelToken: this.cancelSource.token,
        })
        .catch(function (thrown) {
          if (axios.isCancel(thrown)) {
          } else {
            // handle error
          }
        });
      this.results = [];
      this.results.push(...resp.data);
      if (this.results.length > 0)
      {
          this.isVisible = true;
      }
    },

    cancelRequest: function () {
      this.cancelSource.cancel();
    },

    selectResult: function (result) {
      this.$emit("autocomplete_result_selected", result);
      this.isVisible = false;
    },
  },
  mounted() {
    if (this.keyword !== "") {
      this.performAutocomplete(this.keyword);
    }
  },
};
</script>

<style scoped>
.container {
  background-color: white;
  border: #00000028 solid 1px;
  box-shadow: 0px 3px 6px #00000028;
}
</style>
