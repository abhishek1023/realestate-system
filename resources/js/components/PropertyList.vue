<template>
  <div>
    <h1>Property List</h1>

    <!-- Search Form -->
    <form @submit.prevent="fetchProperties">
      <input type="text" v-model="search.name" placeholder="Search by Name">
      <input type="text" v-model="search.num_bedrooms" placeholder="Search by Number of Bedrooms">
      <input type="text" v-model="search.price" placeholder="Search by Price">
      <input type="text" v-model="search.property_type" placeholder="Search by Property Type">
      <input type="text" v-model="search.type" placeholder="Search by For Sale/For Rent">
      <button type="submit">Search</button>
    </form>

    <!-- Property List -->
    <ul>
      <li v-for="property in properties" :key="property.uuid">
        {{ property.name }} | {{ property.num_bedrooms }} | {{ property.price }} | {{ property.property_type }} | {{ property.type }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      properties: [],
      search: {
        name: '',
        num_bedrooms: '',
        price: '',
        property_type: '',
        type: ''
      },
      api_key: 'your_api_key_here'
    };
  },
  mounted() {
    this.fetchProperties();
  },
  methods: {
    async fetchProperties() {
      try {
        const params = { ...this.search, api_key: this.api_key };
        const response = await this.$axios.get('/api/properties', { params });
        this.properties = response.data.data;
      } catch (error) {
        console.error('An error occurred while fetching data: ', error);
      }
    }
  }
};
</script>
