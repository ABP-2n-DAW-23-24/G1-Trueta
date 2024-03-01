<script setup>
import { ref,defineProps  } from 'vue';

import Footer from '@/Components/Footer.vue';
import Logo from '@/Components/Logo.vue';
import Aside from '@/Components/Aside.vue';
import Wizard from '@/Components/Wizard.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps(['Surgeries','Auth']);
let user={
  text:props.Auth.name,
  font_size:"20px"
}
let routes_main=[
        {
            label: "Log out",
            routeName: "logout",
            method:"post"
        },
       
    ]
const surgeries = ref(props.Surgeries);

</script>

  <template>
    
       <Head title="Index" />
  <div class="hamburger-menu">
    <input id="menutoggle" type="checkbox" />
    <!-- Envoltura añadida para extender el área clickable del label -->
    <label for="menutoggle" class="menubtn" style="    background: white;
    border-radius: 72px;
    position: fixed;
    top: auto;
    left: 10px;
    bottom: 10px;
    width: 45px;
    height: 44px;
    cursor: pointer;
    z-index: 1;
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.2); /* Add shadow for depth */

">
      <span class="hamburger-box" style="    top: 20.6px;
    left: 10.1px;">
        <span class="hamburger-inner"></span>
      </span>
    </label>
    <ul class="menubox">
      <Logo class="logo" />   

      <Aside class="aside movil" :surgeries="surgeries" />
    </ul>
  </div>
      <div class="parent">
          
          <div class="col-left">
              <Logo class="logo" />   

          
            
  <Aside class="aside" :surgeries="surgeries" />
          </div>
          <div class="col-right">
              <Wizard class="wizard" :text="user"   :routes="routes_main" style="    margin-top: 40px;"/>
          </div>
      </div>
  </template>

  <style scoped>
  .hamburger-menu{
      display: none;
  }
  @media(max-width:768px){
    .parent{
      width: 100%;
      grid-template-columns:none !important;
    }
    .movil{
      display: block  !important;
      background-color: #ECEFF1 !important;

    }
  .hamburger-menu{
      display: block;
      position:absolute;
  }
  .col-left{
      display: none;
  }
  .aside{
      display:none;
  }
  }
  /* end media query */
  .parent {
    display: grid;
    grid-template-columns: 300px auto;
  }
  .col-left {
      width: 100%;
  }
  .col-right {
      width: 100%;
  }
  .logo {
      width: 100%;
      height: fit-content;
  }
  .aside {
      width: 100%;
  }

  #menutoggle {
    opacity:0;
  }
  #menutoggle:checked + .menubtn {
    top:20px !important;
    bottom:auto  !important;
    background:none !important;
    box-shadow: none !important; /* Add shadow for depth */

  }
  #menutoggle:checked + .menubtn {
    top:20px !important;
    bottom:auto  !important;
    background:NONE;
  }
  #menutoggle:checked .menubtn{
   
  }
  #menutoggle:checked + .menubtn > span {
    transform: rotate(45deg);
  }
  #menutoggle:checked + .menubtn > span::before {
    top: 0;
    transform: rotate(0deg);
  }
  #menutoggle:checked + .menubtn > span::after {
    top: 0;
    transform: rotate(90deg);
  }
  #menutoggle:checked ~ .menubox {
    left: 0 !important;
  }
  .menubtn {
    position: fixed;
    top: 20px;
    left: 20px;
    width: 26px;
    height: 26px;
    cursor: pointer;
    z-index: 1;
  }
  .menubtn > span,
  .menubtn > span::before,
  .menubtn > span::after {
    display: block;
    position: absolute;
    width: 25px;
    height: 2px;
    background-color: #616161;
    transition-duration: .25s;
  }
  .menubtn > span::before {
    content: '';
    top: -8px;
  }
  .menubtn > span::after {
    content: '';
    top: 8px;
  }
  .menubox {
    display: block;
    position: fixed;
    top: 0;
    left: -100%;
    width: 300px;
    height: 100%;
    margin: 0;
    padding: 80px 0;
    list-style: none;
    background-color: #ECEFF1;
    box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
    transition-duration: .25s;
  }
  .menuitem {
    display: block;
    padding: 12px 24px;
    color: #333;
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
    font-weight: 600;
    text-decoration: none;
    transition-duration: .25s;
  }
  .menuitem:hover {
    background-color: #CFD8DC;
  }
  </style>
