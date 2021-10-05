<template>
  <v-row>
    <v-col cols="4">
      <v-menu
        ref="menu"
        v-model="menu"
        :close-on-content-click="false"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="dateFormatted"
            label="Tanggal"
            prepend-icon="mdi-calendar"
            readonly
            v-bind="attrs"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date" no-title scrollable @input="menu = false">
        </v-date-picker>
      </v-menu>
    </v-col>
    <v-spacer></v-spacer>
    <v-col cols="12">
      <Highcharts v-if="options" :options="options" />
    </v-col>
  </v-row>
</template>

<script>
  export default {
    props: {
      url: {
        type: String,
        required: true
      }
    },
    data() {
      return {
        options: null,
        date: new Date().toISOString().substr(0, 10),
        menu: false
      }
    },
    watch: {
      date(newValue) {
        this.getData();
      }
    },
    computed: {
      dateFormatted() {
        const monthName = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
        ];
        if (!this.date) return null

        const [year, month, day] = this.date.split('-')
        return day + '-' + monthName[parseInt(month) - 1] + '-' + year
      }
    },
    mounted () {
      this.getData();
    },
    methods: {
      getData() {
        axios
          .get(this.url + '?date=' + this.date)
          .then(response => {
              this.options = response.data;
          })
          .catch(error => {
          });
      }
    }
  }
</script>