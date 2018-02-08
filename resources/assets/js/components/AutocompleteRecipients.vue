<template>
 <div>
  <input type="text" placeholder="Para" v-model="recipients" @keyup="autoComplete" class="form-control" name="recipients">
  <div class="panel-footer" v-if="results.length">
   <ul class="list-group">
    <li class="list-group-item" v-for="result in results" v-on:click="say(result.name)">
     {{ result.name }}
    </li>
   </ul>
  </div>
 </div>
</template>
<script>
 export default{
    data(){
        return {
            query: '',
            recipients: '',
            results: [],
            include_comma: false
        }
    },
    methods: {
        say: function (message) {
            console.log("this.recipients: " + this.recipients);
            if (!this.recipients.includes(',')) {
                this.recipients = message + ',';
            } else {
                this.recipients = this.recipients
                                    .substr(0,this.recipients.lastIndexOf(',')+2)
                                    + message + ',';
            }
            this.results = [];
        },
        autoComplete(){
            this.results = [];
            if (!this.recipients.includes(',')) {
                this.query = this.recipients;
            } else {
                this.query = this.recipients.split(',')[this.recipients.split(',').length-1].trim();
            }

            if(this.query.length > 1){
                axios.get('/api/search_recipient',{params: {query: this.query}}).then(response => {
                    this.results = response.data;
                });
            }
        }
    },
    mounted() {
            if (reply) {
                this.recipients = reply;
            }
        }
}
</script>