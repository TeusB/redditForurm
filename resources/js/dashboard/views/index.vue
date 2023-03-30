<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="flexT">
        <div class="left">
            <img style="width: 50%" src="../../../images/amongus.png" alt="TAgencyLogo">
        </div>
    </div>
    <div class="bottom">
        <h1>Welkom op het forum</h1>
    </div>
    <br>
    <div class="right">
        <h2>bekijk de nieuwe threads</h2>
    </div>
</template>
<style>
.left {
    display: inline-block;
    margin: 0 0.5rem;
    animation: backInRight;
    animation-duration: 2s;
}

.right {
    display: inline-block;
    margin: 0 0.5rem;
    animation: backInLeft;
    animation-duration: 2s;
}

.flexT {
    display: flex;
    flex-direction: row;
    justify-content: center;
}

.bottom {
    display: inline-block;
    margin: 0 0.5rem;
    animation: backInUp;
    animation-duration: 2s;
}
</style>