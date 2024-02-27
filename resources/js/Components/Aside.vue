<script setup>

import { ref } from 'vue';

const collapsed = ref({
    cardiaca: false,
    urològica: false
});

const toggleCollapse = (key) => {
    collapsed.value[key] = !collapsed.value[key];
};

</script>

<template>
    <aside class="menu">
        <ul class="menu-list">
            <li>
                <div class="title">
                <a class="name" @click="toggleCollapse('cardiaca')">CIRURGIA CARDÍACA</a>
                <img src="../../assets/svg/arrow.svg" alt="arrow" class="arrow" @click="toggleCollapse('cardiaca')" :class="{ 'arrow-rotated': collapsed.cardiaca }">
            </div>
                <ul class="name-list" v-if="collapsed.cardiaca">
                    <li><a>Recanvi valvular</a></li>
                    <li><a>Bypass aortocoronari</a></li>
                    <li><a>Implantació de dispositius cardíacs (marcapàs, DAI,...)</a></li>
                    <li><a>ECMO</a></li>
                    <li><a>TAVI (inserció transcatèter de vàlvula aòrtica)</a></li>
                    <li><a>Tancament CIA i FOP</a></li>
                </ul>
            </li>
        </ul>
        <ul class="menu-list">
            <li>
                <div class="title">
                <a class="name" @click="toggleCollapse('urològica')">CIRURGIA UROLÒGICA</a>
                <img src="../../assets/svg/arrow.svg" alt="arrow" class="arrow" :class="{ 'arrow-rotated': collapsed.urològica }" @click="toggleCollapse('urològica')">
            </div>
                <ul class="name-list" v-if="collapsed.urològica">
                    <li><a>Qualsevol procediment de cirurgia major SENSE entrada al tracte
                            intestinal ni cirurgia protèsica</a></li>
                    <li><a>Cirurgies AMB entrada tracte intestinal</a></li>
                    <li><a>Pròtesis de pene, testicle o esfínter urinari</a></li>
                    <li><a>Biopsia pròstata transperineal</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</template>

<style scoped>

.menu {
    grid-area: aside;
    background-color: #ffffff;
    padding:15px;
    height: 100%;
}

.name {
    color: #434343;
    font-size: 16px;
 
}

.title {
    display: flex;
    align-items: center;
    margin: 0 !important;
}

.arrow {
    width: 20px;
    height: 20px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.arrow-rotated {
    transform: rotate(180deg);
}



</style>
```