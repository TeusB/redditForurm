<template>
    <Form @submit="login" class="form" v-slot="{ errors }">
        <div>
            <button class="submitButton" type="submit" v-bind:disabled="isSubmitting">
                <span v-if="!isSubmitting">Login</span>
                <span v-else>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </span>
            </button>
        </div>
    </Form>
</template>
<script>
import { Form, Field } from 'vee-validate';

import axios from 'axios'

export default {
    name: 'Login',
    components: {
        Form,
        Field,
    },
    data() {
        return {
            errorMessage: '',
            isSubmitting: false,
        };
    },
    methods: {
        async login(values) {
            
            this.errorMessage = '';
            this.isSubmitting = true;
            const response = await axios.post('login', values);
            switch (response.status) {
                case 200:
                    store.commit('login', response.data.token);
                    this.$router.push('/dashboard');
                    break;
                default:
                    console.log("onbekende success");
                    console.log(response);
                    break;
            }
            switch (error.response.status) {
                case 422:
                    this.errorMessage = "foute data parameters gegeven";
                    break;
                case 401:
                    this.errorMessage = "email of wachtwoord komt niet overeen";
                    break;
                default:
                    this.errorMessage = "onbekende error";
                    console.log(error);
                    break;
            }
        }
    }
}

</script>