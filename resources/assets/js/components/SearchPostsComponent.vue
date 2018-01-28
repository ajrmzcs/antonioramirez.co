<template>
    <form style="position:relative" class="navbar-form navbar-left">
        <div class="form-group">
            <input @keyup="showResults" class="form-control" placeholder="Search in posts" v-model="query">
        </div>
        <div style="position:absolute;top:36px;" v-if="query.length" class="dropdown-content">
            <ul v-for="hit in hits">
                <li>
                    <a v-bind:href="hit.slug">{{ hit.title }}</a>
                    <hr>
                </li>
            </ul>
            <img src="https://www.algolia.com/static_assets/images/pricing/pricing_new/algolia-powered-by-14773f38.svg" alt="search by algolia">
        </div>
    </form>
</template>

<script>

    import algoliasearch from 'algoliasearch';

    export default {

        props: ['appId', 'apiKey', 'indexName'],

        data() {
            return {
                hits: [],
                index: null,
                query:''
            }
        },
        mounted() {
            const client = algoliasearch(this.appId, this.apiKey);
            this.index = client.initIndex(this.indexName);
        },
        methods: {
            showResults() {
                this.index.search({query: this.query}, (error, results) => {
                    this.hits = results.hits;
                    // console.log(this.hits);
                });
            }
        }
    }
</script>