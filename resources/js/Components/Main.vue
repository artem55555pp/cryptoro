<script setup>
</script>

<template>
    <div class="main__row">
        <div class="main__row-fl">
            <div class="main__item">
                <div class="main__item__h-box">
                    <h1 class="main__item-h">
                        Интернет-магазин оборудования для защиты криптоактивов
                    </h1>
                </div>
                <p class="main__item-desc">
                    Сryptoro - официальный реселлер,<br> самый большой выбор в России
                </p>
                <div class="main__item-box">
                    <div class="main__item-flex">
                        <p class="main__item__box-title">10+</p>
                        <p class="main__item__box-desc">лет на рынке</p>
                    </div>
                    <div class="main__item-flex">
                        <p class="main__item__box-title">50+</p>
                        <p class="main__item__box-desc">брендов</p>
                    </div>
                    <div class="main__item__box-block">
                        <div class="main__item__box__img-block-f">
                            <img src="/assets/itemO.svg" alt="Img">
                        </div>
                        <div class="main__item__box__img-block-s">
                            <img src="/assets/itemT.svg" alt="Img">
                        </div>
                        <div class="main__item__box__img-block-t">
                            <img src="/assets/itemTh.svg" alt="Img">
                        </div>
                        <div class="main__item__box__img-block-fo">
                            <img src="/assets/itemF.svg" alt="Img">
                        </div>
                        <div class="main__item__box__img-block-fi">
                            <img src="/assets/itemF.svg" alt="Img">
                        </div>
                        <div class="main__item__box__img-block-si">
                            <img src="/assets/itemS.svg" alt="Img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="main__second-item">
                <div class="main__second__item-box">
                    <span>Выгодные предложения</span>
                    <img src="/assets/simvol.svg" alt="Simvol">
                </div>
                <div class="main__second-block">
                    <div class="main__second__block-box">
                        <img src="/assets/mainSecO.svg" alt="Image" class="main__second__block-box-img">
                        <div class="main__second__block__box-box">
                            <p>Аппаратный кошелёк SecuX Nifty NFT</p>
                            <div class="main__second__block__box-price">
                                <span>24 490 ₽</span>
                                <img src="/assets/arrowS.svg" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="main__second__block-box">
                        <img src="/assets/mainSecTh.svg" alt="Image" class="main__second__block-box-img">
                        <div class="main__second__block__box-box">
                            <p>Устройство для записи seed фразы Cryptotag Thor</p>
                            <div class="main__second__block__box-price">
                                <span>14 490 ₽</span>
                                <img src="/assets/arrowS.svg" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main__second-block">
                    <div class="main__second__block-box">
                        <img src="/assets/mainSecT.svg" alt="Image" class="main__second__block-box-img">
                        <div class="main__second__block__box-box">
                            <p>Аппаратный ключ Yubikey 5C Nano</p>
                            <div class="main__second__block__box-price">
                                <span>2 490 ₽</span>
                                <img src="/assets/arrowS.svg" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="main__second__block-box">
                        <img src="/assets/mainSecF.svg" alt="Image" class="main__second__block-box-img">
                        <div class="main__second__block__box-box">
                            <p>Аппаратный кошелёк Trezor T Black</p>
                            <div class="main__second__block__box-price">
                                <span>8 490 ₽</span>
                                <img src="/assets/arrowS.svg" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__row-sl">
            <div class="main__row__sl-item">
                <p>Защита учётных<br> записей</p>
                <a href="#" class="send">
                    <img src="/assets/Arrow%202%20(Stroke).svg" alt="Image">
                </a>
            </div>
            <div class="main__row__sl-item">
                <div class="main__row__sl__item-box">
                    <p>Социальные сети</p>
                    <img src="/assets/simvol.svg" alt="Image">
                </div>
                <div class="main__row__sl__item-block">
                    <div class="main__row-net">
                        <a href="#">
                            <img src="/assets/Vector%20(1).svg" alt="Telegram">
                        </a>
                        <a href="#">
                            <img src="/assets/Vector%20(2).svg" alt="YouTube">
                        </a>
                    </div>
                    <div class="main__row-mail">
                        <a href="mailto:shop@crypto.ru">shop@cryptoro.ru</a>
                    </div>
                </div>
            </div>
            <div class="main__row__sl-item">
                <div class="main__row__sl__item-box-f">
                    <p>Актуальные статьи</p>
                    <img src="/assets/copy.svg" alt="Image">
                </div>
                <a href="#" class="send-left">
                    <img src="/assets/send.svg" alt="Image">
                    <span>Читать</span>
                </a>
            </div>
            <div class="main__row__sl-item">
                <p>Хранение паролей и seed-фраз</p>
                <a href="#" class="send">
                    <img src="/assets/Arrow%202%20(Stroke).svg" alt="Image">
                </a>
            </div>
        </div>
        <div class="main__h-desc">
            <span>
                Физические устройства из стали и титана<br> надёжнее бумаги и облачных сервисов
            </span>
        </div>
    </div>
</template>

<style>
.main__row {
    width: 100%;
    min-height: 120vh;
    background-color: #E9EDF3;
    padding: 30px;
    border-radius: 20px 20px 0 20px;
    position: relative;
}

.main__row-fl {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}

.main__item {
    width: 49.6%;
    min-height: 70vh;
    background-color: #fff;
    border-radius: 30px;
    padding: 30px;
}

.main__second-item {
    width: 49.6%;
    min-height: 70vh;
    background-image: url('/assets/Rectangle 2280 1.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 30px;
    padding: 30px;
}

.main__item__h-box {
    position: relative;
}

.main__item__h-box::after {
    content: url(/assets/arrow.svg) '\00a0\00a0 В каталог';
    position: absolute;
    top: 3.5em;
    right: 10px;
    background-color: #17BE79;
    border-radius: 30px;
    padding: 5px 15px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    display: inline-block;
    transform: translateY(-16px);
}

.main__item-h {
    font-size: 32px;
    color: #272B37;
    line-height: 35px;
    letter-spacing: 1px;
}

.main__item-desc {
    font-size: 22px;
    color: #272B37;
    line-height: 26px;
    margin-top: 10px;
}

.main__item-box {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin-top: 28vh;
}
.main__item-flex:nth-child(1) {
    margin-right: 20px;
}

.main__item__box-title {
    font-size: 30px;
    line-height: 5px;
    color: #272B37;
}

.main__item__box-desc {
    font-size: 15px;
    line-height: 30px;
    color: #272B37;
    margin-top: 10px;
}

.main__item__box-block {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.main__item__box__img-block-f,
.main__item__box__img-block-s,
.main__item__box__img-block-t,
.main__item__box__img-block-fo,
.main__item__box__img-block-fi,
.main__item__box__img-block-si {
    background-color: #E9EDF3;
    padding: 15px;
    border-radius: 50%;
    border: 2px solid #fff;
}

.main__item__box__img-block-f img,
.main__item__box__img-block-s img,
.main__item__box__img-block-t img,
.main__item__box__img-block-fo img,
.main__item__box__img-block-fi img,
.main__item__box__img-block-si img {
    width: 25px;
    height: 25px;
}

.main__item__box__img-block-si {
    z-index: 0;
}

.main__item__box__img-block-fi {
    z-index: 1;
    left: 1em;
    position: relative;
}

.main__item__box__img-block-fo {
    z-index: 2;
    left: 2em;
    position: relative;
}

.main__item__box__img-block-t {
    z-index: 3;
    left: 3em;
    position: relative;
}

.main__item__box__img-block-s {
    z-index: 4;
    left: 4em;
    position: relative;
}

.main__item__box__img-block-f {
    z-index: 5;
    left: 5em;
    position: relative;
}

.main__second__item-box {
    display: flex;
    justify-content: space-between;
    margin-bottom: 28vh;
}

.main__second__item-box span {
    padding: 10px 14px;
    background-color: #fff;
    border-radius: 20px;
    font-size: 14px;
    color: #272B37;
}

.main__second-block {
    display: flex;
    justify-content: space-between;
    gap: 5px;
}

.main__second-block:last-child {
    display: flex;
    justify-content: space-between;
    gap: 5px;
    margin-top: 5px;
}

.main__second__block-box {
    width: 50%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    padding: 21px 11px;
    border-radius: 30px;
    gap: 10px;
    cursor: pointer;
}
.main__second__block-box:nth-child(1) .main__second__block-box-img {
    width: 40px;
}
.main__second__block-box:nth-child(2) .main__second__block-box-img {
    width: 50px;
}
.main__second__block-box:nth-child(3) .main__second__block-box-img {
    width: 50px;
}
.main__second__block-box:nth-child(4) .main__second__block-box-img {
    width: 50px;
}
.main__second__block__box-box p {
    font-size: 14px;
    color: #272B37;
    line-height: 18px;
    text-align: center;
}

.main__second__block__box-price {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.main__second__block__box-price img {
    width: 12px;
}

.main__second__block__box-price span {
    font-size: 15px;
    font-weight: 700;
    color: #272B37;
}
.main__row-sl {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.main__row__sl-item:nth-child(1) {
    width: 24.5%;
    min-height: 52vh;
    background-image: url(/assets/flash.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 25px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}

.main__row__sl-item:nth-child(2) {
    width: 24.5%;
    min-height: 52vh;
    background-image: url('/assets/Rectangle 2284.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 30px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}

.main__row__sl-item:nth-child(3) {
    width: 24.5%;
    min-height: 52vh;
    background-image: url('/assets/Group 1321317162 (2).png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 30px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}

.main__row__sl-item:nth-child(4) {
    width: 24.5%;
    min-height: 52vh;
    background-image: url(/assets/s4.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 25px;
    margin-top: 10px;
    position: relative;
    border-radius: 20px;
}

.send {
    position: absolute;
    right: 0;
    bottom: 0;
    background-color: #17BE79;
    border-radius: 12px;
    padding: 12px;
}
.send img {
    width: 12px;
}
.main__row__sl-item p {
    font-size: 22px;
    line-height: 26px;
    color: #fff;
}
.main__row__sl__item-box {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.main__row__sl__item-box p {
    padding: 8px 10px;
    background-color: #fff;
    border-radius: 20px;
    font-size: 12px;
    color: #272B37;
    line-height: 0;
    display: flex;
    align-items: center;
}
.main__row__sl__item-block {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin-top: 33vh;
}
.main__row-net {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
}
.main__row-net a {
    background-color: #fff;
    padding: 12px 10px;
    border-radius: 50%;
    cursor: pointer;
}
.main__row-net a img {
    width: 12px;
}
.main__row-mail a {
    background-color: #fff;
    color: #17BE79;
    font-size: 12px;
    padding: 6px 12px;
    border-radius: 20px;
    cursor: pointer;
}
.main__row__sl__item-box-f {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
.main__row__sl__item-box-f p{
    padding: 2px 12px;
    background-color: #E9EDF3;
    border-radius: 20px;
    font-size: 12px;
    color: #272B37;
}
.main__row__sl__item-box-f img {
    background-color: #E9EDF3;
    border-radius: 50%;
    padding: 12px;
    width: 40px;
}
.main__row__sl__item-box img {
    width: 45px;
}
.send-left {
    display: flex;
    align-items: center;
    gap: 10px;
    position: absolute;
    bottom: 30px;
    left: 30px;
}
.send-left span {
    font-size: 12px;
}
.send-left img {
    width: 12px;
}
.main__h-desc {
    display: flex;
    justify-content: flex-end;
    position: absolute;
    bottom: -10.2vh;
    right: 0;
}
.main__h-desc span {
    position: relative;
    background: #E9EDF3;
    padding: 40px 25px 25px 50px;
    line-height: 18px;
    font-size: 16px;
    border-radius: 0 0 20px 20px;
}
.main__h-desc span::before {
    content: '';
    position: absolute;
    top: 0;
    left: -25px;
    width: 30px;
    height: 30px;
    background: #E9EDF3;
    border-radius: 50%;
    z-index: 1;
}
.main__h-desc span::after {
    content: '';
    position: absolute;
    top: 8px;
    left: -40px;
    width: 40px;
    height: 40px;
    background: #ffffff;
    border-radius: 50%;
    z-index: 2;
}
@media (max-width: 1300px) {
    .main__row {
        border-radius: 20px;
    }
    .main__h-desc {
        position: unset;
    }
    .main__h-desc span::before,
    .main__h-desc span::after{
        display: none;
    }
    .main__h-desc {
        justify-content: center;
    }
    .main__h-desc span {
        padding: 30px 0 0 0;
    }
    .main__h-desc span br {
        display: none;
    }
    .main__item,
    .main__second-item{
        width: 100%;
    }
    .main__row-fl {
        gap: 10px;
    }
    .main__item {
        min-height: 60vh;
    }
    .main__item-box {
        margin-top: 20vh;
    }
    .main__item__h-box::after {
        top: 11em;
        left: 0;
        right: unset;
        position: relative;
    }
    .main__second-item {
        min-height: 60vh;
    }
    .main__second__item-box {
        margin-bottom: 20vh;
    }
    .main__second__block-box {
        justify-content: center;
        flex-direction: column;
    }
    .main__second__block__box-box {
        justify-content: center;
        display: flex;
        align-items: center;
        gap: 10px;
    }
}
@media (max-width: 768px) {
    .main__row-sl {
        gap: 5px;
    }
    .main__row__sl-item:nth-child(1),
    .main__row__sl-item:nth-child(2),
    .main__row__sl-item:nth-child(3),
    .main__row__sl-item:nth-child(4) {
        width: 49%;
    }
}
@media (max-width: 500px) {
    .main__row {
        padding: 10px;
    }
    body {
        padding-inline: 10px;
    }
    .main__item__box__img-block-f, .main__item__box__img-block-s, .main__item__box__img-block-t, .main__item__box__img-block-fo, .main__item__box__img-block-fi, .main__item__box__img-block-si {
        padding: 8px;
    }
    .main__item-box {
        justify-content: flex-end;
    }
    .main__second-block {
        flex-wrap: wrap;
    }
    .main__second__item-box {
        margin-bottom: 10vh;
    }
    .main__second__block-box {
        width: 100%;
    }
    .main__second__block-box {
        padding: 10px;
    }
    .main__second__block__box-box {
        flex-direction: column;
    }
    .main__row__sl-item:nth-child(1),
    .main__row__sl-item:nth-child(2),
    .main__row__sl-item:nth-child(3),
    .main__row__sl-item:nth-child(4) {
        width: 100%;
    }
    .main__h-desc span {
        text-align: center;
        padding: 10px 0 0 0;
    }
    .main__item-desc {
        margin-top: 0;
    }
}
@media (max-width: 390px) {
    .main__item__h-box::after {
        top: 13em;
        padding: 5px 10px;
        font-size: 13px;
        transform: translateY(0);
    }
}
</style>
