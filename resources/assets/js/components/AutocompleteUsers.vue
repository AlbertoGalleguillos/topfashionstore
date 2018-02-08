<template>
 <div>
  <input type="text" placeholder="Usuario(s)" v-model="users" @keyup="autoComplete" class="form-control" name="users">
  <div class="panel-footer" v-if="results.length">
   <ul class="list-group">
    <li class="list-group-item" v-for="result in results" v-on:click="add(result.name)">
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
            users: '',
            results: [],
            include_comma: false
        }
    },
    methods: {
        add: function (message) {
            if (!this.users.includes(',')) {
                this.users = message + ',';
            } else {
                this.users = this.users.substr(0,this.users.lastIndexOf(',')+2) + message + ',';
            }
            this.results = [];
        },
        autoComplete(){
            this.results = [];

            if (!this.users.includes(',')) {
                this.query = this.users;
            } else {
                this.query = this.users.split(',')[this.users.split(',').length-1].trim();
            }

            if(this.query.length > 1){
                axios.get('/api/search_user', {params: {query: this.query}}).then(response => {
                    this.results = response.data;
                });
            }
        }
    }
}
</script>