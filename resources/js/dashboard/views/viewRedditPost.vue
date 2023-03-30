<template>
    <div v-if="thread">
        <!-- thread -->
        <div style="margin-top: 10vh">
        </div>
        <div>
            <h1> {{ thread.title }}</h1>
            <span style="font-size: 80%;">Author: {{ thread.author }}</span>
            <div style="margin-left: 5px">
                {{ thread.content }}

            </div>
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

                    <img :src="comment.authorIMGURL" class="avatarPic">
                </li>
            </ul>
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
import { Form, Field } from 'vee-validate';
import * as Yup from 'yup';
let thread1 = {
    title: "Kunsttentoonstelling in het theater",
    author: "Jeroen de Vries",
    karma: 54,
    content: "Beste kunstliefhebbers, binnenkort organiseert ons theater een tentoonstelling over hedendaagse kunst. We zijn erg enthousiast over dit evenement en willen graag weten wat jullie ervan vinden.",
    comments: [{
        content: "Ik ben zeer geïnteresseerd in de tentoonstelling en kijk ernaar uit om de kunstwerken te zien. Kun je ons meer vertellen over de kunstenaars die worden tentoongesteld?",
        author: "Maria Jansen",
        authorIMGURL: "../../../../avatars/shrek.png",
    },
    {
        content: "Geweldig initiatief! Ik denk dat het heel belangrijk is om de kunstwereld te ondersteunen en te promoten. Ik zal er zeker bij zijn!",
        author: "Hans de Boer",
        authorIMGURL: "../../../../avatars/obama.png",
    },
    {
        content: "Ik ben niet zo'n kunstliefhebber, maar ik denk dat het een geweldige manier is om mensen samen te brengen en te genieten van culturele evenementen. Succes met de organisatie!",
        author: "Janet Peters",
        authorIMGURL: "../../../../avatars/Trollface.png",
    }]
}

let thread2 = {
    title: "Theateroptreden met live muziek: wat vond je ervan?",
    author: "Jeroen",
    karma: 123,
    content: "Afgelopen zaterdag ben ik naar een theateroptreden geweest waarbij live muziek werd gespeeld. Het was echt fantastisch! De combinatie van de muziek met de acteurs op het podium was echt heel bijzonder. Ik vroeg me af of er hier nog meer mensen zijn geweest die dit hebben gezien en wat hun ervaring was.",
    comments: [{
        content: "Ik ben er ook geweest en ik vond het geweldig! Het was echt een unieke ervaring en de muziek was prachtig.",
        author: "Marieke",
        authorIMGURL: "../../../../avatars/shrek.png",
    },
    {
        content: "Helaas heb ik het optreden gemist, maar het klinkt geweldig. Hopelijk komt er snel een herhaling!",
        author: "Erik",
        authorIMGURL: "../../../../avatars/obama.png",
    },
    {
        content: "Ik ben niet zo'n fan van theater, maar de muziek was wel goed. Al met al een geslaagde avond!",
        author: "Jan",
        authorIMGURL: "../../../../avatars/Trollface.png",
    }]
}

let thread3 = {
    title: "Kunsttentoonstelling in Schouwburg Tilburg",
    author: "Kunstliefhebber123",
    karma: 23,
    content: "De Schouwburg Tilburg organiseert op 1 mei een kunsttentoonstelling met werken van lokale kunstenaars. Ik ben benieuwd wie er nog meer gaat!",
    comments: [{
        content: "Dat klinkt interessant! Ik ga zeker een kijkje nemen.",
        author: "KunstFan01",
        authorIMGURL: "../../../../avatars/shrek.png",
    },
    {
        content: "Leuk dat er weer eens wat cultureels georganiseerd wordt in Tilburg. Ik ben erbij!",
        author: "CultureleDuizendpoot",
        authorIMGURL: "../../../../avatars/obama.png",
    },
    {
        content: "Ik ben niet zo'n kunstliefhebber, maar ik ben wel benieuwd naar wat er te zien zal zijn. Misschien kom ik ook even langs.",
        author: "NietZoCreatief",
        authorIMGURL: "../../../../avatars/Trollface.png",
    }]
}
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
                        author: "Tyroen Ahoy",
                        authorIMGURL: "../../../../avatars/lightSkin.png",
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
    watch: {
        '$route.params.id': async function (newId, oldId) {
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
        }
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

    }
}
</script>
