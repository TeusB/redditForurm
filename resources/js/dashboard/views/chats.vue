<template>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Persoonlijke chat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <router-link style="text-decoration: none"
                    :to="{ name: 'dashboardGroupChats' }">Groep chat
                </router-link>
            </a>
        </li>
    </ul>
    <!-- receiver -->
    <div>ChatUser: {{ chat.participants[1].name }}</div>
    <!-- chat -->
    <div v-for="(message, index) in chat.messages" :key="index" v-if="chat">
        <div v-if="message.sender == user.id" class="rightChat">
            {{ message.message }}
        </div>
        <div v-else class="leftChat">
            {{ getParticipantName(message.sender) }}:
            {{ message.message }}
        </div>
    </div>
    <!-- addChat -->
    <div>
        <Form @submit="addChat" ref="form" class="form" v-slot="{ errors }">
            <div>
                <label for="message">Message</label>
                <Field class="form-control" name="message" type="text" v-bind:class="{ 'is-invalid': errors.message }"/>
                <div v-if="errors.message" class="invalid-feedback">
                    {{ errors.message }}
                </div>
            </div>
            <div class="buttonDiv">
                <button class="submitButton" type="submit" v-bind:disabled="isSubmitting">
                    <span v-if="!isSubmitting">stuur</span>
                    <span v-else>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </span>
                </button>
            </div>
        </Form>
    </div>
</template>
<style>
.rightChat {
    margin-left: 50%;
    /*color: #dc3545;*/
    text-align: right;
}

.leftChat {
    /*color: blue;*/
}
</style>
<script>
import {Form, Field} from "vee-validate";
import * as Yup from "yup";

export default {
    data() {
        const schema = Yup.object().shape({
            message: Yup.string().required(),
        });
        return {
            errorMessage: "",
            successMessage: "",
            schema,
            isSubmitting: false,
            chat: [],
            user: [],
        };
    },
    components: {
        Form,
        Field,
    },
    methods: {
        async addChat(values) {
            this.errorMessage = "";
            this.successMessage = "";
            this.isSubmitting = true;
            try {
                await this.schema.validate(values, {abortEarly: false});
                if (this.$refs.form.validate()) {
                    this.successMessage = "de comment is toegevoegd";
                    let newMessage = {
                        sender: this.user.id,
                        message: values.message,
                    };
                    this.chat.messages.push(newMessage);
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
        getParticipantImgURL(participantId) {
            const participant = this.chat.participants.find(
                (p) => p.id === participantId
            );
            return participant ? participant.imgURL : "";
        },
        getParticipantName(participantId) {
            const participant = this.chat.participants.find(
                (p) => p.id === participantId
            );
            return participant ? participant.name : "";
        },
    },
    created() {
        this.user = {
            id: 1234,
            name: "john",
        };
        this.chat = {
            participants: [
                {
                    name: "John",
                    id: "1234",
                    imgURL: "../../../../avatars/john.png",
                },
                {
                    name: "Sarah",
                    id: "5678",
                    imgURL: "../../../../avatars/sarah.png",
                },
            ],
            messages: [
                {
                    "sender": "1234",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Hoi Sarah, faka niffo hoe gaat het met jou?"
                },
                {
                    "sender": "5678",
                    "timestamp": "2022-05-15T13:36:12Z",
                    "message": "Hallo John, met mij gaat het goed, dank je. En met jou broeder man bro broeder?"
                },
                {
                    "sender": "1234",
                    "timestamp": "2022-05-15T13:38:05Z",
                    "message": "Met mij gaat het ook goed, dank je. Waar ben je nu? "
                },
                {
                    "sender": "5678",
                    "timestamp": "2022-05-15T13:39:29Z",
                    "message": "Ik ben nu in het theater. We zijn bezig met de voorbereidingen voor de muziekshow van vanavond. fucking vet neef"
                },
                {
                    "sender": "1234",
                    "timestamp": "2022-05-15T13:40:51Z",
                    "message": "Oh leuk! Ik hoorde erover en wilde het niet missen. Zal ik je daar ontmoeten?"
                },
                {
                    "sender": "5678",
                    "timestamp": "2022-05-15T13:41:23Z",
                    "message": "Ja, dat is prima. Laten we afspreken bij de hoofdingang om 7 uur."
                },
                {
                    "sender": "1234",
                    "timestamp": "2022-05-15T13:42:10Z",
                    "message": "Perfect. Ik zal er zijn. Tot dan!"
                },
                {
                    "sender": "5678",
                    "timestamp": "2022-05-15T13:42:45Z",
                    "message": "Tot dan!"
                }
            ],
        };
    },
};
</script>
