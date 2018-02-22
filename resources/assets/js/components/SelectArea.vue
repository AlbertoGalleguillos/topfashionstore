<template>
  <v-app>
    <v-container fluid>
      <v-layout row>
        <v-flex xs6>
          <v-subheader>Standard</v-subheader>
        </v-flex>
        <v-flex xs6>
          <v-select
            :items="items"
            v-model="e1"
            label="Select"
            single-line
          ></v-select>
        </v-flex>
      </v-layout>
    </v-container>
  </v-app>
</template>

<script>
  export default {
    data () {
      return {
        e1: null,
        items: [
          { text: 'Informática' },
          { text: 'Mantención' },
          { text: 'Visual' }
        ]
      }
    }
  }
</script>