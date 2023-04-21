<template>
<form action="#" @submit.prevent="AccountStore">
  <AlertSuccess :form="form" class="mt-3 w-50" style="margin: 0 auto" :message="message" />
  <div class="card mt-3 w-50" style="margin: 0 auto;">
    <div class="card-header">
      Create Account
    </div>
  <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Account  name</label>
        <input type="text" class="form-control" name="Account_Name" id="Account_Name" v-model="form.Account_Name" :class="{'is-invalid': form.errors.has('Account_Name')}">
        <div v-if="form.errors.has('Account_Name')" class='text text-danger' v-html="form.errors.get('Account_Name')"/>
      </div>
      <div class="mb-3">
        <label class="form-label">Account website</label>
        <input type="text" class="form-control" name="Account_website" id="Account_website" v-model="form.Account_website" :class="{'is-invalid': form.errors.has('Account_website')}">
        <div v-if="form.errors.has('Account_website')" class='text text-danger' v-html="form.errors.get('Account_website')"/>
      </div>
      <div class="mb-3">
        <label class="form-label">Account phone</label>
        <input type="tel" class="form-control" name="Account_phone" id="Account_phone" v-model="form.Account_phone" :class="{'is-invalid': form.errors.has('Account_phone')}">
        <div v-if="form.errors.has('Account_phone')" class='text text-danger' v-html="form.errors.get('Account_phone')"/>
      </div>
      <div class="d-flex">
        <button type="submit" style="margin-right: 5px;" class="btn btn-primary">Submit</button>
      </div>
  </div>
</div>
</form>
</template>

<script>
export default {
  data(){
    return {
        form: new Form({
            Account_Name: '',
            Account_website: '',
            Account_phone: '',
            })
        }
    },
    methods: {
        AccountStore(){
            this.form.post('/accounts-store')
                .then((response)=> {
                    this.message = response.data.message
                    this.form.reset();
                })
        },
    }
}
</script>
