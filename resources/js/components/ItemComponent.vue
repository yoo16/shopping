<template :prop-items>
  <div class="card">
    <div class="card-header bg-white">
      <img :src="'images/now_printing.jpg'" alt="" width="100%" />
    </div>
    <div class="card-body">
      <a>{{ item.name }}</a>
      <p>¥{{ item.price }}</p>
      <p class="row justify-content-center">
        <a :href="`cart/add/${item.id}`" class="btn btn-outline-info">Add Cart</a>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: ['item'],
  methods: {
  },
  mounted() {
  },
};
</script>
