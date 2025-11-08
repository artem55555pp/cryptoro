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

<style>
.about {
    margin: 160px 0 40px;
}
h2 {
    font-size: 31px;
    color: #272B37;
}
.about__row {
    margin-top: 40px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.about__item:nth-child(1) {
    width: 24.5%;
}
.about__item:nth-child(2) {
    width: 50%;
}
.about__item:nth-child(3) {
    width: 24.5%;
}
.about__item:nth-child(1) .about-block:nth-child(1) {
    width: 100%;
    height: 493px;
    background-image: url(/assets/abF.png);
    background-size: cover;
    background-position: right bottom;
    background-repeat: no-repeat;
    padding: 25px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}
.about__item:nth-child(1) .about-block:nth-child(2) {
    width: 100%;
    height: 493px;
    background-image: url(/assets/abT.png);
    background-size: cover;
    background-position: right bottom;
    background-repeat: no-repeat;
    padding: 25px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}
.about__item:nth-child(3) .about-block:nth-child(1) {
    width: 100%;
    height: 493px;
    background-image: url(/assets/abTh.png);
    background-size: cover;
    background-position: right bottom;
    background-repeat: no-repeat;
    padding: 25px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}
.about__item:nth-child(3) .about-block:nth-child(2) {
    width: 100%;
    height: 493px;
    background-image: url(/assets/abFo.png);
    background-size: cover;
    background-position: right bottom;
    background-repeat: no-repeat;
    padding: 25px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}
.about__item-box {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 20px;
}
.about__item-box img {
    background-color: #fff;
    border-radius: 50%;
    padding: 12px 15px;
}
.about__item-box p {
    font-size: 31px;
    color: #272B37;
    line-height: 26px;
}
.about__sec-block {
    background-image: url(/assets/abFi.png);
    background-size: cover;
    background-position: right bottom;
    background-repeat: no-repeat;
    padding: 30px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}

.about__item:nth-child(2) .about__sec-block:nth-child(1) {
    height: 234px;
}

.about__item:nth-child(2) .about__sec-block:nth-child(3) {
    height: 234px;
}
.about__item-box-desc {
    font-size: 21px;
    color: #272B37;
    line-height: 20px;
    margin: 20px 0 0 75px;
    max-width: 668px;
}
.about-bg {
    background-image: url(/assets/Rectangle 2340 1.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    height: 508px;
}
.about-bg h3 {
    position: relative;
    font-size: 35px;
    padding: 35px 50px;
    color: #fff;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(38.31px);
    -webkit-backdrop-filter: blur(38.31px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}
@media (max-width: 1300px) {
    .about {
        margin: 30px 0 40px;
    }
    h2 {
        font-size: 25px;
        text-align: center;
    }
    .about__item:nth-child(1),
    .about__item:nth-child(2),
    .about__item:nth-child(3) {
        width: 100%;
    }
    .about__item:nth-child(1) .about-block:nth-child(1),
    .about__item:nth-child(1) .about-block:nth-child(2),
    .about__item:nth-child(3) .about-block:nth-child(1),
    .about__item:nth-child(3) .about-block:nth-child(2),
    .about__sec-block{
        height: auto;
        min-height: 200px;
        background-image: unset;
        background-color: #E9EDF3;
    }
    .about__item:nth-child(2) .about__sec-block:nth-child(1),
    .about__item:nth-child(2) .about__sec-block:nth-child(3) {
        height: auto;
    }
    .about-bg {
        height: auto;
        min-height: 200px;
    }
    .about__item-box-desc {
        margin: 0;
    }
    .about-bg {
        padding-block: 10vh;
    }
    .about-bg h3 {
        font-size: 25px;
        padding: 25px 40px;
    }
}
@media (max-width: 500px) {
    h2 {
        font-size: 20px;
    }
    .about__row {
        margin-top: 20px;
    }
    .about__item-box img {
        padding: 9px 12px;
    }
    .about__item-box p {
        font-size: 20px;
        line-height: 1.3;
    }
    .about__item-box p br {
        display: none;
    }
    .about__item-box-desc {
        font-size: 14px;
        line-height: 1.4;
        margin: 15px 0 0 0;
        max-width: 100%;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
    .about__item-box-desc br {
        display: none;
    }
    .about__item:nth-child(1) .about-block:nth-child(1),
    .about__item:nth-child(1) .about-block:nth-child(2),
    .about__item:nth-child(3) .about-block:nth-child(1),
    .about__item:nth-child(3) .about-block:nth-child(2),
    .about__sec-block {
        height: auto;
        min-height: 200px;
        padding-bottom: 54px;
    }
    .about__item:nth-child(2) .about__sec-block:nth-child(1),
    .about__item:nth-child(2) .about__sec-block:nth-child(3) {
        height: auto;
    }
    .about-bg {
        height: auto;
        min-height: 200px;
    }
    .about-bg h3 {
        font-size: 16px;
        padding: 20px 30px;
    }
}
</style>
