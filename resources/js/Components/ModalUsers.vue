<script setup>
import Users from "@/Components/Users.vue";
import Modal from './Modal.vue';
import { ref, defineEmits } from 'vue';

import { onMounted } from "vue";
import axios from "axios";
let props = defineProps({
    show: Boolean,
    traduccion: Object

})
let name = ref("");
let surnames = ref("");
let email = ref("");
let pass = ref("");
let isAdmin = ref("0");
let isManager = ref("0");
let isModalOpen = ref(props.show);
let message = ref();
const emit = defineEmits(['EndAdd'])

function btn_add_user(params) {

    axios.post("adduser", {
        name: name.value,
        surnames: surnames.value,
        pass: pass.value,
        email: email.value,
        isAdmin: isAdmin.value,
        isManager: isManager.value
    }
    )
        .then(response => {
            console.log(response)
            isModalOpen.value = false
            name = ref("");
            surnames = ref("");
            email = ref("");
            pass = ref("");
            isAdmin = ref("0");
            isManager = ref("0");
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
    isModalOpen.value = false
    name = ref("");
    surnames = ref("");
    email = ref("");
    pass = ref("");
    isAdmin = ref("0");
    isMa
    nager = ref("0");
}

</script>

<template>
  <div class="bg-users-add-btn">
    <button class="btn_add" @click=" isModalOpen = true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path
                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
        </svg>
        <span>Afegir Usuaris</span>
    </button>
  </div>

    <Modal :show="isModalOpen" @close="closeModal">
        <div style="padding: 30px;">

            <!-- Contenido personalizado para el slot del modal -->

            <div style="display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: space-between;">
                <h2 class="header-model-users" style="font-size: 20px;">Afegir nou usuari</h2>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="height: 20px;cursor:pointer;"
                    @click="closeModal">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </div>
<div class="box-modal-inputs">
            <div class="center_flex_modal">
               
                    <input class="input-model"  type="text" style="    border-radius: 10px" placeholder="Nom" v-model="name">
                    <div v-if="message">
                        <p v-if="message.name" class="text_error" v-for=" (item, index) in message.name"> {{ item }} </p>
                    </div>
                
                    <input class="input-model" type="text" style="    border-radius: 10px" placeholder="Cognoms" v-model="surnames">

              

            </div>
            <div class="correo_back center_flex">
                <div style="width:100%;display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;">
                    <input type="email" style="border-radius: 10px;width: 100%;" placeholder="correo electronic"
                        v-model="email">

                    <div v-if="message">
                        <p v-if="message.email" class="text_error" v-for=" (item, index) in message.email"> {{ item }} </p>
                    </div>

                </div>

            </div>
            <div class="correo_back center_flex">
                <div style="width:100%;display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;">
                    <input type="password" style="border-radius: 10px;width: 100%;" placeholder="contrasenya"
                        v-model="pass">
                    <div v-if="message">
                        <p v-if="message.pass" class="text_error" v-for=" (item, index) in message.pass"> {{ item }} </p>
                    </div>
                </div>
            </div>
            <div class="rols">
                <div class="checkbox-wrapper-46">
  <input type="checkbox" id="cbx-46-admin" class="inp-cbx" v-model="isAdmin">
  <label for="cbx-46-admin" class="cbx"
    ><span>
      <svg viewBox="0 0 12 10" height="10px" width="12px">
        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
    ><span>Administrador</span>
  </label>
</div>
<div class="checkbox-wrapper-46">
  <input type="checkbox" id="cbx-46-manager" class="inp-cbx" v-model="isManager">
  <label for="cbx-46-manager" class="cbx"
    ><span>
      <svg viewBox="0 0 12 10" height="10px" width="12px">
        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
    ><span>Gestor</span>
  </label>
</div>
            </div>
        </div>
        <div class="center_flex">
            <button class="btn_add_user" @click="btn_add_user">Afegir</button>
        </div>
        </div>
   
   
    </Modal>
</template>
<style>
.rols {
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.correo_back {
    margin-top: 20px;
}

.center_flex_modal {
    width: 100%;
    display: grid;
    gap: 15px;
}

.center_flex {
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
    padding: 5px 10px;
    outline: none;
    border-radius: 10px !important;
    background-color: black;
    color: white;
    height: 50px;
    width: 175px;
}

.btn_add svg {
    fill: currentColor;
    width: 16px;
    height: auto;
    margin-right: 8px;
}

.header-model-users {
    font-weight: 600;
}

.box-modal-inputs {
   padding: 30px;
 
}

.input-model {
   border-radius: 10px;
    width: 100%;
}

.checkbox-wrapper-46 input[type="checkbox"] {
  display: none;
  visibility: hidden;
}

.checkbox-wrapper-46 .cbx {
  margin: auto;
  -webkit-user-select: none;
  user-select: none;
  cursor: pointer;
}
.checkbox-wrapper-46 .cbx span {
  display: inline-block;
  vertical-align: middle;
  transform: translate3d(0, 0, 0);
}
.checkbox-wrapper-46 .cbx span:first-child {
  position: relative;
  width: 18px;
  height: 18px;
  border-radius: 3px;
  transform: scale(1);
  vertical-align: middle;
  border: 1px solid #9098a9;
  transition: all 0.2s ease;
}
.checkbox-wrapper-46 .cbx span:first-child svg {
  position: absolute;
  top: 3px;
  left: 2px;
  fill: none;
  stroke: #ffffff;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-dasharray: 16px;
  stroke-dashoffset: 16px;
  transition: all 0.3s ease;
  transition-delay: 0.1s;
  transform: translate3d(0, 0, 0);
}
.checkbox-wrapper-46 .cbx span:first-child:before {
  content: "";
  width: 100%;
  height: 100%;
  background: #506eec;
  display: block;
  transform: scale(0);
  opacity: 1;
  border-radius: 50%;
}
.checkbox-wrapper-46 .cbx span:last-child {
  padding-left: 8px;
}
.checkbox-wrapper-46 .cbx:hover span:first-child {
  border-color: #506eec;
}

.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child {
  background: #506eec;
  border-color: #506eec;
  animation: wave-46 0.4s ease;
}
.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child svg {
  stroke-dashoffset: 0;
}
.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child:before {
  transform: scale(3.5);
  opacity: 0;
  transition: all 0.6s ease;
}

@keyframes wave-46 {
  50% {
    transform: scale(0.9);
  }
}

.btn_add_user{
    background: #506eec ;
    border-radius: 10px ;
    color: white ;
    margin-bottom: 10px;
}



</style>