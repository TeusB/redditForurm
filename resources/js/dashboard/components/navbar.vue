<template>
    <div>
        <div style="margin-top: 50px" class="text-center">
            <div>
                <img style="width: 50%" src="../../../css/images/WhatsApp%20Image%202023-03-30%20at%2009.55.30.jpeg"
                     alt="TAgencyLogo">
            </div>
        </div>
        <div style="margin-top: 60px; margin-bottom: 20px">
            <div class="text-center">
                <span style="font-size: 110%; font-weight: 650"> + New post</span>
            </div>
            <div style="margin-top: 20px"  class="row text-center">
                <div class="col-lg-4 text-center">
                    <RouterLink style="font-weight: 650; color: black; text-decoration: none" :to="{ name: 'dashboardIndex' }" exact-active-class="active" active-class="active">
                        <svg style="padding-right: 3px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                        </svg> Home
                    </RouterLink>
                </div>
                <div class="col-lg-4 text-center">
                    <RouterLink style="font-weight: 650; color: black ; text-decoration: none" :to="{ name: 'dashboardEvents' }">
                        <svg style="padding-right: 3px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg> Events
                    </RouterLink>
                </div>
                <div class="col-lg-4 text-center">
                    <RouterLink style="font-weight: 650; color: black ; text-decoration: none" :to="{ name: 'dashboardChats' }">
                        <svg style="padding-right: 3px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>  Chats
                    </RouterLink>
                </div>
            </div>
        </div>
    </div>
    <!--    <router-link :to="{ name: 'dashboardViewRedditPost', params: { id: 0 } }">View</router-link>-->
    <!--    <router-link :to="{ name: 'dashboardUpdateRedditPost', params: { id: 0 } }">Update</router-link>-->
    <!--    <RouterLink :to="{ name: 'dashboardCreateRedditPost' }">Create</RouterLink>-->
</template>
