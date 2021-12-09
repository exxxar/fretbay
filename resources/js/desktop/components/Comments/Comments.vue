<template>
    <div class="container" v-if="comments">
        <div class="row">
            <div class="col-12">

                <add-comment-form-component :postId="postId" v-on:comment="loadCommentsByPostId"/>
            </div>

            <hr>

            <small class="mb-1 mt-1">Comments ({{comments.length}}):</small>
            <div class="col-12 mb-1 p-0 m-0" v-for="comment in filteredComments">
                <comment-item-component :item="comment" :postId="postId"/>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    props: ["postId"],
    data() {
        return {
            comments: []
        }
    },
    computed: {
        filteredComments() {
            return this.comments.filter(item => item.blog_comment_id == null)
        }
    },
    mounted() {
        this.loadCommentsByPostId()
    },
    methods: {
        loadCommentsByPostId() {
            axios.get("/comments/" + this.postId).then(resp => {
                this.comments = resp.data;
            })
        }
    }
}
</script>
