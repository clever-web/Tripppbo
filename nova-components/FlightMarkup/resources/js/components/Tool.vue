<template>
  <div>
    <table class="border-collapse border border-gray-400" style="width: 100%">
      <thead>
        <tr>
          <th class="border border-gray-300">Airline Name</th>
          <th class="border border-gray-300">Airline Code</th>
          <th class="border border-gray-300">Airline Markup (%)</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="airline in airlines" :key="airline.id">
          <td class="border border-gray-300">{{ airline.name }}</td>
          <td class="border border-gray-300">{{ airline.code }}</td>
          <td class="border border-gray-300">
            <input style="width: 100%" type="number" :value="airline.markup" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      airlines: [],
    };
  },
  metaInfo() {
    return {
      title: "FlightMarkup",
    };
  },
  async mounted() {
    let resp = await axios.get("/nova-vendor/flight-markup/airlines");
    this.airlines.push(...resp.data);
  },
};
</script>

<style>
/* Scoped Styles */
</style>
