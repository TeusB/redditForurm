<template>
    <div class="flexT">
        <div class="left">
            <img style="width: 300px;; height: auto;" src="../../../images/logo.jpeg" alt="TAgencyLogo">
        </div>
        <div class="bottom">
            <h1>Welkom op het forum</h1>
        </div>
        <br>
        <div class="right">
            <h2>bekijk de nieuwe threads</h2>
        </div>
        <div class="linkje">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">click deze link</a>
        </div>
    </div>
</template>
<style>
.left {
    display: inline-block;
    margin: 0 0.5rem;
    animation: backInRight;
    animation-duration: 2s;
    align-self: center;
}

.right {
    display: inline-block;
    margin: 0 0.5rem;
    animation: backInLeft;
    animation-duration: 2s;
}

.flexT {
    height: 90%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.bottom {
    display: inline-block;
    margin: 0 0.5rem;
    animation: backInUp;
    animation-duration: 2s;
}

.linkje {
    display: inline-block;
    margin: 0 0.5rem;
    animation: bounceInUp;
    animation-duration: 2s;
}
</style>