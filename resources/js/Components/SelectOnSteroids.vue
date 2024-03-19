<script setup>
    import { ref, defineProps, onMounted } from 'vue';

    const props = defineProps({
        placeholder: {
            type: String,
            required: false,
            default: 'Selecciona un antibiòtic...',
        },
    });


    const folded = ref(true);
    const optionsContainer = ref(null);
    const options = ref(null);

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
        >{{ props.placeholder }}
    </div>
    <div v-show="!folded" ref="optionsContainer">
            <slot />
    </div>
</template>

<style scoped>

</style>