<template>
    <div class="col-md-8">
        <div v-if="isLoading" class="text-center">
            <br>
            <i class="fa fa-spinner fa-spin fa-2x"></i>
        </div>
        <div v-else="isLoading">
            <h3>Posts in category: {{ categoryName }}</h3>
            <hr>
            <div v-for="post in posts">
                <a v-bind:href="post.slug"><h3>{{ post.title }}</h3></a>
                <p>{{ post.excerpt }}</p>
                <small>{{ post.updated_at | ago }}</small>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary button-margin" :disabled="prevPage === null" v-on:click="getPosts(prevPage)"><< Prev </button>
                <button type="button" class="btn btn-primary button-margin" :disabled="nextPage === null" v-on:click="getPosts(nextPage)">Next >></button>
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
              url: '/api/category/',
              isLoading: true, // Spinner flag
              posts: [],
              currentPage: null,
              prevPage: null,
              nextPage: null,
              categoryName : null,
          }
        },
        filters: {
            ago(date) {
                return moment(date).format('MMMM Do YYYY, h:mm:ss a');
            }
        },
        mounted() {
            let catId = document.getElementById('cat-id').innerText;
            this.getPosts(this.url+catId);
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
                        this.categoryName = response.data.category_name;
                    });
            }
        }
    }
</script>
