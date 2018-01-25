<template>
 <div>
    <input type="text" placeholder="Para" v-model="query" v-on:keyup="autoComplete" class="form-control">
  <div class="panel-footer" v-if="results.length">
   <ul class="list-group">
    <li class="list-group-item" v-for="result in results">
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
    results: []
   }
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 1){
     axios.get('/api/search_recipient',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     });
    }
   }
  }
 }
</script>