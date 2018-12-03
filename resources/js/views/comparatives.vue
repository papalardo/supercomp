<template lang="html">
    <div class="container">
        <div class="col-md-12">
            <h4>Comparativos</h4>
        </div>
        <div class="col-md-12">
            <label for="">Ordernar Por</label>
            <div class="btn-group">
                <button type="button" name="button" class="btn btn-primary" @click.prevent="orderBy = ['total', 'doesntHave']">Preços</button>
                <button type="button" name="button" class="btn btn-primary" @click.prevent="orderBy = ['doesntHave', 'total']">Produtos disponíveis</button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-2 mt-2" v-for="(item, key) in filtreds" :key="key">
                <div class="card-body">
                    <h5 class="card-title">{{ item.supermarket.name }}</h5>
                    <p class="card-text" v-for="product in item.products">{{ product.name }} - R${{ product.price }}</p>
                </div>
                <div class="card-body bg-danger"  v-show="item.doesntHave.length">
                    <h6> Não possui </h6>
                    <p class="card-text" v-for="productExcept in item.doesntHave">{{ productExcept }}</p>
                </div>
                <div class="card-footer">
                    <h6>Total R${{ parseFloat(item.total.toFixed(2)) }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <router-link to="products" class="btn btn-primary btn-sm"> Voltar </router-link>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    data:() => ({
        productsSelected: [],
        orderBy: [],
        show: false
    }),
    mounted() {
        this.orderBy = ['total', 'doesntHave']
    },
    watch: {
        orderBy(val) {
            TweenMax.staggerFromTo($('.card'), .5,  { opacity: 0, y: '30px' }, { opacity:1, y: '0px'}, .2);
        }
    },
    computed: {
        ...mapGetters({
            'products': 'products/all',
            'comparatives': 'comparatives/all'
        }),
        filtreds() {
            return _.sortBy(this.comparatives, this.orderBy);
        }
    },
    methods: {
        ...mapActions({
            'makeComparative': 'comparatives/search'
        }),
    }
}
</script>

<style lang="css" scoped>
.container {
    padding: 2rem 1.5rem
}

</style>
