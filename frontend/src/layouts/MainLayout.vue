<template>
  <q-layout view="lHh Lpr lFf" >
    <q-header elevated class="bg-grey-8">
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-avatar>
          <img :src="logoPath">
        </q-avatar>

        <q-toolbar-title>
          Tradie Leads Management Board
        </q-toolbar-title>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerClose"
      bordered
      class="bg-grey-1"
    >
      <q-list>
        <q-item-label
          header
          class="text-grey-8"
        >
          Essential Links
        </q-item-label>

        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import EssentialLink from 'components/EssentialLink.vue'

const linksList = [

  {
    title: 'Twitter',
    caption: '@hipages',
    icon: 'rss_feed',
    link: 'https://twitter.com/hipages'
  },
  {
    title: 'Facebook',
    caption: '@hipages',
    icon: 'facebook',
    link: 'https://www.facebook.com/hipages'
  },
  {
    title: 'LinkedIn',
    caption: '@hipages',
    icon: 'public',
    link: 'https://www.facebook.com/hipages'
  }
]

import { defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'MainLayout',

  components: {
    EssentialLink
  },
  data () {
    return {
      logoPath: './hipages-logo.png'
    }
  },
  setup () {
    const leftDrawerClose = ref(false)

    return {
      essentialLinks: linksList,
      leftDrawerClose,
      toggleLeftDrawer () {
        leftDrawerClose.value = !leftDrawerClose.value
      }
    }
  }
})
</script>
