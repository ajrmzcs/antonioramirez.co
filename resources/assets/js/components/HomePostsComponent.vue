<template>
    <div class="col-md-8">
        <h3>Recent entries</h3>
        <hr>
        <div v-if="isLoading" class="text-center">
            <i class="fa fa-spinner fa-spin fa-2x"></i>
        </div>
        <div v-else="isLoading">
            <div v-for="post in posts">
                <a v-bind:href="post.slug"><h3>{{ post.title }}</h3></a>
                <p class="no-margin-bottom">{{ post.excerpt }}</p>
                <small class="posted-on">Posted on: {{ post.updated_at | ago }}</small>
            </div>
            <div class="text-right button-margin-top">
                <button type="button" class="btn btn-primary button-margin" :disabled="prevPage === null" v-on:click="getPosts(prevPage)">&larr; Prev </button>
                <button type="button" class="btn btn-primary button-margin" :disabled="nextPage === null" v-on:click="getPosts(nextPage)">Next &rarr;</button>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        data() {
          return {
              url: '/api/posts',
              isLoading: true, // Spinner flag
              posts: [],
              currentPage: null,
              prevPage: null,
              nextPage: null,
          }
        },
        filters: {
            ago(date) {
                return moment(date).format('MMMM Do YYYY, h:mm:ss a');
            }
        },
        mounted() {
            this.getPosts(this.url);
        },
        methods: {
            getPosts(url) {
                this.isLoading = true;
                axios.get(url)
                    .then(response => {
                        this.posts = response.data.data; // Double data is used
                        // because we're using laravel simple pagination
                        this.isLoading = false;
                        // Pagination
                        this.currentPage = response.data.current_page;
                        this.prevPage = response.data.prev_page_url;
                        this.nextPage = response.data.next_page_url;
                    });
            }
        }
    }
</script>
