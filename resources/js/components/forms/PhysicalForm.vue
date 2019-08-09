<template>
    <div>
        <div class="upload-btn-wrapper">
            <button class="btn">Upload Physical</button>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" class="py-4" name="physical-form" accept=".pdf, .jpg, .png" @change="onChange">
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PhysicalForm",

        props: ['data'],

        data() {
            return {
                physicalForm: this.data.form_path,

            }
        },

        methods: {
            onChange(e) {
                if (! e.target.files.length) return;

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(file);

                reader.onload = e => {
                    this.physical = e.target.result;
                };

                this.persist(file);
            },

            persist(file) {
                let data = new FormData();

                data.append('physical-form', file);

                axios.post(`/api/physicals/${this.data.id}/physical-form`, data)
                    .then(() => {

                        const toast = Vue.swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Form Uploaded Successfully'
                        });
                    })
                    this.$emit('formUploaded');
            }
        }
    }
</script>

<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btn {
        border: 2px solid gray;
        color: #1b1b1b;
        background-color: #fff;
        padding: 6px 20px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
</style>
