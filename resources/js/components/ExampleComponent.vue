<template>
    <div class="card shadow-sm p-3 mb-5 bg-white">
        <!-- Top Image -->
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg"
             preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
             aria-label="Placeholder: Image cap">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#868e96"></rect>
            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">
                Image cap
            </text>
        </svg>

        <div class="card-body">
            <!-- Card Title -->
            <h5 class="card-title">
                {{ exTitle }}
            </h5>

            <p class="card-text">

                <!-- text slot -->
                <slot name="information"></slot>

            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ExampleComponent",
        props:{
          exImgUrl:{ type: String },
          exTitle: { type: String }
        },
        data(){
            return{

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>
