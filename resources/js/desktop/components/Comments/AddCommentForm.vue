<template>
    <div class="container p-0 m-0">
        <form class="row p-0" v-on:submit.prevent="submit" v-if="!user.is_guest">
            <div class="col-12 p-0 m-0">
                <textarea class="form-control"
                          v-bind:class="{'border-danger':message.length>=255}"
                          placeholder="Comment text" v-model="message" minlength="1" maxlenght="255" required></textarea>
            </div>
            <div class="col-12 mt-2 p-0 m-0">
                <button class="btn btn-primary" type="submit">Send comment</button>
                <span v-if="message.length>0" class="ml-2 text--lighten-4">{{message.length}}/255</span>
            </div>
        </form>
        <p v-else>Need authorize to send comment</p>
    </div>

</template>
<script>
export default {
    props: {
        postId: {
            type: String,
            required: true,
        },
        commentId: {
            type: String,
            default: null,
            required: false,
        }
    },
    data() {
        return {
            message: '',
            result_message: null,
        }
    },
    computed: {
        user: function () {
            return window.user;
        },
    },
    methods: {
        submit() {
            axios.post("/comments", {
                message: this.message,
                post_id: this.postId,
                blog_comment_id: this.commentId
            }).then(resp => {
                this.message = '';

               // this.$emit("comment")

                window.location.reload()
            }).catch(() => {
                this.message = '';
            })
        }
    }
}
</script>
