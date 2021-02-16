<template>
  <div class="row">
    <div v-for="item in items" :key="item.id" class="col-md-4 mb-2">
      <item-component :item="item"></item-component>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      loading: false,
    };
  },
  methods: {
    getItems: function (e) {
      this.loading = true;
      axios
        .get("/api/item/get")
        .then((res) => {
          this.items = res.data;
          this.loading = false;
        })
        .catch((res) => console.log(res));
    },
    findItem: function (id) {
      this.loading = true;
      axios
        .get("/api/item/find/" + id)
        .then((res) => {
          loading = false;
          this.item = res.data;
        })
        .catch((res) => console.log(res));
    },
  },
  mounted() {
    this.getItems();
  },
};
</script>