<template>
    <div v-if="chat">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">
                    <RouterLink style="text-decoration: none"
                                :to="{ name: 'dashboardChats' }">Persoonlijke chats
                    </RouterLink>
                </a>
            </li>
            <li class="nav-item">
                <a style="text-decoration: none" class="nav-link active" href="#">
                    Groep chat
                </a>
            </li>
        </ul>
        <!-- groupchatName -->
        <div>
            groupChat name: {{ chat.groupChatName }}
        </div>

        <!-- chat -->
        <div v-for="(message, index) in chat.messages" :key="index">
            <div v-if="message.sender == user.id" class="rightChat">
                {{ message.message }}
            </div>
            <div v-else class="leftChat">
                <img :src="getParticipantImgURL(message.sender)" class="avatarPic" />
                {{ getParticipantName(message.sender) }}:
                {{ message.message }}

            </div>
        </div>
        <!-- addChat -->
        <div>
            <Form @submit="addChat" ref="form" class="form" v-slot="{ errors }">
                <div>
                    <label for="message">Message</label>
                    <Field class="form-control" name="message" type="text"
                        v-bind:class="{ 'is-invalid': errors.message }" />
                    <div v-if="errors.message" class="invalid-feedback">{{ errors.message }}</div>
                </div>
                <div class="buttonDiv">
                    <button class="submitButton" type="submit" v-bind:disabled="isSubmitting">
                        <span v-if="!isSubmitting" class="buttonText">stuur</span>
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
.avatarPic {
    width: 50px !important;
    height: 50px !important;
}

.rightChat {
    margin-left: 50%;
    /*color: red;*/
}

.leftChat {
    /*color: blue;*/
}

</style>
<script>
import { Form, Field } from 'vee-validate';
import * as Yup from 'yup';
export default {
    data() {
        const schema = Yup.object().shape({
            message: Yup.string().required(),
        });
        return {
            errorMessage: '',
            successMessage: '',
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
            this.errorMessage = '';
            this.successMessage = '';
            this.isSubmitting = true;
            try {
                await this.schema.validate(values, { abortEarly: false });
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
            const participant = this.chat.participants.find(p => p.id === participantId);
            return participant ? participant.imgURL : '';
        },
        getParticipantName(participantId) {
            const participant = this.chat.participants.find(p => p.id === participantId);
            return participant ? participant.name : '';
        }
    },
    created() {
        this.user = {
            id: 1234,
            name: "john",
        }
        this.chat = {
            groupChatName: "optreden 20nov Magic",
            participants: [
                {
                    "name": "John",
                    "id": "1234",
                    "imgURL": "../../../../avatars/john.png",
                },
                {
                    "name": "Sarah",
                    "id": "5678",
                    "imgURL": "../../../../avatars/sarah.png",
                },
                {
                    "name": "Adin",
                    "id": "5778",
                    "imgURL": "../../../../avatars/adin.png",
                },
                {
                    "name": "Magic Mike",
                    "id": "5679",
                    "imgURL": "../../../../avatars/mike.png",
                },
                {
                    "name": "Magic Johnson",
                    "id": "5680",
                    "imgURL": "../../../../avatars/magic.png",
                }
            ],
            "messages": [
                {
                    "sender": "1234",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Hallo allemaal, hoe gaat het met jullie? Alles goed met de voorbereidingen voor het muziekoptreden in het theater?"
                },
                {
                    "sender": "5679",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Ja hoor, alles verloopt volgens planning. We hebben de repetities al achter de rug en de artiesten zijn er helemaal klaar voor."
                },
                {
                    "sender": "5680",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Mooi zo, en hoe zit het met de technische aspecten? Zijn de licht- en geluidssystemen al in orde?"
                },
                {
                    "sender": "5778",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Ja, de technische ploeg heeft alles getest en de systemen zijn helemaal klaar voor gebruik. We hebben ook gezorgd voor een prachtige podiumopstelling en decoratie."
                },
                {
                    "sender": "1234",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Fantastisch! Zijn er nog andere zaken waar we rekening mee moeten houden? Wat denken jullie van de kaartverkoop?"
                },
                {
                    "sender": "5679",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Daar hebben we ook al aan gedacht. De kaartverkoop verloopt vlot en er zijn al heel wat tickets verkocht. We kunnen de verkoop nog wel wat promoten via sociale media en lokale nieuwsbronnen."
                },
                {
                    "sender": "5680",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Dat is een goed idee. We moeten er ook voor zorgen dat de mensen weten waar ze hun tickets kunnen kopen. Zijn er nog andere zaken die we moeten bespreken?"
                },
                {
                    "sender": "5778",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Misschien moeten we ook nog denken aan de veiligheidsmaatregelen, zoals het handhaven van sociale afstand en het verplicht dragen van een mondmasker."
                },
                {
                    "sender": "5778",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "FREE TOP G!!"
                },
                {
                    "sender": "1234",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Ja, dat is heel belangrijk. Laten we ervoor zorgen dat we alles in orde hebben voor een veilig en succesvol evenement."
                },
                {
                    "sender": "5680",
                    "timestamp": "2022-05-15T13:34:56Z",
                    "message": "Absoluut, laten we dat regelen. Ik denk dat we alles hebben besproken voor nu. Bedankt voor jullie inzet en laten we er een geweldig optreden van maken!"
                }
            ]
        }
    }
}
</script>
