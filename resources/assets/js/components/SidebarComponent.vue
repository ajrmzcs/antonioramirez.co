<template>
    <div class="col-sm-4 col-xs-12">
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Browse Categories</h4>
            </div>
            <div class="panel-body">
                <div v-if="isLoading" class="text-center">
                    <i class="fa fa-spinner fa-spin fa-2x"></i>
                </div>
                <div v-else="isLoading">
                    <ul v-for="category in categories">
                        <a v-bind:href="'/category/'+category.id"><li>{{ category.name }}</li></a>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Projects</h4>
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="https://github.com/ajrmzcs/antonioramirez.co">This site Github Repository</a></li>
                </ul>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                url: '/api/categories',
                isLoading: true, // Spinner flag
                categories: [],
            }
        },
        mounted() {
            this.getCategories(this.url)
        },
        methods: {
            getCategories(url) {
                this.isLoading = true;
                axios.get(url)
                    .then(response => {
                        this.categories = response.data;
                        this.isLoading = false;
                    });
            }
        }
    }
</script>
