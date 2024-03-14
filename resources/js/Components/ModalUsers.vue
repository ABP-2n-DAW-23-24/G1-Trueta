<script setup>
import Users from "@/Components/Users.vue";
import Modal from './Modal.vue';
import { ref,defineEmits  } from 'vue';

import { onMounted } from "vue";
import axios from "axios";
let props = defineProps({
    show:Boolean,
    traduccion:Object

})
let name=ref("");
let surnames=ref("");
let email=ref("");
let pass=ref("");
let isAdmin =ref("0");
let isManager=ref("0");
let isModalOpen = ref(props.show);
let message=ref();
const emit = defineEmits(['EndAdd'])

function btn_add_user(params) {
   
    axios.post("adduser",{
        name:name.value,
        surnames:surnames.value,
        pass:pass.value,
        email:email.value,
        isAdmin:isAdmin.value,
        isManager:isManager.value
    }
    )
    .then(response=>{
        console.log(response)
        isModalOpen.value = false
        name=ref("");
        surnames=ref("");
        email=ref("");
        pass=ref("");
        isAdmin =ref("0");
        isManager=ref("0");
        emit('getUser');

    }).catch(error => {

    if (error.response && error.response.status === 422) {

        message.value = error.response.data.errors;
        console.log(message.value);
    } else {
        console.error('Ocurrió un error inesperado:', error);
    }
});
}
function closeModal(params) {
    isModalOpen.value=false
    name=ref("");
    surnames=ref("");
    email=ref("");
    pass=ref("");
    isAdmin =ref("0");
    isMa
    nager=ref("0");
}

</script>

<template>
         <button class="btn_add" @click=" isModalOpen=true">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
    <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
  </svg>
  <span>Afegir Usuaris</span>
</button>

<Modal :show="isModalOpen" @close="closeModal">
        <div style="padding: 20px;">
            ddd
    <!-- Contenido personalizado para el slot del modal -->
     
        <div style="display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: space-between;
    align-items: baseline;">
            <h2 style="font-size: 20px;margin-bottom: 20px;">Afegir usuari</h2>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="height: 20px;cursor:pointer;" @click="closeModal">
                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                </svg>
        </div>
     
        <div class="center_flex_modal"> 
            <div>
                <input type="text" style="    border-radius: 5px" placeholder="Nom" v-model="name">
                <div v-if="message" >
                        <p v-if="message.name" class="text_error"  v-for=" (item,index) in message.name"> {{item }} </p>
                    </div>
            </div>
            <div>
                    <input type="text" style="    border-radius: 5px" placeholder="Cognoms" v-model="surnames"> 
                    
            </div>
            
        </div>
        <div class="correo_back center_flex" >
            <div style="width:100%;display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;">
                <input type="email" style="border-radius: 5px;width: 80%;" placeholder="correo electronic" v-model="email">

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
            <input type="checkbox" name="" id=""  v-model="isManager">Gestor</label>
        </div>
    </div>
    <div class="center_flex" style="padding: 20px;">
        <button class="btn_add_user"  @click="btn_add_user">Afegir</button>
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