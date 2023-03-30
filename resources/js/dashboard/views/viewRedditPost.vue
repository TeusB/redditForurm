<template>
    <div v-if="thread">
        <!-- thread -->
        <div>
            <h1>thread</h1>
            Title: {{ thread.title }}
            Author: {{ thread.author }}
        </div>

        <!-- add comment -->
        <h1>comments</h1>
        <div>
            <div v-if="errorMessage || successMessage" class="displayTrue"
                v-bind:class="{ 'invalid-feedback': errorMessage, 'valid-feedback': successMessage }">
                {{ errorMessage }}
                {{ successMessage }}
            </div>
            <Form @submit="addComment" ref="form" class="form" v-slot="{ errors }">
                <div>
                    <label for="content">Content</label>
                    <Field class="form-control" name="content" type="text"
                        v-bind:class="{ 'is-invalid': errors.content }" />
                    <div v-if="errors.content" class="invalid-feedback">{{ errors.content }}</div>
                </div>
                <div class="buttonDiv">
                    <button class="submitButton" type="submit" v-bind:disabled="isSubmitting">
                        <span v-if="!isSubmitting">Comment</span>
                        <span v-else>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>
                    </button>
                </div>
            </Form>

            <!-- show comment -->
            <ul>
                <li v-for="comment in thread.comments?.slice()?.reverse()" :key="comment.id">
                    <h3>{{ comment.author }}</h3>
                    <p>{{ comment.content }}</p>
                </li>
            </ul>
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
        async addComment(values) {
            this.errorMessage = '';
            this.successMessage = '';
            this.isSubmitting = true;
            try {
                await this.schema.validate(values, { abortEarly: false });
                if (this.$refs.form.validate()) {
                    this.successMessage = "de comment is toegevoegd";
                    let newComment = {
                        content: values.content,
                        author: "Tyroen",
                    };
                    this.thread.comments?.splice(this.thread.comments.length, 0, newComment);
                }
            } catch (error) {
                if (error instanceof Yup.ValidationError) {
                    const errors = {};
                    error.inner.forEach((err) => {
                        errors[err.path] = [err.message];
                    });
                    this.$refs.form.setErrors(errors);
                } else {
                    this.errorMessage = "kon comment niet toevoegen";
                }
            } finally {
                this.isSubmitting = false;
            }
        }
    },
    created() {
        this.thread = {
            title: "dit is de titel van de thread",
            author: "dit is de naam van de author",
            karma: "dit is de karma",
            comments: [{
                content: "Ik vind de inhoud van dit artikel zeer informatief en goed geschreven. Bedankt voor het delen!",
                author: "Maria Kipman"
            },
            {
                content: "Deze post heeft me echt geholpen om een beter begrip te krijgen van het onderwerp. Ik waardeer de inzichten die hier worden gedeeld.",
                author: "Energie Blikje"
            },
            {
                content: "Goede punten! Ik ben het volledig eens met wat hier wordt gezegd en zal deze informatie zeker delen met anderen.",
                author: "Troller69"
            }]
        };
    }
}
</script>