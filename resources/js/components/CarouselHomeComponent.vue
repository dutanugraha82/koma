<template>
<div class="my-5" style="height:60vh">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../../public/img/carousel1.jpg" style="min-height:400px; object-fit:cover" class="d-block w-100 img-gs" alt="...">
      <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
        <div class="d-block bg-text-carousel w-100 p-4 rounded">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../../../public/img/carousel2.jpg" style="min-height:400px; object-fit:cover" class="d-block w-100 img-gs" alt="...">
       <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
        <div class="d-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../../../public/img/carousel3.jpg" style="min-height:400px; object-fit:cover" class="d-block w-100 img-gs" alt="...">
       <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
        <div class="d-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
</div>
</template>

<script>
export default {
    mounted(){
        console.log('success')
    }
}
</script>
