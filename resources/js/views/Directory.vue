<template>
<div class="mt-4">
   <div class="jumbotron jumbotron-fluid directory-jumbotron img-gs">
  <div class="container mt-4 text-white">
    <h1 class="display-4 robot-slab">Directory</h1>
    <p class="lead roboto-slab">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
  </div>
</div>
<div class="my-3">
    <form class="d-flex my-lg-0 p-2 justify-content-center">
      <input class="form-control" style="width:20rem;" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-dark ml-3 " style="width:150px;" type="submit">Search</button>
    </form>
</div>
    <hr>
<div class="container my-4">
        <div class="row">
             <div v-for="item in directory" :key="directory.slug" class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <div class="card border-0 mx-auto" style=" max-width:16rem">
                    <img :src="'/storage/'+item.thumbnail" class="bgSizeImg" style="max-height:18rem;max-width:15rem;" alt="...">
                    <h5 class="display-4 text-center mt-3" style="font-size:1.2em;">{{ item.title }}</h5>
                    <small style="font-size:0.6em; text-align:right;">{{item.created_at}}</small>
                    <hr>
                </div>
            </div>
        </div>
</div>


</div>
</template>
<script>

export default {
    data(){
      return{
        directory:[],
      }

    },

    mounted(){
     axios.get('http://127.0.0.1:8000/api/directory').then((response)=>{
      this.directory = response.data.data;
      // console.log(response.data.data);
     });
    }
}
</script>
<style>
  .bgSizeImg{
    background-origin: content-block;
  }
</style>
