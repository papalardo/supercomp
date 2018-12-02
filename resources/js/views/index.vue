<template lang="html">
    <div class="container">
        <div class="col-md-12">
            <input type="text" v-model="user" class="form-control mb-2" placeholder="Digite seu nome">
            <button type="button" class="btn btn-primary btn-sm" name="button" @click.prevent="nextStep"> Próximo </button>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    data: () => ({
        user: ''
    }),
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
