<template lang="html">
    <div class="container" style="height: 100vh;">
        
        <div class="col-md-12">
            <input type="text" v-model="user" class="form-control mb-2" placeholder="Digite seu nome">
            <button type="button" class="btn btn-primary btn-sm" name="button" @click.prevent="nextStep"> Próximo </button>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
    data: vm => ({
        user: vm.$store.state.user.single.name
    }),
    mounted() {
        this.user.name && this.$router.push({ path: 'products' })
    },
    methods: {
        ...mapActions({
            'updateUser': 'user/update'
        }),
        nextStep() {
            this.updateUser(this.user)
            this.$router.push({ path: 'products' })
        }
    }
}
</script>
