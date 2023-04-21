<template>
<form action="#" @submit.prevent="DealStore">
<AlertSuccess :form="form" class="mt-3 w-50" style="margin: 0 auto" :message="message" />
  <div class="card mt-5 w-50" style="margin: 0 auto;">
    <div class="card-header">
      Create Deal
    </div>
  <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Deal name</label>
        <input type="text" class="form-control" name="Deal_Name" id="Deal_Name" v-model="form.Deal_Name" :class="{'is-invalid': form.errors.has('Deal_Name')}">
        <div v-if="form.errors.has('Deal_Name')" class='text text-danger' v-html="form.errors.get('Deal_Name')"/>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Deal stage</label>
        <input type="text" class="form-control" name="Stage" id="Stage" v-model="form.Stage" :class="{'is-invalid': form.errors.has('Stage')}">
        <div v-if="form.errors.has('Stage')" class='text text-danger' v-html="form.errors.get('Stage')"/>
      </div>
      <div class="mb-3">
        <div>
            <label class="form-label">Account name</label>
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
        formHidden : true,
        form: new Form({
            Deal_Name: '',
            Stage: '',
            create_account: '',
            Account_Name: '',
            Account_website: '',
            Account_phone: '',
            })
        }
    },
    methods: {
        DealStore(){
            this.form.post('/deal-store')
                .then((response)=> {
                    this.message = response.data.message
                    this.form.reset();
                })
        },
    }

}
</script>
