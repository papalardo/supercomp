<template lang="html">
    <div class="container">
        <div class="col-md-12">
            <h4>Olá {{ user }}</h4>
            <label for="">Selecione abaixo sua lista de compras</label>
            <v-select label="name" :options="products" multiple :value="productsSelected" class="mb-2"></v-select>
            <button type="button" name="button" class="btn btn-primary btn-sm" @click.prevent="nextStep">Próximo</button>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    data:() => ({
        productsSelected: []
    }),
    computed: {
        ...mapGetters({
            'user': 'user/single',
            'products': 'products/all',
            'comparatives': 'comparatives/all'
        })
    },
    methods: {
        ...mapActions({
            'makeComparative': 'comparatives/search'
        }),
        nextStep() {
            this.makeComparative(this.productsSelected)
            this.$router.push({ path: 'comparatives' })
        }
    }
}
</script>
