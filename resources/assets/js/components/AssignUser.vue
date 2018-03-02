<template>
 <div>
  <input type="text" placeholder="Asignar a :" v-model="query" @keyup="autoComplete" class="form-control" name="assign">
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
            results: [],
        }
    },
    methods: {
        add: function (message) {
            this.query = message;
            this.results = [];
        },
        autoComplete(){
            if(this.query.length > 1){
                axios.get('/api/search_user', {params: {query: this.query}}).then(response => {
                    this.results = response.data;
                });
            }
        }
    }
}
</script>