<template>
    <div class="row pb-5 pt-5">
        <h2>Your quotes</h2>
        <div class="col-lg-6 mb-9 mb-lg-0">
            <div class="card">
                <div class="card-body">
                    <ul>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-9 mb-lg-0">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        props:["quotes"],

        mounted(){
            console.log("test quotes=>",this.quotes)
        }



    }
</script>
