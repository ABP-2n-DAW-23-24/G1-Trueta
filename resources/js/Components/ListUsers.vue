  <script setup>
  import Users from "@/Components/Users.vue";
  import ModalUsers from './ModalUsers.vue';

  import { ref,defineProps,watch  } from 'vue';

  const isModalOpen = ref(false);
  let props = defineProps({
    users:Object,
    traduccion:Object
  })
  const handleClose = () => {
    isModalOpen.value = false;
  };
  let users_=ref(props.users)
  function getUsers(){
      axios.post("getUsers")
      .then(response=>{
          users_.value=response.data.user
          console.log(response)
      })
  }
  const name = ref(''); 
const doSomething = (value) => {
  axios.post("searchUser",{
    name:name.value,
  })
      .then(response=>{
        users_.value=response.data
       
        console.log(response)
      }) 
};

watch(name, (newValue) => {
  doSomething(newValue);
});

  </script>
  <template>
  <div class="bg-users">

    <!-- El componente Modal -->
  <UserDropdown :show="isModalOpen"></UserDropdown>
      <div style="
      margin-bottom: 25px;    display: flex;
      flex-direction: row;
      justify-content: space-between;">
      <h2  style="font-size: 30px;">Llistat d’usuaris</h2>

      <input type="text" v-model="name" style="    width: 50%;
    border-radius: 10px;">

    <ModalUsers @getUser="getUsers" :traduccion="traduccion"></ModalUsers>
      </div>    
      <Users @getUser="getUsers" :users="users_" :traduccion="traduccion"></Users>
      <p v-if="users_.length==0">Usuari no trobat</p>

  </div>

  </template>

  <style>
  .btn_add_user{
      background: orange;
      padding: 10px 20px 10px 20px;
      border-radius: 10px;
      color: white;
  }
  .bg-users{
      background-color: #D9D9D9;
      width: 85%;
      padding: 40px;
      border-radius: 4px;
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