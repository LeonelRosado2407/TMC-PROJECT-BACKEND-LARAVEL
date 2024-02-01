/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import jQuery from 'jquery';
window.$ = jQuery;
import 'flowbite';
import './bootstrap';
import { createApp } from 'vue';
/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import Navbar from "./components/Navbar.vue";
import NavbarItem from "./components/NavbarItem.vue"
import FooterComponent from "./components/FooterComponent.vue";
import BackgroundComponent from "./components/BackgroundComponent.vue";
import SidebarComponent from "./components/SidebarComponent.vue";
import SidebarItemComponent from "./components/SidebarItemComponent.vue";
import TableComponent from "./components/TableComponent.vue";
import TableItemComponent from "./components/TableItemComponent.vue";
import FormComponent from "./components/FormComponent.vue";

app.component('example-component', ExampleComponent);
app.component('navbar',Navbar);
app.component('navbar-item', NavbarItem);
app.component('footer-component',FooterComponent);
app.component('background-component',BackgroundComponent);
app.component('sidebar-component',SidebarComponent);
app.component('sidebar-item',SidebarItemComponent);
app.component('table-component',TableComponent);
app.component('table-item',TableItemComponent);
app.component('form-component',FormComponent);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
