import './bootstrap';
import { createApp } from 'vue'
import MainHeader from './components/main-header.vue'
import AccountForm from './forms/account-form.vue'
import DealForm from './forms/deal-form.vue'

const app = createApp({})

import  Form  from 'vform'
import { AlertSuccess } from 'vform/src/components/bootstrap5'
app.component(AlertSuccess.name, AlertSuccess)

window.Form = Form;

app.component('main-header', MainHeader)
app.component('account-form', AccountForm)
app.component('deal-form', DealForm)

app.mount('#app')
