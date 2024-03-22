<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link href="/" class="logo-container">
        <img src="../../assets/img/logoTrueta.png" alt="Logotip de l'Hospital Trueta" class="logo">
    </Link>
</template>

<style scoped>
.logo-container {
    width: 100%;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.logo-container img {
    height: 100%;
}

@media screen and (max-width: 768px){
    .logo{
        justify-content: center !important;
        height: 70px !important;
    }
}

</style>