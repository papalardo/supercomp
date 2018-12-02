<template lang="html">
  <div class="main">
      <router-view/>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    mounted() {
        this.getProducts()
    },
    methods: {
        ...mapActions({
            'getProducts': 'products/getAll'
        })
    }
}
</script>
