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
    <div class="user-box">
    <div class="User is-flex" style="flex-direction: row;
    justify-content: space-between;" v-for="(item, index) in users">
    <div class="user-content">
        <p> {{ item.email }}
        </p>
        <p> {{ item.name }} {{ item.surnames }}
        </p>
        
    </div>
        <div clas="is-flex " style="display: flex;">

            <ModalUsersDelete @endDelete="endEvent" :users="item" :traduccion="traduccion"></ModalUsersDelete>
            <ModalUsersEdit @EndEdit="endEvent" :users="item" :traduccion="traduccion"></ModalUsersEdit>
        </div>
    </div>
    </div>

</template>

<style>
.User {
    background-color: #ececec;
    width: 100%;
    padding: 20px;
    border-radius: 10px;
}



.user-box{
    display: grid;
    gap: 15px;
}



.icons {
    height: 20px;
}

.user-content {
    display: flex;
    flex-direction: row;
    gap: 100px;
    width: 100%;
   
}

.user-content p {
    width: 250px;
}
</style>