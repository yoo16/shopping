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
    };
  },
  methods: {
    getItems: function (e) {
      axios
        .get("/api/item/get")
        .then((res) => {
          this.items = res.data;
        })
        .catch((res) => console.log(res));
    },
    findItem: function (id) {
      axios
        .get("/api/item/find/" + id)
        .then((res) => {
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
