<script setup>
import Users from "@/Components/Users.vue";
import Modal from './Modal.vue';
import { ref,defineProps,computed,defineEmits   } from 'vue';
import { onMounted } from "vue";
import axios from "axios";
const emit = defineEmits(['EndEdit'])

let props = defineProps({
        users:Object
})
let name=ref(props.users.name);
console.log(name.value)
let surnames=ref(props.users.surnames);
let email=ref(props.users.email);
let pass=ref("");
let  isAdmin = computed({
  get: () => !!props.users.isAdmin, 
  set: value => {
    props.users.isAdmin = value ? 1 : 0; // Convierte true o false a 1 o 0
  }
});
let isManager = computed({
  get: () => Boolean(props.users.isManager), // Convierte 1 (o cualquier número no-cero) a true, y 0 a false.
  set: value => {
    props.users.isManager = value ? 1 : 0; // Convierte true a 1, y false a 0.
  }
});
let isModalOpen = ref(props.show);
let message=ref();

function btn_editUser(params) {
   
    axios.post("editUser",{
        id:props.users.id,
        surnames:surnames.value,
        name:name.value,
        pass:pass.value,
        email:email.value,
        isAdmin:isAdmin.value,
        isManager:isManager.value
    }
    )
    .then(response=>{
        console.log(response)

        isModalOpen.value = false

        emit('EndEdit');
    }).catch(error => {

if (error.response && error.response.status === 422) {

    message.value = error.response.data.errors;
    console.log(message.value);
} else {
    console.error('Ocurrió un error inesperado:', error);
}
});
}
function closemodal(params) {
    isModalOpen.value=false

}


</script>

<template>
         <button class="" @click=" isModalOpen=true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icons">
            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
        </svg>
</button>

<Modal :show="isModalOpen" @close="closemodal">
        <div style="padding: 20px;">
    <!-- Contenido personalizado para el slot del modal -->
        <div style="display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: space-between;
    align-items: baseline;">
            <h2 style="font-size: 20px;margin-bottom: 20px;">Editar usuari</h2>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="height: 20px;cursor:pointer;" @click="closemodal">
                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                </svg>
        </div>
     
        <div class="center_flex_modal"> 
            <div>
                <input type="text" style="    border-radius: 5px;" placeholder="Nom"  :value="name" v-model="name">
                <div v-if="message" >
                            <p v-if="message.name" class="text_error"  v-for=" (item,index) in message.name"> {{item }} </p>
                        </div>
            </div>
            <input type="text" style="    border-radius: 5px" placeholder="Cognoms"  :value="surnames" v-model="surnames">
        </div>
        <div class="correo_back center_flex" >
            <div style="width:100%;display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;">
                <input type="email" style="border-radius: 5px;width: 80%;" placeholder="correo electronic" :value="email" v-model="email">
                <div v-if="message" >
                        <p v-if="message.email" class="text_error" v-for=" (item,index) in message.email"> {{item}} </p>
                    </div>
            </div>
        </div>
        <div class="correo_back center_flex" >
            <div style="width:100%;display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;">
                <input type="password" style="border-radius: 5px;width: 80%;" placeholder="contrasenya" v-model="pass">
                <div v-if="message" >
                        <p v-if="message.pass" class="text_error"  v-for=" (item,index) in message.pass"> {{item}} </p>
                    </div>
            </div>
        </div>
        <div class="rols"> 
            <label for="">
            <input type="checkbox" name="" id=""  v-model="isAdmin" >Admin</label>
            <label for="">
            <input type="checkbox" name="" id=""    v-model="isManager">Gestor</label>
        </div>
    </div>
    <div class="center_flex" style="padding: 20px;">
        <button class="btn_add_user"  @click="btn_editUser">Editar</button>
    </div>
</Modal>
</template>
<style>
.rols{
    margin-top:20px;
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.correo_back{
    margin-top  : 20px;
}
.center_flex_modal{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
}
.center_flex{
    display: flex;
    flex-direction: row;
    justify-content: center;
}
.btn_add {
  display: flex;
  align-items: center; 
  justify-content: center;
  white-space: nowrap;
  border: none; 
  background-color: transparent;
  cursor: pointer; 
  padding: 8px 12px;
  outline: none; 
 border-radius: 5px;
  background-color: black;
  color: white;
}

.btn_add svg {
  fill: currentColor; 
  width: 16px;
  height: auto;
  margin-right: 8px;
}
</style>