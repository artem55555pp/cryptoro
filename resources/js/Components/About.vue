<script setup>
import { computed } from 'vue'

const props = defineProps({
    advantages: {
        type: Array,
        default: () => []
    }
})

const leftAdvantages = computed(() => props.advantages.filter(a => a.order <= 2))
const centerAdvantagesFirst = computed(() => props.advantages.filter(a => a.order === 3))
const centerAdvantagesSecond = computed(() => props.advantages.filter(a => a.order === 4))
const rightAdvantages = computed(() => props.advantages.filter(a => a.order >= 5))

const backgroundImages = [
    '/assets/abF.png',
    '/assets/abT.png',
    '/assets/abFi.png',
    '/assets/abFi.png',
    '/assets/abTh.png',
    '/assets/abFo.png'
]
</script>

<template>
    <div class="about">
        <h2>Товары, которые покупают чаще всего</h2>

        <div class="about__row" v-if="advantages.length > 0">
            <div class="about__item">
                <div 
                    v-for="(advantage, index) in leftAdvantages" 
                    :key="advantage.id"
                    class="about-block"
                    :style="{ backgroundImage: `url(${backgroundImages[index] || '/assets/abF.png'})` }"
                >
                    <div class="about__item-box">
                        <img :src="advantage.icon || '/assets/block.svg'" alt="Image">
                        <p v-html="advantage.title.replace(/\n/g, '<br>')"></p>
                    </div>
                    <a href="#" class="send">
                        <img src="/assets/Arrow%202%20(Stroke).svg" alt="Image">
                    </a>
                </div>
            </div>
            <div class="about__item">
                <div 
                    v-for="(advantage, index) in centerAdvantagesFirst" 
                    :key="advantage.id"
                    class="about__sec-block"
                    :style="{ backgroundImage: `url(${backgroundImages[2] || '/assets/abFi.png'})` }"
                >
                    <div class="about__item-box">
                        <img :src="advantage.icon || '/assets/block.svg'" alt="Image">
                        <p>{{ advantage.title }}</p>
                    </div>
                    <p v-if="advantage.description" class="about__item-box-desc" v-html="advantage.description.replace(/\n/g, '<br>')"></p>
                    <a href="#" class="send">
                        <img src="/assets/Arrow%202%20(Stroke).svg" alt="Image">
                    </a>
                </div>
                <div class="about-bg" v-if="centerAdvantagesFirst.length > 0 || centerAdvantagesSecond.length > 0">
                    <h3>Популярные категории</h3>
                </div>
                <div 
                    v-for="(advantage, index) in centerAdvantagesSecond" 
                    :key="advantage.id"
                    class="about__sec-block"
                    :style="{ backgroundImage: `url(${backgroundImages[3] || '/assets/abFi.png'})` }"
                >
                    <div class="about__item-box">
                        <img :src="advantage.icon || '/assets/block.svg'" alt="Image">
                        <p>{{ advantage.title }}</p>
                    </div>
                    <p v-if="advantage.description" class="about__item-box-desc" v-html="advantage.description.replace(/\n/g, '<br>')"></p>
                    <a href="#" class="send">
                        <img src="/assets/Arrow%202%20(Stroke).svg" alt="Image">
                    </a>
                </div>
            </div>
            <div class="about__item">
                <div 
                    v-for="(advantage, index) in rightAdvantages" 
                    :key="advantage.id"
                    class="about-block"
                    :style="{ backgroundImage: `url(${backgroundImages[index + 4] || '/assets/abTh.png'})` }"
                >
                    <div class="about__item-box">
                        <img :src="advantage.icon || '/assets/block.svg'" alt="Image">
                        <p v-html="advantage.title.replace(/\n/g, '<br>')"></p>
                    </div>
                    <a href="#" class="send">
                        <img src="/assets/Arrow%202%20(Stroke).svg" alt="Image">
                    </a>
                </div>
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
$border-radius-sm: 20px;
$border-radius-md: 30px;

// Common block styles
%block-base {
    width: 100%;
    background-size: cover;
    background-position: left bottom;
    background-repeat: no-repeat;
    padding: 25px;
    margin-top: 10px;
    position: relative;
    border-radius: $border-radius-sm;
}

.about {
    margin: 160px 0 40px;
}

h2 {
    font-size: 31px;
    color: $color-text;
    line-height: 1.3;
    margin-top: 40px;
}

.about__row {
    margin-top: 40px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.about__item {
    &:nth-child(1) {
        width: 24.5%;
    }

    &:nth-child(2) {
        width: 50%;
    }

    &:nth-child(3) {
        width: 24.5%;
    }

    &:nth-child(1) .about-block {
        &:nth-child(1) {
            @extend %block-base;
            height: 493px;
            background-image: url('/assets/abF.png');
        }

        &:nth-child(2) {
            @extend %block-base;
            height: 493px;
            background-image: url('/assets/abT.png');
        }
    }

    &:nth-child(3) .about-block {
        &:nth-child(1) {
            @extend %block-base;
            height: 493px;
            background-image: url('/assets/abTh.png');
        }

        &:nth-child(2) {
            @extend %block-base;
            height: 493px;
            background-image: url('/assets/abFo.png');
        }
    }
}

.about__item-box {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 20px;

    img {
        background-color: $color-white;
        border-radius: 50%;
        padding: 12px 15px;
    }

    p {
        font-size: 31px;
        color: $color-text;
        line-height: 26px;
    }
}

.about__sec-block {
    @extend %block-base;
    background-image: url('/assets/abFi.png');
    padding: 30px;
    height: auto;

    .about__item:nth-child(2) &:nth-child(1),
    .about__item:nth-child(2) &:nth-child(3) {
        height: 234px;
    }
}

.about__item-box-desc {
    font-size: 21px;
    color: $color-text;
    line-height: 20px;
    margin: 35px 0 0 75px;
    max-width: 668px;
}

.about-bg {
    background-image: url('/assets/Rectangle 2340 1.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: $border-radius-md;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    height: 508px;

    h3 {
        position: relative;
        font-size: 35px;
        padding: 35px 50px;
        color: $color-white;
        border-radius: $border-radius-md;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(38.31px);
        -webkit-backdrop-filter: blur(38.31px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
}

// Media queries
@media (max-width: 1300px) {
    .about {
        margin: 30px 0 40px;
    }

    h2 {
        font-size: 25px;
        text-align: center;
        margin-top: 50px;
    }

    .about__item {
        &:nth-child(1),
        &:nth-child(2),
        &:nth-child(3) {
            width: 100%;
        }

        &:nth-child(1) .about-block,
        &:nth-child(3) .about-block {
            &:nth-child(1),
            &:nth-child(2) {
                height: auto;
                min-height: 200px;
                background-image: unset;
                background-color: $color-bg;
            }
        }
    }

    .about__sec-block {
        height: auto;
        min-height: 200px;
        background-image: unset;
        background-color: $color-bg;

        .about__item:nth-child(2) &:nth-child(1),
        .about__item:nth-child(2) &:nth-child(3) {
            height: auto;
        }
    }

    .about-bg {
        height: auto;
        min-height: 200px;
        padding-block: 10vh;

        h3 {
            font-size: 25px;
            padding: 25px 40px;
        }
    }

    .about__item-box-desc {
        margin: 15px 0 0 0;
    }
}

@media (max-width: 500px) {
    h2 {
        font-size: 20px;
        margin-top: 20px;
    }

    .about__row {
        margin-top: 20px;
    }

    .about__item-box {
        gap: 10px;

        img {
            padding: 5px 7px;
            transform: scale(0.6);
        }

        p {
            font-size: 18px;
            line-height: 1.3;

            br {
                display: none;
            }
        }
    }

    .about__item-box-desc {
        font-size: 12px;
        line-height: 1.3;
        margin: 15px 0 0 0;
        max-width: 100%;
        word-wrap: break-word;
        overflow-wrap: break-word;

        br {
            display: none;
        }
    }

    .about__item {
        &:nth-child(1) .about-block,
        &:nth-child(3) .about-block {
            &:nth-child(1),
            &:nth-child(2) {
                height: auto;
                min-height: 200px;
                padding-bottom: 54px;
            }
        }
    }

    .about__sec-block {
        height: auto;
        min-height: 200px;
        padding-bottom: 54px;

        .about__item:nth-child(2) &:nth-child(1),
        .about__item:nth-child(2) &:nth-child(3) {
            height: auto;
        }
    }

    .about-bg {
        height: auto;
        min-height: 200px;

        h3 {
            font-size: 16px;
            padding: 20px 30px;
        }
    }
}
</style>
