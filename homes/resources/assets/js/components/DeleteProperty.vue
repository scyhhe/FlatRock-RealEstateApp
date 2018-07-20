<template>
    <button @click.prevent="deleteProperty(home)" data-toggle="tooltip" data-placement="top" title="Delete" style="background: transparent;border: none; cursor: pointer;">
            <i class="fas fa-times fa-2x" style="color: #fff"></i>
    </button>
</template>

<script>
export default {
    props: ['home'],
    data() {
        return {
            isDeleted: false
        };
    },
    methods: {
        deleteProperty(home) {
            console.log(home);
            swal({
                'type' : 'warning',
                'title' : 'Are you sure?',
                'text' : 'You are about to delete this property. This is irevirsible. Please confirm your choice',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                confirmButtonColor: '#33BB9C'
            }).then((result) => {
                if (result.value) {
                    
                    axios.post('/homes/' + home)
                        .then(response => this.isDeleted = true)
                        .catch(error => console.log(error.response.data));
                
                } else {
                    return null;
                }
            });
        }
    }
}
</script>
