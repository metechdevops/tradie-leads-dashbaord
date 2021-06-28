<template>
  <div class="q-pa-md">
    <div class="q-gutter-y-md" style="max-width: 900px;margin: 0 auto">
      <q-card>
        <q-tabs
          v-model="tab"
          dense
          class="text-grey"
          active-color="orange"
          indicator-color="orange"
          align="justify"

        >
          <q-tab name="invited" class="text-grey-6" label="Invited" />
          <q-tab name="accepted" class="text-grey-6" label="Accepted" />
        </q-tabs>
      </q-card>
        <q-tab-panels v-model="tab" animated style="background: none">
          <q-tab-panel name="invited" style="background-color: none;padding:0">
            <invitedleads></invitedleads>
          </q-tab-panel>
          <q-tab-panel name="accepted" style="background-color: none;padding:0">
            <acceptedleads></acceptedleads>
          </q-tab-panel>
        </q-tab-panels>

    </div>
  </div>
</template>

<script>

import { ref } from 'vue'
import AcceptedLeads from '../components/leads/Accepted.vue'
import InvitedLeads from '../components/leads/Invited.vue'

export default {
  components: {
    acceptedleads: AcceptedLeads,
    invitedleads: InvitedLeads
  },
  setup () {
    return { tab: ref('invited') }
  }
}
</script>
