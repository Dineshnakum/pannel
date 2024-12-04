<template>

    <Head title="Profile" />
    <div>
        <h1 class="text-3xl font-bold py-2">My Profile</h1>
    </div>
    <div class="columns-2">
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="profileUpdate">
                <div>
                    <h1 class="text-lg font-bold pt-2 px-6">Basic Info:-</h1>
                </div>
                <div class="flex flex-wrap -mb-8 -mr-6 p-6">
                    <TextInput v-model="profileForm.name" :error="profileForm.errors.name" class="pb-8 pr-6 w-full"
                        label="Name" />
                    <TextInput v-model="profileForm.email" :error="profileForm.errors.email" class="pb-8 pr-6 w-full"
                        label="Email" />
                    <TextInput v-model="profileForm.phone" :error="profileForm.errors.phone" class="pb-8 pr-6 w-full"
                        type="number" label="Phone" />
                    <TextareaInput v-model="profileForm.address" :error="profileForm.errors.address"
                        class="pb-8 pr-6 w-full" type="password" autocomplete="new-password" label="Address" />
                    <TextInput v-model="profileForm.city" :error="profileForm.errors.city" class="pb-8 pr-6 w-full"
                        label="City" />
                </div>
                <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
                    <Link class="text-black bg-gray-200 p-3 rounded" :href="route('admin.dashboard')">Back</Link>
                    <LoadingButton :loading="profileForm.processing" class="btn-indigo ml-auto" type="submit">Update
                    </LoadingButton>
                </div>
            </form>
        </div>

        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="passwordUpdate">
                <div>
                    <h1 class="text-lg font-bold pt-2 px-6">Change Password:-</h1>
                </div>
                <div class="flex flex-wrap -mb-8 -mr-6 p-6">
                    <TextInput v-model="passwordForm.current_password" :error="passwordForm.errors.current_password"
                        class="pb-8 pr-6 w-full" type="password" label="Current Password" />
                    <TextInput v-model="passwordForm.password" :error="passwordForm.errors.password"
                        class="pb-8 pr-6 w-full" type="password" label="New Password" />
                    <TextInput v-model="passwordForm.password_confirmation"
                        :error="passwordForm.errors.password_confirmation" class="pb-8 pr-6 w-full" type="password"
                        label="Confirm Password" />
                </div>
                <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
                    <Link class="text-black bg-gray-200 p-3 rounded" :href="route('admin.dashboard')">Back</Link>
                    <LoadingButton :loading="passwordForm.processing" class="btn-indigo ml-auto" type="submit">Update
                    </LoadingButton>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Layout from '@/Shared/Layout.vue'
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'
import TextareaInput from '@/Shared/TextareaInput.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';

export default {
    props: {
        user: Object,
    },
    components: {
        TextInput,
        LoadingButton,
        TextareaInput,
        useForm,
        Link,
        Head,
    },
    data() {
        return {
            profileForm: useForm({
                _method: 'put',
                name: this.user.name,
                email: this.user.email,
                phone: this.user.phone,
                address: this.user.address,
                city: this.user.city,
            }),
            passwordForm: useForm({
                _method: 'put',
                current_password: '',
                password: '',
                password_confirmation: '',
            })
        }
    },
    layout: Layout,
    methods: {
        profileUpdate() {
            let url = route('admin.profile.update')
            this.profileForm.post(url, {
                onSuccess: () => {
                    console.log("profile updated");
                },
                onError: (error) => {
                    console.log(error)
                }
            })
        },
        passwordUpdate() {
            let url = route('password')
            this.passwordForm.post(url, {
                onSuccess: () => {
                    this.passwordForm.reset();
                },
                onError: (error) => {
                    console.log(error)
                }
            })
        }
    },
}
</script>