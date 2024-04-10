<script setup>
import { ref, defineProps, onMounted, onUnmounted, computed, defineEmits } from 'vue';

const emits = defineEmits(['change']);

const props = defineProps({
    placeholder: {
        type: String,
        required: false,
        default: 'Selecciona una opció',
    },
    searchPlaceholder: {
        type: String,
        required: false,
        default: 'Cerca',
    },
    updateHeader: {
        type: Boolean,
        required: false,
        default: true,
    },
    name: {
        type: String,
        required: true,
    },
});

const _value = ref(null);


const folded = ref(true);
const optionsContainer = ref(null);
const selectContainer = ref(null);
const options = ref(null);
const inputSearch = ref(null);

function handleClickOutside(event) {
    console.log();
    if (!folded.value &&
        event.target != selectContainer.value &&
        event.target != optionsContainer.value &&
        event.target != inputSearch.value) {
        folded.value = true;
        filterOptions();
    }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});


function filterOptions(filterText = "") {
    // if (!options.value) return;
    options.value.forEach(option => {
        if (option.innerText.toLowerCase().includes(filterText.toLowerCase())) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    });
    optionsContainer.value.scrollTop = 0;
}

function handleToggleFold() {

    folded.value = !folded.value;

    function ok() {
        options.value.forEach(option => {
            option.addEventListener('click', e => {
                _value.value = e.target.getAttribute('value');
                folded.value = true;
                selectContainer.value.setAttribute('value', e.target.getAttribute('value'));
                emits('change', { value: e.target.getAttribute('value'), text: e.target.innerText} );
                filterOptions();
            });
        });

        inputSearch.value.addEventListener('input', e => {
            filterOptions(e.target.value);
        });
    }

    optionsContainer.value.innerHTML = optionsContainer.value.innerHTML;
    setTimeout(() => {
        options.value = optionsContainer.value.querySelectorAll('option');
        inputSearch.value = optionsContainer.value.querySelector('.input-option');
        ok();
    });
}

const getInnerTextFromValue = computed(() => {
    if (!props.updateHeader) return null;
    if (_value.value) {
        for (let i = 0; i  < options.value.length; i++) {
            if (options.value[i].getAttribute('value') == _value.value) {
                return options.value[i].innerText;
            }
        }
        return null;
    }
    return null;
});


</script>

<template>
    <div
        @click="handleToggleFold"
        class="selected"
        ref="selectContainer"
        >
        {{ getInnerTextFromValue ?? props.placeholder }}
        <img src="../../assets/svg/arrow.svg"
            alt="arrow"
            class="arrow"
            :style="{ transform: !folded ? 'rotate(180deg)' : 'rotate(0deg)' }"
        >
    </div>
    <div class="options-select-container" v-show="!folded" ref="optionsContainer">
        <input
            class="input-option"
            type="text"
            :placeholder="props.searchPlaceholder"
            name="search"
            title="search"
        />
        <slot></slot>
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
    user-select: none;
}

.arrow {
    width: 20px;
    height: 20px;
    pointer-events: none;
}

.options-select-container {
    border: 1px solid #77797a;
    border-radius: 5px;
    margin-bottom: 0.5rem;
    max-height: 200px;
    overflow-y: auto;
    position: absolute;
    user-select: none;

}

option {
    padding: 0.5rem;
    cursor: pointer;
    background: #fff;   
}

.input-option {
    height: 100%;
    width: 100%;
    border: none;
}

option:not(:last-child),
.input-option {
    border-bottom: 1px solid #77797a;
}

.input-option:focus {
    outline: none;
    border-color: inherit;
    box-shadow: none;
}
</style>