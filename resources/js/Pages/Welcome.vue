<template>
    <Head title="Главная страница" />

    <Header :menuItems="menuItems"/>
    <Main/>
    <About :advantages="advantages"/>

</template>

<style>
    body {
        background-color: #fff;
        margin: 0px;
        font-family: 'Poppins', sans-serif;
    }
    ul{
        padding: 0px;
        margin: 0px;
    }
    li{
        list-style: none;
    }
    a{
        text-decoration: none;
        cursor: pointer;
    }
    h1, h2, h3, h4, h5, h6, p{
        margin: 0px;
        line-height: 0;
    }
    input, button, textarea, select{
        outline: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        font-family: 'Poppins', sans-serif;
    }
</style>

<script setup>
import { Head } from '@inertiajs/vue3';
import Header from "../Components/Header.vue";
import Main from "../Components/Main.vue";
import About from "../Components/About.vue";

defineProps({
    menuItems: {
        type: Array,
        default: () => []
    },
    advantages: {
        type: Array,
        default: () => []
    }
})
</script>
