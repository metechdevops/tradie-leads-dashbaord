<template>
  <div>
    <div class="q-mb-md" v-for="(job) in jobs" :id="'card-row-'+job.id" :key="job.id">
      <q-card class="my-card" dense flat>
        <q-item>
          <q-item-section avatar>
            <q-avatar>
              <img src="https://cdn.quasar.dev/img/boy-avatar.png">
            </q-avatar>
          </q-item-section>

          <q-item-section>
            <q-item-label>{{ job.contact_name }}</q-item-label>
            <q-item-label caption>
              {{ job.date }}
            </q-item-label>
          </q-item-section>
        </q-item>
        <q-separator class="q-mb-xs" />

        <q-card-actions>
          <q-btn :label="job.location_name" size="11px" class="text-grey-6" icon="fas fa-map-marker-alt"  flat />
          <q-btn :label="job.category_name" size="11px" class="text-grey-6" icon="fas fa-briefcase"  flat />
          <q-btn :label="'Job ID:'+job.id" size="11px" class="text-grey-6" flat />
          <q-btn :label="job.lead_price" size="11px" flat />
        </q-card-actions>
        <q-separator />
        <q-card-actions class="q-mt-xs">
          <q-btn icon="fas fa-phone" size="11px" text-color="orange" :label="job.contact_phone"  flat />
          <q-btn icon="fas fa-envelope-open-text" size="11px" text-color="orange" :label="job.contact_email"  flat />
          <p class="q-pb-md q-pt-md q-pl-md text-grey-6" color="red-1" >{{ job.description }}</p>
        </q-card-actions>
      </q-card>
    </div>
    <q-card v-if="jobs.length == 0" class="no-results q-pa-md text-center shado-1" dense flat>
      <h1 class="text-h5">Result Not Found</h1>
      <p>No accepted leads available.</p>
    </q-card>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useQuasar } from 'quasar'
import { api } from 'boot/axios'
import 'animate.css/animate.min.css'

export default defineComponent({
  data () {
    return {
      jobs: [],
      processing: false
    }
  },
  mounted () {
    console.log('we call "next()" method of our component')
    this.getLeads()
  },
  methods: {
    updateLead: function (action, id, index) {
      this.showDefault()
      api.put('/job', {
        status: action,
        id: id
      }).then((response) => {
        // this.jobs = response.data.data
        console.log('update lead request')
        this.triggerPositive(action)
        this.jobs.splice(index, 1)
        // jQuery('#card-row-' + id).addClass('animated fadeOut').remove()
      }).catch(() => {
        this.triggerNegative()
      })
    },
    getLeads: function () {
      this.showDefault()
      api.get('/job?status=accepted').then((response) => {
        this.jobs = response.data.data
      }).catch(() => {
        this.triggerNegative()
      })
    }
  },
  setup () {
    const $q = useQuasar()

    function confirmAction (action, id, index) {
      $q.dialog({
        dark: true,
        title: 'Confirm',
        message: 'Would you like to perform this action?',
        cancel: true,
        persistent: true
      }).onOk(() => {
      // console.log('>>>> OK')
        this.updateLead(action, id, index)
      }).onOk(() => {
      // console.log('>>>> second OK catcher')
      }).onCancel(() => {
      // console.log('>>>> Cancel')
      }).onDismiss(() => {
      // console.log('I am triggered on both OK and Cancel')
      })
    }
    return {
      confirmAction,
      showDefault () {
        $q.notify({
          spinner: true,
          message: 'Please wait...',
          timeout: 900
        })
      },
      triggerPositive (message) {
        $q.notify({
          type: 'positive',
          position: 'top-right',
          message: 'Lead ' + message + ' successfully.',
          timeout: 1100
        })
      },
      triggerNegative () {
        $q.notify({
          type: 'negative',
          position: 'top-right',
          message: 'Something went wrong with your system. please contact to the system admin',
          timeout: 1100
        })
      }
    }
  }
})
</script>
