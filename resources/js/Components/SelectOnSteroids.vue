<script setup>
import { ref, defineProps, onMounted } from 'vue';

const props = defineProps({
    placeholder: {
        type: String,
        required: false,
        default: 'Selecciona un antibiòtic',
    },
});


const folded = ref(true);
const optionsContainer = ref(null);
const options = ref(null);
const isDropdownUnfolded = ref(false);

function handleToggleFold() {

    folded.value = !folded.value;

    function ok() {
        options.value.forEach(option => {
            option.addEventListener('click', () => {
                console.log(option.value);
            });
        });
    }

    optionsContainer.value.innerHTML = optionsContainer.value.innerHTML;
    setTimeout(() => {
        options.value = optionsContainer.value.querySelectorAll('option');
        ok();
    });


    // console.log(optionsContainer.value.querySelectorAll('option'));

    // options.value = optionsContainer.value.querySelectorAll('option'); 

        
    // optionsContainer.value.innerHTML = optionsContainer.value.innerHTML;

    // console.log(optionsContaoiner.value);

}

</script>

<template>
    <div
        @click="handleToggleFold"
        class="selected"
        >
        {{ props.placeholder }}
        <img src="../../assets/svg/arrow.svg"
            alt="arrow"
            class="arrow"
            :style="{ transform: !folded ? 'rotate(180deg)' : 'rotate(0deg)' }"
        >
    </div>
    <div class="options-select-container" v-show="!folded" ref="optionsContainer">
        <slot />
    </div>
</template>

<style>
.selected {
    display: flex;
    padding: 8px;
    border: 1px solid #77797a;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 1rem;
    margin-bottom: 0.5rem;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
}

.arrow {
    width: 20px;
}

.options-select-container {
    border: 1px solid #77797a;
    border-radius: 5px;
    margin-top: 8px;
    margin-bottom: 0.5rem;
    max-height: 200px;
    overflow-y: auto;
}

option {
    padding: 0.5rem;
    cursor: pointer;
}

option:not(:last-child) {
    border-bottom: 1px solid #77797a;
}
</style>