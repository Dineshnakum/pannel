<template>
    <div :class="$attrs.class">
        <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
        <div class="form-input">
            <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" :class="{ error: error }" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" @change="previewImage" />
            <div v-if="imageSrc" class="w-full flex flex-col">
                <p>Image Preview:</p>
                <div class="w-52 self-center">
                    <img :src="imageSrc" alt="Preview" />
                </div>
            </div>
        </div>
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>
</template>

<script>
import { v4 as uuid } from 'uuid'

export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `text-input-${uuid()}`
            },
        },
        type: {
            type: String,
            default: 'text',
        },
        error: String,
        label: String,
        modelValue: String,
        imageUrl: String,
    },
    data(){
        return {
            imageSrc : this.imageUrl,
        }
    },
    emits: ['update:modelValue'],
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
        setSelectionRange(start, end) {
            this.$refs.input.setSelectionRange(start, end)
        },
        previewImage(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith("image/")) {
                this.imageSrc = URL.createObjectURL(file);
            }
        },
    },
}
</script>