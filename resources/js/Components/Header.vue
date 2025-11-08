<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    menuItems: {
        type: Array,
        default: () => []
    }
})

const activeIndex = ref(0)
const menuOpen = ref(false)

const setActive = (index) => {
    activeIndex.value = index
}

const toggleMenu = () => {
    menuOpen.value = !menuOpen.value
}
</script>

<template>
    <div class="header__row">
        <div class="header__item-logo">
            <Link href="/">
                <img src="/assets/logo.svg" alt="Logo" class="header__logo">
            </Link>
        </div>

        <!-- Бургер -->
        <div class="header__burger" @click="toggleMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Меню + иконки внутри бургер-контейнера -->
        <div class="header__menu-container" :class="{ 'open': menuOpen }">
            <nav>
                <ul>
                    <li
                        v-for="(item, index) in menuItems"
                        :key="item.id"
                        :class="{ 'nav__first-child': activeIndex === index }"
                        @click="setActive(index)"
                    >
                        <a :href="item.url || '#'">{{ item.title }}</a>
                    </li>
                </ul>
            </nav>

            <div class="header__item header__icons">
                <a href="#"><img src="/assets/search.svg" alt="Search" class="header__icon"></a>
                <a href="#"><img src="/assets/like.svg" alt="Like" class="header__icon"></a>
                <a href="#"><img src="/assets/shop.svg" alt="Shop" class="header__icon"></a>
            </div>
        </div>
    </div>
</template>

<style>
body {
    max-width: 1920px;
    padding-inline: 20px;
    font-family: 'Poppins', sans-serif;
}

.header__row {
    padding: 20px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

.header__logo {
    max-width: 100%;
    width: 230px;
}

nav ul {
    display: flex;
    align-items: center;
    background-color: #E9EDF3;
    padding: 12px 20px;
    border-radius: 50px;
    flex-wrap: wrap;
}


.nav__first-child a {
    font-size: 16px;
    color: #fff;
}

nav ul li a {
    font-size: 16px;
    color: #272B37;
}

nav ul li {
    cursor: pointer;
    padding: 10px 25px;
    margin-right: 36px;
    border-radius: 50px;
    transition: background-color 0.3s ease;
}

nav ul li:hover {
    background-color: #17BE79;
}

nav ul li:hover a {
    color: #fff;
}

nav ul li:last-child {
    margin-right: 0;
}

.nav__first-child {
    background-color: #17BE79;
}

.header__item:last-child {
    display: flex;
    gap: 10px;
    align-items: center;
}

.header__item:last-child a {
    background-color: #17BE79;
    border-radius: 50%;
    padding: 12px;
    transition: background-color 0.3s ease;
}

.header__item:last-child a:hover {
    background-color: #808080;
}

.header__icon {
    max-width: 100%;
    width: 16px;
    transition: filter 0.3s ease;
}

.header__item:last-child a:hover .header__icon {
    filter: brightness(0) invert(1);
}

.header__burger {
    display: none;
    flex-direction: column;
    gap: 4px;
    cursor: pointer;
}

.header__burger span {
    display: block;
    width: 25px;
    height: 3px;
    background: #272B37;
    border-radius: 2px;
}

.header__menu-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    align-items: center;
    width: 73%;
}

@media (max-width: 1500px) {
    nav ul li {
        padding: 8px 12px;
        margin-right: 12px;
    }

    body h2 {
        margin-top: 66px;
        line-height: 1;
    }
}

@media (max-width: 1300px) {
    nav ul li {
        padding: 8px 8px;
        margin-right: 12px;
    }
}

@media (max-width: 1170px) {
    .header__menu-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        background: #E9EDF3;
        border-radius: 20px;
        margin-top: 10px;
        align-items: flex-start;
        overflow: hidden;
        max-height: 0;
        padding: 0 15px;
        transition: max-height 0.4s ease, padding 0.4s ease;
    }

    .header__menu-container.open {
        max-height: 500px;
        padding: 15px;
    }

    .header__burger {
        display: flex;
    }

    nav ul li.nav__first-child {
        transition: background 0.4s ease, color 0.4s ease;
    }

    nav ul {
        flex-direction: column;
        gap: 8px;
        padding: 0;
        background: none;
        align-items: flex-start;
    }

    nav ul li {
        padding: 8px 15px;
        margin-right: 0;
    }

    .header__icons {
        justify-content: flex-end;
        gap: 15px;
        margin-top: 10px;
    }
}
@media (max-width: 500px) {
    .nav__first-child a {
        font-size: 14px;
    }
    nav ul li a {
        font-size: 14px;
    }
    .header__icons {
        margin: 0;
    }
    .header__icon {
        width: 12px;
    }
    .nav__first-child {
        padding: 2px 15px;
    }
}
</style>
