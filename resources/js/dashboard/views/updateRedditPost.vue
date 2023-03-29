<template>
    <div v-if="thread">
        <!-- update Post -->
        <h1>Update Post</h1>
        <div>
            <div v-if="errorMessage || successMessage" class="displayTrue"
                v-bind:class="{ 'invalid-feedback': errorMessage, 'valid-feedback': successMessage }">
                {{ errorMessage }}
                {{ successMessage }}
            </div>
            <Form @submit="updatePost" ref="form" class="form" v-slot="{ errors }">
                <div>
                    <label for="title">Title</label>
                    <Field v-model="thread.title" class="form-control" name="title" type="text"
                        v-bind:class="{ 'is-invalid': errors.title }" />
                    <div v-if="errors.title" class="invalid-feedback">{{ errors.title }}</div>
                </div>
                <div>
                    <label for="content">Content</label>
                    <Field v-model="thread.content" class="form-control" name="content" type="text"
                        v-bind:class="{ 'is-invalid': errors.content }" />
                    <div v-if="errors.content" class="invalid-feedback">{{ errors.content }}</div>
                </div>
                <div class="buttonDiv">
                    <button class="submitButton" type="submit" v-bind:disabled="isSubmitting">
                        <span v-if="!isSubmitting">Update Post</span>
                        <span v-else>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>
                    </button>
                </div>
            </Form>
        </div>
    </div>
</template>
<style>
.displayTrue {
    display: block !important;
}
</style>
<script>
import { Form, Field } from 'vee-validate';
import * as Yup from 'yup';
export default {
    data() {
        const schema = Yup.object().shape({
            title: Yup.string().required(),
            content: Yup.string().required(),
        });
        return {
            errorMessage: '',
            successMessage: '',
            schema,
            isSubmitting: false,
            thread: [],
        };
    },
    components: {
        Form,
        Field,
    },
    methods: {
        async updatePost(values) {
            this.errorMessage = '';
            this.successMessage = '';
            this.isSubmitting = true;
            try {
                await this.schema.validate(values, { abortEarly: false });
                if (this.$refs.form.validate()) {
                    this.successMessage = "de post is geupdate";

                }
            } catch (error) {
                if (error instanceof Yup.ValidationError) {
                    const errors = {};
                    error.inner.forEach((err) => {
                        errors[err.path] = [err.message];
                    });
                    this.$refs.form.setErrors(errors);
                } else {
                    this.errorMessage = "kon post niet updaten";
                }
            } finally {
                this.isSubmitting = false;
            }
        }
    },
    created() {
        this.thread = {
            title: "dit is de titel van de thread",
            content: "dit is de content",
            author: "dit is de naam van de author",
            karma: "dit is de karma",
        };
    }
}
</script>