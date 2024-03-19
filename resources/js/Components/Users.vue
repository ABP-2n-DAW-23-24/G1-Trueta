<script setup>
import { ref, defineProps, defineEmits } from 'vue';
import ModalUsersEdit from "./ModalUsersEdit.vue"
import ModalUsersDelete from "./ModalUsersDelete.vue"

let props = defineProps({
    users: Object,
    traduccion: Object

})
const emit = defineEmits(['EndEdit'])

function endEvent() {
    emit('getUser');

}
</script>
<template>
    <div style="display: flex;
    justify-content: space-between;">

    </div>

    <div class="User is-flex" style="flex-direction: row;
    justify-content: space-between;" v-for="(item, index) in users">
        <p> {{ item.email }}
        </p>

        <div clas="is-flex " style="display: flex;">

            <ModalUsersDelete @endDelete="endEvent" :users="item" :traduccion="traduccion"></ModalUsersDelete>
            <ModalUsersEdit @EndEdit="endEvent" :users="item" :traduccion="traduccion"></ModalUsersEdit>
        </div>

    </div>

</template>

<style>
.User {
    background-color: #ffffff;
    width: 100%;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
}

.User:hover {
   box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.1);
}

.icons {
    height: 20px;
}

.line {
    width: 100%;
    height: 1px;
    background-color: #e8e8e8;
    margin-top: 20px;
}
</style>