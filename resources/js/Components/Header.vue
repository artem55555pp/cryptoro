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

<style lang="scss">
// Variables
$color-primary: #17BE79;
$color-text: #272B37;
$color-bg: #E9EDF3;
$color-white: #fff;
$color-hover: #808080;
$border-radius-sm: 20px;
$border-radius-round: 50px;
$transition: 0.3s ease;

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

nav {
    ul {
        display: flex;
        align-items: center;
        background-color: $color-bg;
        padding: 12px 20px;
        border-radius: $border-radius-round;
        flex-wrap: wrap;
        gap: 4.5px;

        li {
            cursor: pointer;
            padding: 10px 25px;
            margin-right: 0;
            border-radius: $border-radius-round;
            transition: background-color $transition;

            &:hover {
                background-color: $color-primary;

                a {
                    color: $color-white;
                }
            }

            a {
                font-size: 16px;
                color: $color-text;
            }

            &.nav__first-child {
                background-color: $color-primary;

                a {
                    color: $color-white;
                }
            }
        }
    }
}

.header__item {
    &:last-child {
        display: flex;
        gap: 10px;
        align-items: center;

        a {
            background-color: $color-primary;
            border-radius: $border-radius-round;
            padding: 12px;
            transition: background-color $transition;

            &:hover {
                background-color: $color-hover;

                .header__icon {
                    filter: brightness(0) invert(1);
                }
            }
        }
    }
}

.header__icon {
    max-width: 100%;
    width: 16px;
    transition: filter $transition;
}

.header__burger {
    display: none;
    flex-direction: column;
    gap: 4px;
    cursor: pointer;

    span {
        display: block;
        width: 25px;
        height: 3px;
        background: $color-text;
        border-radius: 2px;
    }
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
        background: $color-bg;
        border-radius: $border-radius-sm;
        margin-top: 10px;
        align-items: flex-start;
        overflow: hidden;
        max-height: 0;
        padding: 0 15px;
        transition: max-height 0.4s ease, padding 0.4s ease;

        &.open {
            max-height: 500px;
            padding: 15px;
        }
    }

    .header__burger {
        display: flex;
    }

    nav {
        ul {
            flex-direction: column;
            gap: 8px;
            padding: 0;
            background: none;
            align-items: flex-start;

            li {
                padding: 8px 15px;
                margin-right: 0;

                &.nav__first-child {
                    transition: background 0.4s ease, color 0.4s ease;
                }
            }
        }
    }

    .header__icons {
        justify-content: flex-end;
        gap: 15px;
        margin-top: 10px;
    }
}

@media (max-width: 500px) {
    nav ul li {
        a {
            font-size: 14px;
        }

        &.nav__first-child {
            padding: 2px 15px;

            a {
                font-size: 14px;
            }
        }
    }

    .header__icons {
        margin: 0;
    }

    .header__icon {
        width: 12px;
    }
}
</style>
