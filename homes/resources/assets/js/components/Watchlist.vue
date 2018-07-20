<template>
    <div>
        <div v-if="isAddedToWatchlist" @click.prevent="unwatch(home)" class="watchlist-toggle">
            <span data-toggle="tooltip" data-placement="top" title="Remove from Watchlist" style="cursor: pointer;">
                <i class="fas fa-star fa-2x" style="color: yellow;"></i>
            </span>
        </div>
        <div v-else @click.prevent="watch(home)" class="watchlist-toggle">
            <span data-toggle="tooltip" data-placement="top" title="Add to Watchlist" style="cursor: pointer;">
                <i class="far fa-star fa-2x"></i>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    props : ['home', 'favorited'],
    /* where home is $home->id and favorited is checkWatchlist($id) ? true : false  */
    data() {
        return {
            isAddedToWatchlist: false,
        };
    },
    created() {
        this.isAddedToWatchlist = this.favorited ? true : false;
    },
    methods: {
        watch(home) {
            axios.post('/watchlist/add/' + home)
                .then(response => this.isAddedToWatchlist = true)
                .catch(error => console.log(error.response.data));
        },
        unwatch(home) {
            axios.delete('/watchlist/remove/' + home)
                .then(response => this.isAddedToWatchlist = false)
                .catch(error => console.log(error.response.data));
        }
    }
}
</script>
