<template lang="html">
    <div class="container" style="height: 100vh;">
        <div class="col-md-12">
            <h4>Olá {{ user.name }}</h4>
            <label for="">Selecione abaixo sua lista de compras</label>
            <v-select label="name" :options="products" multiple :value="productsSelected" class="mb-2"></v-select>
            <button type="button" name="button" class="btn btn-primary btn-sm" @click.prevent="comparativePage">Comparar preços</button>
            <button type="button" name="button" class="btn btn-primary btn-sm" @click.prevent="checklistPage">Fazer compras</button>
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
            'makeComparative': 'comparatives/search',
            'setChecklist': 'user/setChecklist'
        }),
        comparativePage() {
            this.setChecklist(this.productsSelected)
            this.makeComparative(this.productsSelected)
            this.$router.push({ path: 'comparatives' })
        },
        checklistPage() {
            this.productsSelected.length && this.setChecklist(this.productsSelected)
            this.$router.push({ path: 'checklist' })
        }
    }
}
</script>
