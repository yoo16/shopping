<template :prop-user>
  <div class="container">
    <p>{{ message }}</p>
    <div v-if="products">
      <ul>
        <li v-for="product in products" :key="product.id">{{ product.title }}</li>
      </ul>
    </div>
    <p>
      <button class="btn btn-primary" v-on:click="getProducts">Get Products</button>
    </p>
  </div>
</template>

<script>
export default {
  props: {},
  data() {
    return {
      message: "Hello Vue!",
      products: [],
    };
  },
  methods: {
    getProducts: function (e) {
      axios
        .get("https://fakestoreapi.com/products/")
        .then((res) => {
          this.products = res.data;
        })
        .catch((res) => console.log(res));
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
