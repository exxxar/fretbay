<template>
    <div class="card w-100 mb-1 mt-1">
        <div class="card-body p-1">
            <div class="row p-0 m-0">
                <div class="col-12 col-md-2" v-if="item.user">
                    <img v-lazy="item.user.profile.image" style="max-height:100px; object-fit: cover;" alt="">
                </div>
                <div class="col-12 col-md-10 ">
                    <p>{{ item.message }}</p>
                    <small>{{ item.created_at |moment('DD.MM.YYYY HH:mm') }}</small>

                    <div v-if="item.comments">

                        <comment-item-component :item="comment" :postId="postId" :commentId="comment.id"
                                                v-for="comment in item.comments"></comment-item-component>

                    </div>


                </div>

                <div class="col-12 mb-2" v-if="need_message">
                    <add-comment-form-component :postId="postId" :commentId="item.id"/>
                </div>

            </div>
            <div class="card-footer p-0 m-0">
                <a href="#comment" class="btn btn-outline-primary mr-2 mt-2" @click="need_message=!need_message"><i
                    class="far fa-comment"></i></a>

                <a href="#remove" class="btn btn-outline-danger mr-2 mt-2" @click="removeComment"
                   v-if="user.id===item.user_id"><i class="fas fa-ban"></i></a>


            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["item", "postId", "commentId"],
    data() {
        return {
            need_message: false
        }
    },
    computed: {
        user: function () {
            return window.user;
        },
    },
    methods: {
        removeComment() {
            axios.delete('/comments/' + this.item.id).then(resp => {
                window.location.reload()
            })
        }
    }
}
</script>

