<template>
    <div class="row" style="padding-top: 30px">
        <h2>کلاس های من</h2>
        <div v-for="room in rooms" v-bind:key="room.id">
        <div class="col-md-3">
            <div class="thumbnail">
                <div class="thumb">
                    <img v-bind:src="urlImage" alt="">
                </div>
                <div class="caption text-center">
                    <h6 class="text-semibold no-margin">{{room.name}}</h6>
                    <p class="text-muted mb-15 mt-5">{{room.description}}</p>
                    <a  :href="`studentClass/${room.id}`" class="btn bg-teal"><i class="icon-paperplane position-left"></i> ورود به کلاس</a>
                </div>
            </div>
        </div>
        </div>
    </div>

</template>

<script>
        export default {
            props: ['rooms' , 'urlImage' , 'host'],
            mounted () {
                // Do something useful with the data in the template
                // console.log(window.location.href)
                console.log(this.rooms)
            },
            methods: {

            }
        }
</script>
