<template lang="html">
  <div class="main">
        <!-- <router-view-transition> -->
            <router-view key="dasdas"/>
        <!-- </router-view-transition> -->
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
