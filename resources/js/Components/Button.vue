<script setup>
import { ref, defineProps, defineEmits } from 'vue';

const props = defineProps({
  text: {
    type: String,
    required: true
  }
});

const buttonText = ref(props.text);


</script>

<template>
     <button class="btn_add" >
        <span>{{ buttonText }}</span>
    </button>
</template>

<style scoped>

.btn_add {
    display: flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
    border: none;
    background-color: transparent;
    cursor: pointer;
    padding: 5px 10px;
    outline: none;
    border-radius: 10px !important;
    background-color: #296fa8;
    color: white;
    height: 100%;
    width: 100%;
    transition: background-color 0.3s ease;
}

.btn_add svg {
    fill: currentColor;
    width: 16px;
    height: auto;
    margin-right: 8px;
}

.btn_add:hover {
    background-color: #b85e00;
}

</style>