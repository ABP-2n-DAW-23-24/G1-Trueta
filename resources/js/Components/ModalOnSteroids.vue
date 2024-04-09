<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    show: Boolean,
    set: Function,
    title: {
        type: String,
        default: 'Modal'
    }
});

const close = () => {
    props.set(false);
};
</script>

<template>
    <div v-show="show" class="modal-on-steroids-container" >
        <div class="modal-on-steroids-wrapper">
            <div class="modal-on-steroids-header">
                <span class="modal-on-steroids-title">{{ props.title }}</span>
                <span @click="close" class="modal-on-steroids-close">&times;</span>
            </div>
                <div class="modal-on-steroids-body">
                    <slot name="body"></slot>
                </div>
        </div>

    </div>
</template>


<style scoped>
.modal-on-steroids-container {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 99999;
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-on-steroids-wrapper {
    --margin: 30px;
    display: grid;
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    width: 100%;
    max-width: 43rem;
    height: fit-content;
    max-height: calc(100% - var(--margin) * 2);
    grid-template-rows: auto 1fr;
    margin: var(--margin);
    gap: 30px;
    background: #fff;
    width: 100%;
    max-width: 43rem;
    max-height: calc(100vh -60px);
    padding: 30px;
    border-radius: 15px;
    margin: 30px;
    overflow-y: auto;
    animation: scale-in-hor-center 0.25s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}

@keyframes scale-in-hor-center {
  0% {
    transform: scaleX(0);
    opacity: 1;
  }
  100% {
    transform: scaleX(1);
    opacity: 1;
  }
}

.modal-on-steroids-header {
    display: flex;
    align-items: center;
    gap: 20px;
    justify-content: space-between;
    line-height: 1.5rem;
}

.modal-on-steroids-title {
    font-size: 1.5rem;
    font-weight: bold;
}

.modal-on-steroids-close {
    font-size: 2.5rem;
    cursor: pointer;
}

.modal-on-steroids-body {
    overflow: auto;
}

</style>