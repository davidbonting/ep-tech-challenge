<template>
    <div>
        <h1 class="mb-6">Clients -> Add New Client</h1>

        <div class="max-w-lg mx-auto">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" v-model="client.name">
                <span v-if="formErrors.name" class="text-red-500">{{ formErrors.name[0] }}</span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" v-model="client.email">
                <span v-if="formErrors.email" class="text-red-500">{{ formErrors.email[0] }}</span>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" class="form-control" v-model="client.phone">
                <span v-if="formErrors.phone" class="text-red-500">{{ formErrors.phone[0] }}</span>
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" id="address" class="form-control" v-model="client.address">
                <span v-if="formErrors.address" class="text-red-500">{{ formErrors.address[0] }}</span>
            </div>
            <div class="flex">
                <div class="form-group flex-1">
                    <label for="city">City</label>
                    <input type="text" id="city" class="form-control" v-model="client.city">
                </div>
                <div class="form-group flex-1">
                    <label for="postcode">Postcode</label>
                    <input type="text" id="postcode" class="form-control" v-model="client.postcode">
                </div>
            </div>

            <div class="text-right">
                <a href="/clients" class="btn btn-default">Cancel</a>
                <button @click="storeClient" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'ClientForm',

        data() {
            return {
                client: {
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    city: '',
                    postcode: '',
                },
                formErrors: {},
            }
        },

        methods: {
            storeClient() {
                axios.post('/clients', this.client)
                    .then((data) => {
                        window.location.href = data.data.url;
                    }).catch((error) => {
                        this.formErrors = error.response.data.errors;
                    });
            }
        }
    }
</script>