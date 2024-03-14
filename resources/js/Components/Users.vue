<script setup>
    import { ref,defineProps,defineEmits } from 'vue';
    import ModalUsersEdit from "./ModalUsersEdit.vue"
    import ModalUsersDelete from "./ModalUsersDelete.vue"
    
    let props = defineProps({
        users:Object,
        traduccion:Object

})
const emit = defineEmits(['EndEdit'])

function endEvent(){
    emit('getUser');

}
</script>
<template>
<div style="display: flex;
    justify-content: space-between;">

</div>
<div class="User is-flex" style="    margin-top:20px;flex-direction: row;
    justify-content: space-between;" v-for="(item,index) in users">
    <p> {{item.email}}
</p>

    <div clas="is-flex " style="display: flex;" >
    
<ModalUsersDelete @endDelete="endEvent" :users="item"   :traduccion="traduccion"></ModalUsersDelete>
      <ModalUsersEdit @EndEdit="endEvent" :users="item" :traduccion="traduccion"></ModalUsersEdit>
    </div>
</div>

</template>

<style>
.User{
    background-color: #FBFBFB;
    width: 100%;
    padding: 20px;
    border-radius: 10px 10px 0 0;

}
.icons{
    height: 20px;
}

</style>