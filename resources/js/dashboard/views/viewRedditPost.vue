<template>
    <div v-if="thread">
        <!-- thread -->
        <div style="margin-top: 2vh">
            <div style="margin-bottom: 5vh; margin-left: 2vh" class="row">
                <div class="col-lg-2">
                    40
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="35"
                        height="35"
                        fill="currentColor"
                        class="bi bi-balloon-heart"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721L8 2.42Zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063.045.041.089.084.132.129.043-.045.087-.088.132-.129 3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398Z"
                        />
                    </svg>
                    <div
                        style="width: 40%; margin-left: 35px"
                        class="btn btn-danger"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-brush"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z"
                            />
                        </svg>
                        <span style="padding-left: 5px">Art</span>
                    </div>
                </div>
                <div class="col-lg-10 text-right"></div>
            </div>
            <span style="font-size: 75%; margin-left: 5px"
                >Posted by: {{ thread.author }}</span
            >
        </div>
        <div>
            <h1>{{ thread.title }}</h1>
            <div style="margin-left: 5px; margin-top: 20px; width: 65%">
                {{ thread.content }}
            </div>
        </div>
        <!-- add comment -->
        <div>
            <h4>comments</h4>
            <div>
                <div
                    v-if="errorMessage || successMessage"
                    class="displayTrue"
                    v-bind:class="{
                        'invalid-feedback': errorMessage,
                        'valid-feedback': successMessage,
                    }"
                >
                    {{ errorMessage }}
                    {{ successMessage }}
                </div>
                <Form
                    @submit="addComment"
                    ref="form"
                    class="form"
                    v-slot="{ errors }"
                >
                    <div>
                        <label for="content">Content</label>
                        <Field
                            class="form-control"
                            name="content"
                            type="text"
                            v-bind:class="{ 'is-invalid': errors.content }"
                        />
                        <div v-if="errors.content" class="invalid-feedback">
                            {{ errors.content }}
                        </div>
                    </div>
                    <div class="buttonDiv">
                        <button
                            class="submitButton"
                            type="submit"
                            v-bind:disabled="isSubmitting"
                        >
                            <span v-if="!isSubmitting">Comment</span>
                            <span v-else>
                                <span
                                    class="spinner-border spinner-border-sm"
                                    role="status"
                                    aria-hidden="true"
                                ></span>
                            </span>
                        </button>
                    </div>
                </Form>

                <!-- show comment -->
                <ul>
                    <li
                        style="display: flex; gap: 30px; align-items: center"
                        v-for="comment in thread.comments?.slice()?.reverse()"
                        :key="comment.id"
                    >
                        <img :src="comment.authorIMGURL" class="avatarPic" />
                        <div>
                            <h3>{{ comment.author }}</h3>
                            <p>{{ comment.content }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<style>
.displayTrue {
    display: block !important;
}

.avatarPic {
    width: 150px !important;
    height: 150px !important;
}
</style>
<script>
import { Form, Field } from "vee-validate";

import * as Yup from "yup";

let thread1 = {
    title: "dit is de titel van de thread 1",

    author: "dit is de naam van de author",

    karma: "dit is de karma",

    content: "dit is de content niffo",

    comments: [
        {
            content:
                "Ik vind de inhoud van dit artikel zeer informatief en goed geschreven. Bedankt voor het delen!",

            author: "Maria Kipman",

            authorIMGURL: "../../../../avatars/shrek.png",
        },

        {
            content:
                "Deze post heeft me echt geholpen om een beter begrip te krijgen van het onderwerp. Ik waardeer de inzichten die hier worden gedeeld.",

            author: "Energie Blikje",

            authorIMGURL: "../../../../avatars/obama.png",
        },

        {
            content:
                "Goede punten! Ik ben het volledig eens met wat hier wordt gezegd en zal deze informatie zeker delen met anderen.",

            author: "Troller69",

            authorIMGURL: "../../../../avatars/Trollface.png",
        },
    ],
};

let thread2 = {
    title: "dit is de titel van de thread 2",

    author: "dit is de naam van de author",

    karma: "dit is de karma",

    content: "dit is de content niffo",

    comments: [
        {
            content:
                "Ik vind de inhoud van dit artikel zeer informatief en goed geschreven. Bedankt voor het delen!",

            author: "Maria Kipman",

            authorIMGURL: "../../../../avatars/shrek.png",
        },

        {
            content:
                "Deze post heeft me echt geholpen om een beter begrip te krijgen van het onderwerp. Ik waardeer de inzichten die hier worden gedeeld.",

            author: "Energie Blikje",

            authorIMGURL: "../../../../avatars/obama.png",
        },

        {
            content:
                "Goede punten! Ik ben het volledig eens met wat hier wordt gezegd en zal deze informatie zeker delen met anderen.",

            author: "Troller69",

            authorIMGURL: "../../../../avatars/Trollface.png",
        },
    ],
};

let thread3 = {
    title: "dit is de titel van de thread 3",

    author: "dit is de naam van de author",

    karma: "dit is de karma",

    content: "dit is de content niffo",

    comments: [
        {
            content:
                "Ik vind de inhoud van dit artikel zeer informatief en goed geschreven. Bedankt voor het delen!",

            author: "Maria Kipman",

            authorIMGURL: "../../../../avatars/shrek.png",
        },

        {
            content:
                "Deze post heeft me echt geholpen om een beter begrip te krijgen van het onderwerp. Ik waardeer de inzichten die hier worden gedeeld.",

            author: "Energie Blikje",

            authorIMGURL: "../../../../avatars/obama.png",
        },

        {
            content:
                "Goede punten! Ik ben het volledig eens met wat hier wordt gezegd en zal deze informatie zeker delen met anderen.",

            author: "Troller69",

            authorIMGURL: "../../../../avatars/Trollface.png",
        },
    ],
};

export default {
    data() {
        const schema = Yup.object().shape({
            content: Yup.string().required(),
        });

        return {
            errorMessage: "",

            successMessage: "",

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
            this.errorMessage = "";

            this.successMessage = "";

            this.isSubmitting = true;

            try {
                await this.schema.validate(values, { abortEarly: false });

                if (this.$refs.form.validate()) {
                    this.successMessage = "de comment is toegevoegd";

                    let newComment = {
                        content: values.content,

                        author: "Tyroen Ahoy",

                        authorIMGURL: "../../../../avatars/lightSkin.png",
                    };

                    this.thread.comments?.splice(
                        this.thread.comments.length,
                        0,
                        newComment
                    );
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
        },
    },

    watch: {
        "$route.params.id": async function (newId, oldId) {
            switch (this.$route.params.id) {
                case "1":
                    this.thread = thread1;

                    break;

                case "2":
                    this.thread = thread2;

                    break;

                case "3":
                    this.thread = thread3;

                    break;

                default:
                    break;
            }
        },
    },

    created() {
        switch (this.$route.params.id) {
            case "1":
                this.thread = thread1;

                break;

            case "2":
                this.thread = thread2;

                break;

            case "3":
                this.thread = thread3;

                break;

            default:
                break;
        }
    },
};
</script>
